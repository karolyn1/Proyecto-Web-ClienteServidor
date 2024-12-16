<?php
// Verificar si el archivo existe
if (!file_exists("actions/conexion.php")) {
    die("Error: No se encuentra 'actions/conexion.php'.");
}

// Incluir el archivo de conexión
include("actions/conexion.php");
?>

<?php
    // Verificar que la conexión existe antes de continuar
    if (!isset($conn) || $conn->connect_error) {
        die("Error: No se pudo establecer la conexión a la base de datos.");
    }

    // Consulta para tours
    $sql = "SELECT id_tour, descripcion, imagen FROM tours"; // Corrección aquí
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
    <title>Casa Natura - Tours</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <nav>
        <?php
            // Incluir fragmentos de navegación
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
                        
                        // Verificar si el campo 'imagen' contiene un valor
                        $imagen = htmlspecialchars($tour['imagen']);
                        
                        // Verificar si la imagen existe en la carpeta 'imagenes'
                        if (!empty($imagen) && file_exists('imagenes/' . $imagen)) {
                            echo '<img src="imagenes/' . $imagen . '" alt="Imagen del tour">';
                        } else {
                            // Si no existe la imagen, usar una imagen por defecto
                            echo '<img src="imagenes/default.jpg" alt="Imagen no disponible">';
                        }

                        echo '<a href="tour.php?id=' . htmlspecialchars($tour['id_tour']) . '">Ver detalles del tour</a>';
                        echo '<p>' . htmlspecialchars($tour['descripcion']) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No hay tours disponibles en este momento.</p>";
                }

                // Cerrar la conexión al final
                $conn->close();
                ?>
            </div>
        </div>
    </main>
    <footer>
        <?php
        // Incluir fragmentos de pie de página
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>
</body>
</html>