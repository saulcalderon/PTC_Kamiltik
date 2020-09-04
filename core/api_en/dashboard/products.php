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
            /* Read */
            case 'readAll':
                if ($result['dataset'] = $producto->readAllProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No records';
                }
                break;
            case 'readAllTipoProducto':
                if ($result['dataset'] = $producto->readAllTipoProducto()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No records';
                }
                break;
            case 'readAllSucursal':
                if ($result['dataset'] = $producto->readAllSucursal()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No records';
                }
                break;
            case 'readAllEstadoProducto':
                if ($result['dataset'] = $producto->readAllEstadoProducto()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No records';
                }
                break;
            case 'readAllEstadoDistribucion':
                if ($result['dataset'] = $producto->readAllEstadoDistribucion()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No records';
                }
                break;
            case 'readAllProveedor':
                if ($result['dataset'] = $producto->readAllProveedor()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'There are no registered providers';
                }
                break;
            case 'readAllDocumentoCompra':
                if ($result['dataset'] = $producto->readAllDocumentoCompra()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No documents';
                }
                break;
            /* Search */
            case 'search':
                $_POST = $producto->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $producto->searchProductos($_POST['search'])) {
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
            /* Create */
            case 'create':
            $_POST = $producto->validateForm($_POST);
                if ($producto->setNombre($_POST['nombre_producto'])) {
                    if ($producto->setDescripcion($_POST['descripcion_producto'])) {
                        if ($producto->setPrecio($_POST['precio_producto'])) {
                            if ($producto->setCantidad($_POST['existencias_producto'])) {
                                if ($producto->setSucursal($_POST['nombre_sucursal'])) {
                                    if ($producto->setEstadoProducto($_POST['estado_producto'])) {
                                        if ($producto->setEstadoDistribucion($_POST['estado_distribucion'])) {
                                            if ($producto->setProveedor($_POST['nombre_proveedor'])) {
                                                if ($producto->setTipoProducto($_POST['tipo_producto'])) {
                                                    if ($producto->setDocumentoCompra($_POST['documento_compra'])) {

                                                        if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                                            if ($producto->setImagen($_FILES['archivo_producto'])) {

                                                                if ($producto->createProducto()) {
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'Product created successfully';
                                                                } else {
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            } else {
                                                                $result['exception'] = $producto->getImageError();
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Select an image';
                                                        }
                                                        
                                                    }else{
                                                        $result['exception'] = 'Wrong invoice data';
                                                    }
                                            }else{
                                                $result['exception'] = 'Wrong supplier data';
                                            }
                                        }else{
                                            $result['exception'] = 'Wrong data distribution status';
                                        }
                                    }else{
                                        $result['exception'] = 'Wrong product status data';
                                    }
                                }else{
                                    $result['exception'] = 'Wrong branch data';
                                }
                            }else{
                                $result['exception'] = 'Badly entered inventory';
                            }
                        }else{
                            $result['exception'] = 'Price wrongly entered';
                        }
                    }else{
                        $result['exception'] = 'Wrong description';
                    }
                }else {
                    $result['exception'] = 'Wrong name';
                }
            }else{
                $result['exception'] = 'Wrong supplier data';
            }
                break;
            /* Leer solo un producto */
            case 'readOne':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->readOneProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Non-existent product';
                    }
                } else {
                    $result['exception'] = 'Wrong product';
                }
                break;
            /* Actualizar */
            case 'update':
            $_POST = $producto->validateForm($_POST);
            if ($producto->setId($_POST['id_producto'])) {
                if ($data = $producto->readOneProducto()) {
                    if ($producto->setNombre($_POST['nombre_producto'])) {
                        if ($producto->setDescripcion($_POST['descripcion_producto'])) {
                            if ($producto->setPrecio($_POST['precio_producto'])) {
                                if ($producto->setCantidad($_POST['existencias_producto'])) {
                                    if ($producto->setSucursal($_POST['nombre_sucursal'])) {
                                        if ($producto->setEstadoProducto($_POST['estado_producto'])) {
                                            if ($producto->setEstadoDistribucion($_POST['estado_distribucion'])) {
                                                if ($producto->setProveedor($_POST['nombre_proveedor'])) {
                                                    if ($producto->setTipoProducto($_POST['tipo_producto'])) {
                                                        if ($producto->setDocumentoCompra($_POST['documento_compra'])) {
                                                            if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                                                if ($producto->setImagen($_FILES['archivo_producto'])) {

                                                                    if ($producto->updateProducto()) {
                                                                        $result['status'] = 1;
                                                                        if ($producto->deleteFile($producto->getRuta(), $data['imagen'])) {
                                                                            $result['message'] = 'Product successfully modified';
                                                                        } else {
                                                                            $result['message'] = 'Product modified but the previous image was not deleted';
                                                                        }
                                                                    } else {
                                                                        $result['exception'] = Database::getException();
                                                                    }
                                                                } else {
                                                                    $result['exception'] = $producto->getImageError();
                                                                }
                                                            } else {
                                                                if ($producto->updateProducto()) {
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'Product successfully modified';
                                                                } else {
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            }                                                            

                                                        }else{
                                                            $result['exception'] = 'Wrong invoice data';
                                                        }
                                                }else{
                                                    $result['exception'] = 'Wrong supplier data';
                                                }
                                            }else{
                                                $result['exception'] = 'Wrong data distribution status';
                                            }
                                        }else{
                                            $result['exception'] = 'Wrong product status data';
                                        }
                                    }else{
                                        $result['exception'] = 'Wrong branch data';
                                    }
                                }else{
                                    $result['exception'] = 'Badly entered inventory';
                                }
                            }else{
                                $result['exception'] = 'Price wrongly entered';
                            }
                        }else{
                            $result['exception'] = 'Wrong description';
                        }
                    }else {
                        $result['exception'] = 'Wrong name';
                    }
                }else{
                    $result['exception'] = 'Wrong supplier data';
                }
                } else {
                    $result['exception'] = 'Non-existent product';
                }
            } else {
                $result['exception'] = 'Wrong product';
            }
                break;
            /* Borrar */
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOneProducto()) {
                        if ($producto->deleteProducto()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen'])) {
                                $result['message'] = 'Product removed successfully';
                            } else {
                                $result['message'] = 'Product removed but the image was not deleted';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Non-existent product';
                    }
                } else {
                    $result['exception'] = 'Wrong product';
                }
                break;
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
