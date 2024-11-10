<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <style>

        .sidebar {
            background-color: #003049;
            color: white;
            width: 250px;
            padding: 20px;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            z-index: 2;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            margin: 15px 0;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: mediumblue;
        }

        main {
            margin-left: 250px; 
            margin-top: 60px; 
            padding: 20px;
            position: relative;
            z-index: 0;
        }

        nav {
            position: relative;
            z-index: 2; 
        }

    </style>
</head>

<body>
    <nav>
        <?php
        include("fragmentos.php");
        echo $navbar;
        ?>
    </nav>

    <main>
        <div class="sidebar">
            <a href="ver_donaciones.php">Ver Donaciones</a>
            <a href="mis_animales.php">Mis Animales</a>
            <a href="mis_boletos.php">Mis Boletos</a>
            <a href="editar_perfil.php">Editar Perfil</a>
            <a href="soporte.php">Soporte</a>
            <a href="salir.php">Salir</a>
        </div>

        <div class="content">
            <h1>Bienvenido a Casa Natura</h1>
            <p>Contenido principal de la página debajo del menú lateral.</p>
        </div>
    </main>

    <footer>
        <?php
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>
</body>

</html>
