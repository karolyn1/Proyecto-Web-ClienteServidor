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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Casa Natura</title><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body>
    <nav>
    <?php
    include('fragmentos.php');
    echo $navbar;
    include('./actions/conexion.php');
    ?>
    </nav>

    <main>
    <?php
    include('fragmentos.php');
    echo $opciones;
    ?>
        <div class="container mt-4">
            <h1 class="perfil-title-donaciones text-center mt-5">MIS BOLETOS</h1>
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
