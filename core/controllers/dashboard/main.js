// Constante para establecer la ruta y parámetros de comunicación con la API.
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
});

// Función para graficar la cantidad de productos por categoría.
function graficaCategorias() {
    $.ajax({
            dataType: 'json',
            url: API_PRODUCTOS + 'cantidadProductosCategoria',
            data: null
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
            if (response.status) {
                // Se declaran los arreglos para guardar los datos por gráficar.
                let categorias = [];
                let cantidad = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se asignan los datos a los arreglos.
                    categorias.push(row.nombre_categoria);
                    cantidad.push(row.cantidad);
                });
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                barGraph('chart', categorias, cantidad, 'Cantidad de productos', 'Cantidad de productos por categoría');
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