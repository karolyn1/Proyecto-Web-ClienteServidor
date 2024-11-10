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
        }

        .navbar {
            background-color: #003049;
            padding: 10px;
            position: fixed;
            width: 100%;
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
            flex: 1;
            padding-top: 80px; 
            padding-left: 20px;
            padding-right: 20px;
            height: calc(100vh - 80px); 
        }

        .form-container {
            background-color: white;
            width: 100%;
            max-width: 800px;
            padding: 30px;
            box-sizing: border-box;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }


        .form-container img {
            position: absolute;
            top: -50px;
            right: -50px;
            width: 120px;
            height: auto;
        }

        .form-container h1 {
            text-align: center;
            color: #FFC107;
            margin-bottom: 20px;
            font-size: 30px;
        }

        .form-container h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
            font-size: 20px;
        }


        .form-container p {
            color: black;
            text-align: center;
            font-size: 16px;
        }

  
        .form-container input[type="email"] {
            width: 80%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
            color: black;
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
            background-color: #FFC107;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #FFA000;
        }

        .form-container .cancel-button {
            background-color: #d9534f;
        }

        .form-container .cancel-button:hover {
            background-color: #c9302c;
        }

        /* Footer */
        .footer {
            background-color: #003049;
            color: white;
            padding: 10px;
            text-align: right;
            position: relative;
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

  
    <div class="main-container">
        <div class="form-container">

            <img src="imagenes/imagen.png" alt="Imagen Casa Natura">

            <h1>¡Hola!</h1>
            <h2>¿Olvidaste tu contraseña?</h2>
            <p>Si olvidaste tu contraseña, por favor ingresa tu correo electrónico para recibir un enlace de restablecimiento.</p>
            
            <form action="olvide_contraseña.php" method="POST">

                <input type="email" name="correo" placeholder="Introduce tu correo" required>
                
                
<div class="buttons">

    <button type="submit" name="enviar">Enviar enlace</button>

    <a href="login.php">
        <button type="button" class="cancel-button">Cancelar</button>
    </a>
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
