<?php
  require_once("../database/db.php");
  require_once("../database/Conectar.php");
  //para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

  class LoginUser extends Conectar{
    private $user_id;
    private $email_user;
    private $username;
    private $password;

      public function __construct($user_id = 0, $email_user="", $password="", $username="", $dbCnx=""){

          $this->user_id = $user_id;
          $this->email_user = $email_user;  
          $this->password = $password;
          $this->username = $username;
          parent::__construct($dbCnx);
      }

      

      public function setId($user_id){
          $this->user_id = $user_id;
      }
      public function getId(){
          return $this->user_id;
      }

      public function setEmail_user($email_user){
          $this->email_user = $email_user;
      }
      public function getEmail_user(){
          return $this->email_user;
      }

      public function setPassword($password){
        $this->password = $password;
      }
      public function getPassword(){
          return $this->password;
      }

      public function setUsername($username){
        $this->username = $username;
      }
      public function getUsername(){
          return $this->username;
      }
    public function fetchAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users");
            $stm-> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e -> getMessage();
        }
    }

    public function login(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email_user = ?, AND password = ?");
            $stm -> execute([$this->email_user,      MD5($this->password)]);
            $user = $stm->fetchAll();
            if(count($user)>0){
                session_start();
                $_SESSION['user_id'] = $user[0]['id'];
                $_SESSION['email_user'] = $user[0]['email_user'];
                $_SESSION['password'] = $user[0]['password'];
        
                return true;
            }else{
                false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
  }
  
?>