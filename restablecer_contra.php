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
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: #FFC107;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
        <h1>Restablecer Contraseña</h1>
        <p>Ingresa tu nueva contraseña</p>
        <form action="" method="POST">
            <input type="password" name="nueva_contra" placeholder="Nueva contraseña" required>
            <input type="password" name="confirmar_contra" placeholder="Confirma tu contraseña" required>

            <button type="submit" name="cambiar">Restablecer Contraseña</button>
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

// Validar que el parámetro 'correo' existe
if (!isset($_GET['correo'])) {
    echo "<p style='color: red; text-align: center;'>Acceso no autorizado.</p>";
    exit;
}

$correo = urldecode($_GET['correo']); 

if (isset($_POST['cambiar'])) {
    $nueva_contra = trim($_POST['nueva_contra']);
    $confirmar_contra = trim($_POST['confirmar_contra']);

    
    if ($nueva_contra !== $confirmar_contra) {
        echo "<p style='color: red; text-align: center;'>Las contraseñas no coinciden.</p>";
    } else {
        
        $hashedPassword = password_hash($nueva_contra, PASSWORD_DEFAULT);

        
        $stmt = $conn->prepare("UPDATE usuarios SET password = ? WHERE correo = ?");
        $stmt->bind_param("ss", $hashedPassword, $correo);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'nicoleobregon198@gmail.com'; // Tu correo de envío
                $mail->Password = 'wlwj zmui oukh ukms'; // Contraseña de aplicación
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('nicoleobregon198@gmail.com', 'Casa Natura');
                $mail->addAddress($correo);
                $mail->isHTML(true);
                $mail->Subject = 'Confirmación de Cambio de Contraseña - Casa Natura';
                $mail->Body = "
                    <p>Hola,</p>
                    <p>Tu contraseña ha sido restablecida correctamente.</p>
                    <p>Si no realizaste este cambio, por favor contáctanos de inmediato.</p>
                ";

                $mail->send();
                
                header("Location: login.php");
                exit;
            } catch (Exception $e) {
                echo "<p style='color: red; text-align: center;'>Error al enviar el correo: {$mail->ErrorInfo}</p>";
            }
        } else {
            echo "<p style='color: red; text-align: center;'>Error al actualizar la contraseña.</p>";
        }
        $stmt->close();
    }
}

$conn->close();
?>
</body>
</html>
