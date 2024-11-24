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

        <!-- Grid de tours -->
        <div class="animal-grid">
            <!-- Ejemplo de tarjeta de tour 1 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Tour+1" alt="Imagen del Tour 1">
                <a href="tour.php?id=1">Tour 1</a>
                <p>Descripción breve del Tour 1.</p>
            </div>

            <!-- Ejemplo de tarjeta de tour 2 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Tour+2" alt="Imagen del Tour 2">
                <a href="tour.php?id=2">Tour 2</a>
                <p>Descripción breve del Tour 2.</p>
            </div>

            <!-- Ejemplo de tarjeta de tour 3 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Tour+3" alt="Imagen del Tour 3">
                <a href="tour.php?id=3">Tour 3</a>
                <p>Descripción breve del Tour 3.</p>
            </div>

            <!-- Ejemplo de tarjeta de tour 4 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Tour+4" alt="Imagen del Tour 4">
                <a href="tour.php?id=4">Tour 4</a>
                <p>Descripción breve del Tour 4.</p>
            </div>

            <!-- Ejemplo de tarjeta de tour 5 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Tour+5" alt="Imagen del Tour 5">
                <a href="tour.php?id=5">Tour 5</a>
                <p>Descripción breve del Tour 5.</p>
            </div>
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
