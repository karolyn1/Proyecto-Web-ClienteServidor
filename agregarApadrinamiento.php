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

                        <h1><b>CREAR APADRINAMIENTO</b></h1>

                        <form method="POST" class="formApadrinamiento">
                            <h5 class="text-center">SELECCIONA UN USUARIO Y UN ANIMAL</h5>
                            <div class="row d-flex flex-nowrap">
                                <table class="col text-center tablaApadrinamientos mb-3 m-3">
                                    <tr>
                                        <td>ID</td>
                                        <td>NOMBRE</td>
                                        <td>ESPECIE</td>
                                        <td>FECHA NACIMIENTO</td>
                          
                                    </tr>

                                    <tbody id="animalesDisponibles"></tbody>
                                </table>

                                <hr>
                                <table class="col tablaApadrinamientos w-0 mb-3 m-3">
                                    <tr>
                                        <td>ID</td>
                                        <td>NOMBRE</td>
                                      
                                    </tr>
                                    <tbody id="usuariosDisponibles"></tbody>
                                </table>
                            </div>
                            <div class="mb-3">
                                <label for="nombre">Monto</label>
                                <input type="number" id="montoApadrinar" name=
                                "montoApadrinar" placeholder="Monto de apadrinamiento"
                                    required>
                                <span>Recordatorio: Debe ser mayor a $50</span>
                            </div>
                            <div class="mb-3">
                                <label for="especie">Frecuencia</label>
                                <select id="frecuencia" name="frecuencia" required>
                                    <option value="" default>Selecciona la frecuencia</option>
                                    <option value="Mensual">Mensual</option>
                                    <option value="Bimensual">Bimensual</option>
                                    <option value="Trimestral">Trimestral</option>
                                </select>
                            </div>

                            <input type="hidden" id="apadrinado">


                            <button type="submit" class="submit-btn" id="guardarPadrino">GUARDAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mensajeModalLabel">CasaNatura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="mensajeModalBody">
                        <!-- El mensaje dinámico se colocará aquí -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="submit-btn" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
</main>
    </main>
    <?php
    include("sidebar.php");
    echo $footerAdmin; ?>
    </div>
</body>
<html>