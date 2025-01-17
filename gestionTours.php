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
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <?php 
        include("sidebar.php");
        echo $sidebarAdmin2;
    ?>

   <?php
        include("actions/conexion.php"); 

        $sql = "SELECT * FROM tours ORDER BY Estado";
        $resultado = $conn->query($sql);  // Usar query() si es una consulta simple, no requiere preparación



       
    ?>
    <main>
    <div class="viewport">
        <div class="content">
            <nav class="navbar">
                <div class="container-fluid">
                    <h2 class="titulo">Gestión de Tours</h2>
                </div>
            </nav>
            <div class="contenedor">
            <div class="container contenedor-tabla">
                     <div class="fila-header">

<div class="boton-agregar">
    <a class="btn-agregar" href="agregarTour.php">
        <i class="fas fa-plus icono-agregar"></i> AGREGAR TOUR
    </a>
</div>
<div class="buscador">
    <div class="input-grupo">
        <input type="text" class="campo-buscar" placeholder="Buscar Tour...">
    </div>
</div>
</div>
                    <table class="tabla">
                        <thead>
                        <thead>
                            <tr>
                                <th>Nombre del Tour</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Precio Boleto</th>
                                <th>Boletos</th>
                                <th>Boletos Vendidos</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($resultado->num_rows > 0) {
                                    while($tour = $resultado->fetch_assoc()) {
                                        echo "<tr id=" . htmlspecialchars($tour['ID_Tour']) ." >";
                                        echo "<td>" . htmlspecialchars($tour['Nombre']) . "</td>";
                                        echo "<td>" . htmlspecialchars($tour['Descripcion']) . "</td>";
                                        echo "<td>" . htmlspecialchars($tour['Fecha']) . "</td>";
                                        echo "<td>" . htmlspecialchars($tour['Precio_Boleto']) . "</td>";
                                        echo "<td>" . htmlspecialchars($tour['Tickets_Disponibles']) . "</td>";
                                        echo "<td>" . htmlspecialchars($tour['TicketsVendidos']) . "</td>";
                                        echo "<td>" . htmlspecialchars($tour['Estado']) . "</td>";
                                        echo "<td class='actions'>";
                                        // Botón de editar
                                        echo "<a href='editarTour.php?id=" . $tour['ID_Tour'] . "' class='edit'><i class='fas fa-pen'></i></a>";
                                        // Botón de eliminar
                                        echo "<button class='delete' id='eliminarTour'><i class='fas fa-trash'></i></button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No se encontraron tours</td></tr>";
                                }
                            ?>
                        </tbody>
                        <?php 
                            // Cerrar la conexión después de que todas las operaciones con la base de datos hayan terminado
                            $conn->close();
                        ?>

                    </table>
                    </div>
                </div>
            </div>
        </div> 
            </div>
                    <!-- Tabla de eventos -->
                    
    </div>
    <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mensajeModalLabel">CasaNatura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="mensajeModalBody">
                        <!-- El mensaje dinámico se colocará aquí -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="submit-btn" data-bs-dismiss="modal">Cerrar</button>
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