<?php
    require_once("pdo.php");

    class Config extends ConexionPdo{
        private $factura_id;
        private $empleado_id;
        private $cliente_id;
        private $fecha;

        public function __construct($factura_id = 0, $empleado_id = 0, $cliente_id = 0,  $fecha = '' ){
            $this->factura_id = $factura_id;
            $this->empleado_id = $empleado_id;
            $this->cliente_id = $cliente_id;
            $this->fecha = $fecha;
            parent::__construct();
        }

        public function setId($factura_id) {
            $this->factura_id = $factura_id;
        }
    
        public function getId() {
            return $this->factura_id;
        }
    
        public function setEmpleado_id($empleado_id) {
            $this->empleado_id = $empleado_id;
        }
    
        public function getEmpleado_id() {
            return $this->empleado_id;
        }
    
        public function setCliente_id($cliente_id) {
            $this->cliente_id = $cliente_id;
        }
    
        public function getCliente_id() {
            return $this->cliente_id;
        }
    
        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
    
        public function getFecha() {
            return $this->fecha;
        }

        public function obtenerEmpleadoId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT empleado_id,nombre_empleados FROM empleados");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function EmpleadoId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT empleado_id, nombre_empleados FROM empleados WHERE empleado_id=:empleado_id");
                $stm->bindParam(":empleado_id",$this->empleado_id);
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function ClienteId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT cliente_id, nombre_clientes FROM clientes WHERE cliente_id=:cliente_id");
                $stm->bindParam(":cliente_id",$this->cliente_id);
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    
        public function obtenerClienteId(){
            try {
                $stm = $this-> dbCnx -> prepare("SELECT cliente_id, nombre_clientes  FROM clientes");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function insertData() {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO facturas (empleado_id, cliente_id, fecha) VALUES (:empleado_id,:cliente_id,:fecha)");
                $stm->bindParam(":empleado_id",$this->empleado_id);
                $stm->bindParam(":cliente_id",$this->cliente_id);
                $stm->bindParam(":fecha",$this->fecha);
                $stm->execute();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM facturas INNER JOIN empleados ON facturas.empleado_id = empleados.empleado_id INNER JOIN clientes ON facturas.cliente_id = clientes.cliente_id");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM facturas WHERE factura_id = :id");
                $stm ->bindParam(":id",$this->factura_id);
                $stm -> execute();
                echo "<script>alert('Registro eliminado');document.location='../modulos/file/facturas.php'</script>";
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM facturas WHERE factura_id= :id");
                $stm-> bindParam(":id",$this->factura_id);
                $stm-> execute();
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE facturas SET empleado_id=:empleado_id, cliente_id=:cliente_id, fecha=:fecha WHERE factura_id=:id");
                $stm->bindParam(":id",$this->empleado_id);
                $stm->bindParam(":empleado_id",$this->factura_id);
                $stm->bindParam(":cliente_id",$this->cliente_id);
                $stm->bindParam(":fecha",$this->fecha);
                $stm-> execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>