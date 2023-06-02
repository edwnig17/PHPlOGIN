<?php
    require_once("pdo.php");

    class Config extends ConexionPdo{
        private $categoria_id;
        private $nombreCategoria;
        private $descripcion;
        private $imagen;

        public function __construct($categoria_id = 0, $nombreCategoria = '', $descripcion = '', $imagen = ''){
            $this->categoria_id = $categoria_id;
            $this->nombreCategoria = $nombreCategoria;
            $this->descripcion = $descripcion;
            $this->imagen = $imagen;
            parent::__construct();
        }

        public function setId($categoria_id) {
            $this->categoria_id = $categoria_id;
        }
    
        public function getId() {
            return $this->categoria_id;
        }
    
        public function setNombreCategoria($nombreCategoria) {
            $this->nombreCategoria = $nombreCategoria;
        }
    
        public function getNombreCategoria() {
            return $this->nombreCategoria;
        }
    
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
    
        public function getDescripcion() {
            return $this->descripcion;
        }
    
        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
    
        public function getImagen() {
            return $this->imagen;
        }

        public function insertData() {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO categorias (categoriaNombre, descripcion, imagen) VALUES (?, ?, ?)");
                $stm->execute([$this->nombreCategoria, $this->descripcion, $this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function obtainAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM categorias");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM categorias WHERE categoria_id = ?");
                $stm -> execute([$this->categoria_id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM categorias WHERE categoria_id=?");
                $stm-> execute([$this-> categoria_id]);
                return $stm-> fetchAll();
            } catch (Exception $e) {
                return $e-> getMessage();
            }
        }
        public function update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE categorias SET categoriaNombre=?, descripcion=?, imagen=? WHERE categoria_id=?");
                $stm-> execute([$this->nombreCategoria, $this->descripcion, $this->imagen, $this->categoria_id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
?>