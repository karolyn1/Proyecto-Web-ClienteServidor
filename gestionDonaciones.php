<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include("sidebar.php");
    echo $sidebarAdmin2;
    
    include("actions/conexion.php"); // Conexión a la base de datos

    // Consulta para obtener donaciones y usuarios
    $sql = "SELECT u.id AS usuario_id, u.nombre_completo, u.email, d.monto, d.fecha, d.id AS donacion_id 
    FROM usuarios u 
    LEFT JOIN donaciones d ON u.id = d.usuario_id
    WHERE d.estado = 1"; // Estado activo de la donación
    $result = $conn->query($sql); // Usamos el método query() de mysqli

    // Eliminación lógica de donaciones
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
        $donacion_id = $_POST['donacion_id'];
        $update_sql = "UPDATE donaciones SET estado = 0 WHERE id = $donacion_id";
        
        // Ejecutar la consulta de actualización
        if ($conn->query($update_sql) === TRUE) {
            echo "<div class='alert alert-success'>Donación eliminada correctamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al eliminar: " . $conn->error . "</div>";
        }
    }
    ?>

    <main>
        <div id="viewport">
            <div id="content">
                <nav class="navbar">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Donaciones</h2>
                    </div>
                </nav>

                <div class="contenedor">
                    <!-- Botón para generar reporte y barra de búsqueda -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="reporte.php" class="btn btn-primary agregarAnimal d-flex align-items-center">
                            <i class="fas fa-file-alt p-1"></i> GENERAR REPORTE
                        </a>
                        <div class="input-group" style="width: 250px;">
                            <input type="text" class="form-control" placeholder="Buscar donación...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de Donaciones -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Donación</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['usuario_id']; ?></td>
                                    <td><?php echo $row['nombre_completo']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td>$<?php echo number_format($row['monto'], 2); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row['fecha'])); ?></td>
                                    <td>
                                        <form method="POST" action="">
                                            <input type="hidden" name="donacion_id" value="<?php echo $row['donacion_id']; ?>">
                                            <button type="submit" name="eliminar" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No se encontraron donaciones activas.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
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