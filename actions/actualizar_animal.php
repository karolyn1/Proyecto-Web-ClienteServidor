<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idAnimal'])) {
        $ID_Animal = $_POST['idAnimal'];
        $nombre = $_POST['NombreEditar'];
        $especie = $_POST['especieEditar'];
        $raza = $_POST['razaEditar'];
        $fecha_ingreso = $_POST['fecha_ingresoEditar'];
        $estado_salud = $_POST['estado_saludEditar'];
        $fecha_nacimiento = $_POST['fecha_nacimientoEditar'];
        $historia = $_POST['historiaEditar'];
        $necesidades = $_POST['necesidadesEditar'];
        $apadrinado = $_POST['apadrinadoEditar'];

        $uploadDir = 'img/';
        $destPath = '';

        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $fileType = $_FILES['file']['type'];
            $destPath = $uploadDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Actualizar con nueva imagen
                $query = "UPDATE animal 
                          SET Nombre = '$nombre', Raza = '$raza', Especie = '$especie', Fecha_Ingreso = '$fecha_ingreso', 
                              Estado_Salud = '$estado_salud', Fecha_Nacimiento = '$fecha_nacimiento', Historia = '$historia', 
                              Necesidades = '$necesidades', Imagen = '$destPath', Apadrinado = '$apadrinado' 
                          WHERE ID_Animal = '$ID_Animal'";
            } else {
                echo json_encode(["status" => "99", "message" => "Error al subir la imagen."]);
                exit;
            }
        } else {
            // Actualizar sin nueva imagen
            $query = "UPDATE animal 
                      SET Nombre = '$nombre', Raza = '$raza', Especie = '$especie', Fecha_Ingreso = '$fecha_ingreso', 
                          Estado_Salud = '$estado_salud', Fecha_Nacimiento = '$fecha_nacimiento', Historia = '$historia', 
                          Necesidades = '$necesidades', Apadrinado = '$apadrinado' 
                      WHERE ID_Animal = '$ID_Animal'";
        }

        // Ejecutar la consulta de actualización
        try {
            if ($conn->query($query) === TRUE) {
                echo json_encode(["status" => "00", "message" => "Animal actualizado correctamente"]);
                header('Location: /Proyecto-Web-ClienteServidor/gestionAnimales.php');    
            } else {
                echo json_encode(["status" => "99", "message" => "Error al actualizar animal"]);
            }
        } catch (Exception $e) {
            echo json_encode(["status" => "99", "message" => "Error al actualizar animal"]);
        }
    } else {
        echo json_encode(["status" => "99", "message" => "ID de animal no proporcionado"]);
    }

}
?>