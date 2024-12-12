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
        
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            gap: 40px;
            max-width: 800px; 
            width: 100%;
            flex: 1;
        }


       
    </style>
</head>
<body>
    <?php 
    include("fragmentos.php");
    echo $navbar;
    ?>
<main>
    <div class="container">
        <div class="form-container">
            <h2>Registrarse</h2>
            <form method="POST" action="">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="primer_apellido" placeholder="Primer Apellido" required>
                <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" required>
                <input type="text" name="provincia" placeholder="Provincia" required>
                <input type="text" name="cantpn" placeholder="Cantón" required>
                <input type="text" name="distrito" placeholder="Distrito" required>
                <input type="text" name="direccion" placeholder="Dirección" required>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
                <label><input type="checkbox" name="voluntario"> ¿Quieres ser voluntario?</label>
                <button type="submit" name="registrar">Registrarse</button>
            </form>
        </div>
        
        <div class="image-container">
            <img src="imagenes/img1.png"" alt="Imagen descriptiva">
        </div>
    </div>
</main>
    <!-- <--
    include('conexion.php'); 

    if (isset($_POST['registrar'])) {
        $nombre = $_POST['nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $provincia = $_POST['provincia'];
        $cantpn = $_POST['cantpn'];
        $distrito = $_POST['distrito'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $voluntario = isset($_POST['voluntario']) ? 1 : 0;

        $hash_contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuario (nombre, primer_apellido, segundo_apellido, provincia, cantpn, distrito, direccion, correo, contraseña, voluntario) 
                  VALUES ('$nombre', '$primer_apellido', '$segundo_apellido', '$provincia', '$cantpn', '$distrito', '$direccion', '$correo', '$hash_contraseña', '$voluntario')";

        if (mysqli_query($conn, $query)) {
            header("Location: editarperfil.php");
            exit();
        } else {
            echo "<p style='color: red;'>Error al registrar. Intenta nuevamente.</p>";
        }
    }
  -->

    <footer>
        <?php 
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>
</body>
</html>
