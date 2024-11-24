<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
    include("actions/conexion.php"); // Incluir archivo de conexión

    // Verificar si se ha recibido un ID de tour
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idTour = $_GET['id'];

        // Consultar los datos del tour
        $sql = "SELECT * FROM tours WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $idTour);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $tour = $resultado->fetch_assoc();

        // Verificar si el tour existe
        if (!$tour) {
            echo "<script>alert('Tour no encontrado'); window.location.href='gestionTours.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('ID de tour no válido'); window.location.href='gestionTours.php';</script>";
        exit();
    }

    // Procesar la edición del tour
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $precio_boleto = $_POST['precio_boleto'];
        $tickets_disponibles = $_POST['tickets_disponibles'];

        // Actualizar el tour en la base de datos
        $sqlActualizar = "UPDATE tours SET nombre = ?, descripcion = ?, fecha = ?, hora = ?, precio_boleto = ?, tickets_disponibles = ? WHERE id = ?";
        $stmt = $conexion->prepare($sqlActualizar);
        $stmt->bind_param("ssssiii", $nombre, $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles, $idTour);

        if ($stmt->execute()) {
            echo "<script>alert('Tour actualizado con éxito'); window.location.href='gestionTours.php';</script>";
        } else {
            echo "<script>alert('Error al actualizar el tour');</script>";
        }
    }
?>
    <div class="container mt-5">
        <h2>Editar Tour</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Tour</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $tour['nombre'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?= $tour['descripcion'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $tour['fecha'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" id="hora" name="hora" value="<?= $tour['hora'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="precio_boleto" class="form-label">Precio del Boleto</label>
                <input type="number" class="form-control" id="precio_boleto" name="precio_boleto" value="<?= $tour['precio_boleto'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tickets_disponibles" class="form-label">Tickets Disponibles</label>
                <input type="number" class="form-control" id="tickets_disponibles" name="tickets_disponibles" value="<?= $tour['tickets_disponibles'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Tour</button>
            <a href="gestionTours.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>