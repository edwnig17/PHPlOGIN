<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
    if (isset($_POST['guardar'])){
        require_once('../../../configs/configProductos.php');

        $config = new Config();

        $config->setCategoria_id($_POST['categoria_id']);
        $config->setPrecioUnitario($_POST['precioUnitario']);
        $config->setStock($_POST['stock']);
        $config->setUnidades_pedidas($_POST['unidades_pedidas']);
        $config->setProveedor_id($_POST['proveedores_id']);
        $config->setNombre_producto($_POST['nombre_producto']);
        $config->setDescontinuado($_POST['descontinuado']);
        $config -> insertData();
        print_r($config);
        echo "<script>alert('datos guardados');document.location='../../file/productos.php'</script>";
    }
?>      