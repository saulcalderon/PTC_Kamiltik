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
    private $id_departamento = null;
    private $departamento = null;

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
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre_contacto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmpresa($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
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
    public function setIdDepartamento($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_departamento = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setDepartamento($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->departamento = $value;
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
    public function getIdDepartamento()
    {
        return $this->id_departamento;
    }
    public function getDepartamento()
    {
        return $this->departamento;
    }
    //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).

    public function searchProveedor($value)
    {
        $sql = 'SELECT id_proveedor, nombre_contacto, nombre_empresa, telefono, departamento 
                FROM proveedor pr INNER JOIN departamento USING(id_departamento)
                WHERE nombre_contacto ILIKE ? OR nombre_empresa ILIKE ?
                ORDER BY nombre_contacto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    public function createProveedor()
    {
        $sql = 'INSERT INTO proveedor(nombre_contacto, nombre_empresa, telefono, id_departamento )
                VALUES(?, ?, ?, ?)';
        $params = array($this->nombre_contacto, $this->nombre_empresa, $this->telefono, $this->id_departamento);
        return Database::executeRow($sql, $params);
    }
    public function readAllProveedores()
    {
        $sql = 'SELECT id_proveedor, nombre_contacto, nombre_empresa, telefono, departamento
        FROM proveedor pr INNER JOIN departamento dp USING(id_departamento) ORDER BY nombre_contacto';
        $params = null;
        return Database::getRows($sql, $params);
    }
    public function readDepartamentos()
    {
        $sql = 'SELECT id_departamento, departamento FROM departamento';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneProveedor()
    {
        $sql = 'SELECT id_proveedor, nombre_contacto, nombre_empresa, telefono, id_departamento 
                FROM proveedor
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::getRow($sql, $params);
    }

    public function updateProveedor()
    {
        $sql = 'UPDATE proveedor SET nombre_contacto = ?, nombre_empresa = ?, 
        telefono= ?, id_departamento = ? WHERE id_proveedor = ?';
        $params = array($this->nombre_contacto, $this->nombre_empresa, $this->telefono, $this->id_departamento, $this->id_proveedor);
        return Database::executeRow($sql, $params);
    }

    public function deleteProveedor()
    {
        $sql = 'DELETE FROM proveedor
                WHERE id_proveedor = ?';
        $params = array($this->id_proveedor);
        return Database::executeRow($sql, $params);
    }
}
