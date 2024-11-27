<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Mi perfil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    require 'actions/obtener_admin.php';

    // Manejo de la actualización de perfil
    if (isset($_POST['guardar_perfil'])) {
        $nuevo_nombre = $_POST['nombre'];
        $nuevo_apellido1 = $_POST['apellido1'];
        $nuevo_apellido2 = $_POST['apellido2'];
        $nuevo_telefono = $_POST['telefono'];
        $nuevo_email = $_POST['email'];

        // Actualizar los datos del administrador en la base de datos
        $sql_update = "UPDATE usuario SET nombre = ?, apellido1 = ?, apellido2 = ?, telefono = ?, correo = ? WHERE correo = ?";
        if ($stmt_update = $conexion->prepare($sql_update)) {
            $stmt_update->bind_param("ssssss", $nuevo_nombre, $nuevo_apellido1, $nuevo_apellido2, $nuevo_telefono, $nuevo_email, $admin['correo']);
            if ($stmt_update->execute()) {
                echo "<script>alert('Datos actualizados correctamente.');</script>";
                // Recarga los datos del administrador actualizados
                require 'actions/obtener_admin.php'; 
            } else {
                echo "<script>alert('Error al actualizar los datos.');</script>";
            }
            $stmt_update->close();
        } else {
            echo "<script>alert('Error de preparación de la consulta.');</script>";
        }
    }

    // Manejo de la actualización de la contraseña
    if (isset($_POST['actualizar_contrasena'])) {
        $contrasena_actual = $_POST['contrasena_actual'];
        $nueva_contrasena = $_POST['nueva_contrasena'];

        // Obtener la contraseña actual del administrador desde la base de datos
        $sql = "SELECT contrasena FROM usuario WHERE correo = ?";
        if ($stmt = $conexion->prepare($sql)) {
            $stmt->bind_param("s", $admin['correo']);
            $stmt->execute();
            $stmt->bind_result($contrasena_db);
            $stmt->fetch();
            $stmt->close();

            // Verificar si la contraseña actual ingresada coincide
            if (!password_verify($contrasena_actual, $contrasena_db)) {
                echo "<script>alert('La contraseña actual no es correcta.');</script>";
            } else {
                // Actualizar la nueva contraseña
                $nueva_contrasena_hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
                $sql_update = "UPDATE usuario SET contrasena = ? WHERE correo = ?";
                if ($stmt_update = $conexion->prepare($sql_update)) {
                    $stmt_update->bind_param("ss", $nueva_contrasena_hash, $admin['correo']);
                    if ($stmt_update->execute()) {
                        echo "<script>alert('Contraseña actualizada correctamente.');</script>";
                    } else {
                        echo "<script>alert('Error al actualizar la contraseña.');</script>";
                    }
                    $stmt_update->close();
                } else {
                    echo "<script>alert('Error de preparación de la consulta para cambiar la contraseña.');</script>";
                }
            }
        } else {
            echo "<script>alert('Error al consultar la contraseña actual.');</script>";
        }
    }

    ?>

    <?php
    include("sidebar.php");
    echo $sidebarAdmin2;
    ?>

<main>
        <div id="viewport">
            <div id="content">
                <nav class="navbar">
                    <div class="container-fluid">
                        <h2 class="titulo">Mi Perfil</h2>
                    </div>
                </nav>
                <h3>Bienvenido, <?php echo $admin['nombre'] . ' ' . $admin['apellido1'] . ' ' . $admin['apellido2']; ?></h3>
                <div class="container container-animales-agregar mt-4">

                    <!-- Formulario de Perfil -->
                    <form action="" method="POST" class="form-agregar-animal">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $admin['nombre']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="apellido1">Primer Apellido</label>
                            <input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo $admin['apellido1']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $admin['apellido2']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $admin['telefono']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $admin['correo']; ?>" required>
                        </div>

                        <button type="submit" class="submit-btn" name="guardar_perfil">Guardar Cambios</button>
                    </form>

                    <hr>

                    <!-- Formulario de Cambio de Contraseña -->
                    <h5>Cambio de Contraseña</h5>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="contrasena_actual">Contraseña Actual</label>
                            <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual" required>
                        </div>

                        <div class="form-group">
                            <label for="nueva_contrasena">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="nueva_contrasena" name="nueva_contrasena" required>
                        </div>

                        <button type="submit" class="submit-btn" name="actualizar_contrasena">Actualizar Contraseña</button>
                    </form>
                </div>
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