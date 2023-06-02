<?php 
    session_start();
    if(isset($_POST['loguearse'])){
        require_once("loginUser.php");
        $credenciales = new LoginUser();
        $credenciales->setEmail_user($_POST['email_user']);
        $credenciales->setUsername($_POST['username']);
        $credenciales->setPassword($_POST['password']);
        $login = $credenciales -> login();
        print_r($credenciales);
        if($login){
            header('location: ../modulos/file/categorias.php');
        }else{
            echo "<script> alert('password/email invalidos'); document.location='login.php'</script>";
        }
    }
?>