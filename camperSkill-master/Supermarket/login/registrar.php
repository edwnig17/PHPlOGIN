<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if(isset($_POST['registrar'])){
        require_once("registerUser.php");

        $registrar = new RegistroUser();

        $registrar-> setEmpleado_id(1);
        $registrar-> setEmail_user($_POST['email_user']);
        $registrar-> setUsername($_POST['username']);
        $registrar-> setPassword($_POST['password']);
        print_r($registrar);
        if($registrar->checkUser($_POST['email_user'])){
            echo "<script> alert('Usuario ya existe '); document.location='login.php'</script>";
        }else{
            $registrar-> insertData();
            echo "<script> alert('Usuario registrado satisfactoriamente '); document.location='../modulos/file/categorias.php'</script>";
        }
    }
?>