<?php
  require_once("../database/Conectar.php");
  require_once("loginUser.php");

  //para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

  class RegistroUser extends Conectar{
      private $user_id;
      private $empleado_id;
      private $email_user;
      private $username;
      private $password;

      public function __construct($user_id = 0, $empleado_id=0, $email_user="", $username="", $password="", $dbCnx=""){

          $this->user_id = $user_id;
          $this->empleado_id = $empleado_id;
          $this->email_user = $email_user;  
          $this->username = $username;
          $this->password = $password;
          parent::__construct($dbCnx);

          //$this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

      }

      

      public function setId($user_id){
          $this->user_id = $user_id;
      }
      public function getId(){
          return $this->user_id;
      }

      public function setEmpleado_id($empleado_id){
          $this->empleado_id = $empleado_id;
      }
      public function getEmpleado_id(){
          return $this->empleado_id;
      }

      public function setEmail_user($email_user){
          $this->email_user = $email_user;
      }
      public function getEmail_user(){
          return $this->email_user;
      }

      public function setUsername($username){
          $this->username = $username;
      }
      public function getUsername(){
          return $this->username;
      }

      public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function checkUser($email_user){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email_user = ?");
            $stm->execute([$email_user]);            
            if($stm->fetchColumn()){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            return $e -> getMessage();
        }
    }     

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO users (empleado_id, email_user, username, password)  values(?,?,?,?)");
            $stm -> execute([$this->empleado_id, $this->email_user, $this->username, md5($this->password)]);
            $login = new LoginUser();

            $login->setEmail_user($_POST['email_user']);
            $login->setPassword($_POST['password']);

            $success = $login->login();
        } catch (Exception $e) {
            return $e -> getMessage();
        }
    }

  }
  
?>