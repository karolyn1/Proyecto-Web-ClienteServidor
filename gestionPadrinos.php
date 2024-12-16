<!DOCTYPE html>
<html lang="es">

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
                <nav class="navbar">
                    <div class="container-fluid">
                        <h2 class=" titulo">Gestión de Apadrinamientos</h2>
                    </div>
                </nav>
                <div class="contenedor">
                    <div class="container contenedor-tabla">
                        <div class="fila-header">

                            <div class="boton-agregar">
                                <a class="btn-agregar" href="agregarApadrinamiento.php">
                                    <i class="fas fa-plus icono-agregar"></i> AGREGAR APADRINAMIENTO
                                </a>
                            </div>
                            <div class="buscador">
                                <div class="row">
                                    <button class="col btn-agregar" id="padrinosActivos">ACTIVOS</button>
                                    <button class="col btn-agregar" id="todosPadrinos">TODOS</button>
                                </div>
                            </div>
                        </div>

                        <table class="tabla" id="tablaPadrinos">
                        <thead>
                            <tr>
                                <th>Nombre del Animal</th>
                                <th>Raza</th>
                                <th>Padrino</th>
                                <th>Fecha de Apadrinamiento</th>
                                <th>Fin del Apadrinamiento</th>
                                <th>Cuota</th>
                                <th>Frecuencia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="bodyPadrinos">

                        </tbody>
                        </table>

                        <table class="tabla" id="tablaTodosPadrinos">
                        <thead>
                            <tr>
                                <th>Nombre del Animal</th>
                                <th>Raza</th>
                                <th>Padrino</th>
                                <th>Fecha de Apadrinamiento</th>
                                <th>Fin del Apadrinamiento</th>
                                <th>Cuota</th>
                                <th>Frecuencia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="bodyPadrinosTodos">

                        </tbody>
                        </table>


                    </div>

                </div>

            </div>

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