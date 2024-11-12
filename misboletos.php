<?php

$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis boletos- Casa Natura</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            color: black; 
            text-decoration: none;
            font-weight: bold;
            display: block;
            padding: 10px;
        }

        .sidebar ul li a:hover {
            background-color: antiquewhite;
            color: #3498db; 
            cursor: pointer;
        }

        .sidebar ul li a.active {
            background-color: #f1c40f;
            color: black;
            border-radius: 5px;
        }

        .sidebar .logo img {
            width: 140px;
            height: auto;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
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
            margin-left: 10px;
        }

        header h1 span {
            color: #f1c40f; 
        }

        header nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center; 
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

        footer {
            background-color: #2f8b3b;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        main {
            margin-left: 270px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="sidebar">
            <div class="logo">
                <img src="imagenes/logo.png" alt="Casa Natura Logo">
            </div>
            <ul>
                <li><a ="dashboarduser.php" class="dashboarduser">Mi Perfil</a></li>
                <li><a href="donaciones.php" class="donaciones">Ver donaciones</a></li>
                <li><a href="misanimales.php" class="misanimales">Mis animales</a></li>
                <li><a href="misboletos.php" class="misboletos <?php echo ($current_page == 'misboletos.php') ? 'active' : ''; ?>">Mis boletos</a></li>
                <li><a href="editarperfil.php">Editar Perfil</a></li>
                <li><a href="soporte.php">Soporte</a></li> 
                <li><a href="logout.php">Salir</a></li> 
            </ul>
        </div>

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

        <main>
            <h1>Sesión de mis boletos :)</h1>
        </main>
    </div>

    <footer>
        <?php 
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>
</body>
</html>
