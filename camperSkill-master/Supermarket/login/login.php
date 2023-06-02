<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logito.png">
    <title>Facturacion</title>
    <link rel="stylesheet" href="../../../login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="">
    <div class="caja_login">
        <h2>Ingresar</h2>
        <form action="loguear.php" method="post">
            <div class="caja_login-input">
                <input id="usuario" type="email" name="email_user" required />
                <label>Email...</label>
            </div>
            <div class="caja_login-input">
                <input id="password" type="password" name="password" required />
                <label>Contraseña...</label>
            </div>
            <div class="caja_login-input">
                   <!--   <a id="iniciar" type="submit" name="loguearse">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Iniciar Secion
                </a>  -->
                <input type="submit" value="Iniciar Secion" name="loguearse">
                <a id="registrar" type="button" data-bs-toggle="modal" data-bs-target="#registrarNew">Registrar</a>
            </div>
        </form>
    </div>
    
    <section>
        <!-- Modal -->
        <div class="modal fade" id="registrarNew" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="caja_register">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro de Nuevo Usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formulario1" class="row g-2" action="registrar.php" method="POST">
                                <div class="caja_login-input">
                                    <input id="usuario" type="email" name="email_user" required />
                                    <label>Email...</label>
                                </div>
                                <div class="caja_login-input">
                                    <input id="usuario" type="text" name="username" required />
                                    <label>Usuario...</label>
                                </div>
                                <div class="caja_login-input">
                                    <input id="usuario" type="password" name="password" required />
                                    <label>Contraseña...</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <input type="submit" class="btn btn-primary crear" value="Crear" name="registrar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>