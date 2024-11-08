<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAnimal - Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
<?php
$navbar = '
    <nav class="navbar">
        <div class="logo">
            <img class="img" src="./imagenes/logo.png">
            <span>CASA<span class="highlight">NATURA</span></span>
        </div>
        <div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#donaciones">Donaciones</a></li>
            <li><a href="#apadrinar">Apadrinar</a></li>
            <li><a href="#tours">Tours</a></li>
            <li><a href="#eventos">Eventos</a></li>
            <li><a href="#contacto">Contacto</a></li>
            <li><a href="#nosotros">Nosotros</a></li>
        </ul>
    </div>
        <a href="#login" class="login-button">Iniciar Sesión</a>
        <button class="menu-toggle">☰</button>
   
    </nav>
';

$footer='
    <footer class="footer">
        <div class="footer-title">
            <h2 class="footer-title">
                <div class="logo">
                    <img class="img" src="./imagenes/logo.png">
                    <div>
                        <span style="color: #fff;">CASA</span>
                    <br>
                    <span class="highlight">NATURA</span>
                    </div>
                    
                    <img class="img" src="./imagenes/footer.png">
                </div>
            </h2>
        </div>
        <div class="footer-info">
            <div class="footer-links">
            <a href="#">Nosotros</a>
            <a href="#">Donar</a>
            <a href="#">Apadrinar</a>
            <a href="#">Eventos</a>
            <a href="#">Tours</a>
            <a href="#">Contáctanos</a>
        </div>
        <div class="row social-media">
            <div class="col social-icons">
                <a href="#"><img src="imagenes/face.png" alt="Facebook" /></a>
                <a href="#"><img src="imagenes/twitter.png" alt="Twitter" /></a>
                <a href="#"><img src="imagenes/instagram.webp" alt="Instagram" /></a>
            </div>
        </div>
    </div>
 
    </footer>
    ';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>