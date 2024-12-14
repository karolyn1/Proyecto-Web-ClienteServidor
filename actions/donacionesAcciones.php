<?php
include("conexion.php");

$data = $_POST;

switch ($data['action']) {
    case 'desactivar':
        if (isset($data["id"])) {
            $id = $_POST["id"];
            $sql = "UPDATE donaciones SET Estado = 0  WHERE ID_Donacion = '$id'";
            $result = $conn->query($sql);

            if ($result) {
                echo json_encode(["status" => "00", "message" => "Donación desactivada correctamente"]);
            } else {
                echo json_encode(["status" => "99", "message" => "Error al desactivar donación"]);
            }
        } else {
            echo json_encode(["status" => "99", "message" => "ID de donación no proporcionado."]);
        }
        break;

        default:
        break;
    };