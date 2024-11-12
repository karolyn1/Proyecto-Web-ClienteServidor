<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Casa Natura</title>
    <style>
            <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: center;
            background-color: #003049;
            padding: 10px 0;
        }

        .navbar a {
            color: #ffffff;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            padding: 20px;
            flex: 1;
            text-align: center;
            gap: 20px; 
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            box-sizing: border-box;
            text-align: left;
        }

        .form-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
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

        .remember {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }

        .remember input {
            margin-right: 5px;
        }

        .remember a {
            color: #007bff;
            text-decoration: none;
        }

        .remember a:hover {
            text-decoration: underline;
        }

        .animal-images {
            width: 100%;
            max-width: 600px;
        }

        .animal-images img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        footer {
            background-color: #003049;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%;
        }
    </style>
    </style>
</head>
<body>
    <?php 
    include("fragmentos.php");
    echo $navbar;
    ?>
<?php

include('conexion.php'); 

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

    $query = "INSERT INTO usuarios (nombre, primer_apellido, segundo_apellido, provincia, cantpn, distrito, direccion, correo, contraseña, voluntario) 
              VALUES ('$nombre', '$primer_apellido', '$segundo_apellido', '$provincia', '$cantpn', '$distrito', '$direccion', '$correo', '$hash_contraseña', '$voluntario')";

    if (mysqli_query($conn, $query)) { // Cambia $conexion por $conn
        header("Location: editarperfil.php");
        exit();
    } else {
        echo "<p style='color: red;'>Error al registrar. Intenta nuevamente.</p>";
    }
}
?>
 <footer>
        <?php 
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>
</body>
</html>
