<?php
    if (isset($_POST['guardar'])){
        require_once('../../../configs/configClientes.php');

        $config = new Config();

        $config -> setNombre_clientes($_POST['nombre_clientes']);
        $config -> setCelular($_POST['celular']);
        $config -> setCompania($_POST['compania']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='../../file/clientes.php'</script>";
    }
?>