<?php
    require_once("pdo.php");

    class Config extends ConexionPdo{
        private $empleado_id;
        private $nombre_empleados;
        private $celular;
        private $direccion;
        private $imagen;

        public function __construct($empleado_id = 0, $nombre_empleados = '', $celular = 0, $direccion = '', $imagen = ''){
            $this->empleado_id = $empleado_id;
            $this->nombre_empleados = $nombre_empleados;
            $this->celular = $celular;
            $this->direccion = $direccion;
            $this->imagen = $imagen;
            parent::__construct();
        }

        public function setId($empleado_id) {
            $this->empleado_id = $empleado_id;
        }
    
        public function getId() {
            return $this->empleado_id;
        }
    
        public function setNombre_empleados($nombre_empleados) {
            $this->nombre_empleados = $nombre_empleados;
        }
    
        public function getNombre_empleados() {
            return $this->nombre_empleados;
        }
    
        public function setCelular($celular) {
            $this->celular = $celular;
        }
    
        public function getCelular() {
            return $this->celular;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
    
        public function getDireccion() {
            return $this->direccion;
        }
    
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
    
        public function getImagen() {
            return $this->imagen;
        }

        public function insertData() {
            try {
                $stm = $this-> dbCnx -> prepare("INSERT INTO empleados(nombre_empleados, celular, direccion, imagen) VALUES (:nombre_empleados,:celular,:direccion,:imagen)");
                $stm->bindParam(":nombre_empleados",$this->nombre_empleados);
                $stm->bindParam(":celular",$this->celular);
                $stm->bindParam(":direccion",$this->direccion);
                $stm->bindParam(":imagen",$this->imagen);
                $stm->execute();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM empleados");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM empleados WHERE empleado_id = :id");
                $stm->bindParam(":id",$this->empleado_id);
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM empleados WHERE empleado_id=:id");
                $stm->bindParam(":id",$this->empleado_id);
                $stm -> execute();
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this-> dbCnx -> prepare("UPDATE empleados SET nombre_empleados=:nombre_empleados, celular=:celular, direccion=:direccion, imagen=:imagen WHERE empleado_id = :id");
            $stm->bindParam(":id",$this->empleado_id);
            $stm->bindParam(":nombre_empleados",$this->nombre_empleados);
            $stm->bindParam(":celular",$this->celular);
            $stm->bindParam(":direccion",$this->direccion);
            $stm->bindParam(":imagen",$this->imagen);
            $stm -> execute();
                $stm-> execute([$this->nombre_empleados, $this->celular, $this->direccion, $this->imagen, $this->empleado_id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>