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
            # readAll : Mostrar todas las facturas en la página de facturas.php
            case 'readAll':
                if ($result['dataset'] = $factura->readAllFacturas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay facturas registradas';
                }
                break;
                # readMesas : Obtener las mesas que tienen una factura pendiente.
            case 'readMesas':
                if ($result['dataset'] = $factura->readMesas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay mesas ocupadas';
                }
                break;
                # readProducts : Mostrar todos los productos en el buscador de productos en detalle.php
            case 'readProducts':
                if ($result['dataset'] = $factura->readProducts()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay facturas registradas';
                }
                break;
                # createBill : Lógica para la creación de una factura, si ya está creada se muestra los productos ingresados para poder continuar la factura.
            case 'createBill':
                $_POST = $factura->validateForm($_POST);
                if ($factura->setIdSucursal(1)) {
                    if ($factura->setIdUsuario($_SESSION['id_usuario'])) {
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
                # addProduct : Añadir un producto al detalle de una factura.
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
                # Search : Buscador por fecha de facturas.
            case 'search':
                $_POST = $factura->validateForm($_POST);
                if ($_POST['fecha'] != '') {
                    if ($result['dataset'] = $factura->searchFacturas($_POST['fecha'])) {
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
                # readOneFactura : Leer el contenido del detalle de una factura pendiente.
            case 'readOneFactura':
                if ($factura->setMesa($_POST['mesa_form'])) {
                    if ($factura->setId($factura->billID())) {
                        if ($result['dataset'] = $factura->readOneFactura()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Factura sin productos';
                        }
                    } else {
                        $result['exception'] = 'ID incorrecto';
                    }
                } else {
                    $result['exception'] = 'Mesa incorrecta';
                }
                break;
                # readOneFacturaID : Leer el contenido del detalle de una factura.
            case 'readOneFacturaID':
                if ($factura->setId($_POST['mesa_form'])) {
                    if ($result['dataset'] = $factura->readOneFactura()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Factura sin productos';
                    }
                } else {
                    $result['exception'] = 'ID incorrecto';
                }
                break;
                # readOne : Leer solo un detalle de la factura por su ID.
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
                # updateDetail : Actualizar la cantidad de un detalle de la factura.
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
                # deleteDetail : Eliminar un detalle de la factura.
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
                # delete : Eliminar una factura.
            case 'delete':
                if ($factura->setMesa($_POST['mesa'])) {
                    if ($factura->setId($factura->billID())) {
                        if ($factura->deleteBill()) {
                            $result['status'] = 1;
                            $result['message'] = 'Factura eliminada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'ID factura incorrecta';
                    }
                } else {
                    $result['exception'] = 'Mesa incorrecta';
                }
                break;
                # finishBill : Finalizar una factura, agregando a la factura el estado de cancelado.
            case 'finishBill':
                if ($factura->setMesa($_POST['mesa'])) {
                    if ($factura->setId($factura->billID())) {
                        if ($_POST['entregado'] > $_POST['total']) {
                            if ($factura->setTotal($_POST['total'])) {
                                if ($factura->setCambio($_POST['cambio'])) {
                                    if ($factura->setEntregado($_POST['entregado'])) {
                                        if ($factura->finishBill()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Factura completada';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Entregado por cliente incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Cambio incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Precio total incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Total o cambio inválido';
                        }
                    } else {
                        $result['exception'] = 'ID factura incorrecta';
                    }
                } else {
                    $result['exception'] = 'Mesa incorrecta';
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
