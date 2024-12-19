
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Mi Perfil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
    <style>
        .card-title {
            text-align: center;
            
        }
    </style>
</head>
<body>
    <?php
    include('fragmentos.php');
    echo $navbar;
    ?>
    <main>
        <?php
        include('fragmentos.php');
        echo $opciones;
        ?>
    <main>
        <div class="viewport">
            <div ">
         
                <div class="container container-animales-agregar mt-4">
                <h2 class="titulo">Bienvenido,
                            <?php echo $_SESSION['usuario_nombre'] . ' ' . $_SESSION['usuario_apellido1'] . ' ' . $_SESSION['usuario_apellido2']; ?>
                        </h2>
                    <form action="" class="row container " id="formAdminActualizar" method="POST">

                        <div class="formDatos col">
                            <h1 class="text-center"><b>DATOS PERSONALES</b></h1>
                            <div class="mb-3"><label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombreAdmin" name="nombre"
                                   required>
                            </div>
                            <div class="mb-3"><label for="apellido1">Primer Apellido</label>
                                <input type="text" class="form-control" id="apellido1Admin" name="apellido1"
                                    required>
                                <div class="mb-3">
                                    <label for="apellido2">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="apellido2Admin" name="apellido2"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" class="form-control" id="telefonoAdmin" name="telefono"
                                       required>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="emailAdmin" name="email"
                                    required>
                            </div>

                        </div>

                        <div class="formDatos col">
                            <h1 class="text-center"><b>DIRECCION</b></h1>
                   
                                <div class="mb-3"><label for="nombre">Provincia</label>
                                    <input type="text" class="form-control" id="direccionAdmin" name="nombre"
                                         required>
                                </div>
                                <div class="mb-3"><label for="apellido1">Cantón</label>
                                    <input type="text" class="form-control" id="cantonAdmin" name="apellido1"
                                         required>
                                </div>
                                <div class=" mb-3">
                                    <label for="apellido2">Distrito</label>
                                    <input type="text" class="form-control" id="distritoAdmin" name="apellido2"
                                         required>
                                </div>

                                <div class="mb-3">
                                    <label for="telefono">Dirección Exacta</label>
                                    <input type="text" class="form-control" id="exactaAdmin" name="exactaAdmin"
                                         required>
                                </div>
                        </div>

                        <button type="submit" class="submit-btn" name="guardar_perfil">Guardar Cambios</button>
                    </form>

                    <hr>

                    <!-- Formulario de Cambio de Contraseña -->
                    <h5>Cambio de Contraseña</h5>
                    <form action="" id="changePassword" method="POST">
                        <input type="hidden" id="passwordHash">
                        <div class="form-group">
                            <label for="contrasena_actual">Contraseña Actual</label>
                            <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="nueva_contrasena">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="nueva_contrasena" name="nueva_contrasena"
                                required>
                        </div>

                        <button type="submit" class="submit-btn" id="actualizar_contrasena">Actualizar
                            Contraseña</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mensajeModalLabel">CasaNatura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="mensajeModalBody">
                        <!-- El mensaje dinámico se colocará aquí -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="submit-btn" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
</main>
    </main>

    <?php
    include("sidebar.php");
    echo $footerAdmin;
    ?>

    <!-- Scripts de jQuery, Popper.js y Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </bo>

</html>