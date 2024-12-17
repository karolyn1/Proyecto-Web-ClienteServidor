<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Tours</title>
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
    <div class="viewport">
        <div class="content">
            <nav class="navbar">
                <div class="container-fluid">
                    <h2 class="titulo">Gestión de Tours</h2>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="container container-animales-agregar mt-4">
                    <h1><b>CREAR NUEVO TOUR</b></h1>
                    <form action="actions/guardar_tour.php" method="POST" class="form-agregar-animal" enctype="multipart/form-data">
                        <div class="profile-pic">
                            <img id="profileImage" src="https://via.placeholder.com/100" alt="Foto de perfil">
                            <input type="file" id="imageUpload" name="imagen" accept="image/*" onchange="loadFile(event)" required>
                            <label for="imageUpload">Subir foto</label>
                        </div>
                        <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombreTour" name="nombre" placeholder="Nombre del evento" required>

                            <label for="descripcion">Descripción</label>
                            <input type="text" id="descripcion" name="descripcion" placeholder="Descripción del evento" required>

                            <label for="fecha">Fecha</label>
                            <input type="date" id="fecha" name="fecha" required>

                            <label for="hora">Hora</label>
                            <input type="time" id="hora" name="hora" required>

                            <label for="precio_boleto">Costo</label>
                            <input type="number" id="precio_boleto" name="precio_boleto" placeholder="Costo" required>

                            <label for="tickets_disponibles">Cantidad de Tickets</label>
                            <input type="number" id="tickets_disponibles" name="tickets_disponibles" placeholder="Cantidad de Tickets" required>
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
        echo $footerAdmin;
    ?>
</body>
</html>