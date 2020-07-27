const API_FACTURA = '../../core/api/dashboard/factura.php?action=';

$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_FACTURA);

});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.fecha}</td>
                <td>${row.nombre}</td>
                <td># ${row.id_mesa}</td>
                <td>${row.estado_factura}</td> 
                <td>${row.entregado_por_cliente}</td>
                <td>${row.cambio}</td>
                <td>${row.total}</td>
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

// Evento para mostrar los resultados de una búsqueda.
$('#search-form').submit(function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_FACTURA, this);

});

// function openViewDetails(id, mesa) {
//     // Se abre la caja de dialogo (modal) que contiene el formulario.
//     // $('#detalle-modal').modal('open');
//     // $('#modal-title-2').text('Detalle de compra');
//     // Se establece el campo de tipo archivo como obligatorio.

//     location.href = 'http://localhost/PTC_Kamiltik/views/dashboard/crear_factura.php';

//     mesas.forEach(el => {
//         if (mesas == mesa) {
//             mesas[el].classList.add = 'gray';
//             mesas[el].classList.remove = 'green';
//         }
//     });
//     let identifier = {
//         id_factura: id
//     };
//     readRowsModified(API_FACTURA + 'readOneFactura', identifier);

// }

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