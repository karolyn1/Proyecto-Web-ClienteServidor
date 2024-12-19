<?php
include("conexion.php");
$data = $_POST;
switch($data['action']){
    case 'eliminar':
        $idTour = $data['id'];

        // Verificar si hay registros en usuario_tour
        $sql = "SELECT * FROM usuario_tour WHERE ID_Tour = '$idTour'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            // Si hay registros, desactivamos el tour
            $update = "UPDATE tours SET Estado = 0 WHERE ID_Tour = '$idTour'";
            $ejec = $conn->query($update);
            if($ejec) {
                echo json_encode(["status" => "00", "message" => "El tour ha sido desactivado correctamente"]);
            } else {
                echo json_encode(["status" => "99", "message" => "El tour no ha sido desactivado correctamente"]);
            }
        } else {
            // Si no hay registros, eliminamos el tour
            $delete = "DELETE FROM tours WHERE ID_Tour = '$idTour'";  // Corregir DELETE FROM
            $result = $conn->query($delete);
            if($result){
                echo json_encode(["status" => "00", "message" => "El tour ha sido eliminado correctamente"]); 
            } else {
                echo json_encode(["status" => "99", "message" => "El tour no ha sido eliminado correctamente"]);
            }
        }
        break;
        default:   
        break;
}

   







?>