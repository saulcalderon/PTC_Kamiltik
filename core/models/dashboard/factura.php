<?php
/*
*	Clase para manejar la tabla factura de la base de datos.
*/
class Factura extends Validator
{
    // Declaración de atributos (propiedades).

    private $id_factura = null;
    private $nombre = null;
    private $id_mesa = null;
    private $id_usuario = null;
    private $id_sucursal = null;
    private $id_detalle_factura = null;
    private $cantidad = null;
    private $entregado = null;
    private $total = null;
    private $cambio = null;
    private $mes1 = null;
    private $mes2 = null;

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

    public function setFechaRegistro($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_registro = $value;
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
            $this->id_mesa = $value;
            return true;
        } else {
            return false;
        }
    }

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

    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdDetalle($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_detalle_factura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMes1($value)
    {
        if ($this->validate($value)) {
            $this->mes1 = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMes2($value)
    {
        if ($this->validate($value)) {
            $this->mes2 = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchFacturas($value)
    {
        $sql = "SELECT id_factura,nombre, to_char(fecha_registro,'YYYY-MM-DD : HH:MM') AS fecha, COUNT(id_detalle_factura) as cantidad, entregado_por_cliente, cambio,total, estado_factura, id_mesa FROM factura fc INNER JOIN detalle_factura USING(id_factura)
                INNER JOIN usuarios USING(id_usuario)
                INNER JOIN estado_factura USING(id_estado_factura)
                WHERE fecha_registro::text ILIKE ?
                GROUP BY id_factura, nombre, estado_factura ORDER BY id_factura desc";
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    # Método para leer un solo detalle. 

    public function readOne()

    {
        $sql = 'SELECT id_detalle_factura,nombre_producto,cantidad,precio_unitario,tipo_producto
            FROM detalle_factura INNER JOIN productos USING(id_producto)
            INNER JOIN tipo_producto USING(id_tipo_producto)
            WHERE id_detalle_factura = ?';
        $params = array($this->id_detalle_factura);
        return Database::getRow($sql, $params);
    }

    # Método para actualizar el detalle de una factura.

    public function updateDetail()
    {
        $sql = 'UPDATE detalle_factura SET cantidad = ? WHERE id_detalle_factura = ?';
        $params = array($this->cantidad, $this->id_detalle_factura);
        return Database::executeRow($sql, $params);
    }

    # Método para mostrar todas las facturas.

    public function readAllFacturas()
    {
        $sql = "SELECT id_factura,nombre, to_char(fecha_registro,'YYYY-MM-DD : HH:MM') AS fecha, COUNT(id_detalle_factura) as cantidad, entregado_por_cliente, cambio,total, estado_factura, id_mesa FROM factura fc INNER JOIN detalle_factura USING(id_factura)
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

    # Método para la creación de una factura.

    public function createBill()
    {
        $sql = 'SELECT id_factura FROM factura 
                WHERE id_mesa = ?  AND id_estado_factura = 2';
        $params = array($this->id_mesa);
        if (!Database::getRow($sql, $params)) {
            $sql = 'INSERT INTO factura (id_sucursal, id_usuario, id_mesa)
                VALUES (?,?,?)';
            $params = array($this->id_sucursal, $this->id_usuario, $this->id_mesa);
            Database::executeRow($sql, $params);
            $sql = 'SELECT id_factura FROM factura 
                    WHERE id_mesa = ?  AND id_estado_factura = 2';
            $params = array($this->id_mesa);
            return Database::getRow($sql, $params);
        } else {
            return false;
        }
    }

    # Método para obtener la cantidad máxima de mesas disponibles.

    public function verifyTable()
    {
        $sql = 'SELECT MAX(id_mesa) from mesas';
        return Database::getRow($sql, null);
    }

    # Método para obtener el ID de la factura mediante el ID mesa.

    public function billID()
    {
        $sql = 'SELECT id_factura FROM factura 
                WHERE id_mesa = ?  AND id_estado_factura = 2';
        $params = array(intval($this->id_mesa));
        $data = Database::getRow($sql, $params);
        return $data['id_factura'];
    }

    # Método para validar si existe un producto por su nombre, si existe se inserta el ID producto en el detalle.

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

    # Método para eliminar un detalle de una factura.

    public function deleteDetail()
    {
        $sql = 'DELETE from detalle_factura where id_detalle_factura = ?';
        $params = array($this->id_detalle_factura);
        return Database::executeRow($sql, $params);
    }

    # Método para eliminar una factura por su ID.

    public function deleteBill()
    {
        $sql = 'DELETE from factura where id_factura = ?';
        $params = array($this->id_factura);
        return Database::executeRow($sql, $params);
    }

    # Método para finalizar la factura y agregar el estado de cancelado.

    public function finishBill()
    {
        $sql = 'UPDATE factura SET id_estado_factura = 1 , total = ? 
        , cambio = ? , entregado_por_cliente = ? WHERE id_factura = ?';
        $params = array($this->total, $this->cambio, $this->entregado, $this->id_factura);
        return Database::executeRow($sql, $params);
    }

    # Método para obtener las mesas con facturas pendientes.

    public function readMesas()
    {
        $sql = 'SELECT id_mesa FROM factura WHERE id_estado_factura = 2';
        return Database::getRows($sql, null);
    }
    public function facturaMes()
    {
        $sql = 'SELECT extract(month FROM fecha_registro)-1 AS Mes, SUM(total) AS cantidad 
        FROM factura WHERE extract(month FROM fecha_registro)-1 between ? and ?
        GROUP BY extract(month FROM fecha_registro) ORDER BY extract(month FROM fecha_registro)';
        $params = array($this->mes1, $this->mes2);
        return Database::getRows($sql, $params);
    }

    public function mejoresProductosMes()
    {
        $sql = 'SELECT COUNT(id_producto) as cuenta, nombre_producto FROM detalle_factura INNER JOIN factura fc USING(id_factura) INNER JOIN productos USING(id_producto) 
        WHERE extract(month FROM fc.fecha_registro)-1 = ? GROUP BY nombre_producto, 
        extract(month FROM fc.fecha_registro) ORDER BY extract(month FROM fc.fecha_registro), cuenta desc FETCH FIRST 3 ROWS ONLY';
        $params = array($this->mes1);
        return Database::getRows($sql, $params);
    }
}
