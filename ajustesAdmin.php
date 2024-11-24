<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donacioens</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

</head>

<body>
    <?php
    include("sidebar.php");
    echo $sidebarAdmin2;
    ?>
    <main>
        <div id="viewport">
            <div id="content">
                <nav class="navbar ">
                    <div class="container-fluid">
                        <h2 class="titulo">Mi Perfil</h2>
                    </div>
                </nav>

                <div class="container container-animales-agregar mt-4">

                    <!-- Formulario de Perfil -->
                    <form action="perfil.php" method="POST" class="form-agregar-animal">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                value="<?php echo $admin['nombre']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                value="<?php echo $admin['telefono']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo $admin['email']; ?>" required>
                        </div>

                        <button type="submit" class="submit-btn" name="guardar_perfil">Guardar Cambios</button>
                    </form>

                    <hr>

                    <!-- Formulario de Cambio de Contraseña -->
                    <h5>Cambio de Contraseña</h5>
                    <form action="perfil.php" method="POST">
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

                        <button type="submit" class="submit-btn" name="actualizar_contrasena">Actualizar
                            Contraseña</button>
                    </form>
                </div>
            </div>
    </main>
    <?php
    include("sidebar.php");
    echo $footerAdmin;
    ?>

    <!-- Scripts de jQuery, Popper.js y Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>