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
            gap: 20px; /* Espacio entre el formulario y la imagen */
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

    <div class="container">
        <div class="form-container">
            <h2>Iniciar Sesión</h2>
            <form action="" method="POST">
                <input type="text" id="username" name="username" placeholder="Email o Usuario" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>

                <div class="remember">
                    <label><input type="checkbox" name="remember"> Recordar Usuario</label>
                    <a href="olvide_contra.php">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" name="login">INICIAR SESIÓN</button>
            </form>
            <p>¿No Tienes Usuario? <a href="registro.php">Crear Usuario</a></p>
        </div>

        <div class="animal-images">
            <img src="imagenes/img3.png" alt="Animales Casa Natura">
        </div>
    </div>

    <footer>
        <?php 
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>

    <?php
    
    include("conexion.php");

    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Encriptar la contraseña ingresada para comparación

        
        $sql = "SELECT * FROM usuarios WHERE (username = '$username' OR email = '$username') AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<p style='text-align:center; color: green;'>Inicio de sesión exitoso.</p>";
        } else {
            echo "<p style='text-align:center; color: red;'>Usuario o contraseña incorrectos.</p>";
        }
    }

    $conn->close();
    ?>
</body>

</html>
