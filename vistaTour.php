<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Detalle del Tour</title>
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
                <img src="https://via.placeholder.com/500x500.png?text=Imagen+del+Tour" alt="Imagen del Tour" class="img-fluid">
            </div>

            <div class="col-md-6">
                <h1>Tour por la Selva Tropical</h1>
                <p class="text-muted">Explora la diversidad de la selva tropical y conoce más sobre la flora y fauna en este tour guiado.</p>
                
                <p><strong>Duración:</strong> 3 horas</p>
                <p><strong>Costo:</strong> $50 USD por persona</p>
                <p><strong>Disponibilidad:</strong> Lunes a Sábado, 9:00 AM - 5:00 PM</p>
                
                <h3>Descripción del Tour</h3>
                <p>
                    Este tour por la selva tropical te llevará a través de un ecosistema rico en biodiversidad. Podrás observar diferentes especies de plantas y animales, aprender sobre la ecología de la región y disfrutar de la belleza natural que solo la selva puede ofrecer.
                </p>

                <a href="reservar.php?id=1" class="btn btn-primary">Reservar Tour</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <h3>Información Adicional</h3>
                <ul>
                    <li>Recomendamos llevar ropa cómoda y repelente de insectos.</li>
                    <li>El tour incluye guías especializados en biodiversidad y ecología.</li>
                    <li>Opcional: Se pueden realizar paradas para fotografías y observación.</li>
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
