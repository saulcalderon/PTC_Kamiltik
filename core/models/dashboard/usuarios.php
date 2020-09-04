<?php
/*
*	Clase para manejar la tabla usuarios de la base de datos.
*/
class Usuarios extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $telefono = null;
    private $clave = null;
    private $fechaNacimiento = null;
    private $idCargo = null;
    private $idEstado = true;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombres($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
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

    public function setTelefono($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCargo($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCargo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdEstado($value){
        if($this->validateBoolean($value)){
            $this->idEstado = $value;
            return true;
        }
        else{
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getfechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    private function getTelefono()
    {
        return $this->telefono;
    }

    public function getidCargo()
    {
        return $this->idCargo;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getIdEstado(){
        return $this->idEstado;
    }

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */
    public function checkCorreo($correo)
    {
        $sql = 'SELECT id_usuario, nombre, apellido FROM usuarios WHERE correo = ?';
        $params = array($correo);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_usuario'];
            $this->nombres = $data['nombre'];
            $this->apellidos = $data['apellido'];
            $this->correo = $correo;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'SELECT clave FROM usuarios WHERE id_usuario = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET clave = ? WHERE id_usuario = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE usuarios
                SET nombre = ?, apellido = ?, correo = ?, telefono = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->telefono, $this->id);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchUsuarios($value)
    {
        $sql = 'SELECT id_usuario, nombre, apellido, correo, telefono, id_tipo_usuario, fecha_nacimiento, id_estado
                FROM usuarios
                WHERE apellido ILIKE ? OR nombre ILIKE ?
                ORDER BY apellido';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createUsuario()
    {
        
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO usuarios(nombre, apellido, correo, telefono, clave, fecha_nacimiento, id_tipo_usuario, id_estado)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->telefono, $hash, $this->fechaNacimiento, 1, $this->idEstado);
        return Database::executeRow($sql, $params);
    }

    public function readAllUsuarios()
    {
        $sql = 'SELECT id_usuario, nombre, apellido, correo, telefono, id_tipo_usuario as id_cargo, id_estado
                FROM usuarios
                ORDER BY apellido';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneUsuario()
    {
        $sql = 'SELECT id_usuario, nombre, apellido, correo, telefono, id_tipo_usuario, id_estado, fecha_nacimiento
                FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateUsuario()
    {
        $sql = 'UPDATE usuarios
                SET nombre = ?, apellido = ?, telefono = ?, id_estado = ?, fecha_nacimiento = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->telefono, $this->idEstado, $this->fechaNacimiento, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteUsuario()
    {
        $sql = 'DELETE FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
