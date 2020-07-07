<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/proveedores.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $proveedor = new  Proveedores;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $proveedor->readAllProveedores()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay proveedores registrados';
                }
                break;
            case 'readDepartamentos':
                if ($result['dataset'] = $proveedor->readDepartamentos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay departamentos registrados';
                }
                break;
            case 'search':
                $_POST = $proveedor->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $proveedor->searchProveedor($_POST['search'])) {
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
                $_POST = $proveedor->validateForm($_POST);
                if ($proveedor->setNombre($_POST['nombre_contacto'])) {
                    if ($proveedor->setEmpresa($_POST['nombre_empresa'])) {
                        if ($proveedor->setTelefono($_POST['telefono'])) {
                            if ($proveedor->setIdDepartamento($_POST['departamento'])) {
                                if ($proveedor->createProveedor()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Proveedor creado correctamente';
                                } else {
                                    $result['exception'] = Database::getException();;
                                }
                            } else {
                                $result['exception'] = 'ID incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Telefono incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Empresa incorrecta';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'readOne':
                if ($proveedor->setId($_POST['id_proveedor'])) {
                    if ($result['dataset'] = $proveedor->readOneProveedor()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Proveedor inexistente';
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
                }
                break;
            case 'update':
                $_POST = $proveedor->validateForm($_POST);
                if ($proveedor->setId($_POST['id_proveedor'])) {
                    if ($data = $proveedor->readOneProveedor()) {
                        if ($proveedor->setNombre($_POST['nombre_contacto'])) {
                            if ($proveedor->setEmpresa($_POST['nombre_empresa'])) {
                                if ($proveedor->setTelefono($_POST['telefono'])) {
                                    if ($proveedor->setIdDepartamento($_POST['departamento'])) {
                                        if ($proveedor->updateProveedor()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Proveedor modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Departamento incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Telefono incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Empresa incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Proveedor inexistente';
                    }
                } else {
                    $result['exception'] = 'Id incorrecto';
                }
                break;
            case 'delete':
                if ($proveedor->setId($_POST['id_proveedor'])) {
                    if ($data = $proveedor->readOneProveedor()) {
                        if ($proveedor->deleteProveedor()) {
                            $result['status'] = 1;
                            $result['message'] = 'Proveedor eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Proveedor inexistente';
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
                }
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
