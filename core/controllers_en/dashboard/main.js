// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTOS = '../../core/api_en/dashboard/products.php?action=';

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
        greeting = 'Good Morning';
    } else if (hour < 19) {
        greeting = 'Good afternoon';
    } else if (hour <= 23) {
        greeting = 'Good night';
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
                barGraph('chart', categorias, cantidad, 'Quantity of products', 'Quantity of products per category');
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

//bar
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Augost','Sepember','November','December'],
        datasets: [{
            label: 'Entrance of the Year',
            backgroundColor: 'rgb(255, 39, 68, .3)',
            borderColor: 'rgb(130, 132, 137 )',
            data: [5, 9, 12, 19, 24, 30, 70,87,92,120,130]
        }]
    },

    // Configuration options go here
    options: {}
});

//radar
var ctx = document.getElementById('Chart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'radar',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Augost','Sepember','November','December'],
        datasets: [{
            label: 'Entrance of the Year',
            backgroundColor: 'rgb(77, 117, 225, .3)',
            borderColor: 'rgb(42, 92, 227  )',
            data: [5, 9, 12, 19, 24, 30, 70,87,92,120,130]
        }]
    },

    // Configuration options go here
    options: {}
});

//radar
var ctx = document.getElementById('Chart2').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Augost','Sepember','November','December'],
        datasets: [{
            label: 'Entrance of the Year',
            backgroundColor: ['rgb(31, 222, 28 , .3)','rgb(28, 133, 222 , .3)','rgb(152, 48, 224  , .3)','rgb(125, 224, 48  , .3)', 
            'rgb(239, 70, 44  , .3)','rgb(239, 221, 44  , .3)','rgb(239, 44, 239  , .3)'],
            borderColor: ['rgb(31, 222, 28 )','rgb(28, 133, 222 )','rgb(152, 48, 224 )','rgb(125, 224, 48 )', 
            'rgb(239, 70, 44 )','rgb(239, 221, 44 )','rgb(239, 44, 239 )'],
            data: [5, 9, 12, 19, 24, 30, 70]
        }]
    },

    // Configuration options go here
    options: {}
});



