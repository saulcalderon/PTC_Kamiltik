// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../core/api/dashboard/usuarios.php?action=';
const API_PRODUCTOS = '../../core/api/dashboard/productos.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se declara e inicializa un objeto con la fecha y hora actual del cliente.
    let today = new Date();
    // Se declara e inicializa una variable con el número de horas transcurridas en el día.
    let hour = today.getHours();
    // Se declara e inicializa una variable para guardar un saludo.
    let greeting = '';
    // Dependiendo del número de horas transcurridas en el día, se asigna un saludo para el usuario.
    if (hour < 12) {
        greeting = 'Buenos días';
    } else if (hour < 19) {
        greeting = 'Buenas tardes';
    } else if (hour <= 23) {
        greeting = 'Buenas noches';
    }
    // Se muestra el saludo en la página web.
    $('#greeting').text(greeting);
    // Se llama a la función que muestra una gráfica en la página web.
    graficaCategorias();
    graficaproductos();
    estadosusuarios();
    productosproveedores();
    productossucursales();
    productossucursales();
});

// Función que prepara formulario para insertar un registro.
function openCreateModal() {
    // Se limpian los campos del formulario.
    $('#save-form')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title').text('Generar grafico');
    // Se establece el campo de tipo archivo como obligatorio.
    //$( '#archivo_producto' ).prop( 'required', true );
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js

}

// Función para graficar la cantidad de productos por categoría.
function graficaCategorias() {
    $.ajax({
            dataType: 'json',
            url: API_USUARIOS + 'usuariosrango'
            
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar.
               //console.log(response.dataset); 
                let Tipos = [];
                let cantidad = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se asignan los datos a los arreglos.
                    Tipos.push(row.tipo_usuario);
                    cantidad.push(row.cantidad);
                });
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                barGraph('chart', Tipos, cantidad, 'Tipos de usuarios', 'Cantidad de usuarios por cargo');
            } else {
                $('#chart').remove();
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


function graficaproductos() {
    $.ajax({
            dataType: 'json',
            url: API_PRODUCTOS + 'productosexistencia'
            
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar.
              //console.log(response.dataset.nombre_producto);
                let productos = [];
                let cantidad = [];
                  
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se asignan los datos a los arreglos.
                    productos.push(row.nombre_producto);
                    cantidad.push(row.existencias);
                });
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                barGraph('chart2', productos, cantidad, 'Productos', 'Cantidad de prodcutos');
            } else {
                $('#chart2').remove();
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

function estadosusuarios() {
    $.ajax({
            dataType: 'json',
            url: API_USUARIOS + 'estadosusuarios'
            
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar.
               //console.log(response.dataset); 
                let estado = [];
                let cantidad = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se asignan los datos a los arreglos.
                    estado.push(row.estado);
                    cantidad.push(row.cantidad);
                });
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                pastelGraph('chart1', estado, cantidad, 'Tipos de usuarios');
            } else {
                $('#chart1').remove();
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

function productosproveedores() {
    $.ajax({
            dataType: 'json',
            url: API_PRODUCTOS + 'productosproveedores'
            
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar.
               console.log(response.dataset); 
                let empresa = [];
                let cantidad = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se asignan los datos a los arreglos.
                    empresa.push(row.empresa);
                    cantidad.push(row.producto);
                });
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                pastelGraph('chart4', empresa, cantidad, 'Cantidad de productos por proveedor');
            } else {
                $('#chart4').remove();
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

function productossucursales() {
    $.ajax({
            dataType: 'json',
            url: API_PRODUCTOS + 'productossucursales'
            
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar.
              //console.log(response.dataset.nombre_producto);
                let sucursal = [];
                let cantidad = [];
                  
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se asignan los datos a los arreglos.
                    sucursal.push(row.sucursal);
                    cantidad.push(row.cantidad);
                });
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                barGraph('chart5', sucursal, cantidad, 'Productos', 'Cantidad de prodcutos');
            } else {
                $('#chart5').remove();
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



