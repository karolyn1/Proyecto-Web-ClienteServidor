<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Casa Natura</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center; 
        }

        .navbar {
            display: flex;
            justify-content: center;
            background-color: #003049;
            padding: 10px 0;
            width: 100%;
        }

        .navbar a {
            color: #ffffff;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            gap: 40px;
            max-width: 800px; 
            width: 100%;
            flex: 1;
        }

        .form-container, .image-container {
            flex: 1;
            max-width: 400px;
            box-sizing: border-box;
            text-align: center;
        }

        .form-container {
            padding: 20px;
        }

        .form-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"] {
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

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .image-container img {
            width: 200%;
            max-width: 400px; 
            height: auto;
            border-radius: 8px;
        }

        footer {
            background-color: #003049;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            width: 100%;
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
            <h2>Registrarse</h2>
            <form method="POST" action="">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="primer_apellido" placeholder="Primer Apellido" required>
                <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" required>
                <input type="text" name="provincia" placeholder="Provincia" required>
                <input type="text" name="cantpn" placeholder="Cantón" required>
                <input type="text" name="distrito" placeholder="Distrito" required>
                <input type="text" name="direccion" placeholder="Dirección" required>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
                <label><input type="checkbox" name="voluntario"> ¿Quieres ser voluntario?</label>
                <button type="submit" name="registrar">Registrarse</button>
            </form>
        </div>
        
        <div class="image-container">
            <img src="imagenes/img1.png"" alt="Imagen descriptiva">
        </div>
    </div>

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

        if (mysqli_query($conn, $query)) {
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
