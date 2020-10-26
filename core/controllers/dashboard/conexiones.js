// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_CLIENTES = '../../core/api/dashboard/conexiones.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_CLIENTES)
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        (row.estado == 1) ? icon = 'visibility': icon = 'visibility_off';
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.id_conexiones}</td>
                <td>${row.host}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_conexiones})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
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

// Evento para mostrar los resultados de una búsqueda.
$('#search-form').submit(function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_CLIENTES, this);
});

// Función que prepara formulario para modificar un registro.
function openUpdateModal(id) {
    // Se limpian los campos del formulario.
    $('#save-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Modificar dispositivos');
    // Se establece el campo de tipo archivo como opcional.
    // $( '#archivo_cliente' ).prop( 'required', false );
    
    $.ajax({
            dataType: 'json',
            url: API_CLIENTES + 'readOne',
            data: {
                id_conexiones: id
            },
            type: 'post'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                $('#id_conexiones').val(id);
                $('#dispositivo').val(response.dataset.host);
                
                (response.dataset.estado == 1) ? $('#estado_conexion').prop('checked', true): $('#estado_conexion').prop('checked', false); 

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
    if ($('#id_conexiones').val()) {
        saveRow(API_CLIENTES, 'update', this, 'save-modal');
    } else {
        saveRow(API_CLIENTES, 'update', this, 'save-modal');
    }
});

