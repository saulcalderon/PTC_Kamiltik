<?php
/*
*	Clase para manejar la tabla proveedores de la base de datos.
*/
class Proveedores extends Validator
{
    // Aquí van las propiedades y métodos de los clientes.

    private $id_proveedor = null;
    private $nombre_contacto = null;
    private $nombre_empresa = null;
    private $telefono = null;
    private $celular = null;
    private $email = null;
    private $direccion = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_proveedor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombre_contacto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmpresa($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombre_empresa = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setCelular($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->celular = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setDireccion($value)
    {
        if ($this->validateAlphabetic($value, 1, 120)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setEmail($value)
    {
        if ($this->validateEmail($value)) {
            $this->email = $value;
            return true;
        } else {
            return false;
        }
    }

    //Métodos para obtener valores de los atributos.

    public function getId()
    {
        return $this->id_proveedor;
    }

    public function getNombre()
    {
        return $this->nombre_contacto;
    }

    public function getEmpresa()
    {
        return $this->nombre_empresa;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getCelular()
    {
        return $this->celular;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getEmail()
    {
        return $this->email;
    }
    //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).

    public function searchProveedor($value)
    {
        $sql = 'SELECT id_proveedor,nombre, empresa,direccion, telefono_empresa, celular_contacto,correo 
                FROM proveedores WHERE nombre ILIKE ?
                ORDER BY empresa';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }
    public function createProveedor()
    {
        $sql = 'INSERT INTO proveedores(nombre,empresa,direccion,telefono_empresa,celular_contacto,correo) 
                VALUES (?,?,?,?,?,?)';
        $params = array($this->nombre_contacto, $this->nombre_empresa,$this->direccion , $this->telefono,$this->celular,$this->email);
        return Database::executeRow($sql, $params);
    }
    public function readAllProveedores()
    {
        $sql = 'SELECT id_proveedor,nombre,empresa,direccion,telefono_empresa,celular_contacto,correo
                FROM proveedores ORDER BY empresa';
        $params = null;
        return Database::getRows($sql, $params);
    }
    public function readOneProveedor()
    {
        $sql = 'SELECT id_proveedor,nombre,empresa,direccion,telefono_empresa,celular_contacto,correo
                FROM proveedores
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::getRow($sql, $params);
    }

    public function updateProveedor()
    {
        $sql = 'UPDATE proveedores
                SET nombre = ?, empresa = ?,direccion = ?, 
                telefono_empresa= ?, celular_contacto = ?, correo = ? WHERE id_proveedor = ?';
        $params = array($this->nombre_contacto, $this->nombre_empresa,$this->direccion , $this->telefono,$this->celular,$this->email);
        return Database::executeRow($sql, $params);
    }

    public function deleteProveedor()
    {
        $sql = 'DELETE FROM proveedores
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::executeRow($sql, $params);
    }
}
