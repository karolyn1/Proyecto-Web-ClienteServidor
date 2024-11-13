<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        #viewport {
            padding-left: 250px;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }
        #content {
            width: 100%;
            position: relative;
            margin-right: 0;
        }
        .titulo {
            color: #062D3E;
            font-weight: bold;
            padding: 20px;
        }
        .user {
            background-color: #f0f0f0;
        }
        .agregarEvento {
            font-weight: bold;
            color: #062D3E;
            border: 0.2px solid #062D3E;
        }
        .agregarEvento:hover {
            color: #fff;
            background-color: #FFC107;
        }
        table {
            color: #062D3E;
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #f9f9f9;
        }
        td {
            font-weight: 200;
        }
        th, td {
            color: #062D3E;
            padding: 12px;
            text-align: left;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .actions .edit, .actions .delete {
            color: #062D3E;
            border: 0.5px solid;
            border-radius: 5px;
            padding: 5px;
            width: 40px;
        }
        .actions button:hover {
            color: #FFC107;
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
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a class="agregarEvento btn d-flex align-items-center" href="agregarEvento.php">
                            <i class="fas fa-plus p-1"></i> AGREGAR EVENTO
                        </a>
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
                    <table>
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
                            $conexion = new mysqli("localhost", "usuario", "contraseña", "base_datos");
                            if ($conexion->connect_error) {
                                die("Conexión fallida: " . $conexion->connect_error);
                            }

                            $sql = "SELECT id, nombre, fecha, descripcion FROM eventos";
                            $resultado = $conexion->query($sql);

                            if ($resultado->num_rows > 0) {
                                while($evento = $resultado->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $evento['nombre'] . "</td>";
                                    echo "<td>" . $evento['fecha'] . "</td>";
                                    echo "<td>" . $evento['descripcion'] . "</td>";
                                    echo "<td class='actions'>";
                                    echo "<button class='edit'><i class='fas fa-pen'></i></button>";
                                    echo "<button class='delete'><i class='fas fa-trash'></i></button>";
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
        </div>
    </div>
    <?php 
        include("sidebar.php");
        echo $footerAdmin;
    ?>
</body>
</html>