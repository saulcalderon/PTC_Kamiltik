<?php
/*
*	Clase para manejar la tabla estado factura de la base de datos.
*/
class EstadoFactura extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_estado_factura = null;
    private $estado_factura = null;


    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_estado_factura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstadoFactura($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->estado_factura = $value;
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
        return $this->id_estado_factura;
    }

    public function getEstadoFactura()
    {
        return $this->estado_factura;
    }

    /*
    *   Métodos para las consultas.
    */

    public function readAllEstado()
    {
        $sql = 'SELECT id_estado_factura, estado_factura FROM estado_factura';
        $params = null;
        return Database::getRows($sql, $params);
    }
}
