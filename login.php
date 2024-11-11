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
            justify-content: center; 
            align-items: center; 
            height: calc(100vh - 140px);
            box-sizing: border-box;
            padding: 0 20px; 
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            text-align: center;
            box-sizing: border-box;
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

        .form-container input[type="text"]::placeholder,
        .form-container input[type="password"]::placeholder {
            color: #999;
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
            text-align: center;
            margin-top: 20px;
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
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="POST">
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
