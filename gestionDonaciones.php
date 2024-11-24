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

<body>
    <?php
    include("sidebar.php");
    echo $sidebarAdmin2; ?>
   <main>
    <div id="viewport">
        <div id="content">
            <nav class="navbar">
                <div class="container-fluid">
                <h2 class="titulo">Gestión de Donaciones</h2>
                </div>
            </nav>
            <div class="contenedor">
                    
                        <!-- Botón Agregar Animal -->
                        <!-- Input de búsqueda -->
                         
                        <div class="buscador-donaciones container">
                            <div class="input-grupo">
                                <input type="text" class="campo-buscar" placeholder="Buscar donación...">
                                <button class="btn-buscar">
                                    <i class="fas fa-search icono-buscar"></i>
                                </button>
                            </div>
                        </div>
                   

                    <div class="container contenedor-tabla">
                        <!-- REALIZACION DE TABLA DE EJEMPLO -->
                        <table class="tabla">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Método Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Alyvia Kelley</td>
                                    <td>Alyvia Kelley</td>
                                    <td>Cliente</td>
                                    <td>Cliente</td>
                                    
                                    <td>a.kelley@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jaiden Nixon</td>
                                    <td>Jaiden Nixon</td>
                                    <td>Cliente</td>
                                    <td>Cliente</td>
                                    
                                    <td>jaiden.n@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Ace Foley</td>
                                    <td>Ace Foley</td>
                                    <td>Cliente</td>
                                    <td>Cliente</td>
                                   
                                    <td>ace.fo@yahoo.com</td>
                                </tr>
                            </tbody>
                        </table>
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