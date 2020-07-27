<?php
/*
*	Clase para manejar la tabla productos de la base de datos.
*/
class Productos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $descripcion = null;
    private $precio = null;
    private $existencias = null;
    private $sucursal = null;
    private $imagen = null;
    private $archivo = null;
    private $tipo_producto = null;
    private $estado_producto = null;
    private $estado_distribucion = null;
    private $proveedor = null;
    private $documento_compra = null;
    private $ruta = '../../../resources/img/productos/';
    private $cliente = null;
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

    public function setNombre($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->descripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->existencias = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstadoProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estado_producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setSucursal($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->sucursal = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstadoDistribucion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estado_distribucion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipoProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->tipo_producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setProveedor($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->proveedor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDocumentoCompra($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->documento_compra = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            $this->archivo = $file;
            return true;
        } else {
            return false;
        }
    }

    public function setCliente($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->cliente = $value;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCantidad()
    {
        return $this->existencias;
    }

    public function getSurcursal()
    {
        return $this->sucursal;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getTipoProducto()
    {
        return $this->tipo_producto;
    }

    public function getEstadoProducto()
    {
        return $this->estado_distribucion;
    }

    public function getEstadoDistribucion()
    {
        return $this->estado_distribucion;
    }

    public function getProveedor()
    {
        return $this->proveedor;
    }

    public function getDocumentoCompra()
    {
        return $this->DocumentoCompra;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    /* Selects */
    public function readAllTipoProducto()
    {
        $sql = 'SELECT id_tipo_producto, tipo_producto
                FROM tipo_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readAllSucursal()
    {
        $sql = 'SELECT id_sucursal, nombre
                FROM sucursales';
        $params = null;
        return Database::getRows($sql, $params);
    }
    
    public function readAllEstadoProducto()
    {
        $sql = 'SELECT id_estado_producto, estado_producto
                FROM estado_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readAllEstadoDistribucion()
    {
        $sql = 'SELECT id_estado_distribucion, estado_distribucion
                FROM estado_distribucion';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readAllProveedor()
    {
        $sql = 'SELECT id_proveedor, empresa
                FROM proveedores';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readAllDocumentoCompra()
    {
        $sql = 'SELECT id_documento_compra, imagen_factura
                FROM documento_compra_proveedor';
        $params = null;
        return Database::getRows($sql, $params);
    }

   /*SCRUD*/ 

    public function createProducto()
    {

        $sql = 'INSERT INTO productos(nombre_producto, descripcion, precio_unitario, existencias,id_sucursal, id_estado_producto, id_estado_distribucion, id_tipo_producto, id_proveedor, id_documento_compra)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->descripcion, $this->precio, $this->existencias, $this->sucursal, $this->estado_producto, $this->estado_distribucion, $this->tipo_producto, $this->proveedor, $this->documento_compra);
        return Database::executeRow($sql, $params);
    }

    public function searchProductos($value)
    {
        $sql = 'SELECT id_producto, nombre_producto, existencias, descripcion, precio_unitario, tipo_producto, estado_producto 
        FROM productos pr INNER JOIN tipo_producto cp USING(id_tipo_producto) INNER JOIN estado_producto ep USING(id_estado_producto) 
        where nombre_producto ILIKE ? OR descripcion ILIKE ?
        ORDER BY id_producto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAllProductos()
    {
        $sql = 'SELECT id_producto, nombre_producto, existencias, descripcion, precio_unitario, tipo_producto, estado_producto 
        FROM productos pr INNER JOIN tipo_producto cp USING(id_tipo_producto) INNER JOIN estado_producto ep USING(id_estado_producto) 
        ORDER BY id_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneProducto()
    {
        $sql = 'SELECT id_producto, nombre_producto, existencias, descripcion, precio_unitario, fecha_registro ,id_tipo_producto, id_estado_producto, id_sucursal, id_estado_distribucion, id_proveedor, id_documento_compra
        FROM productos
        WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateProducto()
    {
        $sql = 'UPDATE productos
        SET nombre_producto = ?, descripcion = ?, precio_unitario = ?, existencias = ?, id_sucursal = ?, id_estado_producto = ?, id_estado_distribucion = ?, id_tipo_producto = ?, id_proveedor = ?, id_documento_compra = ?
        WHERE id_producto = ?';
        $params = array($this->nombre, $this->descripcion, $this->precio, $this->existencias, $this->sucursal, $this->estado_producto, $this->estado_distribucion, $this->tipo_producto, $this->proveedor, $this->documento_compra, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteProducto()
    {
        $sql = 'DELETE FROM productos
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}
