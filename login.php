<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Casa Natura</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #ffffff;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #e0e0e0;
        }

        .header h1 {
            font-size: 36px;
            color: #003049;
            font-weight: bold;
            margin: 0;
        }

        .header img {
            max-width: 100px;
            margin-top: 10px;
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

        .content {
            display: flex;
            padding: 30px;
            align-items: center;
            justify-content: space-between;
            flex: 1;  
        }

        .login-form {
            width: 45%;
            max-width: 300px;
            text-align: center;
        }

        .login-form h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            color: #555;
        }

        .login-form input[type="text"]::placeholder,
        .login-form input[type="password"]::placeholder {
            color: #999;
        }

        .login-form button {
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

        .login-form button:hover {
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
            width: 50%;
            text-align: center;
        }

        .animal-images img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;

    </style>
</head>
<body>
    <?php 
    include("fragmentos.php");
    echo $navbar;        
    ?>

    <!-- Contenido principal con formulario e imágenes -->
    <div class="content">
        <!-- Formulario de inicio de sesión -->
        <div class="login-form">
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="POST">
                <input type="text" id="username" name="username" placeholder="Email o Usuario" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>

                <div class="remember">
                    <label><input type="checkbox" name="remember"> Recordar Usuario</label>
                    <!-- Enlace a la página de restablecimiento de contraseña -->
                    <a href="olvide_contra.php">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" name="login">INICIAR SESIÓN</button>
            </form>
            <p>¿No Tienes Usuario? <a href="registro.php">Crear Usuario</a></p>
        </div>

        <!-- Imágenes de animales -->
        <div class="animal-images">
            <img src="imagenes/img3.png" alt="Animales Casa Natura">
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <?php 
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>

    <?php

    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

     
        if ($username === "usuario" && $password === "contraseña") {
            echo "<p style='text-align:center; color: green;'>Inicio de sesión exitoso.</p>";
        } else {
            echo "<p style='text-align:center; color: red;'>Usuario o contraseña incorrectos.</p>";
        }
    }
    ?>
</body>
</html>
