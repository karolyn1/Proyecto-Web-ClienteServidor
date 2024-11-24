<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donacioens</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
    

        .form-olvide-contra {
            background-color: white;
            width: 100%;
            max-width: 550px;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-olvide-contra h1 {
            color: #FFC107;
            margin-bottom: 15px;
            font-size: 32px; /* Tamaño de título más grande */
        }

        .form-olvide-contra h2 {
            color: #333;
            margin-bottom: 25px;
            font-size: 20px;
            font-weight: normal;
        }

        .form-olvide-contrar input[type="email"] {
            width: 100%;
            padding: 15px; /* Aumenta el padding */
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px; /* Tamaño de texto más grande */
        }

        .form-olvide-contra .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-olvide-contra button {
            width: 48%;
            padding: 12px; /* Aumenta el padding */
            font-size: 18px; /* Tamaño de texto más grande */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-olvide-contra .submit-button {
            background-color: #FFC107;
            color: white;
        }

        .form-olvide-contra .submit-button:hover {
            background-color: #FFA000;
        }

        .form-olvide-contra .cancel-button {
            background-color: #d9534f;
            color: white;
        }

        .form-olvide-contra .cancel-button:hover {
            background-color: #c9302c;
        }

    </style>
</head>
<body>

    <?php 
        include("fragmentos.php");
        echo $navbar;        
    ?>
<main>
    <div class="container mt-5">
        <div class="form-olvide-contra">
            <h1>¿Olvidaste tu contraseña?</h1>
            <h2>Ingresa tu correo electrónico para restablecer tu contraseña</h2>
            
            <form action="olvide_contraseña.php" method="POST">
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                
                <div class="buttons">
                    <button type="button" class="cancel-button" onclick="window.location.href='login.php'">Cancelar</button>
                    <button type="submit" name="enviar" class="submit-button">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </main>
    <div class="footer">
        <?php 
            include("fragmentos.php");
            echo $footer;
        ?>
    </div>
    <!-- 
include("conexion.php"); 

if (isset($_POST['enviar'])) {
    $correo = $_POST['correo'];
    $token = bin2hex(random_bytes(50)); // Genera un token aleatorio


    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        $update = "UPDATE usuarios SET reset_token='$token', reset_expiration=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE correo='$correo'";
        if ($conn->query($update) === TRUE) {
           
            $link = "http://tu_dominio.com/restablecer_contraseña.php?token=$token";

            
            $subject = "Restablecimiento de contraseña - Casa Natura";
            $message = "
                <html>
                <head>
                    <title>Restablecimiento de contraseña</title>
                </head>
                <body>
                    <p>Hola,</p>
                    <p>Recibimos una solicitud para restablecer tu contraseña en Casa Natura. Haz clic en el siguiente enlace para crear una nueva contraseña:</p>
                    <p><a href='$link'>Restablecer mi contraseña</a></p>
                    <p>Este enlace expirará en 1 hora.</p>
                </body>
                </html>
            ";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: no-reply@tu_dominio.com" . "\r\n";

            if (mail($correo, $subject, $message, $headers)) {
                echo "<p style='color: green; text-align: center;'>Correo de restablecimiento enviado. Revisa tu bandeja de entrada.</p>";
            } else {
                echo "<p style='color: red; text-align: center;'>Error al enviar el correo. Inténtalo de nuevo.</p>";
            }
        } else {
            echo "<p style='color: red; text-align: center;'>Error al generar el token. Inténtalo de nuevo.</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>Correo no registrado.</p>";
    }
}

$conn->close();
 -->

</body>
</html>
