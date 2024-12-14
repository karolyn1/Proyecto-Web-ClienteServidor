<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
</head>

<body>
    <?php
        include("sidebar.php");
        echo $sidebarAdmin2;
    ?>

    <main>
        <div class="viewport">
            <div class="content">
                <!-- Navbar -->
                <nav class="navbar">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Animales</h2>
                    </div>
                </nav>

                <!-- Contenido principal -->
                <div class="contenedor">
                    <!-- Encabezado con botón y búsqueda -->
                    

                    <!-- Tabla -->
                    <div class="container contenedor-tabla">
                   
                        <!-- Botón Agregar Animal -->
                      <div class="fila-header">
                            <div class="boton-agregar">
                            <a class="btn-agregar" href="agregarAnimal.php">
                                <i class="fas fa-plus icono-agregar"></i> AGREGAR ANIMAL
                            </a>
                            </div>

                        <!-- Input de búsqueda -->
                        <div class="buscador">
                            <div class="input-grupo">
                                <input type="text" class="BuscarAnimal" id="BuscarAnimal" placeholder="Buscar animal...">
                            </div>
                        </div>
                        </div>
                
                        <table class="tabla text-center" id="tablaAnimales">
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>RAZA</th>
                                    <th>ESPECIE</th>
                                    <th>APADRINADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                                <tbody id="bodyTabla">

                                </tbody>
                         </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
        include("sidebar.php");
        echo $footerAdmin;
    ?>

</body>
</html>