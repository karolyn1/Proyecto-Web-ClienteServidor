<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Agregar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Estructura principal */
        #viewport {
            padding-left: 250px;
            transition: all 0.5s ease;
        }
        #content {
            width: 100%;
            position: relative;
        }

        /* Título */
        .titulo {
            color: #062D3E;
            font-weight: bold;
            padding: 20px;
        }

        /* Estilos del formulario */
        form {
            padding: 10px;
        }
        .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .form-group div {
            flex: 1 1 45%;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="time"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #062D3E;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #FFC107;
        }

        /* Contenedor */
        .container {
            width: 1000px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            font-size: 20px;
            color: #062D3E;
            margin-bottom: 20px;
        }
        .container-fluid {
            color: #062D3E;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php 
        include("sidebar.php");
        echo $sidebarAdmin2;
    ?>
    <div id="viewport">
        <div id="content">
            <nav class="navbar navbar-default user">
                <div class="container-fluid">
                    <h2 class="nav navbar-nav navbar-right titulo">Gestión de Eventos</h2>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="container mt-4">
                    <h1><b>CREAR NUEVO EVENTO</b></h1>
                    <form action="agregarEvento.php" method="POST">
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
                        <button type="submit" class="btn submit-btn">GUARDAR</button>
                    </form>
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