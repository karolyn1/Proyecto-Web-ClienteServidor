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

// Consulta para obtener las donaciones del usuario logueado
$query = "
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
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
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
                <div class="row m-5 card-container">
                    <div class="container contenedor-tabla">
                        <h2 class="perfil-title-donaciones text-center">MIS DONACIONES</h2>
                        <br>
                        <table class="tabla text-center">
                            <thead>
                                <tr>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Método de Pago</th>
                                    <th>Frecuencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result->num_rows > 0): ?>
                                    <?php while ($donacion = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td>$<?php echo number_format($donacion['Monto'], 2); ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($donacion['Fecha'])); ?></td>
                                            <td><?php echo $donacion['MetodoPago']; ?></td>
                                            <td><?php echo $donacion['Frecuencia']; ?></td>
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

    <script>
        // Funciones de edición (si es necesario)
        function editarCuenta() {
            alert('Editar cuenta');
        }

        function editarDireccion() {
            alert('Editar dirección');
        }
    </script>
</body>
</html>

<?php
// Cerrar la conexión
$stmt->close();
$conn->close();
?>

