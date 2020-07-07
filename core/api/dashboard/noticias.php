<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/noticias.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Noticias;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $producto->readAllProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'search':
                $_POST = $producto->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $producto->searchProductos($_POST['search'])) {
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
                $_POST = $producto->validateForm($_POST);
                if ($producto->setTitulo($_POST['titulo'])) {
                    if ($producto->setContenido($_POST['contenido'])) {
                        //print_r($_POST['fecha']);
                        if ($producto->setFecha($_POST['fecha'])) {
                            if ($producto->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                if ($producto->createProducto()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Noticia agregada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                                /*if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                            if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                if ($producto->updateProducto()) {
                                                    $result['status'] = 1;
                                                    if ($producto->deleteFile($producto->getRuta(), $data['imagen_producto'])) {
                                                        $result['message'] = 'Producto modificado correctamente';
                                                    } else {
                                                        $result['message'] = 'Producto modificada pero no se borro la imagen anterior';
                                                    }
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = $producto->getImageError();
                                            }
                                        } else {
                                            
                                        }*/
                            } else {
                                $result['exception'] = 'Estado incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Fecha incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Contenido incorrecto';
                    }
                } else {
                    $result['exception'] = 'Titulo incorrecto';
                }

                break;
            case 'readOne':
                if ($producto->setId($_POST['id_noticia'])) {
                    if ($result['dataset'] = $producto->readOneProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setId($_POST['id_noticia'])) {
                    if ($data = $producto->readOneProducto()) {
                        if ($producto->setTitulo($_POST['titulo'])) {
                            if ($producto->setContenido($_POST['contenido'])) {
                                if ($producto->setFecha($_POST['fecha'])) {
                                    if ($producto->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                        if ($producto->updateProducto()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Noticia modificada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                        /*if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                            if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                if ($producto->updateProducto()) {
                                                    $result['status'] = 1;
                                                    if ($producto->deleteFile($producto->getRuta(), $data['imagen_producto'])) {
                                                        $result['message'] = 'Producto modificado correctamente';
                                                    } else {
                                                        $result['message'] = 'Producto modificada pero no se borro la imagen anterior';
                                                    }
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = $producto->getImageError();
                                            }
                                        } else {
                                            
                                        }*/
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Contenido incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Titulo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Noticia inexistente';
                    }
                } else {
                    $result['exception'] = 'Noticia incorrecta';
                }
                break;
            case 'delete':
                if ($producto->setId($_POST['id_noticia'])) {
                    if ($data = $producto->readOneProducto()) {
                        if ($producto->deleteProducto()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen_producto'])) {
                                $result['message'] = 'Producto eliminado correctamente';
                            } else {
                                $result['message'] = 'Producto eliminado pero no se borro la imagen';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            
            case 'changeStatus':
                if ($producto->setEstado($_POST['newEstado'])) {
                    if ($producto->setId($_POST['id_noticia'])) {
                        if ($producto->changeStatus()) {
                            $result['status'] = 1;
                            $result['message'] = 'Estado modificado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Valoración incorrecto';
                    }
                } else {
                    $result['exception'] = 'Estado incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        exit('Acceso no disponible');
    }
} else {
    exit('Recurso denegado');
}
