<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Gestión de Eventos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
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
                    <h2 class="titulo">Gestión de Eventos</h2>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="container container-animales-agregar mt-4">
                    <h1><b>CREAR NUEVO EVENTO</b></h1>
                  
                        <form action="actions/guardar_evento.php" method="POST" class="form-agregar-animal" id="eventoAgregar" enctype="multipart/form-data">
                        <div class="profile-pic">
                        <img id="profileImage" src="https://via.placeholder.com/100" alt="Foto de perfil">
                            <input type="file" id="imageUpload" name="imagen" accept="image/*" onchange="loadFile(event)" required>
                            <label for="imageUpload">Subir foto</label>
                        </div>
                            <div class="form-group">
                            <div class="mb-3">
                                    <label for="descripcion">Nombre</label>
                                    <input type="text" id="nombreEvento" name="nombre" placeholder="Nombre del evento" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" id="descripcion" name="descripcion" placeholder="Descripción del evento" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" id="fecha" name="fecha" required>
                                </div>
                                <div class="mb-3">
                                    <label for="hora">Hora</label>
                                    <input type="time" id="hora" name="hora" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lugar">Lugar</label>
                                    <input type="text" id="lugar" name="lugar" placeholder="Lugar del evento" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lugar">Cupos</label>
                                    <input type="number" id="cupos" name="cupos" placeholder="Cupos del evento" required>
                                </div>
                                <div class="mb-3">
                                    <label for="lugar">Costo</label>
                                    <input type="number" id="costo" name="costo" placeholder="Costo del evento" required>
                                </div>
                            </div>
                            <button type="submit" class="submit-btn">GUARDAR</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </main>
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
    <?php 
        include("sidebar.php");
        echo $footerAdmin;
    ?>
</body>
</html>