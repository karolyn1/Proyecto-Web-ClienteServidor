<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Eventos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
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
    // Incluir archivo de conexión
    include("actions/conexion.php");

    // Consulta para obtener los eventos
    $sql = "SELECT * FROM eventos ORDER BY Estado";
    $resultado = $conn->query($sql);
    ?>


    <main>
        <div class="viewport">
            <div class="content">
                <nav class="navbar">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Eventos</h2>
                    </div>
                </nav>
                <div class="contenedor">

                </div>
                <!-- Tabla de eventos -->
                <div class="container contenedor-tabla">
                    <div class="fila-header">

                        <div class="boton-agregar">
                            <a class="btn-agregar" href="agregarEvento.php">
                                <i class="fas fa-plus icono-agregar"></i> AGREGAR EVENTOS
                            </a>
                        </div>
                      
                    </div>
                    <table class="tabla">
                            <thead>
                                <tr>
                                <th>NOMBRE</th>
                                <th>DESCRIPCION</th>
                                    <th>FECHA</th>
                                    <th>HORA</th>

                                    <th>LUGAR</th>
                                    <th>COSTO BOLETO</th>
                                    <th>CUPOS</th>
                                    <th>CUPOS VENDIDOS</th>
                                    <th>ESTADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultado->num_rows > 0) {
                                    while($evento = $resultado->fetch_assoc()) {
                                        echo "<tr id=" .$evento['ID_Evento'] ." >";
                                        echo "<td>" . $evento['Nombre'] . "</td>";
                                        echo "<td>" . $evento['Descripcion'] . "</td>";
                                        echo "<td>" . $evento['Fecha'] . "</td>";
                                        echo "<td>" . $evento['Hora'] . "</td>";
                                        echo "<td>" . $evento['Lugar'] . "</td>";
                                        echo "<td>$" . $evento['Costo'] . "</td>";
                                        echo "<td>" . $evento['Cupos'] . "</td>";
                                        echo "<td>" . $evento['CuposVendidos'] . "</td>";
                                        echo "<td>" . $evento['Estado'] . "</td>";
                                        echo "<td class='actions'>";
                                        // Botón para editar (redirige a editarEvento.php con el id del evento)
                                        echo "<a href='editarEvento.php?id=" . $evento['ID_Evento'] . "' class='edit'><i class='fas fa-pen'></i></a>";
                                        // Botón para eliminar (redirige a esta misma página con el id del evento a eliminar)
                                        echo "<button class='delete' id='eliminarEventoBTN'><i class='fas fa-trash'></i></button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No se encontraron eventos</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                </div>


            </div>

        </div>
        </div>
        </div>
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