<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Gestion de Animales</title>
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
        <div class="viewport">
            <div class="content">
                <nav class="navbar ">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Animales</h2>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="container-animales-agregar container mt-4">

                        <h1><b>CREAR NUEVO ANIMAL</b></h1>
                        
                        <form action="actions/guardar_animal.php" method="POST" class="form-agregar-animal" enctype="multipart/form-data">
                        <div class="profile-pic">
                            <img id="profileImage" src="https://via.placeholder.com/100" alt="Foto de perfil">
                            <input type="file" id="file" name="file" onchange="loadFile(event)">
                            <label for="file">Subir foto</label>
                            <span id="error-file">La imagen es obligatoria.</span>

                        </div>
                            <div class=" form-group">
                                <div class="mb-3">
                                <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Nombre del animal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="especie">Especie</label>
                                    <input type="text" id="especie" name="especie" placeholder="Especie" required>
                                </div>
                                <div class="mb-3">
                                <label for="raza">Raza</label>
                                    <input type="text" id="raza" name="raza" placeholder="Raza" required>
                                </div>
                                <div class="mb-3">
                                <label for="fecha_ingreso">Fecha Ingreso</label>
                                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" required>
                                </div>
                                <div class="mb-3">
                                <label for="fecha_nacimiento">Fecha Nacimiento</label>
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                </div>
                                <div class="mb-3">
                                <label for="estado_salud">Estado Salud</label>
                                    <input type="text" id="estado_salud" name="estado_salud" placeholder="Estado Salud" required>
                                </div>
                                <div class="mb-3">
                                <label for="estado_salud">Historia</label>
                                    <input type="text" id="historia" name="historia" placeholder="Estado Salud" required>
                                </div>
                                <div class="mb-3">
                                <label for="estado_salud">Necesidades</label>
                                    <input type="text" id="necesidades" name="necesidades" placeholder="Estado Salud" required>
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