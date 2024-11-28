
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
        <div class="dashboard-container">
            <?php
            include('fragmentos.php');
            echo $sidebar;
            ?>
            <div class="main-content-perfil">
                <h1>Animales Patrocinados Ejemplo</h1>
                <P>La base de datos conexion</P>
                <div class="card-container">
                    <!-- Ejemplo de cartas de animales patrocinados -->
                    <div class="card">
                        <img src="imagenes/tigre.jpg" alt="Tigre de Bengala" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                        <h2>Tigre de Bengala</h2>
                        <p>Este majestuoso tigre fue rescatado y ahora vive protegido en un santuario.</p>
                    </div>
                    <div class="card">
                        <img src="imagenes/panda.jpg" alt="Panda Rojo" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                        <h2>Panda Rojo</h2>
                        <p>Un encantador panda rojo que necesita apoyo para su cuidado.</p>
                    </div>
                    <div class="card">
                        <img src="imagenes/elefante.jpg" alt="Elefante Asiático" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                        <h2>Elefante Asiático</h2>
                        <p>Un elefante que fue rescatado de condiciones difíciles y ahora vive en paz.</p>
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
