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
    private $idTipoUsuario = null;

    //Propiedades de las conexiones de los usuarios
    private $idConexion = null;
    private $ip = null;
    private $hostname = null;
    private $estadoConexion = null;

    //Tokens
    private $token_clave = null;

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

    public function setIdTipoUsuarios($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idTipoUsuario = $value;
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

    //Métodos para guardar las conexiones conexión

    public function setIdConexion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idConexion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIp($value)
    {
        if ($this->ip = $value) {
            return true;
        } else {
            return false;
        }
    }

    public function setHostname($value)
    {
        if ($this->idConexion = $value) {
            return true;
        } else {
            return false;
        }
    }

    public function setEstadoConexion($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estadoConexion = $value;
            return true;
        } else {
            return false;
        }
    }

     // Métodos para verificación de tokens

     public function setTokenClave($value)
     {
         if (strlen($value) == 13) {
             $this->token_clave = $value;
             return true;
         } else {
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

    /* Reportes */
    public function readAllTipoUsuarios()
    {
        $sql = 'SELECT id_tipo_usuario, tipo_usuario
                FROM tipo_usuario
                ORDER BY tipo_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readUsuarioTipo()
    {
        $sql = 'SELECT nombre, id_usuario, apellido, telefono, correo,tipo_usuario
                FROM usuarios INNER JOIN tipo_usuario USING(id_tipo_usuario)
                WHERE id_tipo_usuario= ?
                ORDER BY nombre';
        $params = array($this->idTipoUsuario);
        return Database::getRows($sql, $params);
    }
     /*
    *  Métedos para generar gráficas
    */
    //metodo para ver los detos de los cargos en total que existen 
    public function usuariosrango()
    {
            $sql = ' SELECT tipo_usuario, COUNT(id_usuario) cantidad 
            FROM usuarios INNER JOIN tipo_usuario USING (id_tipo_usuario)
            GROUP BY id_tipo_usuario, tipo_usuario';
            $params = null;
            return Database::getRows($sql,$params);
    }
    //metodo para ver la cantidad de usuarios en total que hay con su estado
    public function estadosusuarios()
    {
        $sql = 'SELECT (id_estado)Estado, COUNT(id_estado)cantidad
        FROM usuarios 
        GROUP BY id_estado';
        $params = null;
        return Database::getRows($sql,$params);
    }
    // Se agrega el token generado y su hora de vencimiento al usuarios.
    public function tokenClave($token)
    {
        $sql = "UPDATE usuarios SET token_clave = ?, vcto_token = now()::time + INTERVAL '5 min' WHERE correo = ?";
        $params = array($token, $this->correo);
        return Database::executeRow($sql, $params);
    }
    // Se verifica el token generado y se comprueba si el token es correcto y si no ha expirado.
    public function verifyTokenClave()
    {
        $sql = "SELECT token_clave, now()::time < vcto_token AS tiempo FROM usuarios WHERE correo = ?";
        $params = array($this->correo);
        if ($data = Database::getRow($sql, $params)) {
            if ($data['token_clave'] == $this->token_clave && $data['tiempo']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // Se actualiza la contraseña.
    public function changePassword2()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET clave = ? WHERE correo = ?';
        $params = array($hash, $this->correo);
        return Database::executeRow($sql, $params);
    }
    // Se elimina el token y su hora de vencimiento de la base.
    public function deleteTokenClave()
    {
        $sql = "UPDATE usuarios SET token_clave = null, vcto_token = null WHERE correo = ?";
        $params = array($this->correo);
        return Database::executeRow($sql, $params);
    }
    // Función para enviar un correo. Parametros : Cuerpo del correo, Asunto.
    public function sendMail($body, $subject)
    {
        require '../../../libraries/phpmailer52/class.phpmailer.php';
        require '../../../libraries/phpmailer52/class.smtp.php';

        $mail = new PHPMailer;

        $mail->CharSet = 'UTF-8';
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 465;

        $mail->SMTPSecure = 'ssl';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'kamiltik.thecoffeecup@gmail.com';

        //Password to use for SMTP authentication
        $mail->Password = 'Kamiltik12';

        //Set who the message is to be sent from
        $mail->setFrom('kamiltik.thecoffeecup@gmail.com', 'Kamiltik');

        //Set who the message is to be sent to
        $mail->addAddress($this->correo, $this->nombres . ' ' . $this->apellidos);

        //Set the subject line
        $mail->Subject = $subject;

        //Replace the plain text body with one created manually
        $mail->Body = $body;
        //send the message, check for error

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
    // Se verifica el token generado y se comprueba si ha aceptado o denegado la sesión.
    public function verifyTokenAuth($bool, $id)
    {
        if ($bool) {
            $sql = "UPDATE usuarios SET auth_verificado = true WHERE id_usuario = ?";
            $params = array($id);
            Database::executeRow($sql, $params);

            $sql = "SELECT token_clave, now()::time < vcto_token AS tiempo, auth_verificado FROM usuarios WHERE id_usuario = ?";
            $params = array($id);
            if ($data = Database::getRow($sql, $params)) {
                if ($data['token_clave'] == $this->token_clave && $data['tiempo'] && $data['auth_verificado']) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // Se agrega el token generado y su hora de vencimiento al usuarios.
    public function tokenAuth($token)
    {
        $sql = "UPDATE usuarios SET token_clave = ?, vcto_token = now()::time + INTERVAL '5 min', auth_verificado = false WHERE correo = ?";
        $params = array($token, $this->correo);
        return Database::executeRow($sql, $params);
    }
    // Se elimina el token y su hora de vencimiento de la base.
    public function deleteTokenAuth($id)
    {
        $sql = "UPDATE usuarios SET token_clave = null, vcto_token = null, auth_verificado = null WHERE id_usuario = ?";
        $params = array($id);
        return Database::executeRow($sql, $params);
    }

        //Hacer una funcion para administrar los dispositivos (update) (Listo)
        public function updateDispositivo()
        {
            $estado = $this->estadoConexion;
            if ($estado == 1) {
                $estado = true;
            } else {
                $estado = false;
            }
    
            $host = $this->hostname;
            print_r($host);
            $sql = 'UPDATE conexiones SET estado = ? WHERE id_usuario = ? AND host = ?';
            $params = array($estado, $this->id, $host);
            print_r($params);
            return Database::executeRow($sql, $params);
        }
        //Funcion para ver todos los dispositivos (Read) (Listo)
    
        public function readAllDispositivos()
        {
            $sqlD = 'SELECT id_conexiones, host, estado FROM conexiones WHERE id_usuario = ?';
            $paramsD = array($this->id);
            $var = Database::getRows($sqlD, $paramsD);
            return $var;
        }
    
        public function readOneDispositivo()
        {
            $sql = 'SELECT host, estado FROM conexiones WHERE id_usuario = ? AND id_conexiones = ?';
            $params = array($this->id, $this->idConexion);
            return Database::getRow($sql, $params);
        }
    
        //Funcion para verificar si existen dispositivos, si no, agregar uno. Luego Evaluar si este dispositivo existe, 
        //que coincida con el nombre provisto anteriormente, si no, avisar que hay una sesión abierta. (Listo)
    
        public function checkDispositivo()
        {
            //Verificar si existen dispositivos antes 
            $sql = 'SELECT COUNT(*) FROM conexiones';
            $existen = Database::getRow($sql, null);
            //Si existen dispositivos se evalua que el del cliente coincida con el registrado a su ID
            if ($existen != 0) {
    
                $ipe = gethostbyname('localhost');
                $dispositivo = gethostname();
    
                $sql2 = 'SELECT ip, host, estado FROM conexiones WHERE id_usuario = ? AND ip = ? AND host = ? AND estado =?';
                $params2 = array($this->id, $ipe, $dispositivo, true);
                $data = Database::getRows($sql2, $params2);
                if ($data == true) {
                    return true;
                } else {
                    //Por cada estado se hará un update para tornarlo falso, luego se ejecutara la nueva consulta de arriba
                    $sql3 = 'UPDATE conexiones SET estado = false WHERE id_usuario = ?';
                    $params3 = array($this->id);
                    $respuesta = Database::executeRow($sql3, $params3);
                    if ($respuesta) {
                        //Actualizar la sesión actual a verdadero para logearse
                        $sql4 = 'UPDATE conexiones SET estado = true WHERE id_usuario = ? AND ip =? AND host = ? ';
                        $params4 = array($this->id, $ipe, $dispositivo);
                        $respuesta2 = Database::executeRow($sql4, $params4);
    
                        //Si no existe, se creará un registro de este dispositivo
                        if ($respuesta2 != 1) {
                            return true;
                        } else {
                            $sql5 = 'INSERT INTO conexiones(host, ip, estado, id_usuario) VALUES (?,?,?,?)';
                            $params5 = array($dispositivo, $ipe, true, $this->id);
                            $resultado = Database::executeRow($sql5, $params5);
                            if ($resultado) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        }
    
        //Terminar
        public function insertDispositivo()
        {
            $sql = "INSERT INTO conexiones(host, ip, estado, id_usuario) VALUES(?,?,?,?)";
            $params = array(gethostname(), gethostbyname("localhost"), false, $this->id);
            $datos = Database::executeRow($sql, $params);
        }



}


