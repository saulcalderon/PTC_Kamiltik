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
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'readAllTipoProducto':
                if ($result['dataset'] = $producto->readAllTipoProducto()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay tipo de productos registrados';
                }
                break;
            case 'readAllSucursal':
                if ($result['dataset'] = $producto->readAllSucursal()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay sucursales registradas';
                }
                break;
            case 'readAllEstadoProducto':
                if ($result['dataset'] = $producto->readAllEstadoProducto()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay estados registrado';
                }
                break;
            case 'readAllEstadoDistribucion':
                if ($result['dataset'] = $producto->readAllEstadoDistribucion()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay estados registrado';
                }
                break;
            case 'readAllProveedor':
                if ($result['dataset'] = $producto->readAllProveedor()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay proveedores registrados';
                }
                break;
            case 'readAllDocumentoCompra':
                if ($result['dataset'] = $producto->readAllDocumentoCompra()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay documentos';
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
                                                                    $result['message'] = 'Producto creado correctamente';
                                                                } else {
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            } else {
                                                                $result['exception'] = $producto->getImageError();
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Seleccione una imagen';
                                                        }


                                                    }else{
                                                        $result['exception'] = 'Dato erroneo factura';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Dato erroneo proveedor';
                                                }
                                            } else {
                                                $result['exception'] = 'Dato erroneo estado distribucion';
                                            }
                                        } else {
                                            $result['exception'] = 'Dato erroneo estado producto';
                                        }
                                    } else {
                                        $result['exception'] = 'Dato erroneo sucursal';
                                    }
                                } else {
                                    $result['exception'] = 'Existencias mal ingresadas';
                                }
                            } else {
                                $result['exception'] = 'Precio mal ingresado';
                            }
                        } else {
                            $result['exception'] = 'Descripción incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Nombre incorrecto';
                    }
                } else {
                    $result['exception'] = 'Dato erroneo proveedor';
                }
                break;
                /* Leer solo un producto */
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
                                                                if ($producto->updateProducto()) {
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'Producto modificado correctamente';
                                                                } else {
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            }


                                                        }else{
                                                            $result['exception'] = 'Dato erroneo factura';
                                                        }
                                                }else{
                                                    $result['exception'] = 'Tipo de producto mal ingresado';
                                                }
                                            } else {
                                                $result['exception'] = 'Dato erroneo sucursal';
                                            }
                                        } else {
                                            $result['exception'] = 'Existencias mal ingresadas';
                                        }
                                    } else {
                                        $result['exception'] = 'Precio mal ingresado';
                                    }
                                } else {
                                    $result['exception'] = 'Descripción incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Nombre incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Dato erroneo proveedor';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
                /* Borrar */
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOneProducto()) {
                        if ($producto->deleteProducto()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen'])) {
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
            case 'productosexistencia':
                if ($result['dataset'] = $producto->productosexistencia()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            case 'productosproveedores':
                if ($result['dataset'] = $producto->productosproveedores()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            case 'productossucursales':
                if ($result['dataset'] = $producto->productossucursales()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos disponibles';
                }
                break;
            case 'graph1':
                if ($producto->setPrecio1($_POST['precio1'])) {
                    if ($producto->setPrecio2($_POST['precio2'])) {
                        if ($result['dataset'] = $producto->productosprecios()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No x3';
                        }
                    } else {
                        $result['exception'] = 'No';
                    }
                } else {
                    $result['exception'] = 'No x2';
                }
                break;
            case 'graph2':
                if ($producto->setCat($_POST['categoria'])) {
                    if ($result['dataset'] = $producto->productosCat()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No x3';
                    }
                } else {
                    $result['exception'] = 'No';
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
