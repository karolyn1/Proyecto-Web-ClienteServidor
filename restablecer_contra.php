<?php
// Inicia el buffer de salida para evitar errores de encabezados
ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Restablecer Contraseña</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
        .form-restablecer-contra {
            background-color: white;
            width: 100%;
            max-width: 550px;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .form-restablecer-contra h1 {
            color: #FFC107;
            margin-bottom: 15px;
            font-size: 32px; 
        }
        .form-restablecer-contra h2 {
            color: #333;
            margin-bottom: 25px;
            font-size: 20px;
            font-weight: normal;
        }
        .form-restablecer-contra button {
            width: 100%;
            padding: 12px; 
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #FFC107;
            color: white;
        }
        .form-restablecer-contra button:hover {
            background-color: #FFA000;
        }
    </style>
</head>
<body>
<nav>
    <?php 
        include("fragmentos.php");
        echo $navbar;        
    ?>
</nav>
<main>
    <div class="container mt-5">
        <div class="form-restablecer-contra">
            <h1>Restablecer Contraseña</h1>
            <h2>Ingresa y confirma tu nueva contraseña</h2>
            <form action="" method="POST">
                <input type="password" name="nueva_contra" placeholder="Nueva contraseña (mínimo 8 caracteres)" minlength="8" required>
                <input type="password" name="confirmar_contra" placeholder="Confirmar contraseña" minlength="8" required>
                <button type="submit" name="restablecer">Restablecer</button>
            </form>
            <?php
            if (!empty($mensaje)) {
                echo "<p style='color: red; text-align: center;'>$mensaje</p>";
            }
            ?>
        </div>
    </div>
</main>
<div class="footer">
    <?php 
        echo $footer;
    ?>
</div>

<?php
include("actions/conexion.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['restablecer'])) {
        $nueva_contra = trim($_POST['nueva_contra']);
        $confirmar_contra = trim($_POST['confirmar_contra']);

        // Validar que las contraseñas coincidan
        if ($nueva_contra !== $confirmar_contra) {
            $mensaje = "Las contraseñas no coinciden. Inténtalo de nuevo.";
        } elseif (strlen($nueva_contra) < 8) {
            // Validar la longitud mínima de la contraseña
            $mensaje = "La contraseña debe tener al menos 8 caracteres.";
        } else {
            // Encriptar la contraseña
            $hash_contra = password_hash($nueva_contra, PASSWORD_DEFAULT);
            
            // Validar que el correo esté presente en la URL
            if (!isset($_GET['correo'])) {
                die("El correo no está presente en la URL.");
            }
            $correo = $_GET['correo'];

            // Preparar la consulta para actualizar la contraseña
            $stmt = $conn->prepare("UPDATE usuario SET Password = ? WHERE Correo = ?");
            $stmt->bind_param("ss", $hash_contra, $correo);

            if ($stmt->execute()) {
                ob_end_clean(); // Limpiar el buffer antes de redirigir
                header("Location: http://localhost/Proyecto-Web-ClienteServidor/login.php");
                exit;
            } else {
                $mensaje = "Error al restablecer la contraseña. Por favor, inténtalo más tarde.";
            }

            $stmt->close();
        }
    }
}
$conn->close();

// Finalizar el buffer si no se redirige
ob_end_flush();
?>
</body>
</html>
