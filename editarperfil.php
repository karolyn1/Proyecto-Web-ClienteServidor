<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
include('./actions/conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Obtener datos del usuario
$query_usuario = "
    SELECT Nombre, Apellido1, Apellido2, Correo, Telefono 
    FROM usuario 
    WHERE ID_Usuario = ?
";
$stmt_usuario = $conn->prepare($query_usuario);
$stmt_usuario->bind_param("i", $usuario_id);
$stmt_usuario->execute();
$result_usuario = $stmt_usuario->get_result();
$usuario = $result_usuario->fetch_assoc();

// Obtener dirección del usuario
$query_direccion = "
    SELECT Direccion_Exacta, Provincia, Canton, Distrito 
    FROM direccion 
    WHERE ID_Usuario = ?
";
$stmt_direccion = $conn->prepare($query_direccion);
$stmt_direccion->bind_param("i", $usuario_id);
$stmt_direccion->execute();
$result_direccion = $stmt_direccion->get_result();
$direccion = $result_direccion->fetch_assoc();

// Consultar donaciones
$query_donaciones = "
    SELECT 
        Monto, 
        Fecha, 
        MetodoPago, 
        CASE 
            WHEN Estado = 1 THEN 'Recurrente' 
            ELSE 'Única' 
        END AS Frecuencia 
    FROM donaciones 
    WHERE ID_Usuario = ?
    ORDER BY Fecha DESC
    LIMIT 5
";
$stmt_donaciones = $conn->prepare($query_donaciones);
$stmt_donaciones->bind_param("i", $usuario_id);
$stmt_donaciones->execute();
$result_donaciones = $stmt_donaciones->get_result();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Mi Perfil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

        <div class="dashboard-container">
            <div class="col main-content-perfil">
                <div class="row container card-container flex">
                    <!-- Tarjeta de Información de la Cuenta -->
                    <div class="m-5 card">
                        <h2>TU CUENTA</h2>
                        <p><strong>Nombre:</strong> <?php echo $usuario['Nombre'] . ' ' . $usuario['Apellido1'] . ' ' . $usuario['Apellido2']; ?></p>
                        <p><strong>Email:</strong> <?php echo $usuario['Correo']; ?></p>
                        <p><strong>Teléfono:</strong> <?php echo $usuario['Telefono']; ?></p>
                    </div>

                    <!-- Tarjeta de Dirección de Usuario -->
                    <div class="m-5 card">
                        <h2>TU DIRECCIÓN</h2>
                        <p><strong>Dirección Exacta:</strong> <?php echo $direccion['Direccion_Exacta']; ?></p>
                        <p><strong>Provincia:</strong> <?php echo $direccion['Provincia']; ?></p>
                        <p><strong>Cantón:</strong> <?php echo $direccion['Canton']; ?></p>
                        <p><strong>Distrito:</strong> <?php echo $direccion['Distrito']; ?></p>
                    </div>

                    <div class="container contenedor-tabla mb-5">
                        <h2 class="perfil-title-donaciones">MIS DONACIONES</h2>
                        <br>
                        <table class="tabla text-center">
                            <thead>
                                <tr>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Método de Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result_donaciones->num_rows > 0): ?>
                                    <?php while ($donacion = $result_donaciones->fetch_assoc()): ?>
                                        <tr>
                                            <td>$<?php echo number_format($donacion['Monto'], 2); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($donacion['Fecha'])); ?></td>
                                            <td><?php echo $donacion['MetodoPago']; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No tienes donaciones registradas.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
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

<?php
// Cerrar la conexión
$stmt_usuario->close();
$stmt_direccion->close();
$stmt_donaciones->close();
$conn->close();
?>
