<?php
/*
*	Clase para manejar la tabla factura de la base de datos.
*/
class Factura extends Validator
{
    // Declaración de atributos (propiedades).


    private $fecha_registro = null;
    private $precio_total = null;
    private $id_estado_factura = null;
    private $estado_factura = null;

    private $precio_unitario = null;
    private $producto = null;

    #Nuevas variables
    private $id_factura = null;
    private $nombre = null;
    private $mesa = null;
    private $id_usuario = null;
    private $id_sucursal = null;
    private $id_detalle_factura = null;
    private $cantidad = null;
    private $entregado = null;
    private $total = null;
    private $cambio = null;

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
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdSucursal($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_sucursal = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdUsuario($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMesa($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->mesa = $value;
            return true;
        } else {
            return false;
        }
    }

    // public function setIdEstadoFactura($value)
    // {
    //     if ($this->validateNaturalNumber($value)) {
    //         $this->id_estado_factura = $value;
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    #---------------------------

    // public function setFechaRegistro($value)
    // {
    //     if ($this->validateAlphanumeric($value, 1, 50)) {
    //         $this->fecha_registro = $value;
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function setTotal($value)
    {
        if ($this->validateMoney($value)) {
            $this->total = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEntregado($value)
    {
        if ($this->validateMoney($value)) {
            $this->entregado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCambio($value)
    {
        if ($this->validateMoney($value)) {
            $this->cambio = $value;
            return true;
        } else {
            return false;
        }
    }

    // public function setEstadoFactura($value)
    // {
    //     if ($this->validateAlphabetic($value, 1, 50)) {
    //         $this->estado_factura = $value;
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }
    // public function setPrecioUnitario($value)
    // {
    //     if ($this->validateMoney($value)) {
    //         $this->precio_unitario = $value;
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // public function setProducto($value)
    // {
    //     if ($this->validateAlphabetic($value, 1, 50)) {
    //         $this->producto = $value;
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function setIdDetalle($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_detalle_factura = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    // public function getId()
    // {
    //     return $this->id_factura;
    // }

    // public function getNombre()
    // {
    //     return $this->nombre;
    // }

    // public function getFechaRegistro()
    // {
    //     return $this->fecha_registro;
    // }

    // public function getPrecioTotal()
    // {
    //     return $this->precio_total;
    // }
    // public function getIdEstadoFactura()
    // {
    //     return $this->id_estado_factura;
    // }

    // public function getEstadoFactura()
    // {
    //     return $this->estado_factura;
    // }

    // public function getCantidad()
    // {
    //     return $this->cantidad;
    // }
    // public function getPrecioUnitario()
    // {
    //     return $this->precio_unitario;
    // }
    // public function getProducto()
    // {
    //     return $this->producto;
    // }

    // public function getMesa()
    // {
    //     return $this->mesa;
    // }



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

    public function readOne()

    {
        $sql = 'SELECT id_detalle_factura,nombre_producto,cantidad,precio_unitario,tipo_producto
            FROM detalle_factura INNER JOIN productos USING(id_producto)
            INNER JOIN tipo_producto USING(id_tipo_producto)
            WHERE id_detalle_factura = ?';
        $params = array($this->id_detalle_factura);
        return Database::getRow($sql, $params);
    }

    public function updateDetail()
    {
        $sql = 'UPDATE detalle_factura SET cantidad = ? WHERE id_detalle_factura = ?';
        $params = array($this->cantidad, $this->id_detalle_factura);
        return Database::executeRow($sql, $params);
    }


    # Nuevos métodos

    # Método para mostrar todas las facturas.
    public function readAllFacturas()
    {
        $sql = "SELECT id_factura,nombre, to_char(fecha_registro,'YYYY-MM-DD : HH:MM') AS fecha, COUNT(id_detalle_factura) as cantidad, entregado_por_cliente, cambio,total, estado_factura, mesa FROM factura fc INNER JOIN detalle_factura USING(id_factura)
        INNER JOIN usuarios USING(id_usuario)
        INNER JOIN estado_factura USING(id_estado_factura)
        GROUP BY id_factura, nombre, estado_factura ORDER BY id_factura desc";
        $params = null;
        return Database::getRows($sql, $params);
    }

    # Método para llenar el buscador de productos
    public function readProducts()
    {
        $sql = 'SELECT nombre_producto FROM productos ';
        $params = null;
        return Database::getRows($sql, $params);
    }
    #Método para verificar si el producto existe y que se agregue al detalle_factura

    public function readOneFactura()

    {
        $sql = 'SELECT id_detalle_factura,nombre_producto, cantidad, precio_unitario, tipo_producto
        FROM detalle_factura INNER JOIN productos USING(id_producto)
        INNER JOIN tipo_producto USING(id_tipo_producto)
        WHERE id_factura = ?';
        $params = array($this->id_factura);
        return Database::getRows($sql, $params);
    }


    public function createBill()
    {
        $sql = 'SELECT id_factura FROM factura 
                WHERE mesa = ?  AND id_estado_factura = 2';
        $params = array($this->mesa);
        if (!Database::getRow($sql, $params)) {
            $sql = 'INSERT INTO factura (id_sucursal, id_usuario, mesa)
                VALUES (?,?,?)';
            $params = array($this->id_sucursal, $this->id_usuario, $this->mesa);
            Database::executeRow($sql, $params);
            $sql = 'SELECT id_factura FROM factura 
                    WHERE mesa = ?  AND id_estado_factura = 2';
            $params = array($this->mesa);
            return Database::getRow($sql, $params);
        } else {
            return false;
        }
    }

    public function verifyTable()
    {
        $sql = 'SELECT MAX(mesa) from factura';
        return Database::getRow($sql, null);
    }

    public function billID()
    {
        $sql = 'SELECT id_factura FROM factura 
                WHERE mesa = ?  AND id_estado_factura = 2';
        $params = array(intval($this->mesa));
        $data = Database::getRow($sql, $params);
        return $data['id_factura'];
    }

    public function addProduct()
    {
        $sql = 'SELECT id_producto FROM productos
        WHERE nombre_producto = ?';
        $params = array($this->nombre);
        if (!$data2 = Database::getRow($sql, $params)) {
            return false;
        }
        $sql = 'INSERT INTO detalle_factura (cantidad, id_factura, id_producto) 
                VALUES (?,?,?)';
        $params = array($this->cantidad, $this->id_factura, $data2['id_producto']);
        Database::executeRow($sql, $params);
        return true;
    }
    public function deleteDetail()
    {
        $sql = 'DELETE from detalle_factura where id_detalle_factura = ?';
        $params = array($this->id_detalle_factura);
        return Database::executeRow($sql, $params);
    }
    public function deleteBill()
    {
        $sql = 'DELETE from factura where id_factura = ?';
        $params = array($this->id_factura);
        return Database::executeRow($sql, $params);
    }
    public function finishBill()
    {
        $sql = 'UPDATE factura SET id_estado_factura = 1 , total = ? 
        , cambio = ? , entregado_por_cliente = ? WHERE id_factura = ?';
        $params = array($this->total, $this->cambio, $this->entregado, $this->id_factura);
        return Database::executeRow($sql, $params);
    }
}
