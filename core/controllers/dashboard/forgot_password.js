// Dirección para obtener y enviar datos.
const API_USUARIOS = "../../core/api/dashboard/usuarios.php?action=";

// Formulario para reestablecer la contraseña, si el token coincide con el guardado en la base se acutaliza.
$('#nueva_clave_form').submit(function (e) {
    e.preventDefault();
    let params = new URLSearchParams(location.search);
    const t = params.get('t');
    $.ajax({
            type: 'post',
            url: API_USUARIOS + 'nuevaClave',
            data: {
                nueva_clave: $('#nueva_clave').val(),
                nueva_clave_2: $('#nueva_clave_2').val(),
                token_clave: t
            },
            dataType: 'json'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                sweetAlert(1, response.message, null);
                setTimeout(() => {
                    // Luego de 3 segundos se redirecciona al login.
                    location.href = 'http://localhost/PTC_Kamiltik/views/dashboard/index.php';
                }, 3000);
            } else {
                sweetAlert(2, response.exception, null);
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