<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            background-color: #d6eaf8; 
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

        /* Card styles */
        .card-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 300px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h2 {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #333;
        }

        .card p {
            font-size: 0.9em;
            color: #666;
        }

        .card img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
        }

        .card button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
        }

        .card button:hover {
            background-color: #2980b9;
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
                <li><a href="dashboarduser.php" class="dashboarduser">Mi Perfil</a></li>
                <li><a href="donaciones.php" class="donaciones">Ver donaciones</a></li>
                <li><a href="misanimales.php" class="misanimales">Mis animales</a></li>
                <li><a href="misboletos.php" class="misboletos">Mis boletos</a></li>
                <li><a href="editarperfil.php" class="<?php echo ($current_page == 'editarperfil.php') ? 'active' : ''; ?>">Editar Perfil</a></li>
                <li><a href="soporte.php">Soporte</a></li>
                <li><a href="salir.php">Salir</a></li> 
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
            <h1>Sesión para editar mi perfil</h1>
            
            <div class="card-container">
                <!-- Tarjeta de Información de la Cuenta -->
                <div class="card">
                    <img src="imagenes/user.png" alt="User Profile Picture">
                    <h2>Información de la Cuenta</h2>
                    <p><strong>Nombre:</strong> User Ejemplo</p>
                    <p><strong>Región:</strong> Región - País</p>
                    <p><strong>Email:</strong> emailtest@gmail.com</p>
                    <p><strong>Teléfono:</strong> +1-000-000-0000</p>
                    <button onclick="editarCuenta()">Editar Cuenta</button>
                </div>

                <!-- Tarjeta de Dirección de User -->
                <div class="card">
                    <h2>Dirección de User</h2>
                    <p><strong>Ejemplo:</strong> Dirección de Cliente Ejemplo</p>
                    <p><strong>Provincia:</strong> Provincia, Cantón, Distrito</p>
                    <p><strong>Teléfono:</strong> +1-000-000-0000</p>
                    <p><strong>Email:</strong> emailtest@gmail.com</p>
                    <button onclick="editarDireccion()">Editar Dirección</button>
                </div>
            </div>
        </main>
    </div>

    <footer>
        <?php 
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>

    <script>
        function editarCuenta() {
            
            alert('Editar cuenta');
        }

        function editarDireccion() {
            
            alert('Editar dirección');
        }
    </script>
</body>
</html>

