
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
        

    </main>

    <?php
    include("fragmentos.php");
    echo $footer;
    ?>
<div class="container mt-4">
    <form action="" class="row container" id="formClienteActualizar" method="POST">
        <div class="formDatos col">
            <h1 class="text-center"><b>DATOS DEL USUARIO</b></h1>
            <div class="mb-3">
                <label for="nombreUsuario">Nombre de Usuario</label>
                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
            </div>
            <div class="mb-3">
                <label for="emailUsuario">Correo Electrónico</label>
                <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" required>
            </div>
            <div class="mb-3">
                <label for="telefonoUsuario">Teléfono</label>
                <input type="text" class="form-control" id="telefonoUsuario" name="telefonoUsuario" required>
            </div>
            <div class="mb-3">
                <label for="direccionUsuario">Dirección</label>
                <input type="text" class="form-control" id="direccionUsuario" name="direccionUsuario" required>
            </div>
            <input type="hidden" id="passwordHash">
            <button type="submit" class="submit-btn" name="guardar_perfil">Guardar Cambios</button>
        </div>
    </form>

    <hr>

    <!-- Formulario de Cambio de Contraseña -->
    <h5>Cambio de Contraseña</h5>
    <form action="" id="changePassword" method="POST">
        <input type="hidden" id="passwordHash">
        <div class="form-group">
            <label for="contrasena_actual">Contraseña Actual</label>
            <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual" required>
        </div>
        <div class="form-group">
            <label for="nueva_contrasena">Nueva Contraseña</label>
            <input type="password" class="form-control" id="nueva_contrasena" name="nueva_contrasena" required>
        </div>
        <button type="submit" class="submit-btn" id="actualizar_contrasena">Actualizar Contraseña</button>
    </form>
</div>

</body>

</html>