<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php
    include("fragmentos.php");
    echo $navbar;

    // Incluir archivo de conexión a la base de datos
    include("actions/conexion.php");
// Obtener el ID del animal desde la URL
$idAnimal = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar datos del animal
$sql = "SELECT nombre, especie, edad, estado_salud, historia, necesidades, imagen 
        FROM animal 
        WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idAnimal);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $animal = $resultado->fetch_assoc();
} else {
    echo "<p class='text-center'>El animal solicitado no existe.</p>";
    exit;
}

$stmt->close();
$conexion->close();
?>
<main>
<div class="detalleAnimal-title text-center">
        <h1>PERFIL DE <?php echo htmlspecialchars($animal['nombre']); ?></h1>
    </div>

    <div class="container-animal">
        <div class="header">
            <img src="ruta_a_imagenes/<?php echo htmlspecialchars($animal['imagen']); ?>" alt="Imagen de <?php echo htmlspecialchars($animal['nombre']); ?>">
            <div class="title">
                <h1><?php echo htmlspecialchars($animal['nombre']); ?></h1>
                <p><?php echo htmlspecialchars($animal['especie']) . ", " . htmlspecialchars($animal['edad']); ?> años</p>
            </div>
        </div>

        <div class="seccion">
            <p class="tituloSeccion">ESTADO DE SALUD</p>
            <p class="texto"><?php echo htmlspecialchars($animal['estado_salud']); ?></p>
        </div>

        <div class="seccion">
            <p class="tituloSeccion">HISTORIA</p>
            <p class="texto"><?php echo htmlspecialchars($animal['historia']); ?></p>
        </div>

        <div class="seccion">
            <p class="tituloSeccion">NECESIDADES ACTUALES</p>
            <p class="texto"><?php echo nl2br(htmlspecialchars($animal['necesidades'])); ?></p>
        </div>

        <p class="highlight">¡Ayuda a <?php echo htmlspecialchars($animal['nombre']); ?> a vivir más años en mejores condiciones!</p>

        <div class="container-boton">
            <a href="formularioApadrinamiento.php?id=<?php echo $idAnimal; ?>" class="botonApadrinar">Quiero Apadrinarlo</a>
        </div>
    </div>
</main>
<?php
    include("fragmentos.php");
    echo $footer;
?>
</body>
</html>