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
</head>

<body>
    <?php
    include("sidebar.php");
    echo $sidebarAdmin2;
    ?>
    <main>
        <div id="viewport">
            <div id="content">
                <nav class="navbar">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Animales</h2>
                    </div>
                </nav>
                <div class="counter-box-container mt-3">
                    <div class="counter-box">
                        <p>1200</p>
                        <small>Usuarios Registrados</small>
                    </div>
                    <div class="counter-box-second">
                        <p>450</p>
                        <small>Animales Registrados</small>
                    </div>
                    <div class="counter-box-second">
                        <p>150</p>
                        <small>Animales Apadrinados</small>
                    </div>
                    <div class="counter-box-second">
                        <p>$225</p>
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
                                    <tr>
                                        <td>Juan Pérez</td>
                                        <td>$50</td>
                                        <td>2024-11-01</td>
                                    </tr>
                                    <tr>
                                        <td>María López</td>
                                        <td>$75</td>
                                        <td>2024-10-15</td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Sánchez</td>
                                        <td>$100</td>
                                        <td>2024-09-20</td>
                                    </tr>
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
    <!--JavaScript directo en HTML-->
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