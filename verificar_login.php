<?php
session_start();

// Respuesta por defecto
$response = [
    "logueado" => false
];

// Verificar si hay un usuario logueado
if (isset($_SESSION['usuario_id'])) {
    $response["logueado"] = true;
}

// Enviar respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>