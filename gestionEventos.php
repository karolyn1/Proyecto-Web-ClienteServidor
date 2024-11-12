<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Eventos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        .content {
            margin-left: 270px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php 
        include("sidebar.php"); // Asegúrate de que 'sidebar.php' no esté duplicado.
        echo $sidebarAdmin2;
    ?>

    <div class="content">
        <div class="main-title">Gestión de Eventos</div>
        <p class="mt-3">Aquí puedes gestionar los eventos organizados, agregar nuevos eventos y administrar la lista actual.</p>

        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Botón para agregar evento -->
                <h2 class="d-flex align-items-center">
                    <i class="fas fa-plus-circle mr-2"></i>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEvento">Agregar Evento</button>
                </h2>
                <!-- Campo de búsqueda -->
                <div class="input-group" style="width: 250px;">
                    <input type="text" class="form-control" placeholder="Buscar evento...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tabla de eventos -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del Evento</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Conectar a la base de datos
                    $conexion = new mysqli("localhost", "usuario", "contraseña", "base_datos");
                    if ($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion->connect_error);
                    }

                    // Consultar eventos
                    $sql = "SELECT id, nombre, fecha, descripcion FROM eventos";
                    $resultado = $conexion->query($sql);

                    if ($resultado->num_rows > 0) {
                        // Mostrar eventos en la tabla
                        while($evento = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $evento['nombre'] . "</td>";
                            echo "<td>" . $evento['fecha'] . "</td>";
                            echo "<td>" . $evento['descripcion'] . "</td>";
                            echo "<td>";
                            echo "<button class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></button> ";
                            echo "<button class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i></button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No se encontraron eventos</td></tr>";
                    }

                    $conexion->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para agregar evento -->
    <div class="modal fade" id="modalAgregarEvento" tabindex="-1" role="dialog" aria-labelledby="modalAgregarEventoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarEventoLabel">Agregar Nuevo Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="procesar_evento.php" method="post">
                        <div class="form-group">
                            <label for="nombreEvento">Nombre del Evento</label>
                            <input type="text" class="form-control" id="nombreEvento" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaEvento">Fecha del Evento</label>
                            <input type="date" class="form-control" id="fechaEvento" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcionEvento">Descripción</label>
                            <textarea class="form-control" id="descripcionEvento" name="descripcion" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Evento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
    include("sidebar.php");
    echo $footerAdmin;
    ?>

    <!-- Scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>