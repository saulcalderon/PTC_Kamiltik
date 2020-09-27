const API_FACTURA = '../../core/api/dashboard/factura.php?action=';

$(document).ready(function () {
    // Se llama a la función que obtiene los datos de los productos para llenar el buscador.
    searchProduct();
    // Variable para buscar los parámetros ubicados en la URL.
    let params = new URLSearchParams(location.search);
    const MESA = params.get('boton');
    // Función para crear la factura o continuarla.
    createBill(MESA);
});

// Función para crear o continuar la factura.
function createBill(id) {
    // data : ID de la mesa 
    // Acción de la API : createBill
    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'createBill',
            data: {
                mesa: id
            },
            type: 'post'
        })
        .done(function (response) {
            // Se asigna el ID de la mesa para ocuparlo luego.
            $('#mesa_form').val(id);
            if (response.status) {
                // Si el arreglo no está vacío se envía la información para que se muestre en la tabla.
                if (response.dataset.length) {
                    fillTableModified(response.dataset);
                }
                // Si el arreglo está vacío se puede continuar la factura pero con un mensaje de que no hay productos.
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

//Función para insertar el detalle con el producto en la tabla.
function fillTableModified(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.

    let total = 0;
    dataset.forEach(function (row) {
        // Se declaran  variables para hacer la suma de la cantidad por el precio unitario por cada producto
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
                <a href="#" onclick="openUpdateModal(${row.id_detalle_factura})" class="blue-text tooltipped" data-tooltip="Update"><i class="material-icons">mode_edit</i></a>
                <a href="#" onclick="deleteDetail(${row.id_detalle_factura})" class="red-text tooltipped" data-tooltip="Delete"><i class="material-icons">close</i></a>
                </td>
            </tr>

        `;

    });
    // Se verifica si el precio es igual 0.00 se elimina el texto de la etiqueta, sino se inserta.
    if (total.toFixed(2) == 0.00) {
        $('#total-factura').text('');
    } else {
        $('#total-factura').text(total.toFixed(2));
    }
    // Se hace el cálculo para obtener el cambio a entregar, se utiliza lo entregado por el cliente y el total.
    let entregado = $('#entregado').maskMoney('unmasked')[0];
    let cambio = entregado - total;
    if (entregado > total) {
        $('#cambio').text('Change: $ ' + cambio.toFixed(2));
    } else {
        $('#cambio').text('Invalid change');
    }
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-details').html(content);
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $('.tooltipped').tooltip();
}

// Función para buscar los productos a la base y llenar los datos en la variable options.
function searchProduct() {
    let options = {
        data: {},
        limit: 5,
    };
    // Acción de la API : readProducts 
    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'readProducts',
        })
        .done(function (response) {
            // Si retorna la API satisfactoriamente
            if (response.status) {
                // Se llena el objeto options con el nombre y una imagen del producto.
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
// Función de jQuery para el evento submit del formulario addProduct
$('#addProduct').submit(function (e) {
    e.preventDefault();
    // data : Todos los datos de los inputs por la función serialize().
    // Acción de la API : addProduct 
    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'addProduct',
            type: 'post',
            data: $(this).serialize(),
        })
        .done(function (response) {
            // Si retorna la API satisfactoriamente
            if (response.status) {
                sweetAlert(1, response.message, null);
                // Función para enviar los parámetos y retornar los datos, se envía la API y el ID de la mesa.
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

// Función para abrir un modal y mostrar los datos en los inputs.
function openUpdateModal(id) {
    // Se limpian los campos del formulario.
    $('#updateForm')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#update-modal').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#content').text('Modificar cantidad');
    // Se establece el campo de tipo archivo como opcional.

    $.ajax({
            // data : ID detalle 
            // Acción de la API : readOne, para leer un detalle.
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

// Función para el evento submit para actualizar el detalle de una factura.
$('#updateForm').submit(function (e) {
    e.preventDefault();
    // data : Todos los datos de los inputs por la función serialize().
    // Acción de la API : updateDetail 
    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'updateDetail',
            data: $(this).serialize(),
            type: 'post'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                sweetAlert(1, response.message, null);
                // Se cierra el modal de actualizar.
                $('#update-modal').modal('close');
                // Función para enviar los parámetos y retornar los datos, se envía la API y el ID de la mesa.
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

// Función para eliminar un detalle por su ID
function deleteDetail(id) {
    // data : ID del detalle
    // Acción de la API : deleteDetail 
    $.ajax({
            type: 'post',
            url: API_FACTURA + 'deleteDetail',
            data: {
                id_detalle: id
            },
            dataType: 'json',
        })
        .done(function (response) {
            // Si no retorna la API satisfactoriamente
            if (!response.status) {
                sweetAlert(4, response.exception, null);
            }
            sweetAlert(1, response.message, null);
            // Función para enviar los parámetos y retornar los datos, se envía la API y el ID de la mesa.
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

// Función para determinar que acción se ha realizado.
function actionBill(action) {
    // Se asignan variables para poder utilizarlas luego.
    let id = $('#mesa_form').val();
    let str = $('#cambio').text().substring(10);
    switch (action) {
        // Caso para finalizar la factura.
        case 'finalizar':
            // data : ID mesa, entregado_por_cliente FLOAT, total de factura FLOAT, cambio FLOAT.
            // Acción de la API : finishBill 
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
                    // Si retorna la API satisfactoriamente
                    if (response.status) {
                        sweetAlert(1, response.message, null);
                        // Función para esperar 2 segundos para enviar a la página de factura.php
                        setTimeout(() => {
                            location.href = 'http://localhost/PTC_Kamiltik/views_en/dashboard/bills.php';
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
            // Caso para eliminar la factura.
        case 'eliminar':
            console.log($('#mesa_form').val());

            let identifier = {
                mesa: id
            };
            confirmDelete2(API_FACTURA, identifier)

            break;
            // Caso para dejar pendiente la factura.
        default:
            location.href = 'http://localhost/PTC_Kamiltik/views_en/dashboard/bills.php';
            break;
    }
}
// Función de la librería maskMoney para validar dinero.
$("#entregado").maskMoney({
    prefix: '$ '
});

// Función para detectar cambio en el input y al presionar la tecla para cambiar el texto del total y cambio dinámicamente.
$('#entregado').on('change keyup', function () {
    // Las variables se convierten en float para validar si lo entregado por el cliente es mayor del total para hacer el cálculo.
    let total = parseFloat($('#total-factura').text());
    let entregado = $('#entregado').maskMoney('unmasked')[0];
    let cambio = entregado - total;
    if (entregado > total) {
        $('#cambio').text('Change: $ ' + cambio.toFixed(2));
    } else {
        $('#cambio').text('Invalid change');
    }
});