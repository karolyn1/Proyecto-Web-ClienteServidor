<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
</head>
<body>

<?php
    include("fragmentos.php");
    echo $navbar;
?>
<main>
    <div class="detalleAnimal-title text-center">
        <h1>PERFILES DE NUESTROS ANIMALES</h1>
    </div>

    <div class="container-animal">
        <div class="header">
            <img src="https://via.placeholder.com/200x200.png?text=Animal+1">
            <div class="title">
                <h1>NOMBRE ANIMAL</h1>
                <p>ESPECIE, EDAD</p>
            </div>
        </div>

        <div class="seccion">
            <p class="tituloSeccion">ESTADO DE SALUD</p>
            <p class="texto">Descripción del estado de salud</p>
        </div>

        <div class="seccion">
            <p class="tituloSeccion">HISTORIA</p>
            <p class="texto">Descripción dee la historia del animal</p>
        </div>

        <div class="seccion">
        <p class="tituloSeccion">NECESIDADES ACTUALES</p>
        <ul>
            <li>Tratamiento médico: Simba necesita medicamentos específicos y controles veterinarios regulares para controlar su enfermedad respiratoria.</li>
            <li>Alimentación especial: Su dieta debe ser rica en nutrientes para ayudar a fortalecer su sistema inmunológico.</li>
            <li>Ambiente controlado: Vive en un santuario que asegura un ambiente tranquilo y monitoreado para su bienestar.</li>
        </ul>
    </div>

    <div class="seccion">
        <p class="tituloSeccion">¿CÓMO PUEDES AYUDAR?</p>
        <p class="texto">Al patrocinar a Simba, contribuirás a cubrir los costos de su tratamiento médico y cuidados especiales. Tu donación ayudará a asegurar que reciba la atención necesaria para mejorar su calidad de vida. Recibirás actualizaciones sobre su estado de salud y progreso.</p>
    </div>

    <p class="highlight">¡Ayuda a Simba a vivir más años en mejores condiciones!</p>

    <div class="container-boton">
        <a href="#" class="botonApadrinar">Quiero Apadrinarlo</a>
    </div>

    </div>
</main>
<?php
    include("fragmentos.php");
    echo $footer;
?>
</body>
</html>