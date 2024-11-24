<?php
// Incluir el archivo de conexión a la base de datos
require 'conexion.php';

// Consultas para obtener los datos

// 1. Obtener el número de usuarios registrados
$sql_usuarios = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
$result_usuarios = $conn->query($sql_usuarios);
$total_usuarios = 0;
if ($result_usuarios->num_rows > 0) {
    $row = $result_usuarios->fetch_assoc();
    $total_usuarios = $row['total_usuarios'];
}

// 2. Obtener el número de animales registrados
$sql_animales = "SELECT COUNT(*) AS total_animales FROM animales";
$result_animales = $conn->query($sql_animales);
$total_animales = 0;
if ($result_animales->num_rows > 0) {
    $row = $result_animales->fetch_assoc();
    $total_animales = $row['total_animales'];
}

// 3. Obtener el número de animales apadrinados
$sql_animales_apadrinados = "SELECT COUNT(*) AS total_apadrinados FROM animales WHERE apadrinado = 1";
$result_animales_apadrinados = $conn->query($sql_animales_apadrinados);
$total_apadrinados = 0;
if ($result_animales_apadrinados->num_rows > 0) {
    $row = $result_animales_apadrinados->fetch_assoc();
    $total_apadrinados = $row['total_apadrinados'];
}

// 4. Obtener el total de donaciones
$sql_total_donaciones = "SELECT SUM(monto) AS total_donaciones FROM donaciones";
$result_total_donaciones = $conn->query($sql_total_donaciones);
$total_donaciones = 0;
if ($result_total_donaciones->num_rows > 0) {
    $row = $result_total_donaciones->fetch_assoc();
    $total_donaciones = $row['total_donaciones'];
}

// 5. Obtener las últimas donaciones
$sql_donaciones = "
    SELECT donaciones.monto, donaciones.fecha, usuarios.nombre
    FROM donaciones
    JOIN usuarios ON donaciones.id_usuario = usuarios.id
    ORDER BY donaciones.fecha DESC LIMIT 5
";
$result_donaciones = $conn->query($sql_donaciones);
$donaciones = [];
if ($result_donaciones->num_rows > 0) {
    while ($row = $result_donaciones->fetch_assoc()) {
        $donaciones[] = $row;
    }
}

// Retornar los datos
return [
    'total_usuarios' => $total_usuarios,
    'total_animales' => $total_animales,
    'total_apadrinados' => $total_apadrinados,
    'total_donaciones' => $total_donaciones,
    'donaciones' => $donaciones
];
?>