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
            <h2>Ingresa tu correo electrónico para validar</h2>
            <form action="" method="POST" onsubmit="showLoading()">
                <input type="email" name="correo" placeholder="Correo electrónico" required>

                <div style="display: flex; justify-content: space-between;">
                    <button type="button" class="cancel-button" onclick="window.location.href='login.php'">Cancelar</button>
                    <button type="submit" name="enviar" class="submit-button">Validar Correo</button>
                </div>
            
            </form>
            <?php
            // Mostrar el mensaje si el correo no existe
            if (!empty($mensaje)) {
                echo $mensaje;
            }
            ?>
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

if (isset($_POST['enviar'])) {
    $correo = trim($_POST['correo']);

    // Validar el formato del correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red; text-align: center;'>Correo electrónico inválido.</p>";
        exit;
    }

    // Verificar si el correo existe en la base de datos
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Redirigir a restablecer_contra.php si el correo existe
        header("Location: restablecer_contra.php?correo=" . urlencode($correo));
        exit;
    } else {
        echo "<p style='color: red; text-align: center;'>El correo no está registrado.</p>";
    }

    $stmt->close();
    $conn->close();
}
?>


</body>
</html>
