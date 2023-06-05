<?php
    require_once("pdo.php");

    class Config extends ConexionPdo{
        private $factura_detalle_id;
        private $producto_id;
        private $cantidad;
        private $precio_venta;

        public function __construct($factura_detalle_id = 0, $producto_id = 0, $cantidad = 0, $precio_venta = 0){
            $this->factura_detalle_id = $factura_detalle_id;
            $this->producto_id = $producto_id;
            $this->cantidad = $cantidad;
            $this->precio_venta = $precio_venta;
            parent::__construct();
        }

        public function setId($factura_detalle_id) {
            $this->factura_detalle_id = $factura_detalle_id;
        }
    
        public function getId() {
            return $this->factura_detalle_id;
        }
    
        public function setProducto_id($producto_id) {
            $this->producto_id = $producto_id;
        }
    
        public function getProducto_id() {
            return $this->producto_id;
        }
    
        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        }
    
        public function getCantidad() {
            return $this->cantidad;
        }
    
        public function setPrecio_venta($precio_venta) {
            $this->precio_venta = $precio_venta;
        }
    
        public function getPrecio_venta() {
            return $this->precio_venta;
        }

        public function obtenerProducto_id(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT producto_id,nombre_producto FROM productos");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function producto_id(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT producto_id, nombre_producto FROM productos WHERE producto_id=:producto_id");
                $stm->bindParam(":producto_id",$this->producto_id);
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function insertData() {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO factura_detalle (producto_id, cantidad, precio_venta) VALUES (:producto_id, :cantidad, :precio_venta)");
                $stm->bindParam(":producto_id",$this->producto_id);
                $stm->bindParam(":cantidad",$this->cantidad);
                $stm->bindParam(":precio_venta",$this->precio_venta);
                $stm->execute();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM factura_detalle INNER JOIN productos ON factura_detalle.producto_id = productos.producto_id");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM factura_detalle WHERE factura_detalle_id = :id");
                $stm->bindParam(":id",$this->factura_detalle_id);
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM factura_detalle WHERE factura_detalle_id=:id");
                $stm->bindParam(":id",$this->factura_detalle_id);
                $stm -> execute();
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE factura_detalle SET producto_id=:producto_id, cantidad=:cantidad, precio_venta=:precio_venta WHERE factura_detalle_id=:id");
                $stm->bindParam(":id",$this->factura_detalle_id);
                $stm->bindParam(":producto_id",$this->producto_id);
                $stm->bindParam(":cantidad",$this->cantidad);
                $stm->bindParam(":precio_venta",$this->precio_venta);
                $stm-> execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>