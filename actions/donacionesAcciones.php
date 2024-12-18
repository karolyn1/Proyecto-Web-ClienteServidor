<?php
include("conexion.php");
session_start();
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
        case 'guardar':
            $monto = $data['monto'];
            $metodoPago = $data['metodoPago'];
            $idUsuario = $_SESSION['usuario_id'];
            $sql = "INSERT INTO donaciones (Monto, Fecha, ID_Usuario, Estado, MetodoPago) VALUES
            ('$monto', CURDATE(),'$idUsuario', 1, '$metodoPago')";
            $result = $conn->query($sql);
            if($result){
                echo json_encode(["status" => "00", "message" => "Muchas gracias por tu donación. Será de gran ayuda."]);
            } else {
                echo json_encode(["status" => "99", "message" => "Lo sentimos, tu donación no pudo ser procesada"]);
            }
        default:
        break;
    };