<?php 
    if(isset($_POST['guardar'])){
        require_once('../../../configs/configDetalle.php');

        $config = new Config();

        $config -> setProducto_id($_POST['producto_id']);
        $config -> setCantidad($_POST['cantidad']);
        $config -> setPrecio_venta($_POST['precio_venta']);

        $config -> insertData();
        print_r($config);
        echo "<script>alert('datos guardados');document.location='../../file/facturaD.php'</script>";
    }
?>