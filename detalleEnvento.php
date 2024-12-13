<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Detalle del Evento</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <nav>
        <?php
            include("fragmentos.php");
            echo $navbar;
        ?>
    </nav>

    <?php
    // Conexión a la base de datos
    include('actions/conexion.php');

    // Obtener el ID del evento desde la URL
    $id_evento = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // Consulta para obtener los detalles del evento
    if ($id_evento > 0) {
        // Prepara la consulta para evitar inyecciones SQL
        $sql = "SELECT descripcion, fecha, hora, lugar, costo FROM evento WHERE id = ?";
        
        if ($stmt = $conexion->prepare($sql)) {
            // Vincula el parámetro (s = string, i = integer)
            $stmt->bind_param("i", $id_evento);

            // Ejecuta la consulta
            $stmt->execute();

            // Obtiene el resultado
            $stmt->store_result();
            $stmt->bind_result($descripcion, $fecha, $hora, $lugar, $costo);

            // Verifica si se encontró el evento
            if ($stmt->num_rows > 0) {
                // Extrae los datos
                $stmt->fetch();
            } else {
                echo "<div class='container mt-5'><h1>Evento no encontrado.</h1></div>";
                exit;
            }

            // Cierra la declaración
            $stmt->close();
        }
    } else {
        echo "<div class='container mt-5'><h1>ID de evento inválido.</h1></div>";
        exit;
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x500.png?text=Imagen+del+Evento" alt="Imagen del Evento" class="img-fluid rounded">
            </div>

            <div class="col-md-6">
                <h1>Detalle del Evento</h1>
                <p class="text-muted"><?php echo htmlspecialchars($descripcion); ?></p>

                <p><strong>Fecha:</strong> <?php echo htmlspecialchars($fecha); ?></p>
                <p><strong>Costo:</strong> $<?php echo number_format(htmlspecialchars($costo), 2); ?> USD por persona</p>
                <p><strong>Hora:</strong> <?php echo htmlspecialchars($hora); ?></p>
                <p><strong>Lugar:</strong> <?php echo htmlspecialchars($lugar); ?></p>

                <a href="reservar_evento.php?id=<?php echo $id_evento; ?>" class="btn btn-primary">Reservar Evento</a>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col">
                <h3>Información Adicional</h3>
                <ul>
                    <li>Recomendamos llevar ropa cómoda y una botella de agua reutilizable.</li>
                    <li>El evento incluye materiales educativos y una pequeña merienda.</li>
                    <li>Opcional: Participación en una actividad de plantación de árboles.</li>
                </ul>
            </div>
        </div>
    </div>

    <footer class="mt-5">
        <?php
            include("fragmentos.php");
            echo $footer;
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>