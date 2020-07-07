/*
 *   Este controlador es de uso general en las páginas web del sitio privado. Se importa en la plantilla del pie del documento.
 *   Sirve para inicializar los componentes del framework que son comunes en las páginas web.
 */

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se inicializa el componente Sidenav para que funcione el menú lateral.
    $('.sidenav').sidenav();
    // Se inicializa el componente Dropdown para que funcione la lista desplegable en los menús.
    $('.dropdown-trigger').dropdown();
    // Se inicializa el componente Tooltip asignado a botones y enlaces para que funcionen las sugerencias textuales.
    $('.tooltipped').tooltip();
    // Se inicializa el componente Modal para que funcionen las cajas de dialogo.
    $('.modal').modal();
});