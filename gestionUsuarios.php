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
        $stmtComprobar = $conn->prepare($sqlComprobar);
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
            $stmtEliminar = $conn->prepare($sqlEliminar);
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
        $stmtActualizar = $conn->prepare($sqlActualizar);
        $stmtActualizar->bind_param("ssi", $nombre, $rol, $idUsuario);

        if ($stmtActualizar->execute()) {
            echo "<script>alert('Usuario actualizado correctamente.'); window.location.href='gestionarUsuarios.php';</script>";
        } else {
            echo "<script>alert('Error al actualizar el usuario.');</script>";
        }
    }
    ?>
    <main>
        <div id="viewport">
            <div id="content">
                <nav class="navbar ">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Usuarios</h2>
                    </div>
                </nav>

                <div class="contenedor">
                    <div class="fila-header">

                        <div class="boton-agregar">
                            <a class="btn-agregar" href="agregarUsuario.php">
                                <i class="fas fa-plus icono-agregar"></i> AGREGAR USUARIO
                            </a>
                        </div>
                        <div class="buscador">
                            <div class="input-grupo">
                                <input type="text" class="campo-buscar" placeholder="Buscar usuario...">
                                <button class="btn-buscar">
                                    <i class="fas fa-search icono-buscar"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container contenedor-tabla">
                <table class="tabla text-center">
                <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Consultar los usuarios desde la base de datos
                            $sqlUsuarios = "SELECT id, nombre, rol FROM usuarios";
                            $resultadoUsuarios = $conn->query($sqlUsuarios);

                            if ($resultadoUsuarios->num_rows > 0) {
                                while ($fila = $resultadoUsuarios->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['rol']) . "</td>";
                                    echo "<td class='actions'>";
                                    echo "<a href='editarUsuario.php?id=" . $fila['id'] . "' class='edit'><i class='fas fa-pen'></i></a>";
                                    echo "<a href='gestionarUsuarios.php?eliminar=" . $fila['id'] . "' class='delete' onclick='return confirm(\"¿Estás seguro de eliminar este usuario?\");'><i class='fas fa-trash'></i></a>";
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
    </main>
    <?php
    include("sidebar.php");
    echo $footerAdmin;
    ?>
</body>

</html>