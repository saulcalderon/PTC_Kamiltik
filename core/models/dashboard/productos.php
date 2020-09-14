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
    private $precio1 = null;
    private $precio2 = null;
    private $cat = null;
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
    public function setPrecio1($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio1 = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio2($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio2 = $value;
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

    

    public function setCliente($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    //Todo para agregar imagenes

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


    public function setCat($value)
    {
        if ($this->validate($value)) {
            $this->cat = $value;
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

    public function getCliente()
    {
        return $this->cliente;
    }

    //Todo para agregar imagenes
    public function getRuta()
    {
        return $this->ruta;
    }

    public function getImagen()
    {
        return $this->imagen;
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
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO productos(nombre_producto, descripcion, precio_unitario, existencias,id_sucursal, id_estado_producto, id_estado_distribucion, id_tipo_producto, id_proveedor, id_documento_compra)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $params = array($this->nombre, $this->descripcion, $this->precio, $this->existencias, $this->sucursal, $this->estado_producto, $this->estado_distribucion, $this->tipo_producto, $this->proveedor, $this->documento_compra);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
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
        $sql = 'SELECT id_producto, nombre_producto, existencias, imagen, descripcion, precio_unitario, fecha_registro ,id_tipo_producto, id_estado_producto, id_sucursal, id_estado_distribucion, id_proveedor, id_documento_compra
        FROM productos
        WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateProducto()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE productos
                    SET imagen = ?, nombre_producto = ?, descripcion = ?, precio_unitario = ?, existencias = ?, id_sucursal = ?, id_estado_producto = ?, id_estado_distribucion = ?, id_tipo_producto = ?, id_proveedor = ?, id_documento_compra = ?
                    WHERE id_producto = ?';
                    $params = array($this->imagen, $this->nombre, $this->descripcion, $this->precio, $this->existencias, $this->sucursal, $this->estado_producto, $this->estado_distribucion, $this->tipo_producto, $this->proveedor, $this->documento_compra, $this->id);            
        } else {
            $sql = 'UPDATE productos
                    SET nombre_producto = ?, descripcion = ?, precio_unitario = ?, existencias = ?, id_sucursal = ?, id_estado_producto = ?, id_estado_distribucion = ?, id_tipo_producto = ?, id_proveedor = ?, id_documento_compra = ?
                    WHERE id_producto = ?';
            $params = array($this->nombre, $this->descripcion, $this->precio, $this->existencias, $this->sucursal, $this->estado_producto, $this->estado_distribucion, $this->tipo_producto, $this->proveedor, $this->documento_compra, $this->id);
        }
        return Database::executeRow($sql, $params);
    }

    public function deleteProducto()
    {
        $sql = 'DELETE FROM productos
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    /* Reportes */

    /* Mandar a traer los datos de los productos por cada tipo de producto */
    public function readProductosTipo()
    {
        $sql = 'SELECT nombre_producto, id_producto, precio_unitario, tipo_producto
        FROM productos pr INNER JOIN tipo_producto cp USING(id_tipo_producto)
        WHERE id_tipo_producto = ?
        ORDER BY nombre_producto';
        $params = null;
        $params = array($this->tipo_producto);
        return Database::getRows($sql, $params);
    }

    /* Mandar a traer los datos de los productos por estado */
    public function readProductoEstado()
    {
        $sql = 'SELECT nombre_producto, id_producto, precio_unitario, tipo_producto, existencias
        FROM productos pr INNER JOIN tipo_producto cp USING(id_tipo_producto) INNER JOIN estado_producto ep USING(id_estado_producto)
        WHERE id_estado_producto = ?
        ORDER BY nombre_producto';
        $params = null;
        $params = array($this->estado_producto);
        return Database::getRows($sql, $params);
    }
    /*comienza las sentacias para los graficos*/
    public function productosexistencia()
    {
        $sql = 'SELECT nombre_producto,existencias
        FROM productos
        ORDER BY nombre_producto';
        $params = null;
        return database::getRows($sql,$params);
    }
    //sentencia que genera la cantidad de productos por proveedores
    public function productosproveedores()
    {
        $sql = 'SELECT  (empresa)empresa,COUNT(nombre_producto)producto  from productos
                inner join proveedores on productos.id_proveedor = proveedores.id_proveedor
                GROUP BY empresa'   ;
        $params = NULL;
        return Database::getRows($sql,$params);
    }
    //sentencia que genera la cantidad de productos que existen en sucursales
    public function productossucursales()
    {
        $sql = 'SELECT (nombre)sucursal,COUNT (nombre_producto)cantidad
                FROM productos INNER JOIN sucursales on sucursales.id_sucursal = productos.id_sucursal
                GROUP BY nombre';
        $params = null;
        return Database::getRows($sql,$params);
    }

    public function productosPrecios()
    {
        $sql = 'SELECT nombre_producto,precio_unitario 
        FROM productos 
        where precio_unitario between ? and ?
        ORDER BY precio_unitario asc';
        $params = array($this->precio1,$this->precio2);
        return Database::getRows($sql,$params);
    }

    public function productosCat(){
        $sql = 'SELECT nombre_producto, existencias FROM productos INNER JOIN tipo_producto USING(id_tipo_producto)
        WHERE id_tipo_producto = ?';
        $params =  array($this->cat);
        return Database::getRows($sql, $params);
    }

    public function productosTopProv(){
        $sql = 'SELECT count(df.id_producto) as ventas,nombre_producto FROM detalle_factura df INNER JOIN 
        productos USING(id_producto) INNER JOIN proveedores USING(id_proveedor) WHERE id_proveedor = ? GROUP BY nombre_producto';
        $params = array($this->proveedor);
        return Database::getRows($sql, $params);
    }

    public function proveedores(){
        $sql = 'SELECT id_proveedor, empresa FROM proveedores';
        return Database::getRows($sql, null);
    }

}
