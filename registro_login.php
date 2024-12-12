<?php
session_start();
include_once __DIR__ . '/actions/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $provincia = $_POST['provincia'];
    $canton = $_POST['canton'];
    $distrito = $_POST['distrito'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($conn) {
        $query = "INSERT INTO usuario (nombre, primer_apellido, segundo_apellido, provincia, canton, distrito, direccion, correo, password) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param(
            'sssssssss',
            $nombre,
            $primer_apellido,
            $segundo_apellido,
            $provincia,
            $canton,
            $distrito,
            $direccion,
            $correo,
            $password
        );

        if ($stmt->execute()) {
            $_SESSION['usuario_nombre'] = $nombre;
            header("Location: registro_login.php?registro=exitoso");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error al registrar usuario. Por favor, inténtalo nuevamente.</div>";
        }
    } else {
        die("Error de conexión a la base de datos.");
    }
}
?>