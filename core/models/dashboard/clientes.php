<?php
/*
*	Clase para manejar la tabla clientes de la base de datos.
*/
class Clientes extends Validator
{
    // Aquí van las propiedades y métodos de los clientes.

    private $id = null;
    private $nombre = null;
    private $apellido = null;
    private $correo = null;
    private $fechaNacimiento = null;
    private $telefono = null;
    private $clave = null;
    private $nacimiento = null;
    private $direccion = null;
    private $estado = null;


    // Métodos para asignar valores a los atributos.

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellido($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellido = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFechaNacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->fechaNacimiento = $value;
            return true;
        } else {
            return false;
        }
    }



    //Métodos para obtener valores de los atributos.

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getfechaNacimiento()
    {
        return $this->fechaNacimiento;
    }


    //Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).

    /* SCRUD */
    public function searchClientes($value)
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo
                FROM clientes
                WHERE nombre ILIKE ? OR apellido ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createCliente()
    {
        $sql = 'INSERT INTO clientes(nombre, apellido, correo, fecha_nacimiento)
                    VALUES(?, ?, ?, ?)';
        $params = array($this->nombre, $this->apellido, $this->correo, $this->fechaNacimiento);
        return Database::executeRow($sql, $params);
    }

    public function readAllClientes()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo
                FROM clientes ORDER BY id_cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneCliente()
    {
        $sql = 'SELECT id_cliente, nombre, apellido, correo, fecha_nacimiento
                FROM clientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateCliente()
    {
        $sql = 'UPDATE clientes
                    SET nombre = ?, apellido = ?, correo = ?, fecha_nacimiento = ?
                    WHERE id_cliente = ?';
        $params = array($this->nombre, $this->apellido, $this->correo, $this->fechaNacimiento, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteCliente()
    {
        $sql = 'DELETE FROM clientes
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}
