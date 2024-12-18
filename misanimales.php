<?php
session_start();
include('actions/conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Verificar si se ha presionado el botón de finalizar apadrinamiento
if (isset($_POST['finalizar_apadrinamiento'])) {
    $id_animal = $_POST['id_animal'];
    $fecha_finalizacion = date('Y-m-d'); // Fecha actual

    // Actualizar la fecha de finalización en la base de datos
    $query_update = "
        UPDATE animal_usuario
        SET FechaFin = ?
        WHERE ID_Usuario = ? AND ID_Animal = ? AND FechaFin IS NULL
    ";

    $stmt_update = $conn->prepare($query_update);
    $stmt_update->bind_param("sii", $fecha_finalizacion, $usuario_id, $id_animal);
    $stmt_update->execute();
    $stmt_update->close();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Mis Animales</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Casa Natura</title>
    <style>
        .card-title {
            text-align: center; /* Centra el nombre del animal */
        }
    </style>
</head>
<body>
    <?php
    include('fragmentos.php');
    echo $navbar;
    ?>
    <main>
        <?php
        include('fragmentos.php');
        echo $opciones;
        ?>
        <h2 class="perfil-title-donaciones text-center m-5">MIS ANIMALES</h2>
        <div class="dashboard-container">
            <br>
            <div class="main-content-perfil">
                <div class="row container card-container">
                    <?php
                    // Consulta para obtener los animales apadrinados del usuario actual
                    $query = "
                        SELECT a.ID_Animal, a.Nombre, a.Historia, a.Imagen, a.Raza, a.Especie, a.Estado_Salud
                        FROM animal a
                        INNER JOIN animal_usuario au ON a.ID_Animal = au.ID_Animal
                        WHERE au.ID_Usuario = ? AND au.FechaFin IS NULL
                        ORDER BY au.FechaApadrinamiento DESC
                    ";

                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $usuario_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Verificar si la imagen existe, si no, usar una imagen por defecto
                            $imagen = $row['Imagen'];
                            if (empty($imagen) || !file_exists($imagen)) {
                                $imagen = 'ruta/a/imagen_por_defecto.jpg'; // Cambiar por la ruta de la imagen por defecto
                            }
                            ?>
                            <div class="card animales col-md-4 mb-4">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['Nombre']); ?></h5>
                                <p class="card-text"><strong>Raza:</strong> <?php echo htmlspecialchars($row['Raza']); ?></p>
                                <p class="card-text"><strong>Especie:</strong> <?php echo htmlspecialchars($row['Especie']); ?></p>
                                <p class="card-text"><strong>Estado de Salud:</strong> <?php echo htmlspecialchars($row['Estado_Salud']); ?></p>
                                <p class="card-text"><?php echo htmlspecialchars($row['Historia']); ?></p>
                                <!-- Botón para finalizar apadrinamiento -->
                                <form method="POST" action="">
                                    <input type="hidden" name="id_animal" value="<?php echo $row['ID_Animal']; ?>">
                                    <button type="submit" name="finalizar_apadrinamiento" class="btn btn-danger">Finalizar Apadrinamiento</button>
                                </form>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p class='text-center'>No tienes animales apadrinados actualmente.</p>";
                    }

                    $stmt->close();
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php
    include("fragmentos.php");
    echo $footer;
    ?>
</body>
</html>
