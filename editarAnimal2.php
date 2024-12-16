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


<body>
    <?php
    include("sidebar.php");
    include("actions/conexion.php");
    echo $sidebarAdmin2;

    if (isset($_GET["idAnimal"])) {
        $idAnimal = $_GET["idAnimal"];
        $sql = "SELECT * FROM animal WHERE ID_Animal = '$idAnimal'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $animal = $result->fetch_assoc();
        } else {
            die("Animal no encontrado");
        }
    } else {
        die("ID de animal no proporcionado.");
    }
    ?>

    </div>
    <main>
        <div CLASS="viewport">
            <div class="content">
                <nav class="navbar ">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Animales</h2>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="container-animales-agregar container mt-4">

                        <h1><b>EDITAR ANIMAL</b></h1>

                        <form class="form-agregar-animal" method="post" action="actions/actualizar_animal.php" id="formEditarAnimal" enctype="multipart/form-data">
                            <div class="profile-pic">
                                <img id="profileImage" src="actions/<?php echo $animal['Imagen']; ?>.">
                                <input type="file" id="file" name="file" 
                                    onchange="loadFile(event)">
                                <label for="file">Subir foto</label>
                                <span id="error-file">La imagen es obligatoria.</span>

                            </div>
                            <div class=" form-group">
                                <input type="hidden" id="idAnimal" name="idAnimal" value="<?php echo $animal['ID_Animal']; ?>" >
                                <div class="mb-3">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" value="<?php echo $animal['Nombre']; ?>" id="NombreEditar"
                                        name="NombreEditar" placeholder="Nombre del animal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="especie">Especie</label>
                                    <input type="text" id="especieEditar" name="especieEditar"
                                        value="<?php echo $animal['Especie']; ?>" placeholder="Especie" required>
                                </div>
                                <div class="mb-3">
                                    <label for="raza">Raza</label>
                                    <input type="text" id="razaEditar" name="razaEditar" placeholder="Raza"
                                        value="<?php echo $animal['Raza']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fecha_ingreso">Fecha Ingreso</label>
                                    <input type="date" id="fecha_ingresoEditar" name="fecha_ingresoEditar"
                                        value="<?php echo $animal['Fecha_Ingreso']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fecha_nacimiento">Fecha Nacimiento</label>
                                    <input type="date" id="fecha_nacimientoEditar" name="fecha_nacimientoEditar"
                                        value="<?php echo $animal['Fecha_Nacimiento']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="estado_salud">Estado Salud</label>
                                    <input type="text" id="estado_saludEditar" name="estado_saludEditar"
                                        placeholder="Estado Salud" value="<?php echo $animal['Estado_Salud']; ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="estado_salud">Historia</label>
                                    <input type="text" id="historiaEditar" name="historiaEditar" placeholder="Historia"
                                        value="<?php echo $animal['Historia']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="estado_salud">Necesidades</label>
                                    <input type="text" id="necesidadesEditar" name="necesidadesEditar"
                                        placeholder="Necesidades" value="<?php echo $animal['Necesidades']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="estado_salud">Apadrinado</label>
                                    <input type="text" id="apadrinadoEditar" name="apadrinadoEditar"
                                        value="<?php echo $animal['Apadrinado']; ?>">
                                </div>

                            </div>
                            <button type="submit" class="submit-btn" id="editarAnimal" name="editarAnimal">GUARDAR</button>
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