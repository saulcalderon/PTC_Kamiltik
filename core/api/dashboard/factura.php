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
            case 'readProducts':
                if ($result['dataset'] = $factura->readProducts()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay facturas registradas';
                }
                break;
            case 'createBill':
                $_POST = $factura->validateForm($_POST);
                if ($factura->setIdSucursal(1)) {
                    if ($factura->setIdUsuario(1)) {
                        if ($factura->setMesa($_POST['mesa'])) {
                            if ($_POST['mesa'] <= $factura->verifyTable()) {
                                if ($result['dataset'] = $factura->createBill()) {
                                    $result['status'] = 1;
                                } else {
                                    if ($factura->setId($factura->billID())) {
                                        if ($result['dataset'] = $factura->readOneFactura()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Factura sin productos';
                                        }
                                    } else {
                                        $result['exception'] = 'Factura incorrecta';
                                    }
                                }
                            } else {
                                $result['exception'] = 'Mesa Inexistente';
                            }
                        } else {
                            $result['exception'] = 'Error en la mesa';
                        }
                    } else {
                        $result['exception'] = 'Error en el usuario';
                    }
                } else {
                    $result['exception'] = 'Error en la sucursal';
                }
                break;
            case 'addProduct':
                $_POST = $factura->validateForm($_POST);
                if ($factura->setNombre($_POST['buscar-producto'])) {
                    if ($factura->setCantidad($_POST['cantidad-producto'])) {
                        if ($factura->setMesa($_POST['mesa_form'])) {
                            if ($factura->setId($factura->billID())) {
                                if ($factura->addProduct()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Se ha ingresado el producto correctamente';
                                } else {
                                    $result['exception'] = 'El producto es incorrecto o no existe';
                                }
                            } else {
                                $result['exception'] = 'La factura es incorrecto o no existe';
                            }
                        } else {
                            $result['exception'] = 'Mesa incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Error al asignar la cantidad';
                    }
                } else {
                    $result['exception'] = 'Error al asignar el producto';
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
            case 'readOneFactura':
                if ($factura->setMesa($_POST['mesa_form'])) {
                    if ($factura->setId($factura->billID())) {
                        if ($result['dataset'] = $factura->readOneFactura()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'ID incorrecto';
                    }
                } else {
                    $result['exception'] = 'Mesa incorrecta';
                }
                break;
            case 'readOne':
                if ($factura->setIdDetalle($_POST['id_detalle'])) {
                    if ($result['dataset'] = $factura->readOne()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'ID detalle incorrecto';
                    }
                } else {
                    $result['exception'] = 'ID detalle incorrecto';
                }

                break;
            case 'updateDetail':
                $_POST = $factura->validateForm($_POST);
                if ($factura->setIdDetalle($_POST['id_detalle'])) {
                    if ($factura->setCantidad($_POST['cantidad'])) {
                        if ($factura->updateDetail()) {
                            $result['status'] = 1;
                            $result['message'] = 'Cantidad modificada correctamente';
                        } else {
                            $result['exception'] = 'Por favor no exceder la cantidad máxima del producto';
                        }
                    } else {
                        $result['exception'] = 'Cantidad incorrecta';
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
                }
                break;
            case 'deleteDetail':
                if ($factura->setIdDetalle($_POST['id_detalle'])) {
                    if ($factura->deleteDetail()) {
                        $result['status'] = 1;
                        $result['message'] = 'Producto eliminado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Detalle incorrecto';
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
