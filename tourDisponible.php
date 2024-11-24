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
        <h1 class="animales-apadrinar-title">Tours Disponibles</h1>
        <p class="animales-apadrinar-subtitle">Explora la belleza natural y la biodiversidad de nuestro entorno con nuestros tours guiados. Cada tour te ofrece una experiencia única y memorable.</p>

        <h3 class="animales-apadrinar-list-title">Lista de Tours Disponibles</h3>

        <div class="animal-grid">
            <?php
            // Incluir archivo de conexión a la base de datos
            include("actions/conexion.php");

            // Consultar tours disponibles
            $sql = "SELECT id, nombre, descripcion, imagen FROM tours WHERE disponible = 1";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                // Mostrar cada tour en una tarjeta
                while ($tour = $resultado->fetch_assoc()) {
                    echo '<div class="animal-card">';
                    echo '<img src="ruta_a_imagenes/' . htmlspecialchars($tour['imagen']) . '" alt="Imagen del ' . htmlspecialchars($tour['nombre']) . '">';
                    echo '<a href="tour.php?id=' . $tour['id'] . '">' . htmlspecialchars($tour['nombre']) . '</a>';
                    echo '<p>' . htmlspecialchars($tour['descripcion']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>No hay tours disponibles en este momento.</p>";
            }

            $conexion->close();
            ?>
        </div>
    </div>
</main>
    <footer>
        <?php
         include("fragmentos.php");
         echo $footer;
         ?>
    </footer>
</body>

</html>
