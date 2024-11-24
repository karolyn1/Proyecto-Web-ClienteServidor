<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donacioens</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <style>
        .container {
            margin: 40px auto;
            max-width: 1200px;
            padding: 20px;
        }

    </style>
</head>

<body>

    <?php
    include("fragmentos.php");
    echo $navbar;
    ?>

    <!-- Banner con título -->
    <div class="banner-container">
        <img src="imagenes/cabritas.jpg" alt="Banner Animales" class="banner-img">
        <div class="banner-title">¿Quiénes Somos?</div>
    </div>

    <!-- Sección de contenido de ¿Quiénes Somos? -->
    <div class="container">
        <p class="texto-quienessomos-principal text-center">En <b>Casa</b><strong>Natura</strong>, nos dedicamos a apoyar y
            proteger a
            los animales que
            necesitan un hogar y cuidados especiales. Nuestro objetivo es crear una comunidad de patrocinadores y
            voluntarios que, junto a nosotros, puedan contribuir al bienestar de cada animal en nuestro refugio.</p>

        <div class="texto-quienessomos row mt-5 mb-5">
            <div class=" col-md-3 text-center">
                <h3>¿Qué Hacemos?</h3>
                <p>Ofrecemos la oportunidad de apadrinar un animal, lo cual permite cubrir sus gastos de alimentación,
                    cuidado médico, y bienestar general. Cada patrocinio ayuda a mejorar la calidad de vida de estos
                    animales y les da una segunda oportunidad.</p>
                <div class="link-container">
                    <a href="#" class="section-link">Contáctenos</a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <h3>¿Cómo Puedes Donar?</h3>
                <p>Puedes realizar donaciones únicas o mensuales que se destinarán a la manutención de los animales y al
                    mantenimiento de nuestras instalaciones. Aceptamos donaciones de dinero, alimentos, medicinas, y
                    juguetes para los animales.</p>
                <div class="link-container">
                    <a href="#" class="section-link">Ver apartado de Donaciones</a>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <h3>Tours y Visitas</h3>
                <p>Ofrecemos tours guiados en el refugio para que puedas conocer a los animales y ver el impacto de tu
                    apoyo. Los fondos recaudados en cada tour se destinan a cubrir las necesidades del refugio.</p>
                <div class="link-container">
                    <a href="#" class="section-link">Ver apartado de Tours</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("fragmentos.php");
    echo $footer;
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>