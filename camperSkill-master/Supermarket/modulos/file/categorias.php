<?php
  require_once('../../configs/configCatego.php');

  $data = new Config();

  $all = $data -> obtainAll();

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


    <link rel="stylesheet" type="text/css" href="../../../../styles.css">

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
        <a href="categorias.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Categorias</h3>
        </a>
        <a href="clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="empleados.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
        </a>
        <a href="facturas.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
        </a>
        <a href="clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
        </a>
        <a href="facturaD.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Factura Detalle</h3>
        </a>
        <a href="productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
        <a href="proveedores.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Categorias</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NOMBRES</th>
              <th scope="col">DESCRIPCION</th>
              <th scope="col">IMAGEN</th>
              <th scope="col">DETALLE</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->

            <?php
              foreach ($all as $key => $val){
            ?>
            <tr>
              <td><?= $val['categoria_id'] ?></td>
              <td><?= $val['categoriaNombre'] ?></td>
              <td><?= $val['descripcion'] ?></td>
              <td><img class="imagenProd" src="<?php echo $val['imagen'] ?>" alt="NADA"></td>
              <td class="row justify-content-center gap-2 col-10">
                <a class="btn btn-danger" href="../../modulos/actions/categorias/borrarCategoria.php?id=<?= $val['categoria_id'] ?>&req=delete">BORRAR</a>
                <a class="btn btn-primary" href="../../modulos/actions/categorias/actualizarCategorias.php?id=<?=$val['categoria_id']?>">Editar</a>
              </td>
            </tr>

            <?php
              }
            ?>
          </tbody>
                
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Estudiantes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEstudiantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Estudiante</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="../actions/categorias/registrarCategoria.php" method="post">
              <div class="mb-1 col-12">
                <label for="nombreCategorias" class="form-label">Nombre Categoria: </label>
                <input 
                  type="text"
                  id="nombreCategorias"
                  name="nombreCategorias"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="descripcion" class="form-label">Descripcion: </label>
                <input 
                  type="text"
                  id="descripcion"
                  name="descripcion"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="imagen" class="form-label">Imagen</label>
                <input 
                  type="url"
                  id="imagen"
                  name="imagen"
                  class="form-control"  
                 placeholder="Ingrese la url de la imagen"
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>