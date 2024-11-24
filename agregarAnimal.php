<!DOCTYPE html>
<html lang="en">

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
</head>
<style>


</style>

<body>
    <?php
    include("sidebar.php");
    echo $sidebarAdmin2; ?>
    </div>
    <main>
        <div id="viewport">
            <div id="content">
                <nav class="navbar ">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Animales</h2>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="container-animales-agregar container mt-4">

                        <h1><b>CREAR NUEVO ANIMAL</b></h1>
                        <div class="profile-pic">
                            <img id="profileImage" src="https://via.placeholder.com/100" alt="Foto de perfil">
                            <input type="file" id="imageUpload" accept="image/*" onchange="loadFile(event)">
                            <label for="imageUpload">Subir foto</label>
                        </div>
                        <form action="agregarAnimal.php" method="POST" class="form-agregar-animal">
                            <div class=" form-group">
                                <div class="mb-3">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" name="name" placeholder="Nombre del animal">
                                </div>
                                <div class="mb-3">
                                    <label for="species">Especie</label>
                                    <input type="text" id="species" name="species" placeholder="Especie">
                                </div>
                                <div class="mb-3">
                                    <label for="breed">Raza</label>
                                    <input type="text" id="breed" name="breed" placeholder="Raza">
                                </div>
                                <div class="mb-3">
                                    <label for="admission-date">Fecha Ingreso</label>
                                    <input type="date" id="admission-date" name="admission-date"
                                        placeholder="Fecha Ingreso">
                                </div>
                                <div class="mb-3">
                                    <label for="history">Historia</label>
                                    <input type="text" id="history" name="history" placeholder="Historia">
                                </div>
                                <div class="mb-3">
                                    <label for="birth-date">Fecha Nacimiento</label>
                                    <input type="text" id="birth-date" name="birth-date" placeholder="Fecha Nacimiento">
                                </div>
                                <div class="mb-3">
                                    <label for="health-status">Estado Salud</label>
                                    <input type="text" id="health-status" name="health-status"
                                        placeholder="Estado Salud">
                                </div>
                                <input type="hidden" id="apadrinado">
                            </div>
                            <button type="submit" class="submit-btn">GUARDAR</button>
                        </form>



                    </div>


                </div>
            </div>
        </div>
    </main>
    <?php
    include("sidebar.php");
    echo $footerAdmin; ?>
    </div>
</body>
<html>