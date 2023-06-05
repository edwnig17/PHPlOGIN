<?php
    if (isset($_POST['guardar'])){
        require_once('../../../configs/configProveedores.php');

        $config = new Config();

        $config -> setNombre_proveedores($_POST['nombre_proveedores']);
        $config -> setTelefono_proveedores($_POST['telefono_proveedores']);
        $config -> setCiudad_proveedores($_POST['ciudad_proveedores']);

        $config -> insertData();
        echo "<script>alert('datos guardados');document.location='../../file/proveedores.php'</script>";
    }
?>