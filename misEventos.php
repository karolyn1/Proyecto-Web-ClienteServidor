<?php
session_start();
include("actions/conexion.php"); // Incluir el archivo de conexión

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redirigir al login si no está logueado
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Consulta para obtener los eventos adquiridos por el usuario logueado
$query = "
    SELECT 
        ue.ID_Relacion_UE, 
        e.Nombre, 
        ue.BoletosAdquiridos, 
        ue.Total, 
        e.Fecha, 
        e.Hora, 
        e.Imagen
    FROM usuario_evento ue
    INNER JOIN eventos e ON ue.ID_Evento = e.ID_Evento
    WHERE ue.ID_Usuario = ?
";

// Preparar la consulta
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $usuario_id); // Usar el ID del usuario logueado
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mis Eventos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<?php
    include('fragmentos.php');
    echo $navbar;
    include('./actions/conexion.php');
    ?>
    <main>
    <?php
    include('fragmentos.php');
    echo $opciones;
    ?>
    <main>
        <div class="container mt-4">
            <h1 class="titulo">MIS EVENTOS</h1>
            <p class="text-center text-muted">Aquí se muestran los eventos que has adquirido.</p>

            <div class="row">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($evento = $result->fetch_assoc()): ?>
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <img src="imagenes/<?php echo $evento['Imagen']; ?>" class="card-img-top" alt="Imagen del Evento">
                                <div class="card-body">
                                    <h5 class="card-title">Evento: <?php echo $evento['Nombre']; ?></h5>
                                    <p class="card-text"><strong>Boleto(s) Adquirido(s):</strong> <?php echo $evento['BoletosAdquiridos']; ?></p>
                                    <p class="card-text"><strong>Total:</strong> $<?php echo number_format($evento['Total'], 2); ?></p>
                                    <p class="card-text"><strong>Fecha del Evento:</strong> <?php echo date("d-m-Y", strtotime($evento['Fecha'])); ?></p>
                                    <p class="card-text"><strong>Hora del Evento:</strong> <?php echo date("H:i", strtotime($evento['Hora'])); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="alert alert-info" role="alert">
                        No tienes boletos adquiridos aún. ¡Explora nuestros eventos y adquiere el tuyo!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include('fragmentos.php'); echo $footer; ?>
</body>

</html>

<?php
// Cerrar la conexión
$stmt->close();
$conn->close();
?>
