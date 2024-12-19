<?php

session_start();
include("conexion.php");

$data = $_POST;


switch($data['action']){
    case 'add':
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $email = $data['email'];
    $mensaje = $data['mensaje'];

    if(isset($_SESSION['usuario_id'])){
        $idUsuarioSession = $_SESSION['usuario_id'] ;
        $sql = "INSERT INTO contacto (Nombre, Apellido, Email, Mensaje, ID_Usuario) 
        VALUES ('$nombre', '$apellido', '$email', '$mensaje', '$idUsuarioSession')";

        $result = $conn->query($sql);

        if($result){
            echo json_encode([
                "status" => "00",
                "message" => "Tu mensaje se ha enviado. Un administrador te contactará pronto.",
            ]);
        } else {
            echo json_encode([
                "status" => "99",
                "message" => "Lo sentimos. Hubo un problema con el envio del mensaje.",
            ]);
        }

    } else {
        $sql = "INSERT INTO contacto (Nombre, Apellido, Email, Mensaje) 
        VALUES ('$nombre', '$apellido', '$email', '$mensaje')";

        $result = $conn->query($sql);

        if($result){
            echo json_encode([
                "status" => "00",
                "message" => "Tu mensaje se ha enviado. Un administrador te contactará pronto.",
            ]);
        } else {
            echo json_encode([
                "status" => "99",
                "message" => "Lo sentimos. Hubo un problema con el envio del mensaje.",
            ]);
        }
    }
    break;

    default:
    break;
}













?>