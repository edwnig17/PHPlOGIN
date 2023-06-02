<?php 
    require_once("../../../configs/configFacturas.php");
    $data = new Config();
    $id = $_GET['id'];
    $data-> setId($id);
    $record = $data->selectOne();
  
    $val = $record[0];
   

    $all = $data -> obtainAll();
    $idempleado = $data->obtenerEmpleadoId();
    $idcliente = $data->obtenerClienteId();

    if(isset($_POST['editar'])){
        $data->setEmpleado_id($_POST['empleado_id']);
        $data->setCliente_id($_POST['cliente_id']);
        $data->setFecha($_POST['fecha']);

        $data->update();
        echo "<script>alert('Datos actualizados satisfactoriamente');document.location='../../file/facturas.php'</script>";
    }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="../../../../../styles.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camper Skills.</h3>
        <img src="https://e0.pxfuel.com/wallpapers/96/56/desktop-wallpaper-phone-astronaut-anime-cartoon-astronaut-phone.jpg" alt="" class="imagenPerfil">
        <h3>Edwing Mejia</h3>
      </div>
      <div class="menus">
        <a href="../../file/categorias.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Categorias</h3>
        </a>
        <a href="../../file/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="../../file/empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
        </a>
        <a href="../../file/facturas.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
        </a>
        <a href="../../file/facturaD.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Factura Detalle</h3>
        </a>
        <a href="../../file/productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
        <a href="../../file/proveedores.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
        </a>
      </div>
    </div>
    <div class="parte-media">
        <h2 class="m-2">Factura a Editar</h2>
        <div class="menuTabla contenedor2">
            <form class="col d-flex flex-wrap" action=""  method="post">
                <div class="mb-1 col-12">
                <select class="form-select" aria-label="Default select example" id="empleado_id" name="empleado_id" required>
                  <option selected>Seleccione el id del Empleados</option>
                  <?php
                    foreach($idempleado as $key => $valor){
                    ?> 
                  <option value="<?= $valor["empleado_id"]?>"><?= $valor["nombre_empleados"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="clienteId" class="form-label">Cliente Id</label>
                <select class="form-select" aria-label="Default select example" id="cliente_id" name="cliente_id" required>
                  <option selected>Seleccione el id del Cliente</option>
                  <?php
                    foreach($idcliente as $key => $valor){
                    ?> 
                  <option value="<?= $valor["cliente_id"]?>"><?= $valor["nombre_clientes"]?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="fecha" class="form-label">fecha</label>
                <input 
                  type="date"
                  id="fecha"
                  name="fecha"
                  class="form-control"  
                  placeholder="Ingrese la fecha"
                  value="<?php echo $val['fecha'];?>"
                />
              </div>

                <div class=" col-12 m-2">
                    <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
                </div>
            </form>  
            <div id="charts1" class="charts"> </div>
        </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Estudiantes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>
</html>