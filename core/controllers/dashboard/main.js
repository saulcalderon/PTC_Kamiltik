// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../core/api/dashboard/usuarios.php?action=';
const API_PRODUCTOS = '../../core/api/dashboard/productos.php?action=';
const API_FACTURA = '../../core/api/dashboard/factura.php?action=';

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
    // Se llama a la función que muestra una gráfica en la página web.
    graficaproductos();
    // Se llama a la función que muestra una gráfica en la página web.
    estadosusuarios();
    // Se llama a la función que muestra una gráfica en la página web.
    productosproveedores();
    // Se llama a la función que muestra una gráfica en la página web.
    productossucursales();
    // Se llama a la función que muestra una gráfica en la página web.
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
// Función que prepara formulario para insertar un registro.
function openCreateModal1() {
    // Se limpian los campos del formulario.
    $('#save-form1')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal1').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title1').text('Generar grafico');
    // Se establece el campo de tipo archivo como obligatorio.
    //$( '#archivo_producto' ).prop( 'required', true );
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js

}

// Función que prepara formulario para insertar un registro.
function openCreateModal2() {
    // Se limpian los campos del formulario.
    $('#save-form2')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal2').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title2').text('Generar grafico');
    // Se establece el campo de tipo archivo como obligatorio.
    //$( '#archivo_producto' ).prop( 'required', true );
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js

}

// Función que prepara formulario para insertar un registro.
function openCreateModal3() {
    // Se limpian los campos del formulario.
    $('#save-form3')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal3').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title3').text('Generar grafico');
    // Se establece el campo de tipo archivo como obligatorio.
    //$( '#archivo_producto' ).prop( 'required', true );
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js

}

// Función que prepara formulario para insertar un registro.
function openCreateModal4() {
    // Se limpian los campos del formulario.
    $('#save-form4')[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $('#save-modal4').modal('open');
    // Se asigna el título para la caja de dialogo (modal).
    $('#modal-title4').text('Generar grafico');
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
                barGraph('chart', Tipos, cantidad, 'Tipos de usuarios', 'Cantidad de usuarios por cargo(En general)');
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
                barGraph('chart2', productos, cantidad, 'Productos', 'Cantidad de existencias en general');
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
                let nombre = ['Desactivado','Activo'];
                let cantidad = [];
                // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                response.dataset.forEach(function (row) {
                    // Se asignan los datos a los arreglos.
                    estado.push(row.estado);
                    cantidad.push(row.cantidad);
                });
                
                // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                pastelGraph('chart1', nombre, cantidad, 'Cantidad de usuarios por su estado');
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
               //console.log(response.dataset); 
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
                barGraph('chart5', sucursal, cantidad, 'Productos', 'Cantidad de productos por sucursales');
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

let months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

$('#save-form').submit(function (e) { 
    e.preventDefault();

    let mes1 =  $('#mes1').val();
    let mes2 =  $('#mes2').val();

    $.ajax({
        type: 'post',
        url: API_FACTURA + 'graph1',
        data: {
            mes1 : mes1,
            mes2:  mes2
        },
        dataType: 'json'
        
    })
    .done(function (response) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if (response.status) {
            // Se declaran los arreglos para guardar los datos por gráficar.
           //console.log(response.dataset); 
            let posMonths = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function (row) {
                // Se asignan los datos a los arreglos.
                posMonths.push(row.mes);
                cantidad.push(row.cantidad);
            });

            for (let i = 0; i < months.length; i++) {
                for (let j = 0; j < posMonths.length; j++) {
                    if (i == parseInt(posMonths[j])) {
                        posMonths.splice(j,1,months[i]);
                    }
                }  
            }
            
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph('chart6', posMonths , cantidad, 'Ganancias','Ganancias totales por mes');
        } else {
            $('#chart6').remove();
            
            
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

$('#save-form1').submit(function (e) { 
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: API_PRODUCTOS + 'graph1',
        data: $('#save-form1').serialize(),
        dataType: 'json'
        
    })
    .done(function (response) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if (response.status) {
            // Se declaran los arreglos para guardar los datos por gráficar.
           //console.log(response.dataset); 
            let producto = [];
            let precio = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function (row) {
                // Se asignan los datos a los arreglos.
                producto.push(row.nombre_producto);
                precio.push(row.precio_unitario);
            });

            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph('chart7', producto , precio, 'precio c/u','precios de productos por rango');
        } else {
            $('#chart7').remove();
            
            
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

$('#save-form2').submit(function (e) { 
    e.preventDefault();

    let cat = $('#cat').val();

    $.ajax({
        type: 'post',
        url: API_PRODUCTOS + 'graph2',
        data: {
            categoria : cat
        },
        dataType: 'json'
        
    })
    .done(function (response) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if (response.status) {
            // Se declaran los arreglos para guardar los datos por gráficar.
           //console.log(response.dataset); 
            let nombre = [];
            let existencia = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function (row) {
                // Se asignan los datos a los arreglos.
                nombre.push(row.nombre_producto);
                existencia.push(row.existencias);
            });

            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph('chart8', nombre , existencia, 'Existencia: ','fds');
        } else {
            $('#chart8').remove();
            
            
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

$('#save-form3').submit(function (e) { 
    e.preventDefault();

    let prov = $('#prov-lista').val();

    $.ajax({
        type: 'post',
        url: API_PRODUCTOS + 'graph3',
        data: {
            proveedor : prov
        },
        dataType: 'json'
        
    })
    .done(function (response) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if (response.status) {
            // Se declaran los arreglos para guardar los datos por gráficar.
           //console.log(response.dataset); 
            let nombre = [];
            let vendido = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function (row) {
                // Se asignan los datos a los arreglos.
                nombre.push(row.nombre_producto);
                vendido.push(row.ventas);
            });

            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph('chart9', nombre , vendido, 'Ventas: ','fds');
        } else {
            $('#chart9').remove();
            
            
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

$('#save-form4').submit(function (e) { 
    e.preventDefault();

   
    let numero =  $('#mes1-prod').val();

    $.ajax({
        type: 'post',
        url: API_FACTURA + 'graph2',
        data: {
            mes : parseInt(numero)
        },
        dataType: 'json'
        
    })
    .done(function (response) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if (response.status) {
            // Se declaran los arreglos para guardar los datos por gráficar.
           //console.log(response.dataset); 
            let nombre = [];
            let cuenta = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function (row) {
                // Se asignan los datos a los arreglos.
                nombre.push(row.nombre_producto);
                cuenta.push(row.cuenta);
            });

            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph('chart10', nombre , cuenta, 'Ventas: ','fds');
        } else {
           console.log('fallo');
            
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
