<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Gestion de Animales</title>
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
       include("actions/conexion.php");
       echo $sidebarAdmin2;// Incluir archivo de conexión

    // Verificar si se ha recibido un ID de tour
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idTour = $_GET['id'];


        // Consultar los datos del tour
        $sql = "SELECT * FROM tours WHERE ID_Tour = ?";
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
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $precio_boleto = $_POST['precio_boleto'];
        $tickets_disponibles = $_POST['tickets_disponibles'];

        // Verificar si se subió una nueva imagen
        if ($_FILES['imagen']['error'] == 0) {
            $imagen = $_FILES['imagen']['name'];
            $imagen_tmp = $_FILES['imagen']['tmp_name'];
            $ruta_imagen = "imagenes/" . $imagen;
            move_uploaded_file($imagen_tmp, $ruta_imagen);
            $sqlActualizar = "UPDATE tours SET nombre = ?, descripcion = ?, fecha = ?, hora = ?, precio_boleto = ?, tickets_disponibles = ?, imagen = ? WHERE id_tour = ?";
            $stmt = $conn->prepare($sqlActualizar);
            $stmt->bind_param("ssssdisi", $nombre, $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles, $ruta_imagen, $idTour);
        } else {
            // Si no se subió imagen, no actualizar el campo imagen
            $sqlActualizar = "UPDATE tours SET  nombre = ?, descripcion = ?, fecha = ?, hora = ?, precio_boleto = ?, tickets_disponibles = ? WHERE id_tour = ?";
            $stmt = $conn->prepare($sqlActualizar);
            $stmt->bind_param("ssssdii", $nombre, $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles, $idTour);
        }

        if ($stmt->execute()) {
            echo "<script>window.location.href='gestionTours.php'; alert('Tour actualizado con éxito'); </script>";
        } else {
            echo "<script>alert('Error al actualizar el tour');</script>";
        }
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
?>
    <main>
        <div CLASS="viewport">
            <div class="content">
                <nav class="navbar ">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Tours</h2>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="container-animales-agregar container mt-4">

                        <h1><b>EDITAR TOUR</b></h1>

                        <form method="POST" class="form-agregar-animal" enctype="multipart/form-data">
                            <div class="profile-pic">
                                <img id="profileImage" src="imagenes/<?php echo $tour['Imagen']; ?>">
                                <input type="file" id="imagen" name="imagen"
                                    onchange="loadFile(event)">
                                <label for="imagen" class="form-label">Imagen (Opcional)</label>
                                <span id="error-file">La imagen es obligatoria.</span>

                            </div>
                            <div class="form-group">
                            <div class="mb-3">
                <label for="descripcion" class="form-label">Nombre</label>
                <textarea class="form-control" id="nombreTour" name="nombre" required><?= isset($tour['Nombre']) ? htmlspecialchars($tour['Nombre']) : '' ?></textarea>
            </div>
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
    <input type="time" class="form-control" id="hora" name="hora" value="<?= isset($tour['Hora']) ? date('H:i', strtotime($tour['Hora'])) : '' ?>" required>
</div>
            <div class="mb-3">
                <label for="precio_boleto" class="form-label">Precio del Boleto</label>
                <input type="number" class="form-control" id="precio_boleto" name="precio_boleto" value="<?= isset($tour['Precio_Boleto']) ? htmlspecialchars($tour['Precio_Boleto']) : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="tickets_disponibles" class="form-label">Tickets Disponibles</label>
                <input type="number" class="form-control" id="tickets_disponibles" name="tickets_disponibles" value="<?= isset($tour['Tickets_Disponibles']) ? htmlspecialchars($tour['Tickets_Disponibles']) : '' ?>" required>
            </div>
            <button type="submit" class="submit-btn">Actualizar Tour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include("sidebar.php");
    echo $footerAdmin; ?>
    </div>
</body>
</html>