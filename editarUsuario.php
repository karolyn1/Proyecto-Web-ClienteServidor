<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<style>

</style>
<body>
<?php 
  include("sidebar.php");
  echo $sidebarAdmin2;

include("actions/conexion.php");

// Obtener el ID del usuario desde la URL
include("actions/conexion.php");

// Obtener el ID del usuario desde la URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo "ID del usuario no proporcionado.";
    exit;
}

// Obtener los datos del usuario
$sql = "SELECT a.Nombre, a.Apellido1, a.Apellido2, a.Correo, b.Rol
        FROM usuario a
        INNER JOIN roles b ON a.ID_Usuario = b.ID_Usuario
        WHERE a.ID_Usuario = '$id'";
$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Usuario no encontrado.";
    exit;
}
?>

<div id="viewport">
    <div id="content">
        <nav class="navbar navbar-default user">
            <div class="container-fluid">
                <h2 class="titulo">Editar Usuario</h2>
            </div>
        </nav>
        <div class="container mt-4">
            <h1><b>EDITAR USUARIO</b></h1>
            <form action="actualizarUsuario.php" method="POST">
                <!-- Campo oculto para pasar el ID del usuario -->
                <input type="hidden" name="id" value="<?php$usuario['ID_Usuario'] ?>">

                <!-- Campos para dividir el nombre completo en nombre, apellido1 y apellido2 -->
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['Nombre'];?> " required>
                </div>
                <div class="form-group">
                    <label for="apellido1">Apellido 1</label>
                    <input type="text" id="apellido1" name="apellido1" value="<?= htmlspecialchars($usuario['Apellido1']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellido2">Apellido 2</label>
                    <input type="text" id="apellido2" name="apellido2" value="<?= htmlspecialchars($usuario['Apellido2']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($usuario['Correo']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <input type="text" id="rol" name="rol" value="<?= htmlspecialchars($usuario['Rol']) ?>" required>
                </div>
                <button type="submit" class="btn submit-btn">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>