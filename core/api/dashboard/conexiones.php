<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/usuarios.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia al modelo correspondiente.
    $usuario = new Usuarios;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    //print_r($_SESSION);

    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
            case 'readProfile':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOneUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'editProfile':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($usuario->readOneUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombres($_POST['nombres_perfil'])) {
                            if ($usuario->setApellidos($_POST['apellidos_perfil'])) {
                                if ($usuario->setCorreo($_POST['correo_perfil'])) {
                                    if ($usuario->setTelefono($_POST['alias_perfil'])) {
                                        if ($usuario->editProfile()) {
                                            $_SESSION['alias_usuario'] = $usuario->getCorreo();
                                            $result['status'] = 1;
                                            $result['message'] = 'Perfil modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'password':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword($_POST['clave_actual_1'])) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Contraseña cambiada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'readAll':
                $usuario->setId($_SESSION['id_usuario']);
                if ($result['dataset'] = $usuario->readAllDispositivos()) {
                    $result['status'] = 1;
                    //print_r($_GET['action']);
                    //print_r($result['dataset']);
                } else {
                    $result['exception'] = 'No hay dispositivos registrados';
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchUsuarios($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'readOne':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($usuario->setIdConexion(($_POST['id_conexiones']))) {
                        if ($result['dataset'] = $usuario->readOneDispositivo()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Dispositivo inexistente';
                        }
                    } else {
                        $result['exception'] = 'Conexion incorrecta';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update': 
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setIdConexion($_POST['id_conexiones'])) {
                    if($usuario->setId($_SESSION['id_usuario'])){
                        //print_r($_POST); 
                        if($usuario->setEstadoConexion(isset($_POST['estado_conexion'])? true :false)){
                            if($usuario->setHostname($_POST['dispositivo'])){
                                if ($usuario->updateDispositivo()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Dispositivo modificado correctamente';
                                }else{
                                    $result['exception'] = Database::getException();
                                }
                            }else{
                                $result['exception'] = 'Mierda mal hecha inexistente';    
                            }
                        }else{
                            $result['exception'] = 'Estado incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Usuario incorrecta';
                    }
                } else {
                    $result['exception'] = 'Conexion incorrecta';
                }
                break;
            case 'delete':
                if ($_POST['id_usuario'] != $_SESSION['id_usuario']) {
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->readOneUsuario()) {
                            if ($usuario->deleteUsuario()) {
                                $result['status'] = 1;
                                $result['message'] = 'Usuario eliminado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
                //NO
            case 'updateDispositivo2':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_administrador'])) {
                    if ($usuario->readOneDispositivo()) { 
                        if ($usuario->setEstadoConexion(isset($_POST['estado_conexion']) ? 1 : 2)) {
                            if($usuario->setHostname($_POST['dispositivo'])){
                                if ($usuario->updateDispositivo()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Dispositivo modificado correctamente';
                                }else{
                                    $result['exception'] = Database::getException();
                                }
                            }else{
                                $result['exception'] = 'Mierda mal hecha inexistente';    
                            }
                        } else {
                            $result['exception'] = 'Estado inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;

            case 'readAllDispositivos':
                if ($result['dataset'] = $usuario->readAllDispositivos()) {
                    $result['status'] = 1;
                    //print_r($_GET['action']);
                    //print_r($result['dataset']);
                } else {
                    $result['exception'] = 'No hay dispositivos registrados';
                }
                break;
            default:
                exit('Acción no disponible log');
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($usuario->readAllUsuarios()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['exception'] = 'No existen usuarios registrados';
                }
                //print($result['status']);
                break;
            case 'register':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres'])) {
                    if ($usuario->setApellidos($_POST['apellidos'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setTelefono($_POST['telefono'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($usuario->setClave($_POST['clave1'])) {
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Usuario registrado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Telefono incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
                //Seguridad 1
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                //Verficar si el usuario no ha sido bloqueado, utilizando la cookie block
                if (isset($_COOKIE["block" . 'usuario'])) {
                    $result['exception'] = 'Su cuenta está bloqueada por un minuto';
                } else {
                    if ($usuario->checkCorreo($_POST['alias'])) {
                        if ($usuario->checkPassword($_POST['clave'])) {
                            //Seguridad 2 (Terminar)
                            if ($usuario->checkDispositivo()) {
                                $_SESSION['id_usuario'] = $usuario->getId();
                                $_SESSION['alias_usuario'] = $usuario->getNombres() . ' ' . $usuario->getApellidos();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta, se cerraron todas sus sesiones en otros dispositivos';
                            } else {
                                $result['exception'] = "Se tiene una sesión activa en otro dispositivo, por motivos de seguridad se cerrarán sus sesiones activas y vuelva a intentarlo";
                            }
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Alias incorrecto';
                    }

                    //Bloqueo de usuario por intentos, utilizando cookies
                    if ($result['status'] != 1) {
                        if (isset($_COOKIE['usuario'])) {
                            //print($_COOKIE);

                            $cont =  $_COOKIE['usuario'];
                            $cont++;
                            setcookie('usuario', $cont, time() + 120);

                            //print($_COOKIE);
                            //Contador para evaluar los tres intentos del usuario
                            if ($cont >= 3) {
                                //Se setea el tiempo que va a bloquearse el inicio de sesión en segundos, en este caso 60 segundos
                                setcookie("block" . 'usuario', $cont, time() + 60);
                            }
                        } else {
                            setcookie('usuario', 1, time() + 120);
                        }
                    }
                }

                break;
            default:
                exit('Acción no disponible');
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
