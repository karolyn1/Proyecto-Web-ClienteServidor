<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Animales</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
    include('fragmentos.php');
    echo $navbar;
    ?>
    <main>
        <div class="dashboard-container">
            <?php
            include('fragmentos.php');
            echo $sidebar;
            ?>
            <div class="main-content-perfil">
                <div class="card-container">
                    <!-- Mensaje de que no existen animales -->
                    <div class="card">
                        <h2>Animales</h2>
                        <p>No existen animales todavía. ¡Explora nuestra lista de animales disponibles para apadrinar!</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
    include("fragmentos.php");
    echo $footer;
    ?>
</body>
</html>
