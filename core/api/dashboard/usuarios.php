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
                                    if ($usuario->setTelefono($_POST['telefono_perfil'])) {
                                        if ($usuario->editProfile()) {
                                            $_SESSION['alias_usuario'] = $usuario->getNombres() . " " . $usuario->getApellidos();
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
                                    if ($_POST['clave_nueva_1'] != $_POST['clave_actual_1']) {
                                        if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                            if ($usuario->changePassword()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Contraseña cambiada correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        } else {
                                            $result['exception'] = $usuario->getPasswordError(); //getPasswordError para validar contraseña;
                                        }
                                    } else {
                                        $result['exception'] = 'La nueva clave no puede ser igual a la anterior.';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = $usuario->getPasswordError(); //getPasswordError para validar contraseña;;
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'readAll':
                if ($result['dataset'] = $usuario->readAllUsuarios()) {
                    $result['status'] = 1;
                    //print_r($_GET['action']);
                    //print_r($result['dataset']);
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
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
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombre'])) {
                    if ($usuario->setApellidos($_POST['apellido'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setTelefono($_POST['telefono'])) {
                                if ($usuario->setIdEstado(isset($_POST['estado']) ? 1 : 0)) {
                                    if ($usuario->setFechaNacimiento($_POST['fecha'])) {
                                        if ($_POST['clave_usuario'] == $_POST['confirmar_clave']) {
                                            if ($usuario->setClave($_POST['clave_usuario'])) {
                                                if ($usuario->createUsuario()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Usuario creado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = $usuario->getPasswordError(); //getPasswordError para validar contraseña;
                                            }
                                        } else {
                                            $result['exception'] = 'Claves diferentes';
                                        }
                                    } else {
                                        $result['exception'] = 'Fecha de nacimiento incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Estado incorrecto';
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
            case 'readOne':
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOneUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($usuario->readOneUsuario()) {
                        if ($usuario->setNombres($_POST['nombre'])) {
                            if ($usuario->setApellidos($_POST['apellido'])) {
                                if ($usuario->setFechaNacimiento($_POST['fecha'])) {
                                    if ($usuario->setIdEstado(isset($_POST['estado']) ? 1 : 0)) {
                                        if ($usuario->setTelefono($_POST['telefono'])) {
                                            if ($usuario->updateUsuario()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Usuario modificado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        } else {
                                            $result['exception'] = 'Telefono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha de nacimiento incorrecta';
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
            case 'usuariosrango':
                if ($result['dataset'] = $usuario->usuariosrango()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            case 'estadosusuarios':
                if ($result['dataset'] = $usuario->estadosusuarios()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
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
                                        if (!$usuario->readAllUsuarios()) {
                                            if ($usuario->createUsuario()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Usuario registrado correctamente';
                                            } else {
                                                $result['exception'] = 'No';
                                            }
                                        } else {
                                            $result['exception'] = 'Existe al menos un usuario registrado';
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
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkCorreo($_POST['alias'])) {
                    $usuario->setClave($_POST['clave']);
                    if ($usuario->checkPassword($_POST['clave'])) {
                        $_SESSION['id_usuario_auth'] = $usuario->getId();
                        $_SESSION['alias_usuario'] = $usuario->getNombres() . ' ' . $usuario->getApellidos();

                        // Se genera un ID aleatorio.
                        $token = uniqid();

                        $direccion = "http://localhost/PTC_Kamiltik/views/dashboard/autenticar.php?t=" . $token;

                        $body = "Confirme su inicio de sesión en el siguiente link: " . $direccion;

                        $subject = 'Confirmar inicio de sesión';
                        // Se envia el mail con la dirección y el token, se guarda el token en la base de datos.

                        if ($usuario->sendMail($body, $subject)) {
                            if ($usuario->tokenAuth($token)) {
                                $_SESSION['tiempo1'] = time();
                                $result['status'] = 1;
                                $result['message'] = 'Se ha enviado un correo para validar su sesión.';
                            } else {
                                $result['exception'] = "Hubo un error al enviar el correo.";
                            }
                        } else {
                            $result['exception'] = "Hubo un error al enviar el correo.";
                        }
                    } else {
                        $result['exception'] = 'Clave incorrecta';
                    }
                } else {
                    $result['exception'] = 'Alias incorrecto';
                }
                break;
            case 'recuperar':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkCorreo($_POST['recuperar_mail'])) {
                    // Se genera un ID aleatorio.
                    $token = uniqid();

                    $direccion = "http://localhost/PTC_Kamiltik/views/dashboard/forgot_password.php?t=" . $token;

                    $body = "Restablezca su contraseña haciendo click en el siguiente enlace: " . $direccion;

                    $subject = 'Restaurar contraseña -Kamiltik';
                    // Se envia el mail con la dirección y el token, se guarda el token en la base de datos.
                    if ($usuario->sendMail($body, $subject)) {
                        if ($usuario->tokenClave($token)) {
                            $_SESSION['correo'] = $usuario->getCorreo();
                            $result['status'] = 1;
                            $result['message'] = 'Hemos enviado un correo para que restablezca su contraseña.';
                        } else {
                            $result['exception'] = 'Hubo un error al enviar el correo.';
                        }
                    } else {
                        $result['exception'] = 'Hubo un error al enviar el correo.';
                    }
                } else {
                    $result['exception'] = 'Correo no registrado';
                }
                break;
                // Se verifica el token con el guardado de la base, luego se elimina.
            case 'nuevaClave':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkCorreo($_SESSION['correo'])) {
                    if ($usuario->setTokenClave($_POST['token_clave'])) {
                        if ($usuario->verifyTokenClave()) {
                            if ($_POST['nueva_clave'] === $_POST['nueva_clave_2']) {
                                if ($usuario->setClave($_POST['nueva_clave'])) {
                                    if ($usuario->changePassword2()) {
                                        $usuario->deleteTokenClave();
                                        $result['status'] = 1;
                                        $result['message'] = 'Contraseña actualizada correctamente.';
                                    } else {
                                        $result['exception'] =  'Fallo en el cambio de contraseña';
                                    }
                                } else {
                                    $result['exception'] =  'Fallo en el cambio de contraseña';
                                }
                            } else {
                                $result['exception'] =  'Contraseñas diferentes';
                            }
                        } else {
                            $result['exception'] =  'Cambio de contraseña inválido';
                        }
                    } else {
                        $result['exception'] =  'Cambio de contraseña inválido';
                    }
                } else {
                    $result['exception'] =  'Correo inexistente';
                }
                break;
                // Se verifica el token con el de la base, se acepta la sesión o la sesión es denegada.
            case 'auth':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setTokenClave($_POST['token_clave'])) {
                    if ($usuario->verifyTokenAuth(filter_var($_POST['auth'], FILTER_VALIDATE_BOOLEAN), $_SESSION['id_usuario_auth'])) {
                        $usuario->deleteTokenAuth($_SESSION['id_usuario_auth']);
                        $_SESSION['id_usuario'] =  $_SESSION['id_usuario_auth'];
                        $result['status'] = 1;
                        $result['message'] = 'Sesión verificada.';
                    } else {
                        $usuario->deleteTokenAuth($_SESSION['id_usuario_auth']);
                        $result['message'] = 'Sesión denegada. Si aceptó la sesión y fue negada la dirección expiró, vuelva a intentarlo.';
                    }
                } else {
                    $result['exception'] = 'Hubo un error al verificar su inicio de sesión, vuelva a intentarlo.';
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
