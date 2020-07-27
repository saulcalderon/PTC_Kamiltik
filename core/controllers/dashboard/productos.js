// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PRODUCTOS = '../../core/api/dashboard/productos.php?action=';
/* Selects */
const API_TIPO_PRODUCTO = '../../core/api/dashboard/productos.php?action=readAllTipoProducto';
const API_SUCURSAL = '../../core/api/dashboard/productos.php?action=readAllSucursal';
const API_ESTADO_PRODUCTO = '../../core/api/dashboard/productos.php?action=readAllEstadoProducto';
const API_ESTADO_DISTRIBUCION = '../../core/api/dashboard/productos.php?action=readAllEstadoDistribucion';
const API_PROVEEDOR = '../../core/api/dashboard/productos.php?action=readAllProveedor';
const API_DOCUMENTO_COMPRA = '../../core/api/dashboard/productos.php?action=readAllDocumentoCompra';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PRODUCTOS);
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function (row) {
        // Se establece un icono para el estado del producto.

        //(row.id_estado_producto == 1) ? icon = 'visibility': icon = 'visibility_off';
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.id_producto}</td>
                <!--<td><img src="../../resources/img/productos/${row.id_imagen}" class="materialboxed" height="100"></td>-->
                <td>${row.nombre_producto}</td>
                <td>${row.existencias}</td>
                <td>${row.descripcion}</td>
                <td>${row.precio_unitario}</td>
                <td>${row.tipo_producto}</td>
                <td>${row.estado_producto}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_producto})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_producto})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $('#tbody-rows').html(content);
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
    searchRows(API_PRODUCTOS, this);
});

// Función que prepara formulario para insertar un registro.
function openCreateModal() {
    // Se limpian los campos del formulario.
    $('#save-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Crear producto');
    // Se establece el campo de tipo archivo como obligatorio.
    //$( '#archivo_producto' ).prop( 'required', true );
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js
    fillSelect(API_TIPO_PRODUCTO, 'tipo_producto', null);
    fillSelect(API_SUCURSAL, 'nombre_sucursal', null);
    fillSelect(API_ESTADO_PRODUCTO, 'estado_producto', null);
    fillSelect(API_ESTADO_DISTRIBUCION, 'estado_distribucion', null);
    fillSelect(API_PROVEEDOR, 'nombre_proveedor', null);
    fillSelect(API_DOCUMENTO_COMPRA, 'documento_compra', null);
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal(id) {
    // Se limpian los campos del formulario.
    $('#save-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Modificar producto');
    // Se establece el campo de tipo archivo como opcional.
    //$( '#archivo_producto' ).prop( 'required', false );

    $.ajax({
            dataType: 'json',
            url: API_PRODUCTOS + 'readOne',
            data: {
                id_producto: id
            },
            type: 'post'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
                $('#id_producto').val(response.dataset.id_producto);
                $('#nombre_producto').val(response.dataset.nombre_producto);
                $('#precio_producto').val(response.dataset.precio_unitario);
                $('#existencias_producto').val(response.dataset.existencias);
                $('#fecha').val(response.dataset.fecha_registro);
                $('#descripcion_producto').val(response.dataset.descripcion);
                /* Rellenar selects */
                fillSelect(API_TIPO_PRODUCTO, 'tipo_producto', response.dataset.id_tipo_producto);
                fillSelect(API_SUCURSAL, 'nombre_sucursal', response.dataset.id_sucursal);
                fillSelect(API_ESTADO_PRODUCTO, 'estado_producto', response.dataset.id_estado_producto);
                fillSelect(API_ESTADO_DISTRIBUCION, 'estado_distribucion', response.dataset.id_estado_distribucion);
                fillSelect(API_PROVEEDOR, 'nombre_proveedor', response.dataset.id_proveedor);
                fillSelect(API_DOCUMENTO_COMPRA, 'documento_compra', response.dataset.id_documento_compra);
                
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
    if ($('#id_producto').val()) {
        saveRow(API_PRODUCTOS, 'update', this, 'save-modal');
    } else {
        saveRow(API_PRODUCTOS, 'create', this, 'save-modal');
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog(id) {
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = {
        id_producto: id
    };
    confirmDelete(API_PRODUCTOS, identifier);
}