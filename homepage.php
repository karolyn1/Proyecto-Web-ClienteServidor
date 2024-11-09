<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CasaNatura - Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            
        }

        
        .text-container {
            text-align: left;
            width: 50%;
            margin-left: 40px;
        }

        .title {
            font-weight: bold;
            font-size: 50px;
            text-align: left;
            color: #062D3E;
        }

        .welcome-text {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            font-size: 18px;
            margin-top: 10px;
        }

        .about-btn {
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 30px;
            color: white;
            background-color: #FBBC05;
            border: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .about-btn:hover {
            background-color: white;
            color: #FBBC05;
        }

        .image-container {
            float: left;
            width: 40%;
        }

        img {
            width: 100%;
            height: auto;
        }

        .family-title {
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bold;
            font-size: 36px;
            text-align: center;
            margin-top: 40px;
            color: #062D3E;
        }

        h2 {
            margin-bottom: 40px;

        }

        /* Contenedor del carrusel */
        #animalCarousel {
            width: 80%;
            max-width: 900px;
        }

        .carousel {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .carousel-inner {
            display: flex;
            align-items: center;

        }



        .carousel-content {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Estilo de la imagen en el carrusel */
        .image-container {
            width: 50%;
            margin-right: 20px;

        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px 0 0 8px;
        }

        /* Contenedor de texto del carrusel */
        .text-container-carousel {
            padding: 20px;
            width: 50%;
            text-align: left;
        }

        .text-container-carousel h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .text-container-carousel p {
            color: #555;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .cta-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #062D3E;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cta-btn:hover {
            background-color: #e0a800;
        }

        /* Estilos de navegación del carrusel */
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            padding: 10px;
        }

        .bottom-section {
            display: flex;

            justify-content: center;

            align-items: flex-end;

            margin: 60px 0;

        }

        .left-image {
            width: 50%;
            padding: 0;

        }

        .img-fluid {
            width: 100%;
            height: auto;
        }

        .right-box {
            width: 54%;
            background-color: #062D3E;
            color: white;
            padding: 99px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-left: -20px;
        }

        /* Enlace en el cuadro */
        .right-box a {
            color: white;
            text-decoration: none;
            font-size: 24px;
            font-family: 'Open Sans', sans-serif;
            display: inline-block;
            margin: 0;
            transition: color 0.3s;
        }

        .right-box a:hover {
            color: #FBBC05;
        }

        .right-box .arrow {
            margin-left: 10px;
            vertical-align: middle;
        }

    </style>
</head>

<body>

    
        <?php 
        include("fragmentos.php");
        echo $navbar;        
        ?>
    

    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-container">
            <h1 class="title">SE PARTE DE <br> NUESTRA FAMILIA</h1>
            <p class="welcome-text">
            ¡Bienvenido a Casa Natura! Aquí puedes marcar la diferencia en la vida de los animales que más lo necesitan. Nuestra misión es conectar corazones con causas nobles, facilitando el patrocinio de animales rescatados. 
            Te invitamos a conocer más de nosotros, y ¿por qué no formar parte de nuestra comunidad?
            </p>
            <button class="about-btn">Acerca de Nosotros</button>
        </div>

        <div class="image-container">
            <img src="imagenes/img1.png" alt="Descripción de la imagen" class="img-fluid">
        </div>
    </div>

    <h2 class="family-title">CONOCÉ A NUESTRA FAMILIA</h2>

    <!-- Carrusel -->
    <div class="d-flex justify-content-center mb-5"> <!-- Flexbox para centrar el carrusel -->
        <div id="animalCarousel" class="carousel slide" data-bs-interval="false">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-content">
                        <div class="image-container">
                            <img src="imagenes/img2.png" alt="Simba" class="img-fluid">
                        </div>
                        <div class="text-container-carousel">
                            <h3>SIMBA - LEON AFRICANO</h3>
                            <p>Este majestuoso león fue rescatado de condiciones difíciles y ahora se encuentra estable.
                                A pesar de su pasado, Simba es un león cariñoso y juguetón que adora la atención de sus
                                cuidadores. Con tu apoyo, podemos ofrecerle la atención y el entorno adecuados para que
                                se recupere y viva una vida digna y feliz.</p>
                            <a href="#" class="cta-btn">Ver más</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="carousel-content">
                        <div class="image-container">
                            <img src="imagenes/img4.png" alt="Luna" class="img-fluid">
                        </div>
                        <div class="text-container-carousel">
                            <h3>LUNA - JAGUAR</h3>
                            <p>Este es nuestro jaguar rescatado, un símbolo de la selva que fue salvado de una situación
                                crítica. Ahora, bajo cuidado y protección, se está recuperando. Con tu ayuda, podemos
                                asegurar que reciba el alimento y los cuidados médicos necesarios para que algún día
                                pueda volver a su hábitat natural y vivir en libertad.</p>
                            <a href="#" class="cta-btn">Ver más</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="carousel-content">
                        <div class="image-container">
                            <img src="imagenes/img5.png" alt="Rocky" class="img-fluid">
                        </div>
                        <div class="text-container-carousel">
                            <h3>ROCKY - OSO RESCATADO</h3>
                            <p>Rocky fue rescatado de una situación crítica y ahora se recupera en un refugio. Necesita
                                medicamentos para su recuperación, y con tu apoyo, podemos garantizar que reciba la
                                atención necesaria para su bienestar.</p>
                            <a href="#" class="cta-btn">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de navegación -->
            <button class="carousel-control-prev" type="button" data-bs-target="#animalCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#animalCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Sección inferior -->
    <div class="bottom-section">
        <div class="left-image">
            <img src="imagenes/img3.png" alt="Descripción de la imagen" class="img-fluid">
        </div>
        <div class="right-box">
            <a href="#">
                ¿Deseas conocer más <br> acerca de <br> nuestro refugio?
                <span class="arrow">→</span>
            </a>
        </div>
    </div>

    <?php 
    include("fragmentos.php");
    echo $footer;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>