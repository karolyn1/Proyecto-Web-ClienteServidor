<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Quiénes Somos? - CasaNatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Estilos generales */
        body {
            font-family: 'Open Sans', sans-serif;
        }

        /* Logo */
        .logo {
            font-family: 'Paytone One', sans-serif;
            font-size: 60px;
            color: #062D3E;
        }

        .logo span {
            color: #FBBC05;
        }

        /* Estilos del banner */
        .banner-container {
            margin-top: 30px;
            text-align: center;
        }

        .banner-img {
            width: 80%;
            height: 350px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }

        .banner-title {
            background-color: white;
            color: #062D3E;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            font-size: 40px;
            max-width: 80%;
            margin: 0 auto;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            /* Alinea con la imagen */
        }

        /* Estilos de la sección de contenido */
        .container h3 {
            color: #FBBC05;
            font-weight: bold;
        }

        .container p {
            color: #333;
            line-height: 1.6;
        }

        /* Estilos de los links */
        .section-link {
            color: #0000FF;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            text-align: center;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .section-link:hover {
            color: #FBBC05;
            transform: scale(1.1);
        }

        /* Centrar links */
        .link-container {
            display: flex;
            justify-content: center;
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
        <img src="imagenes/img10.jpg" alt="Banner Animales" class="banner-img">
        <div class="banner-title">¿Quiénes Somos?</div>
    </div>

    <!-- Sección de contenido de ¿Quiénes Somos? -->
    <div class="container my-5">
        <p class="text-center">En <strong>CasaNatura</strong>, nos dedicamos a apoyar y proteger a los animales que
            necesitan un hogar y cuidados especiales. Nuestro objetivo es crear una comunidad de patrocinadores y
            voluntarios que, junto a nosotros, puedan contribuir al bienestar de cada animal en nuestro refugio.</p>

        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <h3>¿Qué Hacemos?</h3>
                <p>Ofrecemos la oportunidad de apadrinar un animal, lo cual permite cubrir sus gastos de alimentación,
                    cuidado médico, y bienestar general. Cada patrocinio ayuda a mejorar la calidad de vida de estos
                    animales y les da una segunda oportunidad.</p>
                <div class="link-container">
                    <a href="#" class="section-link">Contáctenos</a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <h3>¿Cómo Puedes Donar?</h3>
                <p>Puedes realizar donaciones únicas o mensuales que se destinarán a la manutención de los animales y al
                    mantenimiento de nuestras instalaciones. Aceptamos donaciones de dinero, alimentos, medicinas, y
                    juguetes para los animales.</p>
                <div class="link-container">
                    <a href="#" class="section-link">Ver apartado de Donaciones</a>
                </div>
            </div>
            <div class="col-md-4 text-center">
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