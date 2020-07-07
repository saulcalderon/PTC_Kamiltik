<?php
/*
*	Clase para manejar la tabla categorías de la base de datos.
*/
class Categorias extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $imagen = null;
    private $archivo = null;
    private $descripcion = null;
    private $ruta = '../../../resources/img/categorias/';

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

    public function setDescripcion($value)
    {
        if ($value) {
            if ($this->validateString($value, 1, 250)) {
                $this->descripcion = $value;
                return true;
            } else {
                return false;
            }
        } else {
            $this->descripcion = null;
            return true;
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

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchCategorias($value)
    {
        $sql = 'SELECT id_categoria_producto, categoria_producto
                FROM categoria_producto
                WHERE categoria_producto ILIKE ?
                ORDER BY categoria_producto';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createCategoria()
    {
        $sql = 'INSERT INTO categoria_producto(categoria_producto)
                VALUES(?)';
        $params = array($this->nombre);
        return Database::executeRow($sql, $params);
    }

    public function readAllCategorias()
    {
        $sql = 'SELECT id_categoria_producto, categoria_producto 
                FROM categoria_producto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneCategoria()
    {
        $sql = 'SELECT id_categoria_producto, categoria_producto
                FROM categoria_producto
                WHERE id_categoria_producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateCategoria()
    {

        $sql = 'UPDATE categoria_producto
                SET categoria_producto = ?
                WHERE id_categoria_producto = ?';
        $params = array($this->nombre, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteCategoria()
    {
        $sql = 'DELETE FROM categoria_producto
                WHERE id_categoria_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
