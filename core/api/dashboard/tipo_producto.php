<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/tipo_producto.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $tipo = new TipoProductos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $tipo->readAllTipos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay categorías registradas';
                }
                break;
            case 'search':
                $_POST = $tipo->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $tipo->searchTipos($_POST['search'])) {
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
                $_POST = $tipo->validateForm($_POST);
                if ($tipo->setNombre($_POST['nombre_tipo'])) {
                    if ($tipo->createCategoria()) {
                        $result['status'] = 1;
                        $result['message'] = 'Tipo Producto creado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'readOne':
                if ($tipo->setId($_POST['id_tipo_producto'])) {
                    if ($result['dataset'] = $tipo->readOneTipo()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Tipo Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'ID Tipo incorrecto';
                }
                break;
            case 'update':
                $_POST = $tipo->validateForm($_POST);
                if ($tipo->setId($_POST['id_tipo_producto'])) {
                    if ($data = $tipo->readOneTipo()) {
                        if ($tipo->setNombre($_POST['nombre_tipo'])) {
                            if ($tipo->updateTipo()) {
                                $result['status'] = 1;
                                $result['message'] = 'Tipo Producto modificado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        }
                    } else {
                        $result['exception'] = 'Nombre incorrecto';
                    }
                } else {
                    $result['exception'] = 'ID tipo inexistente';
                }
                break;
            case 'delete':
                if ($tipo->setId($_POST['id_tipo_producto'])) {
                    if ($data = $tipo->readOneTipo()) {
                        if ($tipo->deleteTipo()) {
                            $result['status'] = 1;
                            $result['message'] = 'Tipo Producto eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Tipo Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Tipo Producto incorrecto';
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
