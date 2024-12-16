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
        $sql = "SELECT * FROM tours WHERE id_tour = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $idTour);
            $stmt->execute();
            $resultado = $stmt->get_result();

            // Debug: Verificar si la consulta devuelve resultados
            if ($resultado->num_rows > 0) {
                $tour = $resultado->fetch_assoc();
            } else {
                echo "No se encontró ningún tour con ese ID.<br>";
            }
        } else {
            echo "Error al preparar la consulta.<br>";
        }
    } else {
        echo "ID de tour no válido.<br>";
    }

    // Procesar la edición del tour
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $precio_boleto = $_POST['precio_boleto'];
        $tickets_disponibles = $_POST['tickets_disponibles'];

        // Verificar si se subió una nueva imagen
        if ($_FILES['imagen']['error'] == 0) {
            $imagen = $_FILES['imagen']['name'];
            $imagen_tmp = $_FILES['imagen']['tmp_name'];
            $ruta_imagen = "uploads/" . $imagen;
            move_uploaded_file($imagen_tmp, $ruta_imagen);
            $sqlActualizar = "UPDATE tours SET descripcion = ?, fecha = ?, hora = ?, precio_boleto = ?, tickets_disponibles = ?, imagen = ? WHERE id_tour = ?";
            $stmt = $conn->prepare($sqlActualizar);
            $stmt->bind_param("ssssisi", $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles, $ruta_imagen, $idTour);
        } else {
            // Si no se subió imagen, no actualizar el campo imagen
            $sqlActualizar = "UPDATE tours SET descripcion = ?, fecha = ?, hora = ?, precio_boleto = ?, tickets_disponibles = ? WHERE id_tour = ?";
            $stmt = $conn->prepare($sqlActualizar);
            $stmt->bind_param("ssssii", $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles, $idTour);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Tour actualizado con éxito'); window.location.href='gestionTours.php';</script>";
        } else {
            echo "<script>alert('Error al actualizar el tour');</script>";
        }
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
?>

    <div class="container mt-5">
        <h2>Editar Tour</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?= isset($tour['Descripcion']) ? htmlspecialchars($tour['Descripcion']) : '' ?></textarea>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?= isset($tour['Fecha']) ? htmlspecialchars($tour['Fecha']) : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" id="hora" name="hora" value="<?= isset($tour['Hora']) ? htmlspecialchars($tour['Hora']) : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="precio_boleto" class="form-label">Precio del Boleto</label>
                <input type="number" class="form-control" id="precio_boleto" name="precio_boleto" value="<?= isset($tour['Precio_Boleto']) ? htmlspecialchars($tour['Precio_Boleto']) : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="tickets_disponibles" class="form-label">Tickets Disponibles</label>
                <input type="number" class="form-control" id="tickets_disponibles" name="tickets_disponibles" value="<?= isset($tour['Tickets_Disponibles']) ? htmlspecialchars($tour['Tickets_Disponibles']) : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen (Opcional)</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                <small class="form-text text-muted">Deja el campo vacío si no deseas cambiar la imagen actual.</small>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Tour</button>
            <a href="gestionTours.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>