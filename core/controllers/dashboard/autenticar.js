const API_USUARIOS = "../../core/api/dashboard/usuarios.php?action=";


$('#accepted').click(function (e) {
    e.preventDefault();
    let params = new URLSearchParams(location.search);
    const t = params.get('t');
    $.ajax({
            type: 'post',
            url: API_USUARIOS + 'auth',
            data: {
                auth: true,
                token_clave: t
            },
            dataType: 'json'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                sweetAlert(1, response.message, 'main.php');
                // setTimeout(() => {
                //     location.href = 'http://localhost/Cuzcatlan-eCommerce/views/dashboard/index.php';
                // }, 3000);
            } else {
                sweetAlert(1, response.message, 'index.php');
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


$('#denied').click(function (e) {
    e.preventDefault();
    let params = new URLSearchParams(location.search);
    const t = params.get('t');
    $.ajax({
            type: 'post',
            url: API_USUARIOS + 'auth',
            data: {
                auth: false,
                token_clave: t
            },
            dataType: 'json'
        })
        .done(function (response) {
            // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
            if (response.status) {
                sweetAlert(1, response.message, 'main.php');
                // setTimeout(() => {
                //     location.href = 'http://localhost/Cuzcatlan-eCommerce/views/dashboard/index.php';
                // }, 3000);
            } else {
                sweetAlert(1, response.message, 'index.php');
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



