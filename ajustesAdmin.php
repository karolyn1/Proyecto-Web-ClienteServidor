<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Administrador</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="./css/style.css" rel="stylesheet">
    <style>
        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .custom-btn {
            background-color: #062D3E; /* Color azul oscuro */
            border-color: #062D3E; /* El borde también es azul oscuro */
            color: #fff; /* Texto blanco */
            transition: all 0.3s ease; /* Suaviza la transición del hover */
            border-radius: 5px; /* Bordes redondeados (opcional) */
        }

        .custom-btn:hover {
            background-color: #1A4B62; /* Color azul más claro al pasar el ratón */
            border-color: #1A4B62; /* El borde cambia de color en el hover */
            color: #fff; /* Mantiene el texto blanco */
            cursor: pointer; /* Cambia el cursor para indicar que es un botón interactivo */
        }
    </style>
</head>
<body>
    <?php 
        include("sidebar.php");
        echo $sidebarAdmin2;
    ?>

    <div class="content">
        <h2>Perfil de Administrador</h2>
        <div class="container mt-4">
            
        <!-- Formulario de Perfil -->
        <form action="perfil.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $admin['nombre']; ?>" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $admin['telefono']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['email']; ?>" required>
            </div>

            <button type="submit" class="btn custom-btn" name="guardar_perfil">Guardar Cambios</button>
        </form>

        <hr>

            <!-- Formulario de Cambio de Contraseña -->
        <h4>Cambio de Contraseña</h4>
        <form action="perfil.php" method="POST">
            <div class="form-group">
                <label for="contrasena_actual">Contraseña Actual</label>
                <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual" required>
            </div>

            <div class="form-group">
                <label for="nueva_contrasena">Nueva Contraseña</label>
                <input type="password" class="form-control" id="nueva_contrasena" name="nueva_contrasena" required>
            </div>

            <button type="submit" class="btn custom-btn" name="actualizar_contrasena">Actualizar Contraseña</button>
        </form>

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