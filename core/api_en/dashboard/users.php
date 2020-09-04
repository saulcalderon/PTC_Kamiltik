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
                    $result['message'] = 'Session deleted successfully';
                } else {
                    $result['exception'] = 'There was a problem logging out';
                }
                break;
            case 'readProfile':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOneUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Non-existent user';
                    }
                } else {
                    $result['exception'] = 'Wrong user';
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
                                            $_SESSION['alias_usuario'] = $usuario->getNombres()." ".$usuario->getApellidos();
                                            $result['status'] = 1;
                                            $result['message'] = 'Profile successfully modified';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Wrong alias';
                                    }
                                } else {
                                    $result['exception'] = 'Wrong email';
                                }
                            } else {
                                $result['exception'] = 'Wrong surname';
                            }
                        } else {
                            $result['exception'] = 'Wrong name';
                        }
                    } else {
                        $result['exception'] = 'Non-existent user';
                    }
                } else {
                    $result['exception'] = 'Wrong user';
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
                                            $result['message'] = 'Password changed successfully';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'New password less than 6 characters';
                                    }
                                } else {
                                    $result['exception'] = 'Different new keys';
                                }
                            } else {
                                $result['exception'] = 'Incorrect current key';
                            }
                        } else {
                            $result['exception'] = 'Current password less than 6 characters';
                        }
                    } else {
                        $result['exception'] = 'Different current keys';
                    }
                } else {
                    $result['exception'] = 'Wrong user';
                }
                break;
            case 'readAll':
                if ($result['dataset'] = $usuario->readAllUsuarios()) {
                    $result['status'] = 1;
                    //print_r($_GET['action']);
                    //print_r($result['dataset']);
                } else {
                    $result['exception'] = 'No registered users';
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchUsuarios($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Were found ' . $rows . ' coincidences';
                        } else {
                            $result['message'] = 'There is only one match';
                        }
                    } else {
                        $result['exception'] = 'There are no coincidences';
                    }
                } else {
                    $result['exception'] = 'Enter a value to search';
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombre'])) {
                    if ($usuario->setApellidos($_POST['apellido'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setTelefono($_POST['telefono'])) {
                                if($usuario->setIdEstado(isset($_POST['estado'])? 1 : 0)){
                                    if($usuario->setFechaNacimiento($_POST['fecha'])){
                                        if ($_POST['clave_usuario'] == $_POST['confirmar_clave']) {
                                            if ($usuario->setClave($_POST['clave_usuario'])) {
                                                if ($usuario->createUsuario()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'User created successfully';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = 'Password less than 6 characters';
                                            }
                                        } else {
                                            $result['exception'] = 'Different keys';
                                        }
                                    }else{
                                        $result['exception'] = 'Wrong date of birth';
                                    }
                                }else{
                                    $result['exception'] = 'Wrong state';
                                }
                            } else {
                                $result['exception'] = 'Wrong phone';
                            }
                        } else {
                            $result['exception'] = 'Wrong email';
                        }
                    } else {
                        $result['exception'] = 'Incorrect last names';
                    }
                } else {
                    $result['exception'] = 'Wrong names';
                }
                break;
            case 'readOne':
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOneUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Non-existent user';
                    }
                } else {
                    $result['exception'] = 'Wrong user';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($usuario->readOneUsuario()) {
                        if ($usuario->setNombres($_POST['nombre'])) {
                            if ($usuario->setApellidos($_POST['apellido'])) {
                                if($usuario->setFechaNacimiento($_POST['fecha'])){
                                    if($usuario->setIdEstado(isset($_POST['estado'])?1:0)){
                                        if ($usuario->setTelefono($_POST['telefono'])) {
                                            if ($usuario->updateUsuario()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'User modified successfully';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        } else {
                                            $result['exception'] = 'Wrong phone';
                                        }
                                    }else{
                                        $result['exception'] = 'Wrong state';
                                    }
                                }else{
                                    $result['exception'] = 'Wrong date of birth';
                                }
                            } else {
                                $result['exception'] = 'Incorrect last names';
                            }
                        } else {
                            $result['exception'] = 'Wrong names';
                        }
                    } else {
                        $result['exception'] = 'Non-existent user';
                    }
                } else {
                    $result['exception'] = 'Wrong user';
                }
                break;
            case 'delete':
                if ($_POST['id_usuario'] != $_SESSION['id_usuario']) {
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->readOneUsuario()) {
                            if ($usuario->deleteUsuario()) {
                                $result['status'] = 1;
                                $result['message'] = 'User deleted successfully';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Wrong user';
                    }
                } else {
                    $result['exception'] = 'You cant delete yourself';
                }
                break;
            default:
                exit('Action not available log');
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($usuario->readAllUsuarios()) {
                    $result['status'] = 1;
                    $result['message'] = 'There is at least one registered user';
                } else {
                    $result['exception'] = 'There are no registered users';
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
                                            $result['message'] = 'User successfully registered';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Password less than 6 characters';
                                    }
                                } else {
                                    $result['exception'] = 'Different keys';
                                }
                            } else {
                                $result['exception'] = 'Wrong phone';
                            }
                        } else {
                            $result['exception'] = 'Wrong email';
                        }
                    } else {
                        $result['exception'] = 'Incorrect last names';
                    }
                } else {
                    $result['exception'] = 'Wrong names';
                }
                break;
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkCorreo($_POST['alias'])) {
                    $usuario->setClave($_POST['clave']);
                    if ($usuario->checkPassword($_POST['clave'])) {
                        $_SESSION['id_usuario'] = $usuario->getId();
                        $_SESSION['alias_usuario'] = $usuario->getNombres() . ' ' . $usuario->getApellidos();
                        $result['status'] = 1;
                        $result['message'] = 'Successful authentication';
                    } else {
                        $result['exception'] = 'Incorrect password';
                    }
                } else {
                    $result['exception'] = 'Wrong alias';
                }
                break;
            default:
                exit('Action not available');
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    exit('Appeal denied');
}
