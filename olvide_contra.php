<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Olvide contra</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
    
    input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px; 
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
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
            font-size: 32px; 
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
            font-size: 18px; 
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
            <h2>Ingresa tu correo electrónico y la contraseña para restablecerla. </h2>
            
            <form action="login.php" method="POST">
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <input type="text" name="contra" placeholder="Escribe tu nueva contraseña" required>
        <input type="text" name="confirma" placeholder="Confirma tu contraseña" required>

        <div class="buttons">
            <button type="button" class="cancel-button" onclick="window.location.href='login.php'">Cancelar</button>
            <button type="submit" name="enviar" class="submit-button">Confirmar</button>
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
    
    <?php
include("actions/conexion.php");
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['enviar'])) {
    $correo = trim($_POST['correo']);
    $contra = trim($_POST['contra']);
    $confirma = trim($_POST['confirma']);

    // Validar el correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red; text-align: center;'>Correo electrónico inválido.</p>";
        exit;
    }

    // Validar que las contraseñas coincidan
    if ($contra !== $confirma) {
        echo "<p style='color: red; text-align: center;'>Las contraseñas no coinciden.</p>";
        exit;
    }

    // Hashear la nueva contraseña
    $hashedPassword = password_hash($contra, PASSWORD_DEFAULT);

    // Verificar si el correo existe en la base de datos
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Actualizar la contraseña en la base de datos
        $update = $conn->prepare("UPDATE usuarios SET password = ?, reset_token = NULL, reset_expiration = NULL WHERE correo = ?");
        $update->bind_param("ss", $hashedPassword, $correo);
        $update->execute();

        if ($update->affected_rows > 0) {
            // Mostrar mensaje de éxito
            echo "<p style='color: green; text-align: center;'>Contraseña cambiada correctamente. Redirigiendo al login...</p>";

            // Enviar correo de confirmación
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'nicoleobregon198@gmail.com';
                $mail->Password = 'wlwj zmui oukh ukms';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('nicoleobregon198@gmail.com', 'Casa Natura');
                $mail->addAddress($correo);
                $mail->isHTML(true);
                $mail->Subject = 'Confirmación de cambio de contraseña - Casa Natura';
                $mail->Body = "
                    <p>Hola,</p>
                    <p>Tu contraseña ha sido cambiada correctamente.</p>
                    <p>Si no realizaste este cambio, por favor contáctanos inmediatamente.</p>
                ";

                $mail->send();
            } catch (Exception $e) {
                echo "<p style='color: red; text-align: center;'>Error al enviar el correo: {$mail->ErrorInfo}</p>";
            }

            // Redirigir al login después de 3 segundos
            header("refresh:3;url=login.php");
            exit;
        } else {
            echo "<p style='color: red; text-align: center;'>Error al actualizar la contraseña.</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>El correo no está registrado.</p>";
    }

    $stmt->close();
    $update->close();
}

$conn->close();
?>


</body>
</html>
