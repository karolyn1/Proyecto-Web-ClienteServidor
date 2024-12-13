<?php
    session_start();
    include('./actions/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAnimal - Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
    include("fragmentos.php");
        echo $navbar;
    ?>

    <main>
    <div class="container-donacion">
        <div class="row">
            
            <div class="texto-section col">
            <h1>APOYA A CASA NATURA: TUS DONACIONES, NUESTRA FUERZA PARA EL BIENESTAR ANIMAL</h1>
            <p><span>Casa Natura</span> es un 
                refugio dedicado a proporcionar un hogar seguro y cuidado a animales necesitados. Tu apoyo permite que sigamos cumpliendo nuestra misión de cuidar y proteger a los animales, cubriendo necesidades esenciales como alimentación, atención 
                veterinaria y mantenimiento de las instalaciones.</p>
        </div>
        <div class="imagen-section col">
            <img src="./imagenes/donaciones1.jpeg">
        </div>
    </div>
    <br>
    <hr>
    
        
    <div class="container-comoFunciona">
        <header class="donacion">
            <h1>¿CUÁL ES EL PROCESO DE DONACIÓN?</h1>
            <p>¿Listo para traer a donar por una buena causa?</p>
        </header>
       
        <div class="pasos">
            <div class="paso">
                <i class="fas fa-paw"></i>
                <h3>Fácil y Seguro</h3>
                <p>Realiza tu donación a través de nuestra plataforma de manera rápida y segura.</p>
            </div>
            <div class="paso">
                <i class="fas fa-handshake"></i>
                <h3>Donaciones Únicas o Recurrentes</h3>
                <p>Elige cómo deseas contribuir, ya sea con un aporte puntual o de forma periódica.</p>
            </div>
            <div class="paso">
                <i class="fas fa-pen"></i>
                <h3>Transparencia Garantizada</h3>
                <p>Casa Natura se compromete a mantenerte informado sobre el uso de los fondos y el impacto de tu apoyo.</p>
            </div>
        </div>        
    </div>


    <div class="d-flex  align-items-center mt-4 p-5">
    <div class="image-container">
            <img src="imagenes/animales.png" alt="Descripción de la imagen" class="img-fluid">
        </div>
        <div class="text-container">
            <h1 class="title">¿POR QUÉ <br>DONAR A CASA NATURA?</h1>
            <p class="welcome-text">
            Apoyo a los Animales: Tus donaciones nos ayudan a seguir proporcionando un refugio adecuado, nutrición y atención médica a nuestros animales.
            </p>
            <p class="welcome-text">
            Fortalecimiento de la Institución: Con tu ayuda, Casa Natura puede mantener y mejorar sus instalaciones y expandir sus programas de rescate y educación.
            </p>
            <p class="welcome-text">
            Confianza y Compromiso: Tu contribución se gestiona de manera responsable, asegurando que cada centavo se utilice en beneficio de los animales.
            </p>
            
            <button class="about-btn" onclick="verificarLogin()">Quiero Donar</button>

            <script>
            function verificarLogin() {
                // Usamos un llamado AJAX para verificar el login
                fetch('verificar_login.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.logueado) {
                            // Redirige al formulario de donaciones si está logueado
                            window.location.href = "formularioDonaciones.php";
                        } else {
                            // Muestra el popup y redirige al login después de cerrar el popup
                            alert("Debe estar logueado para realizar donaciones.");
                            window.location.href = "login.php";
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
            </script>
        </div>

       
    </div>

</body>
</html>
     <?php
     include("fragmentos.php");
        echo $footer;
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>