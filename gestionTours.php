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

    <?php
    include("actions/conexion.php"); // Incluir archivo de conexión

    // Verificar si se ha solicitado eliminar un tour
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idTour = $_GET['id'];
        
        // Eliminar el tour con el id especificado
        $sqlEliminar = "DELETE FROM tours WHERE id = ?";
        $stmt = $conexion->prepare($sqlEliminar);
        $stmt->bind_param("i", $idTour);
        
        if ($stmt->execute()) {
            echo "<script>alert('Tour eliminado con éxito'); window.location.href='gestionTours.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar el tour'); window.location.href='gestionTours.php';</script>";
        }
    }

    // Consulta para obtener los tours
    $sql = "SELECT id, nombre, fecha, descripcion, precio_boleto, tickets_disponibles FROM tours";
    $resultado = $conexion->query($sql);
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
                        <thead>
                            <tr>
                                <th>Nombre del Tour</th>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Precio Boleto</th>
                                <th>Boletos Disponibles</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($resultado->num_rows > 0) {
                                while($tour = $resultado->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $tour['nombre'] . "</td>";
                                    echo "<td>" . $tour['fecha'] . "</td>";
                                    echo "<td>" . $tour['descripcion'] . "</td>";
                                    echo "<td>" . $tour['precio_boleto'] . "</td>";
                                    echo "<td>" . $tour['tickets_disponibles'] . "</td>";
                                    echo "<td class='actions'>";
                                    // Botón de editar
                                    echo "<a href='editarTour.php?id=" . $tour['id'] . "' class='edit'><i class='fas fa-pen'></i></a>";
                                    // Botón de eliminar
                                    echo "<a href='?id=" . $tour['id'] . "' class='delete' onclick='return confirm(\"¿Estás seguro de eliminar este tour?\");'><i class='fas fa-trash'></i></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No se encontraron tours</td></tr>";
                            }
                            $conexion->close();
                            ?>
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