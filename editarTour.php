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
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include("sidebar.php");
    include("actions/conexion.php");
    echo $sidebarAdmin2;

    // Verificar si se ha recibido un ID de tour
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idTour = intval($_GET['id']); // Convertir a entero para mayor seguridad
    

        // Consultar los datos del tour
        $sql = "SELECT * FROM tours WHERE ID_Tour = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idTour);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $tour = $resultado->fetch_assoc();
        } else {
            echo "<script>alert('No se encontró ningún tour con ese ID.');</script>";
            exit;
        }
        $stmt->close();
    } else {
        echo "<script>alert('ID de tour no válido.');</script>";
        exit;
    }

    // Procesar la edición del tour
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validar entradas
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;
        $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : null;
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
        $hora = isset($_POST['hora']) ? $_POST['hora'] : null;
        $precio_boleto = isset($_POST['precio_boleto']) ? (float) $_POST['precio_boleto'] : null;
        $tickets_disponibles = isset($_POST['tickets_disponibles']) ? (int) $_POST['tickets_disponibles'] : null;
        $estado = isset($_POST['estadoTour']) ? (int) $_POST['estadoTour'] : null;

        if (!$nombre || !$descripcion || !$fecha || !$hora || !$precio_boleto || !$tickets_disponibles) {
            echo "<script>alert('Todos los campos son obligatorios.');</script>";
            exit;
        }

        // Manejar la imagen
        $ruta_imagen = null;
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen = $_FILES['imagen']['name'];
            $imagen_tmp = $_FILES['imagen']['tmp_name'];
            $ruta_imagen = "imagenes/" . basename($imagen);
            if (!move_uploaded_file($imagen_tmp, $ruta_imagen)) {
                echo "<script>alert('Error al subir la imagen.');</script>";
                exit;
            }
        }

        // Construir la consulta
        if ($ruta_imagen) {
            $sqlActualizar = "UPDATE tours SET Nombre = ?, Descripcion = ?, Fecha = ?, Hora = ?, Precio_Boleto = ?, Tickets_Disponibles = ?, Imagen = ?, Estado = ? WHERE ID_Tour = ?";
            $stmt = $conn->prepare($sqlActualizar);
            $stmt->bind_param("ssssdisii", $nombre, $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles, $ruta_imagen, $estado, $idTour);
        } else {
            $sqlActualizar = "UPDATE tours SET Nombre = ?, Descripcion = ?, Fecha = ?, Hora = ?, Precio_Boleto = ?, Tickets_Disponibles = ?, Estado = ? WHERE ID_Tour = ?";
            $stmt = $conn->prepare($sqlActualizar);
            $stmt->bind_param("ssssdiii", $nombre, $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles, $estado, $idTour);
        }

        // Ejecutar y verificar
        if ($stmt->execute()) {
            $mensaje = "Tour actualizado con éxito.";
            $estado = "success";
        } else {
            $mensaje = "Error al actualizar el tour.";
            $estado = "error";
        }
        $stmt->close();
        $conn->close();
    }
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

                        <form method="POST" id="tourEditar" class="form-agregar-animal" enctype="multipart/form-data">
                            <input type="hidden" id="idTour" name="idTour"
                                value="<?= isset($tour['ID_Tour']) ? $tour['ID_Tour'] : '' ?>">
                            <div class="profile-pic">
                                <img id="profileImage" src="imagenes/<?php echo $tour['Imagen']; ?>">
                                <input type="file" id="imagen" name="imagen" onchange="loadFile(event)">
                                <label for="imagen" class="form-label">Imagen (Opcional)</label>
                                <span id="error-file">La imagen es obligatoria.</span>

                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Nombre</label>
                                    <textarea class="form-control" id="nombreTour" name="nombre"
                                        required><?= isset($tour['Nombre']) ? htmlspecialchars($tour['Nombre']) : '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion"
                                        required><?= isset($tour['Descripcion']) ? htmlspecialchars($tour['Descripcion']) : '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha"
                                        value="<?= isset($tour['Fecha']) ? htmlspecialchars($tour['Fecha']) : '' ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="hora" class="form-label">Hora</label>
                                    <input type="time" class="form-control" id="hora" name="hora"
                                        value="<?= isset($tour['Hora']) ? date('H:i', strtotime($tour['Hora'])) : '' ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="precio_boleto" class="form-label">Precio del Boleto</label>
                                    <input type="number" class="form-control" id="precio_boleto" name="precio_boleto"
                                        value="<?= isset($tour['Precio_Boleto']) ? htmlspecialchars($tour['Precio_Boleto']) : '' ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="tickets_disponibles" class="form-label">Tickets Disponibles</label>
                                    <input type="number" class="form-control" id="tickets_disponibles"
                                        name="tickets_disponibles"
                                        value="<?= isset($tour['Tickets_Disponibles']) ? htmlspecialchars($tour['Tickets_Disponibles']) : '' ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="estadoTour" class="form-label">Estado</label>
                                    <select class="form-control" id="estadoTour" name="estadoTour" required>
                                        <option value="1" <?= isset($tour['Estado']) && $tour['Estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                                        <option value="0" <?= isset($tour['Estado']) && $tour['Estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                                    </select>
                                </div>
                                <button type="submit" class="submit-btn">Actualizar Tour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Modal para mensajes -->
    <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mensajeModalLabel">Casa Natura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <?= isset($mensaje) ? htmlspecialchars($mensaje) : '' ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="submit-btn" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($mensaje)): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const mensajeModal = new bootstrap.Modal(document.getElementById('mensajeModal'));
                mensajeModal.show();

                // Espera a que el modal se cierre y luego redirige
                mensajeModal._element.addEventListener('hidden.bs.modal', function () {
                    // Redirige solo si el estado es 'success'
                    <?php if ($estado == 'success'): ?>
                        window.location.href = "gestionTours.php";
                        $mensaje = '';
                    <?php endif; ?>
                });
            });
        </script>
    <?php endif; ?>
    <?php
    include("sidebar.php");
    echo $footerAdmin; ?>
    </div>
</body>

</html>