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
    include("sidebar.php");
    echo $sidebarAdmin2;

    include("actions/conexion.php");

    // Verificar si se recibe una solicitud de eliminación
    if (isset($_GET['eliminar'])) {
        $idUsuario = $_GET['eliminar'];

        // Comprobar si el usuario está vinculado a donaciones o apadrinamientos
        $sqlComprobar = "
                SELECT COUNT(*) as count 
                FROM donaciones 
                WHERE usuario_id = ? 
                UNION 
                SELECT COUNT(*) as count 
                FROM apadrinamientos 
                WHERE usuario_id = ?";
        $stmtComprobar = $conexion->prepare($sqlComprobar);  // Cambiado de $conn a $conexion
        $stmtComprobar->bind_param("ii", $idUsuario, $idUsuario);
        $stmtComprobar->execute();
        $resultadoComprobacion = $stmtComprobar->get_result();

        $existeRelacion = false;
        while ($row = $resultadoComprobacion->fetch_assoc()) {
            if ($row['count'] > 0) {
                $existeRelacion = true;
                break;
            }
        }

        if ($existeRelacion) {
            echo "<script>alert('No se puede eliminar el usuario porque está asociado a donaciones o apadrinamientos.');</script>";
        } else {
            $sqlEliminar = "DELETE FROM usuarios WHERE id = ?";
            $stmtEliminar = $conexion->prepare($sqlEliminar);  // Cambiado de $conn a $conexion
            $stmtEliminar->bind_param("i", $idUsuario);
            if ($stmtEliminar->execute()) {
                echo "<script>alert('Usuario eliminado correctamente.'); window.location.href='gestionarUsuarios.php';</script>";
            } else {
                echo "<script>alert('Error al eliminar el usuario.');</script>";
            }
        }
    }

    // Verificar si se recibe una solicitud de actualización
    if (isset($_POST['actualizar'])) {
        $idUsuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $rol = $_POST['rol'];

        $sqlActualizar = "UPDATE usuarios SET nombre = ?, rol = ? WHERE id = ?";
        $stmtActualizar = $conexion->prepare($sqlActualizar);  // Cambiado de $conn a $conexion
        $stmtActualizar->bind_param("ssi", $nombre, $rol, $idUsuario);

        if ($stmtActualizar->execute()) {
            echo "<script>alert('Usuario actualizado correctamente.'); window.location.href='gestionarUsuarios.php';</script>";
        } else {
            echo "<script>alert('Error al actualizar el usuario.');</script>";
        }
    }
    ?>
    <main>
        <div class="viewport">
            <div class="content">
                <nav class="navbar ">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Usuarios</h2>
                    </div>
                </nav>


                <div class="container contenedor-tabla">
                    <div class="fila-header">

                        <div class="boton-agregar">
                            <a class="btn-agregar" href="agregarUsuario.php">
                                <i class="fas fa-plus icono-agregar"></i> AGREGAR USUARIO
                            </a>
                        </div>
                        <div class="buscador">
                            <div class="input-grupo">
                                <input type="text" class="campo-buscar" placeholder="Buscar usuario...">
                            </div>
                        </div>
                    </div>
                    <table class="tabla text-center">

                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                        <tbody>
                            <?php
                            // Consultar los usuarios desde la base de datos
                            $sqlUsuarios = "SELECT a.ID_Usuario,CONCAT( a.Nombre,' ', a.Apellido1,' ', a.Apellido2) as NombreCompleto, a.Correo, a.Estado, b.Rol 
                            FROM usuario a
                            INNER JOIN roles b
                            ON a.ID_Usuario = b.ID_Usuario";
                            $resultadoUsuarios = $conn->query($sqlUsuarios);

                            if ($resultadoUsuarios->num_rows > 0) {
                                while ($fila = $resultadoUsuarios->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($fila['ID_Usuario']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['NombreCompleto']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['Rol']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['Correo']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['Estado']) . "</td>";
                                    echo "<td class='actions'>";
                                    echo "<a href='editarUsuario.php?id=" . $fila['ID_Usuario'] . "' class='edit'><i class='fas fa-pen'></i></a>";
                                    echo "<button class='delete' id='eliminarUsuario' data-id='" . $fila['ID_Usuario'] . "'>
            <i class='fas fa-trash'></i>
        </button>";

                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No se encontraron usuarios</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
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
    </main>
    <?php
    include("sidebar.php");
    echo $footerAdmin;
    ?>
</body>

</html>