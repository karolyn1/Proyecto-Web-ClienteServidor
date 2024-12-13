<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Dashboard Administración</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>

    <?php
    // Incluir el archivo de conexión y datos desde la carpeta actions
    require './actions/datos_dashboardAdmin.php';
    ?>

    <?php
    include("sidebar.php");
    echo $sidebarAdmin2;
    ?>

    <main>
        <div class="viewport">
            <div class="content">
                <nav class="navbar">
                    <div class="container-fluid">
                        <h2 class="titulo">Dashboard Administración</h2>
                    </div>
                </nav>

                <div class="counter-box-container mt-3">
                    <div class="counter-box">
                        <p><?php echo $total_usuarios; ?></p>
                        <small>Usuarios Registrados</small>
                    </div>
                    <div class="counter-box-second">
                        <p><?php echo $total_animales; ?></p>
                        <small>Animales Registrados</small>
                    </div>
                    <div class="counter-box-second">
                        <p><?php echo $total_apadrinados; ?></p>
                        <small>Animales Apadrinados</small>
                    </div>
                    <div class="counter-box-second">
                        <p>$<?php echo number_format($total_donaciones, 2); ?></p>
                        <small>Recaudaciones Totales</small>
                    </div>
                </div>

                <hr>

                <!-- Tabla de Donaciones y Total de Donaciones -->
                <div class=" align-items-center donation-table-container">
                    <div class=" d-flex justify-content-start">
                        <div class="donation-table text-center">
                            <h3>Donaciones Recientes</h3>
                            <table class="tabla">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Mostrar las últimas donaciones
                                    foreach ($donaciones as $donacion) {
                                        echo "<tr>
                                                <td>" . $donacion['nombre'] . "</td>
                                                <td>$" . number_format($donacion['monto'], 2) . "</td>
                                                <td>" . $donacion['fecha'] . "</td>
                                              </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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

    <!-- JavaScript directo en HTML -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuLinks = document.querySelectorAll('.sidebar .submenu a');
            menuLinks.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    link.style.fontWeight = 'bold';
                });
                link.addEventListener('mouseleave', () => {
                    link.style.fontWeight = 'normal';
                });
            });
        });
    </script>

</body>

</html>