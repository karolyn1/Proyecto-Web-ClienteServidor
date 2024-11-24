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
        echo $sidebarAdmin2;
    ?>
    <main>
    <div id="viewport">
        <div id="content">
            <nav class="navbar">
                <div class="container-fluid">
                    <h2 class="titulo">Gestión de Eventos</h2>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="container container-animales-agregar mt-4">
                    <h1><b>CREAR NUEVO EVENTO</b></h1>
                    <div class="profile-pic">
                            <img id="profileImage" src="https://via.placeholder.com/100" alt="Foto de perfil">
                            <input type="file" id="imageUpload" accept="image/*" onchange="loadFile(event)">
                            <label for="imageUpload">Subir foto</label>
                        </div>
                    <form action="agregarEvento.php" method="POST"class="form-agregar-animal">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="description">Descripción</label>
                                <input type="text" id="description" name="description" placeholder="Descripción del evento">
                            </div>
                            <div class="mb-3">
                                <label for="date">Fecha</label>
                                <input type="date" id="date" name="date">
                            </div>
                            <div class="mb-3">
                                <label for="time">Hora</label>
                                <input type="time" id="time" name="time">
                            </div>
                            <div class="mb-3">
                                <label for="location">Lugar</label>
                                <input type="text" id="location" name="location" placeholder="Lugar del evento">
                            </div>
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