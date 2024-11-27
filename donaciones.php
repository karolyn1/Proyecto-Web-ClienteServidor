<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    
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
        .table {
        border-collapse: collapse;
    }
    .table thead th {
        background-color: gold;
        color: white;
    }
    .table-hover tbody tr:hover {
        background-color: black;
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
        <main>
    <div class="container mt-5">
        <h1 class="text-center">Historial de Donaciones</h1>

        <!-- Mostrar mensaje de éxito -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success mt-3" role="alert">
                ¡Donación registrada exitosamente!
            </div>
        <?php endif; ?>

        <!-- Historial de donaciones en formato tabla -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("conexion.php");
                    session_start();

                    // Simulación de usuario logueado
                    $_SESSION['usuario_id'] = 1; // ID del usuario logueado de prueba
                    $_SESSION['nombre_usuario'] = "Juan Perez";

                    // Obtener historial de donaciones
                    $usuario_id = $_SESSION['usuario_id'];
                    $query = "SELECT ID_Donacion, Monto, Fecha FROM DONACIONES WHERE ID_Usuario = ? ORDER BY Fecha DESC";
                    $stmt = $conexion->prepare($query);
                    $stmt->bind_param("i", $usuario_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Mostrar las donaciones en formato tabla
                    if ($result->num_rows > 0):
                        $index = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $index++; ?></td>
                                <td>$<?php echo number_format($row['Monto'], 2); ?></td>
                                <td><?php echo date("d-m-Y H:i", strtotime($row['Fecha'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No tienes donaciones registradas aún.</td>
                        </tr>
                    <?php endif;

                    $stmt->close();
                    $conexion->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
        <?php
        // Conexión a la base de datos (ya se encuentra en conexion.php, solo asegurarse de usar mysqli)
        include('actions/conexion.php'); // Asegúrate que la conexión use mysqli

        // Consulta SQL para obtener los datos de las donaciones
        $query = "
            SELECT 
                usuario.nombre AS usuario_nombre,
                donaciones.monto,
                donaciones.fecha
            FROM donaciones
            INNER JOIN usuario ON donaciones.usuario_id = usuario.id
        ";

        // Ejecutamos la consulta usando mysqli
        $result = $conexion->query($query);

        // Verificamos si la consulta tuvo éxito
        if (!$result) {
            die("Error en la consulta: " . $conexion->error);
        }
        ?>     
        
        <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $index = 1;
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $index++; ?></td>
                            <td><?php echo htmlspecialchars($row['usuario_nombre']); ?></td>
                            <td><?php echo number_format($row['monto'], 2); ?></td>
                            <td><?php echo htmlspecialchars($row['fecha']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>

    <footer>

    </footer>
</body>
</html>
