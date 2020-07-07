<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/factura.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $factura = new Factura;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $factura->readAllFacturas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay facturas registradas';
                }
                break;
            case 'search':
                $_POST = $factura->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $factura->searchFacturas($_POST['search'])) {
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
                if ($producto->setNombre($_POST['nombre_producto'])) {
                    if ($producto->setDescripcion($_POST['descripcion_producto'])) {
                        if ($producto->setPrecio($_POST['precio_producto'])) {
                            if (isset($_POST['categoria_producto'])) {
                                if ($producto->setCategoria($_POST['categoria_producto'])) {
                                    if ($producto->setEstado(isset($_POST['estado_producto']) ? 1 : 0)) {
                                        if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
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
            case 'readOneFactura':
                if ($factura->setId($_POST['id_factura'])) {
                    if ($data = $factura->readOneFactura()) {
                        if ($result['dataset'] = $factura->readOneFactura()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                }
                break;
            case 'readOne':
                if ($factura->setId($_POST['id_factura'])) {
                    if ($data = $factura->readOne()) {
                        if ($result['dataset'] = $factura->readOne()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                }
                break;
            case 'update':
                $_POST = $factura->validateForm($_POST);
                if ($factura->setId($_POST['id_factura'])) {
                    if ($data = $factura->readOne()) {
                        if ($factura->setIdEstadoFactura($_POST['estado_factura'])) {
                            if ($factura->updateFactura()) {
                                $result['status'] = 1;
                                $result['message'] = 'Factura modificado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Seleccione una categoría';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
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
