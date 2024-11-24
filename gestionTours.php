<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Eventos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php 
        include("sidebar.php");
        echo $sidebarAdmin2;
    ?>
    <main>
    <div id="viewport">
        <div id="content">
            <nav class="navbar">
                <div class="container-fluid">
                    <h2 class="titulo">Gestión de Tours</h2>
                </div>
            </nav>
            <div class="contenedor">
                    <div class="fila-header">

                        <div class="boton-agregar">
                            <a class="btn-agregar" href="agregarTour.php">
                                <i class="fas fa-plus icono-agregar"></i> AGREGAR TOUR
                            </a>
                        </div>
                        <div class="buscador">
                            <div class="input-grupo">
                                <input type="text" class="campo-buscar" placeholder="Buscar Tour...">
                                <button class="btn-buscar">
                                    <i class="fas fa-search icono-buscar"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Tabla de eventos -->
                     <div class="container contenedor-tabla">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>Nombre del Tour</th>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Costo Boleto</th>
                                <th>Boletos Disponibles</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--
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
                            ?>-->
                        </tbody>
                    </table>
                    </div>
                </div>
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