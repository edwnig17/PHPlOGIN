<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
    require_once("pdo.php");

    class Config extends ConexionPdo{
        private $producto_id;
        private $categoria_id;
        private $precioUnitario;
        private $stock;
        private $unidades_pedidas;
        private $proveedores_id;
        private $nombre_producto;
        private $descontinuado;

        public function __construct($producto_id=0, $categoria_id=0, $precioUnitario=0, $stock=0, $unidades_pedidas=0, $proveedores_id=0, $nombre_producto='', $descontinuado=''){
            $this->producto_id = $producto_id;
            $this->categoria_id = $categoria_id;
            $this->precioUnitario = $precioUnitario;
            $this->stock = $stock;
            $this->unidades_pedidas = $unidades_pedidas;
            $this->proveedores_id = $proveedores_id;
            $this->nombre_producto = $nombre_producto;
            $this->descontinuado = $descontinuado;
            parent::__construct();
        }

        public function setId($producto_id) {
            $this->producto_id = $producto_id;
        }
    
        public function getId() {
            return $this->producto_id;
        }
    
        public function setCategoria_id($categoria_id) {
            $this->categoria_id = $categoria_id;
        }
    
        public function getCategoria_id() {
            return $this->categoria_id;
        }
    
        public function setPrecioUnitario($precioUnitario) {
            $this->precioUnitario = $precioUnitario;
        }
    
        public function getPrecioUnitario() {
            return $this->precioUnitario;
        }
    
        public function setStock($stock) {
            $this->stock = $stock;
        }
    
        public function getStock() {
            return $this->stock;
        }

        public function setUnidades_pedidas($unidades_pedidas) {
            $this->unidades_pedidas = $unidades_pedidas;
        }
    
        public function getUnidades_pedidas() {
            return $this->unidades_pedidas;
        }

        public function setProveedor_id($proveedores_id) {
            $this->proveedores_id = $proveedores_id;
        }
    
        public function getProveedor_id() {
            return $this->proveedores_id;
        }

        public function setNombre_producto($nombre_producto) {
            $this->nombre_producto = $nombre_producto;
        }
    
        public function getNombre_producto() {
            return $this->nombre_producto;
        }

        public function setDescontinuado($descontinuado) {
            $this->descontinuado = $descontinuado;
        }
    
        public function getDescontinuado() {
            return $this->descontinuado;
        }


        public function obtenerCategoria_id(){
            try {
                $stm = $this->dbCnx->prepare("SELECT categoria_id, categoriaNombre FROM categorias");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function categoria_id(){
            try {
                $stm=$this->dbCnx->prepare("SELECT categoria_id, categoriaNombre FROM categorias WHERE categoria_id=:categoria_id");
                $stm->bindParam(":categoria_id",$this->categoria_id);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        
        public function proveedor_id(){
            try {
                $stm = $this->dbCnx->prepare("SELECT proveedores_id, nombre_proveedores FROM proveedores WHERE proveedores_id=:proveedores_id");
                $stm->bindParam(":proveedores_id",$this->proveedores_id);
                $stm->execute();
                return $stm ->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtenerProveedor_id(){
            try {
                $stm = $this->dbCnx->prepare("SELECT proveedores_id, nombre_proveedores FROM proveedores");
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        public function insertData() {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO productos (categoria_id, precioUnitario, stock, unidades_pedidas, proveedores_id, nombre_producto, descontinuado) VALUES (:categoria_id, :precioUnitario, :stock, :unidades_pedidas, :proveedores_id, :nombre_producto, :descontinuado)");
                $stm->bindParam(":categoria_id",$this->categoria_id);
                $stm->bindParam(":precioUnitario",$this->precioUnitario);
                $stm->bindParam(":stock",$this->stock);
                $stm->bindParam(":unidades_pedidas",$this->unidades_pedidas);
                $stm->bindParam(":proveedores_id",$this->proveedores_id);
                $stm->bindParam(":nombre_producto",$this->nombre_producto);
                $stm->bindParam(":descontinuado",$this->descontinuado);
                $stm->execute();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM productos INNER JOIN categorias ON productos.categoria_id = categorias.categoria_id INNER JOIN proveedores ON productos.proveedores_id = proveedores.proveedores_id");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM productos WHERE producto_id = :id");
                $stm->bindParam(":id",$this->producto_id);
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM productos WHERE producto_id= :id");
                $stm->bindParam(":id",$this->producto_id);
                $stm-> execute();
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }

        /* public function update(){
            try {
                $stm=$this->dbCnx->prepare("UPDATE productos SET categoria_id=:categoria_id, precioUnitario=:precioUnitario, stock=:stock, unidades_pedidas=:unidades_pedidas, proveedores_id=:proveedores_id, nombre_producto=:nombre_producto, descontinuado=:descontinuado WHERE producto_id=:id");
                $stm->bindParam(":id",$this->producto_id);
                $stm->bindParam(":categoria_id",$this->categoria_id);
                $stm->bindParam(":precioUnitario",$this->precioUnitario);
                $stm->bindParam(":stock",$this->stock);
                $stm->bindParam(":unidades_pedidas",$this->unidades_pedidas);
                $stm->bindParam(":proveedores_id",$this->proveedores_id);
                $stm->bindParam(":nombre_producto",$this->nombre_producto);
                $stm->bindParam(":descontinuado",$this->descontinuado);
                $stm->execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } */
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE productos SET categoria_id=:categoria_id, precioUnitario=:precioUnitario, stock=:stock, unidades_pedidas=:unidades_pedidas, proveedores_id=:proveedores_id, nombre_producto=:nombre_producto, descontinuado=:descontinuado WHERE producto_id=:id");
                $stm->bindParam(":id", $this->producto_id);
                $stm->bindParam(":categoria_id", $this->categoria_id); 
                $stm->bindParam(":precioUnitario", $this->precioUnitario); 
                $stm->bindParam(":stock", $this->stock); 
                $stm->bindParam(":unidades_pedidas", $this->unidades_pedidas); 
                $stm->bindParam(":proveedores_id", $this->proveedores_id); 
                $stm->bindParam(":nombre_producto", $this->nombre_producto); 
                $stm->bindParam(":descontinuado", $this->descontinuado);
                $stm-> execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>