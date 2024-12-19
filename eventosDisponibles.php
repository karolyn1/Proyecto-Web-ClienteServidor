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

    // Consulta para eventos disponibles
    $sql = "SELECT ID_Evento, Nombre, Descripcion, Imagen FROM eventos WHERE Estado = 1"; // Asegúrate de que la tabla se llama 'eventos'
    $resultado = $conn->query($sql);

    if (!$resultado) {
        die("Error en la consulta: " . $conn->error); // Maneja errores en la consulta
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Eventos Disponibles</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
            <h1 class="animales-apadrinar-title">Eventos Disponibles</h1>
            <p class="animales-apadrinar-subtitle">
                Únete a nuestras actividades y eventos exclusivos. Cada evento está diseñado para ofrecerte una experiencia única y enriquecedora.
            </p>

            <h3 class="animales-apadrinar-list-title">Lista de Eventos Disponibles</h3>

            <div class="animal-grid">
                <?php
                if ($resultado->num_rows > 0) {
                    while ($evento = $resultado->fetch_assoc()) {
                        echo '<div class="animal-card">';
                        
                        // Verificar si el campo 'imagen' contiene un valor
                        $imagen = htmlspecialchars($evento['Imagen']);
                        
                        // Verificar si la imagen existe en la carpeta 'imagenes'
                        if (!empty($imagen) && file_exists('imagenes/' . $imagen)) {
                            echo '<img src="imagenes/' . $imagen . '" alt="Imagen del evento" class="imagen-tour">';
                        } else {
                            // Si no existe la imagen, usar una imagen por defecto
                            echo '<img src="imagenes/default.jpg" alt="Imagen no disponible">';
                        }

                        echo '<a href="evento.php?id=' . htmlspecialchars($evento['ID_Evento']) . '">Ver detalles del evento</a>';
                        echo '<p>' . htmlspecialchars($evento['Descripcion']) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No hay eventos disponibles en este momento.</p>";
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

