<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Eventos</title>
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

    <div class="container">
        <h1 class="eventos-title">Eventos Disponibles</h1>
        <p class="eventos-subtitle">Únete a nuestras actividades y eventos exclusivos. Cada evento está diseñado para ofrecerte una experiencia única y enriquecedora.</p>

        <h3 class="eventos-list-title">Lista de Eventos Disponibles</h3>

        <!-- Grid de eventos -->
        <div class="animal-grid">
            <!-- Ejemplo de tarjeta de evento 1 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Evento+1" alt="Imagen del Evento 1">
                <a href="evento.php?id=1">Evento 1</a>
                <p>Descripción breve del Evento 1.</p>
            </div>

            <!-- Ejemplo de tarjeta de evento 2 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Evento+2" alt="Imagen del Evento 2">
                <a href="evento.php?id=2">Evento 2</a>
                <p>Descripción breve del Evento 2.</p>
            </div>

            <!-- Ejemplo de tarjeta de evento 3 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Evento+3" alt="Imagen del Evento 3">
                <a href="evento.php?id=3">Evento 3</a>
                <p>Descripción breve del Evento 3.</p>
            </div>

            <!-- Ejemplo de tarjeta de evento 4 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Evento+4" alt="Imagen del Evento 4">
                <a href="evento.php?id=4">Evento 4</a>
                <p>Descripción breve del Evento 4.</p>
            </div>

            <!-- Ejemplo de tarjeta de evento 5 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Evento+5" alt="Imagen del Evento 5">
                <a href="evento.php?id=5">Evento 5</a>
                <p>Descripción breve del Evento 5.</p>
            </div>
        </div>
    </div>

    <footer>
        <?php
         include("fragmentos.php");
         echo $footer;
         ?>
    </footer>
</body>

</html>
