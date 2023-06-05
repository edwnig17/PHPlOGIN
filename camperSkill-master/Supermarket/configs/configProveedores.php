<?php
    require_once("pdo.php");

    class Config extends ConexionPdo{
        private $proveedores_id;
        private $nombre_proveedores;
        private $telefono_proveedores;
        private $ciudad_proveedores;

        public function __construct($proveedores_id = 0, $nombre_proveedores = '', $telefono_proveedores = 0, $ciudad_proveedores = ''){
            $this->proveedores_id = $proveedores_id;
            $this->nombre_proveedores = $nombre_proveedores;
            $this->telefono_proveedores = $telefono_proveedores;
            $this->ciudad_proveedores = $ciudad_proveedores;
            parent::__construct();
        }

        public function setId($proveedores_id) {
            $this->proveedores_id = $proveedores_id;
        }
    
        public function getId() {
            return $this->proveedores_id;
        }
    
        public function setNombre_proveedores($nombre_proveedores) {
            $this->nombre_proveedores = $nombre_proveedores;
        }
    
        public function getNombre_proveedores() {
            return $this->nombre_proveedores;
        }
    
        public function setTelefono_proveedores($telefono_proveedores) {
            $this->telefono_proveedores = $telefono_proveedores;
        }
    
        public function getTelefono_proveedores() {
            return $this->telefono_proveedores;
        }
    
        public function setCiudad_proveedores($ciudad_proveedores) {
            $this->ciudad_proveedores = $ciudad_proveedores;
        }
    
        public function getCiudad_proveedores() {
            return $this->ciudad_proveedores;
        }

        public function insertData() {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO proveedores (nombre_proveedores, telefono_proveedores, ciudad_proveedores) VALUES (?, ?, ?)");
                $stm->execute([$this->nombre_proveedores, $this->telefono_proveedores, $this->ciudad_proveedores]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM proveedores");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM proveedores WHERE proveedores_id = ?");
                $stm -> execute([$this->proveedores_id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM proveedores WHERE proveedores_id=?");
                $stm-> execute([$this-> proveedores_id]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE proveedores SET nombre_proveedores=?, telefono_proveedores=?, ciudad_proveedores=? WHERE proveedores_id=?");
                $stm-> execute([$this->nombre_proveedores, $this->telefono_proveedores, $this->ciudad_proveedores, $this->proveedores_id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>