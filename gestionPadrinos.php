<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donacioens</title>
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
        include("actions/conexion.php"); // Incluir archivo de conexión

        // Obtener los datos necesarios
        $sql = "SELECT a.nombre AS animal_nombre, u.nombre AS usuario_nombre, u.apellido1, u.apellido2, ia.fecha_apadrinamiento, ia.cuota, ia.animal_id, ia.usuario_id 
        FROM animal_usuario ia
        JOIN animal a ON ia.animal_id = a.id
        JOIN usuario u ON ia.usuario_id = u.id";

        // Usar mysqli para ejecutar la consulta
        $resultado = $conexion->query($sql);

        // Eliminar la relación entre el padrino y el animal
        if (isset($_GET['eliminar']) && isset($_GET['animal_id']) && isset($_GET['usuario_id'])) {
        $animal_id = $_GET['animal_id'];
        $usuario_id = $_GET['usuario_id'];

        // Eliminar la relación de apadrinamiento utilizando consultas preparadas
        $eliminar_sql = "DELETE FROM animal_usuario WHERE animal_id = ? AND usuario_id = ?";
        $stmt = $conexion->prepare($eliminar_sql);

        // Vincular los parámetros
        $stmt->bind_param("ii", $animal_id, $usuario_id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
        // Redirigir después de la eliminación
        header("Location: gestion_padrinos.php");
        exit();
        } else {
        echo "<script>alert('Error al eliminar el apadrinamiento');</script>";
        }
        $stmt->close();
        }

        $conexion->close();
    ?>
    <main>
    <div id="viewport">
        <div id="content">
            <nav class="navbar">
                <div class="container-fluid">
                    <h2 class=" titulo">Gestión de Apadrinamientos</h2>
                </div>
            </nav>
            <div class="contenedor">
                    <div class="fila-header">

                        <div class="boton-agregar">
                            <a class="btn-agregar" href="#">
                                <i class="fas fa-plus icono-agregar"></i> AGREGAR APADRINAMIENTO
                            </a>
                        </div>
                        <div class="buscador">
                            <div class="input-grupo">
                                <input type="text" class="campo-buscar" placeholder="Buscar Padrino...">
                                <button class="btn-buscar">
                                    <i class="fas fa-search icono-buscar"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                    
                     <div class="container contenedor-tabla">
                    <table class="tabla">
                        <thead>
                                <tr>
                                    <th>Nombre del Animal</th>
                                    <th>Padrino</th>
                                    <th>Fecha de Apadrinamiento</th>
                                    <th>Cuota</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultado->num_rows > 0) {
                                    while($row = $resultado->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['animal_nombre'] . "</td>";
                                        echo "<td>" . $row['usuario_nombre'] . " " . $row['apellido1'] . " " . $row['apellido2'] . "</td>";
                                        echo "<td>" . $row['fecha_apadrinamiento'] . "</td>";
                                        echo "<td>" . $row['cuota'] . "</td>";
                                        echo "<td class='actions'>";
                                        echo "<a href='?eliminar=true&animal_id=" . $row['animal_id'] . "&usuario_id=" . $row['usuario_id'] . "' class='delete'><i class='fas fa-trash'></i></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No se encontraron apadrinamientos</td></tr>";
                                }
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