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
</head>

<body>
    <?php
    include("sidebar.php");
    echo $sidebarAdmin2;
    ?>
    <?php
    // Incluir archivo de conexión
    include("actions/conexion.php");

    // Lógica para eliminar evento
    if (isset($_GET['eliminar_id'])) {
        $id_eliminar = $_GET['eliminar_id'];
        // Preparamos la consulta de eliminación
        $sql_eliminar = "DELETE FROM eventos WHERE ID_Evento = ?";
        $stmt = $conn->prepare($sql_eliminar);
        $stmt->bind_param("i", $id_eliminar); // "i" indica que el parámetro es un entero
        if ($stmt->execute()) {
            echo "<script>alert('Evento eliminado con éxito'); window.location.href='gestionEventos.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar evento'); window.location.href='gestionEventos.php';</script>";
        }
        $stmt->close(); // Cerramos el statement después de ejecutarlo
    }

    // Consulta para obtener los eventos
    $sql = "SELECT * FROM eventos";
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
                        <div class="buscador">
                            <div class="input-grupo">
                                <input type="text" class="campo-buscar" placeholder="Buscar evento...">
                    
                            </div>
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
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultado->num_rows > 0) {
                                    while($evento = $resultado->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $evento['Nombre'] . "</td>";
                                        echo "<td>" . $evento['Descripcion'] . "</td>";
                                        echo "<td>" . $evento['Fecha'] . "</td>";
                                        echo "<td>" . $evento['Hora'] . "</td>";
                                        echo "<td>" . $evento['Lugar'] . "</td>";
                                        echo "<td>$" . $evento['Costo'] . "</td>";
                                        echo "<td>" . $evento['Cupos'] . "</td>";
                                        echo "<td>" . $evento['CuposVendidos'] . "</td>";
                                        echo "<td class='actions'>";
                                        // Botón para editar (redirige a editarEvento.php con el id del evento)
                                        echo "<a href='editarEvento.php?id=" . $evento['ID_Evento'] . "' class='edit'><i class='fas fa-pen'></i></a>";
                                        // Botón para eliminar (redirige a esta misma página con el id del evento a eliminar)
                                        echo "<a href='?eliminar_id=" . $evento['ID_Evento'] . "' class='delete'><i class='fas fa-trash'></i></a>";
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
    </main>
    <?php
    include("sidebar.php");
    echo $footerAdmin;
    ?>
</body>

</html>