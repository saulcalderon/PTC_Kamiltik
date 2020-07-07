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
    private $imagen = null;
    private $archivo = null;
    private $categoria = null;
    private $estado = null;
    private $ruta = '../../../resources/img/productos/';
    private $cliente = null;
    private $valoracion = null;

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

    public function setExistencias($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->existencias = $value;
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

    public function setCategoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estado = $value;
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

    public function setIdValoracion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->valoracion = $value;
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

    public function getExistencias()
    {
        return $this->existencias;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getIdValoracion()
    {
        return $this->valoracion;
    }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchProductos($value)
    {
        /*$sql = 'SELECT id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto, nombre_categoria, estado_producto
                FROM producto INNER JOIN categorias USING(id_categoria)
                WHERE nombre_producto ILIKE ? OR descripcion_producto ILIKE ?
                ORDER BY nombre_producto';*/
        $sql = 'SELECT id_producto, nombre, descripcion, existencias, precio_unitario, id_categoria_producto, id_estado_producto
                FROM producto
                WHERE nombre ILIKE ? OR descripcion ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createProducto()
    {

        $sql = 'INSERT INTO producto(nombre, descripcion, precio_unitario, existencias,id_estado_producto, id_categoria_producto, id_proveedor)
                    VALUES(?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->descripcion, $this->precio, $this->existencias, $this->estado, $this->categoria, 1);
        return Database::executeRow($sql, $params);

        /*if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO productos(nombre_producto, descripcion_producto, precio_producto, imagen_producto, estado_producto, id_categoria)
                    VALUES(?, ?, ?, ?, ?, ?)';
            $params = array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->estado, $this->categoria);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }*/
    }

    public function readAllProductos()
    {
        $sql = 'SELECT id_producto, nombre, existencias, descripcion, precio_unitario, categoria_producto, id_estado_producto 
        FROM producto pr INNER JOIN categoria_producto cp USING(id_categoria_producto) 
        ORDER BY id_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN categorias USING(id_categoria)
                WHERE id_categoria = ? AND estado_producto = true
                ORDER BY nombre_producto';
        $params = array($this->categoria);
        return Database::getRows($sql, $params);
    }

    public function readOneProducto()
    {
        $sql = 'SELECT id_producto, nombre, existencias, descripcion, precio_unitario, id_categoria_producto, id_estado_producto 
        FROM producto
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateProducto()
    {
        $sql = 'UPDATE producto
        SET nombre = ?, descripcion = ?, precio_unitario = ?, existencias = ?, id_estado_producto = ?, id_categoria_producto = ?
        WHERE id_producto = ?';
        $params = array($this->nombre, $this->descripcion, $this->precio, $this->existencias, $this->estado, $this->categoria, $this->id);
        /*if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE producto
                    SET imagen_producto = ?, nombre = ?, descripcion = ?, precio_unitario = ?, id_estado_producto = ?, id_categoria_producto = ?
                    WHERE id_producto = ?';
            $params = array($this->imagen, $this->nombre, $this->descripcion, $this->precio, $this->estado, $this->categoria, $this->id);
        } else {
            $sql = 'UPDATE producto
                    SET nombre = ?, descripcion = ?, precio_unitario = ?, id_estado_producto = ?, id_categoria_producto = ?
                    WHERE id_producto = ?';
            $params = array($this->nombre, $this->descripcion, $this->precio, $this->estado, $this->categoria, $this->id);
        }*/
        return Database::executeRow($sql, $params);
    }

    public function deleteProducto()
    {
        $sql = 'DELETE FROM producto
                WHERE id_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function readValoraciones()
    {
        $sql = 'SELECT id_valoracion, pr.nombre, pr.id_producto ,valoracion, comentario, cl.nombre AS cliente, vl.id_estado AS estado FROM valoracion vl INNER JOIN cliente cl USING(id_cliente) INNER JOIN producto pr USING(id_producto) WHERE id_producto = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function changeStatus()
    {
        $sql = 'UPDATE valoracion SET id_estado = ? WHERE id_valoracion = ?';
        $params = array($this->estado, $this->valoracion);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */
    public function cantidadProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, COUNT(id_producto) cantidad
                FROM producto INNER JOIN categorias USING(id_categoria)
                GROUP BY id_categoria, nombre_categoria';
        $params = null;
        return Database::getRows($sql, $params);
    }
}
