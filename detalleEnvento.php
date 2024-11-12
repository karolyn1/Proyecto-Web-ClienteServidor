<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Detalle del Evento</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav>
        <?php
            include("fragmentos.php");
            echo $navbar;
        ?>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x500.png?text=Imagen+del+Evento" alt="Imagen del Evento" class="img-fluid">
            </div>

            <div class="col-md-6">
                <h1>Evento de Conciencia Ambiental</h1>
                <p class="text-muted">Únete a nuestro evento para aprender sobre sostenibilidad y prácticas amigables con el medio ambiente.</p>
                
                <p><strong>Fecha:</strong> 15 de Diciembre, 2024</p>
                <p><strong>Costo:</strong> $30 USD por persona</p>
                <p><strong>Hora:</strong> 10:00 AM - 4:00 PM</p>
                
                <h3>Descripción del Evento</h3>
                <p>
                    Este evento de un día completo incluirá talleres sobre prácticas sostenibles, conferencias de expertos y actividades para toda la familia.
                </p>

                <a href="reservar_evento.php?id=1" class="btn btn-primary">Reservar Evento</a>
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
</body>

</html>
