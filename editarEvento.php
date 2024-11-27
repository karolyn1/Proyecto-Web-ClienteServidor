<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #062D3E;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Evento</h2>

        <?php
        include("./actions/conexion.php"); // Incluir archivo de conexión

    // Validar ID de evento
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id_evento = (int)$_GET['id'];

        // Consulta preparada para obtener datos
        $sql = $conexion->prepare("SELECT nombre, fecha, descripcion FROM eventos WHERE id = ?");
        $sql->bind_param("i", $id_evento);
        $sql->execute();
        $resultado = $sql->get_result();

        if ($resultado->num_rows > 0) {
            $evento = $resultado->fetch_assoc();
        } else {
            echo "<script>alert('Evento no encontrado'); window.location.href = 'gestionEventos.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('ID de evento no proporcionado o inválido'); window.location.href = 'gestionEventos.php';</script>";
        exit;
    }

    // Manejar el formulario de actualización
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $descripcion = $_POST['descripcion'];

        // Consulta preparada para actualizar datos
        $sql_actualizar = $conexion->prepare("UPDATE eventos SET nombre = ?, fecha = ?, descripcion = ? WHERE id = ?");
        $sql_actualizar->bind_param("sssi", $nombre, $fecha, $descripcion, $id_evento);

        if ($sql_actualizar->execute()) {
            echo "<script>alert('Evento actualizado correctamente'); window.location.href = 'gestionEventos.php';</script>";
        } else {
            echo "<script>alert('Error al actualizar el evento');</script>";
        }
    }

    // Cerrar la conexión
    $conexion->close();
    ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Evento</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $evento['nombre']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $evento['fecha']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required><?php echo $evento['descripcion']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="gestionEventos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>    