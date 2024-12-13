<?php
echo "Directorio actual: " . realpath(".") . "<br>";
echo "Intentando incluir: " . realpath("../actions/conexion.php") . "<br>";

if (!file_exists("actions/conexion.php")) {
    die("Error: No se encuentra '../actions/conexion.php'.");
}

include("actions/conexion.php");
?>

<?php
    include("actions/conexion.php");  // Incluye el archivo de conexión correctamente

    // Consulta para tours disponibles
    $sql = "SELECT id, nombre, descripcion, imagen FROM tours WHERE disponible = 1";
    $resultado = $conn->query($sql);

    if (!$resultado) {
        die("Error en la consulta: " . $conn->error); // Maneja errores en la consulta
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link rel="stylesheet" href="./css/style.css">
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
            <p class="animales-apadrinar-subtitle">
                Explora la belleza natural y la biodiversidad de nuestro entorno con nuestros tours guiados. Cada tour te ofrece una experiencia única y memorable.
            </p>
            <h3 class="animales-apadrinar-list-title">Lista de Tours Disponibles</h3>
            <div class="animal-grid">
                <?php
                if ($resultado->num_rows > 0) {
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
                $conn->close(); // Cerrar la conexión al final
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