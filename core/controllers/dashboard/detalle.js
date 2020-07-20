const API_FACTURA = '../../core/api/dashboard/factura.php?action=';

$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    searchProduct();
    let params = new URLSearchParams(location.search);
    const ID = params.get('id');
    const ESTADO = params.get('estado');
    if (ID && ESTADO == 'Pendiente' ) {
        readFactura(ID);
    }
});

function readFactura(id) {
    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'readOneFactura',
            data: {
                id_factura: id
            },
            type: 'post'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se muestra un mensaje de error en pantalla.
            if (response.status) {
                fillTableModified(response.dataset);
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


function fillTableModified(dataset) {
    let content = '';

    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.

    // Se establece un icono para el estado del producto.
    dataset.forEach(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre_producto}</td>
                <td>${row.precio_unitario}</td>
                <td>${row.cantidad}</td>
                <td>${row.tipo_producto}</td>
            </tr>

        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-details').html(content);
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $('.tooltipped').tooltip();
}

async function searchProduct() {
    let options = {
        data: {

        },
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
                    options.data[response.dataset[i].nombre_producto] = `hola ${i}`;
                }
                var elems = document.querySelectorAll('.autocomplete');

                var instances = M.Autocomplete.init(elems, options);

            } else {
                sweetAlert(2, result.exception, null);
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
            url: API_FACTURA + 'verifyBill',
            type: 'post',
            data: $(this).serialize(),
        })
        .done(function (response) {
            if (response.status) {
                sweetAlert(1, response.message, null);
                readRowsModified(API_FACTURA + 'readOneFactura', response.dataset.id_factura);
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