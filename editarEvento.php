<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Gestion de Eventos</title>
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

    include("./actions/conexion.php"); // Incluir archivo de conexión
    
    // Verificar si se ha recibido un ID de tour
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idEvento = $_GET['id'];


        // Consultar los datos del tour
        $sql = "SELECT * FROM eventos WHERE ID_Evento = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $idEvento);
            $stmt->execute();
            $resultado = $stmt->get_result();

            // Debug: Verificar si la consulta devuelve resultados
            if ($resultado->num_rows > 0) {
                $evento = $resultado->fetch_assoc();
            } else {
                echo "No se encontró ningún evento con ese ID.<br>";
            }
        } else {
            echo "Error al preparar la consulta.<br>";
        }
    } else {
        echo "ID de evento no válido.<br>";
    }

    // Procesar la edición del tour
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;
        $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : null;
        $lugar = isset($_POST['Lugar']) ? trim($_POST['Lugar']) : null;
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
        $hora = isset($_POST['hora']) ? $_POST['hora'] : null;
        $precio_boleto = isset($_POST['costo']) ? (float) $_POST['costo'] : null;
        $tickets_disponibles = isset($_POST['cupos']) ? (int) $_POST['cupos'] : null;
        $estado = isset($_POST['estado']) ? (int) $_POST['estado'] : null;

      
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

        if ($ruta_imagen) {
            $sqlActualizar = "UPDATE eventos SET 
                                Nombre = ?, 
                                Descripcion = ?, 
                                Fecha = ?, 
                                Hora = ?, 
                                Costo = ?, 
                                Cupos = ?, 
                                Imagen = ?, 
                                Lugar = ?,
                                Estado = ? 
                              WHERE ID_Evento = ?";
            $stmt = $conn->prepare($sqlActualizar);
            $stmt->bind_param("ssssdissii", $nombre, $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles, $ruta_imagen, $lugar, $estado, $idEvento);
        } else {
            $sqlActualizar = "UPDATE eventos SET 
            Nombre = ?, 
                                Descripcion = ?, 
                                Fecha = ?, 
                                Hora = ?, 
                                Costo = ?, 
                                Cupos = ?, 
                                Lugar = ?,
                                Estado = ? 
          WHERE ID_Evento = ?";
            $stmt = $conn->prepare($sqlActualizar);
            $stmt->bind_param("ssssdisii", $nombre, $descripcion, $fecha, $hora, $precio_boleto, $tickets_disponibles,$lugar, $estado, $idEvento);
        }


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
                        <h2 class="titulo">Gestión de Eventos</h2>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="container-animales-agregar container mt-4">

                        <h1><b>EDITAR EVENTO</b></h1>

                        <form method="POST" class="form-agregar-animal" enctype="multipart/form-data">
                            <div class="profile-pic">
                                <img id="profileImage" src="imagenes/<?php echo $evento['Imagen']; ?>">
                                <input type="file" id="imagen" name="imagen" onchange="loadFile(event)">
                                <label for="imagen" class="form-label">Imagen (Opcional)</label>
                                <span id="error-file">La imagen es obligatoria.</span>

                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Nombre</label>
                                    <textarea class="form-control" id="nombre" name="nombre"
                                        required><?= isset($evento['Nombre']) ? htmlspecialchars($evento['Nombre']) : '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion"
                                        required><?= isset($evento['Descripcion']) ? htmlspecialchars($evento['Descripcion']) : '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Lugar</label>
                                    <textarea class="form-control" id="Lugar" name="Lugar"
                                        required><?= isset($evento['Lugar']) ? htmlspecialchars($evento['Lugar']) : '' ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha"
                                        value="<?= isset($evento['Fecha']) ? htmlspecialchars($evento['Fecha']) : '' ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="hora" class="form-label">Hora</label>
                                    <input type="time" class="form-control" id="hora" name="hora"
                                        value="<?= isset($evento['Hora']) ? date('H:i', strtotime($evento['Hora'])) : '' ?>"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="precio_boleto" class="form-label">Costo del Boleto</label>
                                    <input type="number" class="form-control" id="costo" name="costo"
                                        value="<?= isset($evento['Costo']) ? htmlspecialchars($evento['Costo']) : '' ?>"
                                        min="0" step="0.01" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tickets_disponibles" class="form-label">Cupos</label>
                                    <input type="number" class="form-control" id="cupos" name="cupos"
                                        value="<?= isset($evento['Cupos']) ? htmlspecialchars($evento['Cupos']) : '' ?>"
                                         required>
                                </div>

                                <div class="mb-3">
                                    <label for="estadoTour" class="form-label">Estado</label>
                                    <select class="form-control" id="estado" name="estado" required>
                                        <option value="1" <?= isset($evento['Estado']) && $evento['Estado'] == 1 ? 'selected' : '' ?>>Activo</option>
                                        <option value="0" <?= isset($evento['Estado']) && $evento['Estado'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                                    </select>
                                </div>
                                <button type="submit" class="submit-btn">Actualizar Evento</button>
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
                        window.location.href = "gestionEventos.php";
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