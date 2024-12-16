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
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
</head>
<style>


</style>

<body>
    <?php
    include("sidebar.php");
    include("actions/conexion.php");
    echo $sidebarAdmin2;

    if (isset($_GET["ID"])) {
        $id = $_GET["ID"];
        $sql = "SELECT * FROM animal_usuario WHERE ID = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $apadrinamiento = $result->fetch_assoc();
        } else {
            die("Apadrinamiento no encontrado");
        }
    } else {
        die("ID no proporcionado.");
    }
    ?>

    </div>
    <main>
        <div CLASS="viewport">
            <div class="content">
                <nav class="navbar ">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Apadrinamientos</h2>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="container-animales-agregar container mt-4">

                        <h1><b>EDITAR APADRINAMIENTO</b></h1>

                        <form class="formApadrinamientos" id="formEditarApadrinamiento">
                     
                                <input type="hidden" id="idApadrinamiento" name="id" value="<?php echo $apadrinamiento['ID']; ?>">
                                <div class="mb-3">
                                    <label for="couta">Cuota</label>
                                    <input type="int" value="<?php echo $apadrinamiento['Monto']; ?>" id="MontoEditar"
                                        name="NombreEditar" placeholder="Couta a donar" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="frecuencia">Frecuencia</label>
                                    <select id="frecuenciaEditar" name="frecuencia" required>
                                        <option value="" disabled <?php echo empty($apadrinamiento['Frecuencia']) ? 'selected' : ''; ?>>Selecciona la frecuencia</option>
                                        <option value="Mensual" <?php echo $apadrinamiento['Frecuencia'] == 'Mensual' ? 'selected' : ''; ?>>Mensual</option>
                                        <option value="Bimensual" <?php echo $apadrinamiento['Frecuencia'] == 'Bimensual' ? 'selected' : ''; ?>>Bimensual</option>
                                        <option value="Trimestral" <?php echo $apadrinamiento['Frecuencia']== 'Trimestral' ? 'selected' : ''; ?>>Trimestral</option>
                                    </select>
                                </div>
                                
                           
                            <button type="submit" class="submit-btn" id="editarApadrinamiento"
                                name="editarAnimal">GUARDAR</button>
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