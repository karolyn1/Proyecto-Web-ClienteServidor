<?php
session_start();
include("actions/conexion.php"); // Incluir el archivo de conexión

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redirigir al login si no está logueado
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Consulta para obtener los boletos del usuario logueado
$query = "
    SELECT 
        ut.ID_Relacion_UT, 
        t.Nombre, 
        ut.BoletosAdquridos, 
        ut.Total, 
        t.Fecha, 
        t.Hora, 
        t.Imagen
    FROM usuario_tour ut
    INNER JOIN tours t ON ut.ID_Tour = t.ID_Tour
    WHERE ut.ID_Usuario = ?
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
    <title>Casa Natura - Mis Boletos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('fragmentos.php'); echo $navbar; ?>

    <main>
        <div class="container mt-4">
            <h1 class="text-center">Mis Boletos</h1>
            <p class="text-center text-muted">Aquí se muestran los tours que has adquirido.</p>

            <div class="row">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($boleto = $result->fetch_assoc()): ?>
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <img src="imagenes/<?php echo $boleto['Imagen']; ?>" class="card-img-top" alt="Imagen del Tour">
                                <div class="card-body">
                                    <h5 class="card-title">Tour: <?php echo $boleto['Nombre']; ?></h5>
                                    <p class="card-text"><strong>Boleto(s) Adquirido(s):</strong> <?php echo $boleto['BoletosAdquridos']; ?></p>
                                    <p class="card-text"><strong>Total:</strong> $<?php echo number_format($boleto['Total'], 2); ?></p>
                                    <p class="card-text"><strong>Fecha del Tour:</strong> <?php echo date("d-m-Y", strtotime($boleto['Fecha'])); ?></p>
                                    <p class="card-text"><strong>Hora del Tour:</strong> <?php echo date("H:i", strtotime($boleto['Hora'])); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="alert alert-info" role="alert">
                        No tienes boletos adquiridos aún. ¡Explora nuestros tours y adquiere el tuyo!
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
