<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donacioens</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

    <body>
        <nav>
            <?php
                include("fragmentos.php");
                echo $navbar;
            ?>
        </nav>
<main>
    <div class="container">
        <h1 class="animales-apadrinar-title">Animales Disponibles para Apadrinar</h1>
        <p class="animales-apadrinar-subtitle">Apadrinar un animal es una forma maravillosa de apoyar a los seres más vulnerables, ayudándolos a obtener cuidado, alimentación y atención médica que necesitan.</p>

        <h3 class="animales-apadrinar-list-title">Lista de Animales Disponibles</h3>

        
        <!--     Grid de animales con BD 
             
            <div class="animal-grid"> --> 
            <?php

            /*
                //Conectar a la base de datos 
                //$conexion = new mysqli("localhost", "usuario", "contraseña", "base_datos");

                // Verificar conexión
                 if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                // Consultar animales disponibles
                $sql = "SELECT id, nombre, foto FROM animales WHERE disponible = 1";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    // Mostrar cada animal en una tarjeta
                    while ($animal = $resultado->fetch_assoc()) {
                        echo '<div class="animal-card">';
                        echo '<img src="ruta_a_imagenes/' . $animal['foto'] . '" alt="Foto de ' . htmlspecialchars($animal['nombre']) . '">';
                        echo '<a href="animal.php?id=' . $animal['id'] . '">' . htmlspecialchars($animal['nombre']) . '</a>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No hay animales disponibles para apadrinar en este momento.</p>";
                }

                $conexion->close();

            */
                ?>
            <!-- </div>
            </div>
            Final de vista con conexion a BD --> 
  

        <!-- Grid de animales -->
        <div class="animal-grid">
            <!-- Ejemplo de tarjeta de animal 1 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+1" alt="Foto de Animal 1">
                <a href="vistaDetalleAnimal.php">Animal 1</a>
            </div>

            <!-- Ejemplo de tarjeta de animal 2 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+2" alt="Foto de Animal 2">
                <a href="animal.php?id=2">Animal 2</a>
            </div>

            <!-- Ejemplo de tarjeta de animal 3 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+3" alt="Foto de Animal 3">
                <a href="animal.php?id=3">Animal 3</a>
            </div>

            <!-- Ejemplo de tarjeta de animal 4 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+4" alt="Foto de Animal 4">
                <a href="animal.php?id=4">Animal 4</a>
            </div>

            <!-- Ejemplo de tarjeta de animal 5 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+5" alt="Foto de Animal 5">
                <a href="animal.php?id=5">Animal 5</a>
            </div>
        </div>
    </div>
</main>
    <footer>
        <?php
         include "fragmentos.php";
         echo $footer;
         ?>
    </footer>
</body>

</html>