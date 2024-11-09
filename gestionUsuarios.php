<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="./css/style.css" rel="stylesheet">
    
    <style>
        .content {
            margin-left: 270px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php 
        include("fragmentosAdmin.php");
        echo $sitebarAdmin;
    ?>

    <div class="content">
        <!-- Título principal Dashboard -->
        <div class="main-title">Gestión de Usuarios</div>

        <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Botón para agregar usuario -->
            <h2 class="d-flex align-items-center">
                <i class="fas fa-plus-circle mr-2"></i>Agregar Usuario
            </h2>
            <!-- Campo de búsqueda -->
            <div class="input-group" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Buscar usuario...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabla de usuarios -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conectar a la base de datos
                $conexion = new mysqli("localhost", "usuario", "contraseña", "base_datos");

                // Verificar conexión
                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                // Consultar usuarios
                $sql = "SELECT nombre, rol FROM usuarios";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    // Mostrar usuarios en la tabla
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['rol'] . "</td>";
                        echo "<td>";
                        echo "<button class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></button> ";
                        echo "<button class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No se encontraron usuarios</td></tr>";
                }

                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>

   

    <?php 
    include("fragmentos.php");
    echo $footer;
    ?>

     <!-- Bootstrap y Font Awesome JavaScript -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>