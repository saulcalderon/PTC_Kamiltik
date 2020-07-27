const API_FACTURA = '../../core/api/dashboard/factura.php?action=';

$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    searchProduct();
    let params = new URLSearchParams(location.search);
    const MESA = params.get('boton');
     createBill(MESA);
});

function createBill(id) {
    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'createBill',
            data: {
                mesa: id
            },
            type: 'post'
        })
        .done(function (response) {
            $('#mesa_form').val(id);
            if (response.status) {
                if (response.dataset.length) {
                    fillTableModified(response.dataset);
                }
            } else {
                sweetAlert(4, response.exception, null);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
}


// function readFactura(id) {
//     $.ajax({
//             dataType: 'json',
//             url: API_FACTURA + 'readOneFactura',
//             data: {
//                 id_factura: id
//             },
//             type: 'post'
//         })
//         .done(function (response) {
//             // Se comprueba si la API ha retornado datos, de lo contrario se muestra un mensaje de error en pantalla.
//             if (response.status) {
//                 fillTableModified(response.dataset);
//             } else {
//                 sweetAlert(2, response.exception, null);
//             }
//         })
//         .fail(function (jqXHR) {
//             // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
//             if (jqXHR.status == 200) {
//                 console.log(jqXHR.responseText);
//             } else {
//                 console.log(jqXHR.status + ' ' + jqXHR.statusText);
//             }
//         });
// }


function fillTableModified(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    // Se establece un icono para el estado del producto.

    let total = 0;
    dataset.forEach(function (row) {

        let subtotal = (row.cantidad * row.precio_unitario);
        total += subtotal;
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre_producto}</td>
                <td>${row.precio_unitario}</td>
                <td>${row.cantidad}</td>
                <td>${row.tipo_producto}</td>
                <td>
                <a href="#" onclick="openUpdateModal(${row.id_detalle_factura})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                <a href="#" onclick="deleteDetail(${row.id_detalle_factura})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">close</i></a>
                </td>
            </tr>

        `;

    });
    if (total.toFixed(2) == 0.00) {
        $('#total-factura').text('');
    } else {
        $('#total-factura').text(total.toFixed(2));
    }

    let entregado = $('#entregado').maskMoney('unmasked')[0];
    let cambio = entregado - total;
    if (entregado > total) {
        $('#cambio').text('Cambio: $ ' + cambio.toFixed(2));
    } else {
        $('#cambio').text('Cambio inválido');
    }
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-details').html(content);
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $('.tooltipped').tooltip();
}

async function searchProduct() {
    let options = {
        data: {},
        limit: 5,
        // onAutocomplete: function (id) {

        // }
    };

    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'readProducts',
        })
        .done(function (response) {
            if (response.status) {
                for (let i = 0; i < response.dataset.length; i++) {
                    options.data[response.dataset[i].nombre_producto] = 'http://localhost/PTC_Kamiltik/resources/img/commerce/producto1.jpg';
                }
                var elems = document.querySelectorAll('.autocomplete');

                var instances = M.Autocomplete.init(elems, options);

            } else {
                sweetAlert(2, response.exception, null);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
}

$('#addProduct').submit(function (e) {
    e.preventDefault();
    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'addProduct',
            type: 'post',
            data: $(this).serialize(),
        })
        .done(function (response) {
            if (response.status) {
                sweetAlert(1, response.message, null);
                readRowsModified(API_FACTURA + 'readOneFactura', $('#mesa_form').val());
            } else {
                sweetAlert(2, response.exception, null);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
});

function openUpdateModal(id) {
    // Se limpian los campos del formulario.
    $('#updateForm')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#update-modal').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#content').text('Modificar cantidad');
    // Se establece el campo de tipo archivo como opcional.

    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'readOne',
            data: {
                id_detalle: id
            },
            type: 'post'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente. 
                $('#id_detalle').val(response.dataset.id_detalle_factura);
                console.log($('#id_detalle').val());
                $('#nombre-producto').text(response.dataset.nombre_producto);
                $('#cantidad').val(response.dataset.cantidad);
                $('#precio-unitario').text(response.dataset.precio_unitario);
                $('#tipo-producto').text(response.dataset.tipo_producto);

                M.updateTextFields();
            } else {
                sweetAlert(2, response.exception, null);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
}

$('#updateForm').submit(function (e) {
    e.preventDefault();
    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'updateDetail',
            data: $(this).serialize(),
            type: 'post'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                sweetAlert(1, response.message, null);
                $('#update-modal').modal('close');
                readRowsModified(API_FACTURA + 'readOneFactura', $('#mesa_form').val());
                M.updateTextFields();

            } else {
                sweetAlert(2, response.exception, null);
            }
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
});


function deleteDetail(id) {
    $.ajax({
            type: 'post',
            url: API_FACTURA + 'deleteDetail',
            data: {
                id_detalle: id
            },
            dataType: 'json',
        })
        .done(function (response) {
            if (!response.status) {
                sweetAlert(4, response.exception, null);
            }
            sweetAlert(1, response.message, null);
            readRowsModified(API_FACTURA + 'readOneFactura', $('#mesa_form').val());
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
}

function actionBill(action) {
    let id = $('#mesa_form').val();
    let str = $('#cambio').text().substring(10);
    switch (action) {
        case 'finalizar':
            $.ajax({
                    type: 'post',
                    url: API_FACTURA + 'finishBill',
                    data: {
                        mesa: id,
                        entregado: $('#entregado').maskMoney('unmasked')[0],
                        total: parseFloat($('#total-factura').text()),
                        cambio: parseFloat(str)
                    },
                    dataType: 'json',
                })
                .done(function (response) {
                    if (response.status) {
                        sweetAlert(1, response.message, null);
                        setTimeout(() => {
                            location.href = 'http://localhost/PTC_Kamiltik/views/dashboard/factura2.php';
                        }, 2000);
                    } else {
                        sweetAlert(4, response.exception, null);
                    }
                })
                .fail(function (jqXHR) {
                    // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                    if (jqXHR.status == 200) {
                        console.log(jqXHR.responseText);
                    } else {
                        console.log(jqXHR.status + ' ' + jqXHR.statusText);
                    }
                });
            break;
        case 'eliminar':
            console.log($('#mesa_form').val());

            let identifier = {
                mesa: id
            };
            confirmDelete2(API_FACTURA, identifier)

            break;
        default:
            location.href = 'http://localhost/PTC_Kamiltik/views/dashboard/factura2.php';
            break;
    }
}

// $('#entregado').maskMoney();
$("#entregado").maskMoney({
    prefix: '$ '
});

$('#entregado').on('change keyup', function () {
    let total = parseFloat($('#total-factura').text());
    let entregado = $('#entregado').maskMoney('unmasked')[0];
    let cambio = entregado - total;
    if (entregado > total) {
        $('#cambio').text('Cambio: $ ' + cambio.toFixed(2));
    } else {
        $('#cambio').text('Cambio inválido');
    }
});