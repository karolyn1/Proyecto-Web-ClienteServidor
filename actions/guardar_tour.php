<?php
// Verifica si el archivo de conexión existe antes de incluirlo
$rutaConexion = realpath('conexion.php');
if (!$rutaConexion || !file_exists($rutaConexion)) {
    die('Error: No se encuentra el archivo de conexión en ' . $rutaConexion);
}
require $rutaConexion;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $descripcion = $_POST['descripcion'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $precio_boleto = $_POST['precio_boleto'] ?? 0;
    $tickets_disponibles = $_POST['tickets_disponibles'] ?? 0;
    $nombre = $_POST['nombre'] ?? '';
    $estado = $_POST['estado'] ??'';

    // Verifica si se ha subido una imagen
    if (empty($_FILES['imagen']['name'])) {
        echo json_encode([  // Responder con un error JSON
            "status" => "99",
            "message" => "Por favor, sube una imagen para el tour."
        ]);
        exit;
    }

    // Variable para almacenar el nombre de la imagen
    $image_name = null;

    // Si se subió una imagen
    $target_dir = "../imagenes/";
    $image_name = basename($_FILES["imagen"]["name"]);
    $target_file = $target_dir . $image_name;

    // Verifica si el archivo se sube correctamente
    if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        echo json_encode([  // Responder con un error JSON
            "status" => "99",
            "message" => "Error al mover el archivo de imagen."
        ]);
        exit;
    }

    // Inserta los datos en la base de datos, incluyendo la imagen
    $sql = "INSERT INTO tours (nombre, descripcion, fecha, hora, precio_boleto, tickets_disponibles, TicketsVendidos, imagen, Estado) 
            VALUES (?,?, ?, ?, ?, ?, 0, ?,1)";

    if ($stmt = $conn->prepare($sql)) {
        // Vincula los parámetros (la imagen se pasa como string)
        $stmt->bind_param(
            "ssssdis",
            $nombre, 
            $descripcion, 
            $fecha, 
            $hora, 
            $precio_boleto, 
            $tickets_disponibles, 
            $image_name
        );

        if ($stmt->execute()) {
            // Devuelve una respuesta de éxito en formato JSON
            echo json_encode([
                "status" => "00",
                "message" => "Tour registrado correctamente."
            ]);
        } else {
            // Error al ejecutar la consulta
            echo json_encode([
                "status" => "99",
                "message" => "Error al registrar el tour: " . $stmt->error
            ]);
        }
        $stmt->close();
    } else {
        // Error al preparar la consulta SQL
        echo json_encode([
            "status" => "99",
            "message" => "Error al preparar la consulta SQL."
        ]);
    }
}

// Cierra la conexión
$conn->close();
?>
