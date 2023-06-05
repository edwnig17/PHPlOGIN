<?php

  require_once('../../configs/configProductos.php');

  $data = new Config();

  $all = $data -> obtainAll();
  $idCategoria= $data->obtenerCategoria_id();
  $idProveedor= $data->obtenerProveedor_id();

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
        <h2>Productos</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEstudiantes"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">CATEGORIA</th>
              <th scope="col">PRECIO UNITARIO</th>
              <th scope="col">STOCK</th>
              <th scope="col">UNIDADES PEDIDAS</th>
              <th scope="col">PROVEEDOR</th>
              <th scope="col">PRODUCTO</th>
              <th scope="col">DISPONIBLE</th>
              <th scope="col">DETALLE</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">
    

            <?php
              foreach($all as $key => $val){
            ?>
            <tr>
              <td><?= $val['producto_id'] ?></td>
              <td><?= $val['categoriaNombre'] ?></td>
              <td><?= $val['precioUnitario'] ?></td>
              <td><?= $val['stock'] ?></td>
              <td><?= $val['unidades_pedidas'] ?></td>
              <td><?= $val['nombre_proveedores'] ?></td>
              <td><?= $val['nombre_producto'] ?></td>
              <td><?php $val['descontinuado'];if($val == 0){echo "Disponible";}else{echo "Descontinuado";}; ?></td>
              <td class="row justify-content-center gap-2 col-10">
                <a class="btn btn-danger" href="../actions/productos/borrarProducto.php?id=<?= $val['producto_id'] ?>&req=delete">BORRAR</a>
                <a class="btn btn-primary" href="../actions/productos/actualizarProducto.php?id=<?=$val['producto_id']?>">Editar</a>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="../actions/productos/registrarProducto.php" method="post">
              <div class="mb-1 col-12">
                <select class="form-select" aria-label="Default select example" id="categoria_id" name="categoria_id" required>
                  <option selected>Seleccione la categoria</option>
                  <?php
                    foreach($idCategoria as $key => $valor){
                    ?> 
                  <option value="<?= $valor["categoria_id"]?>"><?= $valor["categoriaNombre"]?></option>
                  <?php
                    }
                  ?>
                </select>

              <div class="mb-1 col-12">
                <label for="precioUnitario" class="form-label">Precio unitario:  </label>
                <input 
                  type="number"
                  id="precioUnitario"
                  name="precioUnitario"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="stock" class="form-label">Cantidad en Stock</label>
                <input 
                  type="number"
                  id="stock"
                  name="stock"
                  class="form-control"  
                 placeholder="Ingrese la cantidad de productos en stock"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="unidades_pedidas" class="form-label">Unidades Pedidas</label>
                <input 
                  type="number"
                  id="unidades_pedidas"
                  name="unidades_pedidas"
                  class="form-control"  
                 placeholder="Ingrese la cantidad de unidaes pedidas"
                />
              </div>

                <select class="form-select" aria-label="Default select example" id="proveedores_id" name="proveedores_id" required>
                  <option selected>Seleccione el Proveedor</option>
                  <?php
                    foreach($idProveedor as $key => $valor){
                    ?> 
                  <option value="<?= $valor["proveedores_id"]?>"><?= $valor["nombre_proveedores"]?></option>
                  <?php
                    }
                  ?>
                </select>

                <div class="mb-1 col-12">
                    <label for="nombre_producto" class="form-label">Nombre del Producto: </label>
                    <input 
                      type="text"
                      id="nombre_producto"
                      name="nombre_producto"
                      class="form-control"  
                     placeholder="Ingrese el nombre del producto"
                    />
                </div>

                <div class="mb-1 col-12">
                    <select class="form-select" aria-label="Default select example" id="descontinuado" name="descontinuado" required>
                        <option selected>ingrese si esta disponible</option>
                        <option value="1">DISPONIBLE</option>
                        <option value="0">DESCONTINUADO</option>
                    </select>
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