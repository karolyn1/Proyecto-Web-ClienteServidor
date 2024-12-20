<?php

session_start();
include("conexion.php");

$data = $_POST;


switch ($data['action']) {
    case 'add':
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $email = $data['email'];
        $mensaje = $data['mensaje'];

        if (isset($_SESSION['usuario_id'])) {
            $idUsuarioSession = $_SESSION['usuario_id'];
            $sql = "INSERT INTO contacto (Nombre, Apellido, Email, Mensaje, ID_Usuario) 
            VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $nombre, $apellido, $email, $mensaje, $idUsuarioSession);
        } else {
            $sql = "INSERT INTO contacto (Nombre, Apellido, Email, Mensaje) 
            VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $nombre, $apellido, $email, $mensaje);
        }

        if ($stmt->execute()) {
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
        $stmt->close();
        break;

    default:
        break;
}













?>