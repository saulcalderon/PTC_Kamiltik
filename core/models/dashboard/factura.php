<?php
/*
*	Clase para manejar la tabla factura de la base de datos.
*/
class Factura extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_factura = null;
    private $nombre = null;
    private $fecha_registro = null;
    private $precio_total = null;
    private $id_estado_factura = null;
    private $estado_factura = null;
    private $cantidad = null;
    private $precio_unitario = null;
    private $producto = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_factura = $value;
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

    public function setFechaRegistro($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->fecha_registro = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecioTotal($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio_total = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setIdEstadoFactura($value)
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
    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setPrecioUnitario($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio_unitario = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setProducto($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->producto = $value;
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
        return $this->id_factura;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    public function getPrecioTotal()
    {
        return $this->precio_total;
    }
    public function getIdEstadoFactura()
    {
        return $this->id_estado_factura;
    }

    public function getEstadoFactura()
    {
        return $this->estado_factura;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getPrecioUnitario()
    {
        return $this->precio_unitario;
    }
    public function getProducto()
    {
        return $this->producto;
    }

    public function readAllFacturas()
    {
        $sql = 'SELECT fc.id_factura as id_factura, nombre, fc.fecha_registro, precio_total, estado_factura, COUNT(cantidad) as cantidad FROM factura fc inner join cliente cl USING(id_cliente) inner join detalle_factura df USING(id_factura) inner join estado_factura ef USING(id_estado_factura) group by fc.id_factura, nombre, fc.fecha_registro, precio_total, estado_factura order by id_factura asc';
        $params = null;
        return Database::getRows($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchFacturas($value)
    {
        $sql = 'SELECT fc.id_factura, nombre, fc.fecha_registro, precio_total, estado_factura, 
            COUNT(cantidad) as cantidad
            FROM factura fc inner join cliente cl USING(id_cliente) inner join detalle_factura df USING(id_factura) inner join estado_factura ef USING(id_estado_factura) where nombre ILIKE ? group by fc.id_factura, nombre, fc.fecha_registro, precio_total, estado_factura order by id_factura asc';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }


    public function readOneFactura()

    {
        $sql = 'SELECT nombre as producto, producto.precio_unitario as precio_unitario, cantidad 
        FROM detalle_factura inner join producto USING(id_producto) 
         inner join factura USING(id_factura)
        WHERE id_factura = ?';
        $params = array($this->id_factura);
        return Database::getRows($sql, $params);
    }

    public function readOne()

    {
        $sql = 'SELECT fc.id_factura as id_factura, nombre, fc.fecha_registro, precio_total, id_estado_factura, COUNT(cantidad) as cantidad FROM factura fc inner join cliente cl USING(id_cliente) inner join detalle_factura df USING(id_factura) inner join estado_factura ef USING(id_estado_factura) where id_factura = ? group by fc.id_factura, nombre, fc.fecha_registro, precio_total, id_estado_factura order by id_factura asc';
        $params = array($this->id_factura);
        return Database::getRow($sql, $params);
    }

    public function updateFactura()
    {
        $sql = 'UPDATE factura SET id_estado_factura = ? WHERE id_factura = ?';
        $params = array($this->id_estado_factura, $this->id_factura);
        return Database::executeRow($sql, $params);
    }
}
