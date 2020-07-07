const API_FACTURA = '../../core/api/dashboard/factura.php?action=';
const API_ESTADO_FACTURA = '../../core/api/dashboard/estado_factura.php?action=readAll';

$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_FACTURA);

});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se establece un icono para el estado del producto.

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre}</td>
                <td>${row.fecha_registro}</td>
                <td>${row.precio_total}</td>
                <td>${row.estado_factura}</td>
                <td>${row.cantidad}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_factura})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openViewDetails(${row.id_factura})" class="green-text tooltipped" data-tooltip="Ver detalle"><i class="material-icons">assignment</i></a>
                </td>
            </tr>

        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-rows').html(content);
    pagination();
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    $('.materialboxed').materialbox();
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $('.tooltipped').tooltip();
}


function fillTableModified(dataset) {
    let content = '';

    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.

    // Se establece un icono para el estado del producto.
    dataset.forEach(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.producto}</td>
                <td>${row.precio_unitario}</td>
                <td>${row.cantidad}</td>
            </tr>

        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-details').html(content);
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
    $('.tooltipped').tooltip();
}

// Evento para mostrar los resultados de una búsqueda.
$('#search-form').submit(function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_FACTURA, this);

});

function openViewDetails(id) {
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#detalle-modal').modal('open');
    $('#modal-title-2').text('Detalle de compra');
    // Se establece el campo de tipo archivo como obligatorio.
    let identifier = {
        id_factura: id
    };
    readRowsModified(API_FACTURA + 'readOneFactura', identifier);

}

// Función que prepara formulario para modificar un registro.
function openUpdateModal(id) {
    // Se limpian los campos del formulario.
    $('#save-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Modificar factura');
    // Se establece el campo de tipo archivo como opcional.
    $('#archivo_producto').prop('required', false);

    $.ajax({
            dataType: 'json',
            url: API_FACTURA + 'readOne',
            data: {
                id_factura: id
            },
            type: 'post'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                $('#id_factura').val(response.dataset.id_factura);
                $('#nombre').val(response.dataset.nombre);
                $('#fecha').val(response.dataset.fecha_registro);
                $('#cantidad').val(response.dataset.cantidad);
                fillSelect(API_ESTADO_FACTURA, 'estado_factura', response.dataset.id_estado_factura);
                // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
                M.updateTextFields();
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

// Evento para crear o modificar un registro.
$('#save-form').submit(function (event) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ($('#id_factura').val()) {
        saveRow(API_FACTURA, 'update', this, 'save-modal');
    } else {
        saveRow(API_PRODUCTOS, 'create', this, 'save-modal');
    }
});