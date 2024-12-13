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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav>
        <?php
            include("fragmentos.php");
            echo $navbar;
        ?>
    </nav>

    <?php
       // Incluir archivo de conexión a la base de datos
    include("actions/conexion.php");

        // Obtener el ID del tour desde la URL
        $id_tour = isset($_GET['id']) ? intval($_GET['id']) : 1; // Por defecto, ID = 1

        // Consulta para obtener los detalles del tour
        $sql = "SELECT nombre, descripcion, fecha, hora, precio_boleto, tickets_disponibles, imagen 
                FROM tours WHERE id = ?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_tour);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nombre, $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles, $imagen);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
    ?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x500.png?text=Imagen+del+Tour" alt="Imagen del Tour" class="img-fluid">
            </div>

            <div class="container-tour-detalle col-md-6">
                <h1><?php echo htmlspecialchars($nombre); ?></h1>
                <p class="text-muted"><?php echo htmlspecialchars($descripcion); ?></p>
                
                <p><strong>Fecha:</strong> <?php echo htmlspecialchars($fecha); ?></p>
                <p><strong>Hora:</strong> <?php echo htmlspecialchars($hora); ?></p>
                <p><strong>Costo:</strong> $<?php echo htmlspecialchars($precio_boleto); ?> USD por persona</p>
                <p><strong>Tickets Disponibles:</strong> <?php echo htmlspecialchars($tickets_disponibles); ?></p>

                <a href="reservarTour.php?id=<?php echo $id_tour; ?>" class="btn btn-primary">Reservar Tour</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <h3>Información Adicional</h3>
                <ul class="text-justify">
                    <li>Recomendamos llevar ropa cómoda y repelente de insectos.</li>
                    <li>El tour incluye guías especializados en biodiversidad y ecología.</li>
                    <li>Opcional: Se pueden realizar paradas para fotografías y observación.</li>
                </ul>
            </div>
        </div>
    </div>
    </main>
    <footer class="mt-5">
        <?php
            include("fragmentos.php");
            echo $footer;
        ?>
    </footer>
</body>

</html>
