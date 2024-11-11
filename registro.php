<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Casa Natura</title>
    <style>
        .navbar {
            display: flex;
            justify-content: center;
            background-color: #003049;
            padding: 15px 0;
            width: 100%;
        }

        .navbar a {
            color: #ffffff;
            margin: 0 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 100%; /* Se ajusta al 100% de la pantalla */
            background-color: #ffffff;
            padding: 0; /* Quitamos el padding extra */
        }

        .form-container {
            width: 50%;
            padding: 40px;
            margin-left: 0; /* Eliminamos el margen izquierdo */
        }

        .form-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"],
        .form-container input[type="number"],
        .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #FFC107;
            color: #ffffff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            font-weight: bold;
        }

        .form-container button:hover {
            background-color: #FFA000;
        }

        .image-container {
            width: 50%;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .image-container img {
            width: 100%;
            max-width: 600px;
            height: auto;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .checkbox-container {
            margin-top: 10px;
        }

        .checkbox-container input {
            margin-right: 5px;
        }

        .checkbox-container label {
            font-size: 14px;
        }

        footer {
            background-color: #003049;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
    <?php 
    include("fragmentos.php");
    echo $navbar;
    ?>

    <div class="container">
        <div class="form-container">
            <h2>Registro</h2>
            <form action="registro.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="primer_apellido" placeholder="Primer Apellido" required>
                <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" required>
                <input type="text" name="provincia" placeholder="Provincia" required>
                <input type="text" name="cantpn" placeholder="Cantón" required>
                <input type="text" name="distrito" placeholder="Distrito" required>
                <input type="text" name="direccion" placeholder="Dirección" required>
                <input type="email" name="correo" placeholder="Correo Electrónico" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>

                <div class="checkbox-container">
                    <input type="checkbox" name="voluntario" id="voluntario">
                    <label for="voluntario">¿Te gustaría ser voluntario?</label>
                </div>
                <button type="submit" name="registrar">Registrarme</button>
            </form>
            <div class="login-link">
                <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
            </div>
        </div>

        <div class="image-container">
            <img src="imagenes/img3.png" alt="Casa Natura">
        </div>
    </div>

    <?php
    if (isset($_POST['registrar'])) {
        $nombre = $_POST['nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $provincia = $_POST['provincia'];
        $cantpn = $_POST['cantpn'];
        $distrito = $_POST['distrito'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $voluntario = isset($_POST['voluntario']) ? 1 : 0;

        $hash_contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

        if (mysqli_query($conexion, $query)) {
            echo "<p>¡Registro exitoso! Ahora puedes <a href='login.php'>iniciar sesión</a>.</p>";
        } else {
            echo "<p style='color: red;'>Error al registrar. Intenta nuevamente.</p>";
        }
    }
    ?>
</body>

<?php 
include("fragmentos.php");
echo $footer;
?>
</html>
