<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvidé mi Contraseña - Casa Natura</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .navbar {
            background-color: #003049;
            padding: 10px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            width: 100%;
            max-width: 600px;
            padding: 40px;
            box-sizing: border-box;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .form-container img {
            position: absolute;
            top: -50px;
            width: 120px;
            height: auto;
        }

        .form-container h1 {
            color: #FFC107;
            margin-bottom: 10px;
            font-size: 30px;
        }

        .form-container h2 {
            color: black;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .form-container p {
            color: black;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .form-container input[type="email"] {
            width: 80%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container .buttons {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin-top: 20px;
        }

        .form-container button {
            width: 48%;
            padding: 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container .submit-button {
            background-color: #FFC107;
            color: white;
        }

        .form-container .submit-button:hover {
            background-color: #FFA000;
        }

        .form-container .cancel-button {
            background-color: #d9534f;
            color: white;
        }

        .form-container .cancel-button:hover {
            background-color: #c9302c;
        }

        .footer {
            background-color: #003049;
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>
<body>

    <?php 
        include("fragmentos.php");
        echo $navbar;        
    ?>

    <div class="main-container">
        <div class="form-container">
            <img src="imagenes/imagen.png" alt="Imagen Casa Natura">
            <h1>Hola,</h1>
            <h2>¿Olvidaste tu contraseña?</h2>
            <p>Para restaurar tu contraseña, ingresa el correo electrónico asociado.</p>
            
            <form action="olvide_contraseña.php" method="POST">
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                
                <div class="buttons">
                    <button type="button" class="cancel-button" onclick="window.location.href='login.php'">Cancelar</button>
                    <button type="submit" name="enviar" class="submit-button">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <?php 
            include("fragmentos.php");
            echo $footer;
        ?>
    </div>

</body>
</html>
