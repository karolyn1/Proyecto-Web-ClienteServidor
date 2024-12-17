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
        $descripcion = $_POST['descripcion'];
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $precio_boleto = $_POST['costo'];
        $tickets_disponibles = $_POST['cupos'];
        $lugar = $_POST['Lugar'];

        // Verificar si se subió una nueva imagen
        if ($_FILES['imagen']['error'] == 0) {
            $imagen = $_FILES['imagen']['name'];
            $imagen_tmp = $_FILES['imagen']['tmp_name'];
            $ruta_imagen = "imagenes/" . $imagen;

            if (!move_uploaded_file($imagen_tmp, $ruta_imagen)) {
                die("Error al mover la imagen al directorio.");
            }

            $sqlActualizar = "UPDATE eventos SET 
                                nombre = ?, 
                                descripcion = ?, 
                                fecha = ?, 
                                hora = ?, 
                                costo = ?, 
                                cupos = ?, 
                                imagen = ?, 
                                lugar = ? 
                              WHERE ID_Evento = ?";

            $stmt = $conn->prepare($sqlActualizar);
            if (!$stmt) {
                die("Error en la preparación del SQL: " . $conn->error);
            }

            $stmt->bind_param(
                "ssssiissi",
                $nombre,
                $descripcion,
                $fecha,
                $hora,
                $precio_boleto,
                $tickets_disponibles,
                $ruta_imagen,
                $lugar,
                $idEvento
            );
        } else {
                $sqlActualizar = "UPDATE eventos SET 
                                    nombre = ?, 
                                    descripcion = ?, 
                                    fecha = ?, 
                                    hora = ?, 
                                    costo = ?, 
                                    cupos = ?,  
                                    lugar = ? 
                                  WHERE ID_Evento = ?";
            
                $stmt = $conn->prepare($sqlActualizar);
                if (!$stmt) {
                    die("Error en la preparación del SQL: " . $conn->error);
                }
            
                $stmt->bind_param(
                    "ssssdisi", 
                    $nombre, 
                    $descripcion, 
                    $fecha, 
                    $hora, 
                    $precio_boleto, 
                    $tickets_disponibles, 
                    $lugar, 
                    $idEvento
                );
            }
        

        if ($stmt->execute()) {
            echo "<script>window.location.href='./gestionEventos.php'; alert('Evento actualizado con éxito'); </script>";
        } else {
            echo "<script>alert('Error al actualizar el evento');</script>";
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
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="tickets_disponibles" class="form-label">Cupos</label>
                                    <input type="number" class="form-control" id="cupos" name="cupos"
                                        value="<?= isset($evento['Cupos']) ? htmlspecialchars($evento['Cupos']) : '' ?>"
                                        required>
                                </div>
                                <button type="submit" class="submit-btn">Actualizar Evento</button>
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