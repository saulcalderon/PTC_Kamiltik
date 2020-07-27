const API_FACTURA = '../../core/api/dashboard/factura.php?action=';

$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_FACTURA);
    colorMesa(API_FACTURA + 'readMesas');
});

function colorMesa(api) {
    // NodeList de los botones de las mesas
    const botones = document.querySelectorAll('button.btn-d');
    $.ajax({
            // Acción de la API : readMesas
            dataType: 'json',
            url: api
        })
        .done(function (response) {
            // Si la API responde satisfactoriamente.
            if (response.status) {
                // Doble ciclo for para comprobar si una mesa tiene una factura pendiente, se le asigna un color diferente.
                for (let i = 0; i < botones.length; i++) {
                    for (let j = 0; j < response.dataset.length; j++) {
                        if (botones[i].getAttribute('value') == response.dataset[j].id_mesa){
                            botones[i].classList.remove('green')
                            botones[i].classList.add('gray')
                            botones[i].setAttribute('data-tooltip', 'Mesa ocupada');
                        }
                    }
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
                <td>
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
            </tr>

        `;

    });
    // Se verifica si el precio es igual 0.00 se elimina el texto de la etiqueta, sino se inserta.
    if (total.toFixed(2) == 0.00) {
        $('#total-factura').text('');
    } else {
        $('#total-factura').text(' ' + total.toFixed(2));
    }
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
    $('#modal-title-2').text('Detalle de factura');
    // Se establece el campo de tipo archivo como obligatorio.
    readRowsModified(API_FACTURA + 'readOneFacturaID', id);

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