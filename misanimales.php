<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Mis Animales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 250px;
            background-color: #2f8b3b;
            height: 100%;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
            text-align: center;
        }

        .sidebar ul li a {
            color: white; 
            text-decoration: none;
            font-weight: bold;
            display: block;
            padding: 10px;
        }

        .sidebar ul li a:hover {
            background-color: #3cb371;
            cursor: pointer;
        }

        header {
            background-color: #ffffff;
            padding: 20px;
            color: black;
            text-align: center;
            margin-left: 250px;
        }

        header h1 {
            display: inline-block;
            font-size: 2em;
            font-weight: bold;
            color: black;
        }

        header h1 span {
            color: #f1c40f;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin: 0;
        }

        header nav ul li {
            margin: 0 15px;
        }

        header nav ul li a {
            color: black;
            text-decoration: none;
            font-weight: bold;
        }

        header nav ul li a:hover {
            color: #3498db;
        }

        main {
            margin-left: 270px;
            padding: 20px;
        }

        footer {
            background-color: #2f8b3b;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="imagenes/logo.png" alt="Casa Natura Logo" class="img-fluid mx-auto d-block">
        </div>
        <ul>
            <li><a href="dashboarduser.php">Mi Perfil</a></li>
            <li><a href="donaciones.php">Ver donaciones</a></li>
            <li><a href="misanimales.php" class="active">Mis animales</a></li>
            <li><a href="misboletos.php">Mis boletos</a></li>
            <li><a href="editarperfil.php">Editar Perfil</a></li>
            <li><a href="soporte.php">Soporte</a></li> 
            <li><a href="logout.php">Salir</a></li> 
        </ul>
    </div>

    <!-- Header -->
    <header>
        <h1><span>CASA</span> NATURA</h1>
        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="donaciones.php">Donaciones</a></li>
                <li><a href="listadoAnimalesDisponibles.php">Apadrinar</a></li>
                <li><a href="tours.php">Tours</a></li>
                <li><a href="eventos.php">Eventos</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="quienessomos.php">Nosotros</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container mt-5">
            <h1 class="text-center">Mis Animales</h1>
            <!-- Espacio para el contenido dinámico -->
            <p class="text-center">Actualmente no tienes animales registrados.</p>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        
    </footer>
</body>
</html>
