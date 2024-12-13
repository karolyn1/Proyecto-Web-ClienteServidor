
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Animales</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Casa Natura</title><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    include('fragmentos.php');
    echo $navbar;
    ?>
    <main>
    <?php
    include('fragmentos.php');
    echo $opciones;
    ?>
    <h2 class="perfil-title-donaciones text-center m-5">MIS ANIMALES</h2>
        <div class="dashboard-container">
        
        <br>
            <div class="main-content-perfil">
                
                <div class="row container card-container">
           
                    <!-- Ejemplo de cartas de animales patrocinados -->
                    <div class="card animales">
                        <img src="imagenes/tigre.jpg" alt="Tigre de Bengala" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                        <h2>Tigre de Bengala</h2>
                        <p>Este majestuoso tigre fue rescatado y ahora vive protegido en un santuario.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
    include("fragmentos.php");
    echo $footer;
    ?>
</body>
</html>
