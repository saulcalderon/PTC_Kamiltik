<?php
/*
*   Clase para realizar las operaciones en la base de datos.
*/
class Database
{
    // Propiedades de la clase para manejar las acciones respectivas.
    private static $connection = null;
    private static $statement = null;
    private static $error = null;
    private static $id = null;

    /*
    *   Método para establecer la conexión con el servidor de base de datos.
    */
    private function connect()
    {
        // Credenciales para establecer la conexión con la base de datos.
        $server = 'localhost';
        $database = 'dbcuzcatlan2';
        $username = 'postgres';
        // Cambiar dependiendo del usuario de la pc.
        $password = 'Lula12';
        // Se controlan las excepciones al momento de establecer conexión con el servidor de base de datos.
        try {
            // Se crea la conexión mediante la extensión PDO y el controlador para PostgreSQL.
            self::$connection = new PDO('pgsql:host='.$server.';dbname='.$database.';port=5432', $username, $password);
            
        } catch(PDOException $error) {
            // Se obtiene el código y el mensaje de la excepción para establecer un error personalizado.
            self::setException($error->getCode(), $error->getMessage());
            // Se obtiene el error personalizado y se finaliza el script.
            exit(self::getException());

        }

    }

    public static function grafico(){

        $server = 'localhost';
        $database = 'dbcuzcatlan';
        $username = 'postgres';
        // Cambiar dependiendo del usuario de la pc.
        $password = 'viernes';

        try {
            // Se crea la conexión mediante la extensión PDO y el controlador para PostgreSQL.
            self::$connection = new PDO('pgsql:host='.$server.';dbname='.$database.';port=5432', $username, $password);
            
        } catch(PDOException $error) {
            // Se obtiene el código y el mensaje de la excepción para establecer un error personalizado.
            self::setException($error->getCode(), $error->getMessage());
            // Se obtiene el error personalizado y se finaliza el script.
            exit(self::getException());

        }

        self::$statement = self:: $connection ->prepare('SELECT nombre, categoria_producto FROM producto, categoria_producto WHERE categoria_producto = "Ropa" ');
        self::$statement->execute();
        $json = [];
        $json2 = [];
        while(self:: $statement ->fetch(PDO::FETCH_ASSOC)) {
            extract($columns);
            $json []= "nombre";
            $json2[]= (string)"categoria_producto";
         }
        //echo json_encode($json); 
        //echo json_encode($json2);
           
    }

    /*
    *   Método para anular la conexión con la base de datos y capturar la información de las excepciones en las sentencias SQL.
    */
    private function desconnect()
    {
        // Se anula la conexión con el servidor de base de datos.
        self::$connection = null;
        // Se inicializa un arreglo para obtener la información del error.
        $error = self::$statement->errorInfo();
        // Se verifica si ha ocurrido un error en la sentencia SQL.
        if ($error[0] != '00000') {
            // Se obtiene el código y el mensaje de la excepción para establecer un error personalizado.
            self::setException($error[0], $error[2]);
        }
    }

    /*
    *   Método para ejecutar las siguientes sentencias SQL: insert, update y delete.
    *   Se utiliza además para obtener el valor de la llave primaria del último registro insertado.
    *
    *   Parámetros: $query (sentencia SQL) y $values (arreglo de valores para la sentencia SQL).
    *   
    *   Retorno: booleano (true si la sentencia se ejecuta satisfactoriamente o false en caso contrario).
    */
    public static function executeRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        $state = self::$statement->execute($values);
        self::$id = self::$connection->lastInsertId();
        self::desconnect();
        return $state;
    }

    /*
    *   Método para obtener un registro de una sentencia SQL tipo SELECT.
    *
    *   Parámetros: $query (sentencia SQL) y $values (arreglo de valores para la sentencia SQL).
    *   
    *   Retorno: arreglo asociativo del registro si la sentencia SQL se ejecuta satisfactoriamente o null en caso contrario.
    */
    public static function getRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetch(PDO::FETCH_ASSOC);
    }

    /*
    *   Método para obtener todos los registros de una sentencia SQL tipo SELECT.
    *
    *   Parámetros: $query (sentencia SQL) y $values (arreglo de valores para la sentencia SQL).
    *
    *   Retorno: arreglo asociativo de los registros si la sentencia SQL se ejecuta satisfactoriamente o null en caso contrario.
    */
    public static function getRows($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
    *   Método para obtener el valor de la llave primaria del último registro insertado.
    *
    *   Parámetros: ninguno.
    *
    *   Retorno: último valor de la llave primaria si la sentencia SQL ha sido un insert o 0 en caso contrario.
    */
    public static function getLastRowId()
    {
        return self::$id;
    }

    /*
    *   Método para establecer un mensaje de error personalizado al ocurrir una excepción.
    *
    *   Parámetros: $code (código del error) y $message (mensaje original del error).
    *
    *   Retorno: ninguno.
    */
    private static function setException($code, $message)
    {
        // Se compara el código del error para establecer un error personalizado.
        // Si el código no coincide con ninguno de los establecidos, se asigna el mensaje original del error.
        switch ($code) {
            case '7':
                self::$error = 'Existe un problema al conectar con el servidor';
                break;
            case '42703':
                self::$error = 'Nombre de campo desconocido';
                break;
            case '23505':
                self::$error = 'Dato duplicado, no se puede guardar';
                break;
            case '42P01':
                self::$error = 'Nombre de tabla desconocido';
                break;
            case '23503':
                self::$error = 'Registro ocupado, no se puede eliminar';
                break;
            default:
                self::$error = $message;
        }
    }

    /*
    *   Método para obtener un error personalizado cuando ocurre una excepción.
    *
    *   Parámetros: ninguno.
    *
    *   Retorno: error personalizado de la sentencia SQL o de la conexión con el servidor de base de datos.
    */
    public static function getException()
    {
        return self::$error;
    }
}
