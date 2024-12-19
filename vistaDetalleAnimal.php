<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php
    session_start();
    include("fragmentos.php");
    echo $navbar;

    // Incluir archivo de conexión a la base de datos
    include("actions/conexion.php");
    // Obtener el ID del animal desde la URL
    $idAnimal = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Consultar datos del animal
    $sql = "SELECT *
            FROM animal 
            WHERE ID_Animal = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Vincular el parámetro
    $stmt->bind_param("i", $idAnimal);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $animal = $resultado->fetch_assoc();
    } else {
        echo "<p class='text-center'>El animal solicitado no existe.</p>";
        exit;
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();
    ?>
    <main>
        <div class="detalleAnimal-title text-center">
            <h1>Conocé a <?php echo htmlspecialchars($animal['Nombre']); ?></h1>
        </div>

        <div class="container-animal">
            <div class="header">
                <img src="actions/<?php echo htmlspecialchars($animal['Imagen']); ?>"
                    alt="Imagen de <?php echo htmlspecialchars($animal['Nombre']); ?>">
                <div class="title">
                    <h1><?php echo htmlspecialchars($animal['Nombre']); ?></h1>
                    <p>Especie: <?php echo htmlspecialchars($animal['Especie']) ?>
                    </p>
                    <p>Fecha de Nacimiento: <?php echo htmlspecialchars($animal['Fecha_Nacimiento']) ?>
                    </p>
                </div>
            </div>

            <div class="seccion">
                <p class="tituloSeccion">ESTADO DE SALUD</p>
                <p class="texto"><?php echo htmlspecialchars($animal['Estado_Salud']); ?></p>
            </div>

            <div class="seccion">
                <p class="tituloSeccion">HISTORIA</p>
                <p class="texto"><?php echo htmlspecialchars($animal['Historia']); ?></p>
            </div>

            <div class="seccion">
                <p class="tituloSeccion">NECESIDADES ACTUALES</p>
                <p class="texto"><?php echo nl2br(htmlspecialchars($animal['Necesidades'])); ?></p>
            </div>

            <p class="highlight">¡Ayuda a <?php echo htmlspecialchars($animal['Nombre']); ?> a vivir más años en mejores
                condiciones!</p>

            <div class="container-boton">
                <?php if (!empty($_SESSION['usuario_id'])): ?>
                    <!-- Si el usuario está logueado, permitir redirigir -->
                    <a href="formularioApadrinamiento.php?id=<?php echo $idAnimal; ?>" class="botonApadrinar">Quiero
                        Apadrinarlo</a>
                <?php else: ?>
                    <!-- Si no está logueado, mostrar un alert al hacer clic -->
                    <a href="#" class="botonApadrinar"
                        onclick="alert('Debe iniciar sesión para apadrinar a este animal.');">Quiero Apadrinarlo</a>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php
    include("fragmentos.php");
    echo $footer;
    ?>
</body>

</html>