<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Productos;
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
                /*$_POST = $producto->validateForm($_POST);
                if ($producto->setNombre($_POST['nombre_producto'])) {
                    if ($producto->setDescripcion($_POST['descripcion_producto'])) {
                        if ($producto->setPrecio($_POST['precio_producto'])) {
                            if ($producto->setExistencias($_POST['existencias_producto'])) {
                                if (isset($_POST['categoria_producto'])) {
                                    if ($producto->setCategoria($_POST['categoria_producto'])) {
                                        if ($producto->setEstado(isset($_POST['estado_producto']) ? 1 : 0)) {
                                            /*if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                                if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                    if ($producto->createProducto()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Producto creado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();;
                                                    }
                                                } else {
                                                    $result['exception'] = $producto->getImageError();
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una imagen';
                                            }*/

                /*if ($producto->createProducto()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Producto creado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();;
                                            }
                                        } else {
                                            $result['exception'] = 'Estado incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Categoría incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Seleccione una categoría';
                                }
                            }else{
                                $result['exception'] = 'Existencias incorrectas';
                            }
                        } else {
                            $result['exception'] = 'Precio incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Descripción incorrecta';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }*/

                $_POST = $producto->validateForm($_POST);
                if ($producto->setNombre($_POST['nombre_producto'])) {
                    if ($producto->setDescripcion($_POST['descripcion_producto'])) {
                        if ($producto->setPrecio($_POST['precio_producto'])) {
                            if ($producto->setCategoria($_POST['categoria_producto'])) {
                                if ($producto->setExistencias($_POST{
                                    'existencias_producto'})) {
                                    if ($producto->setEstado(isset($_POST['estado_producto']) ? 1 : 0)) {
                                        if ($producto->createProducto()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Producto modificado correctamente';
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
                                    $result['exception'] = 'Existencias incorrectas';
                                }
                            } else {
                                $result['exception'] = 'Seleccione una categoría';
                            }
                        } else {
                            $result['exception'] = 'Precio incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Descripción incorrecta';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }

                break;
            case 'readOne':
                if ($producto->setId($_POST['id_producto'])) {
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
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOneProducto()) {
                        if ($producto->setNombre($_POST['nombre_producto'])) {
                            if ($producto->setDescripcion($_POST['descripcion_producto'])) {
                                if ($producto->setPrecio($_POST['precio_producto'])) {
                                    if ($producto->setCategoria($_POST['categoria_producto'])) {
                                        if ($producto->setExistencias($_POST{
                                            'existencias_producto'})) {
                                            if ($producto->setEstado(isset($_POST['estado_producto']) ? 1 : 2)) {
                                                if ($producto->updateProducto()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Producto modificado correctamente';
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
                                            $result['exception'] = 'Existencias incorrectas';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una categoría';
                                    }
                                } else {
                                    $result['exception'] = 'Precio incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Descripción incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
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
            case 'cantidadProductosCategoria':
                if ($result['dataset'] = $producto->cantidadProductosCategoria()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            case 'readValoraciones':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->readValoraciones()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Valoraciones inexistente';
                    }
                } else {
                    $result['exception'] = 'Valoraciones incorrectas';
                }
                break;
            case 'changeStatus':
                if ($producto->setEstado($_POST['newEstado'])) {
                    if ($producto->setIdValoracion($_POST['val'])) {
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
