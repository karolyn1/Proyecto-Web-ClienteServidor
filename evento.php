<?php
// Iniciar sesión
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
include("actions/conexion.php");

// Verificar si se envió un ID válido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de evento inválido.");
}

$id_evento = intval($_GET['id']);

// Consultar los detalles del evento
$sql = "SELECT * FROM eventos WHERE ID_Evento = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_evento);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("El evento no existe.");
}

$evento = $result->fetch_assoc();

// Procesar la reserva
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cantidad_tickets = intval($_POST['cantidad_tickets']);
    $metodo_pago = $_POST['metodo_pago'];
    $error = '';

    if ($cantidad_tickets <= 0) {
        $error = "La cantidad de tickets debe ser mayor a 0.";
    } elseif ($cantidad_tickets > $evento['Cupos']) {
        $error = "No hay suficientes cupos disponibles.";
    } else {
        // Actualizar los cupos del evento
        $cupos_restantes = $evento['Cupos'] - $cantidad_tickets;
        $cupos_vendidos = $evento['CuposVendidos'] + $cantidad_tickets;

        $update_sql = "UPDATE eventos SET Cupos = ?, CuposVendidos = ? WHERE ID_Evento = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("iii", $cupos_restantes, $cupos_vendidos, $id_evento);

        if ($update_stmt->execute()) {
            // Insertar en la tabla usuario_evento
            $id_usuario = $_SESSION['usuario_id']; // Obtener ID del usuario de la sesión
            $total = $evento['Costo'] * $cantidad_tickets;

            $insert_sql = "INSERT INTO usuario_evento (ID_Usuario, ID_Evento, MetodoPago, BoletosAdquiridos, Total) 
                           VALUES (?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("iisid", $id_usuario, $id_evento, $metodo_pago, $cantidad_tickets, $total);

            if ($insert_stmt->execute()) {
                $success = "Reserva realizada exitosamente.";
                header("Location: " . $_SERVER['REQUEST_URI']); // Recarga la página actual
                exit();
            } else {
                $error = "Error al guardar la reserva en la base de datos.";
            }
        } else {
            $error = "Error al realizar la reserva.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CasaNatura - Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
</head>

<body>
    <nav>
        <?php include("fragmentos.php");
        echo $navbar; ?>
    </nav>

    <main>
        <div class="container mt-5">
            <div class="row">
                <!-- Columna de Información del Evento -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="p-4 rounded shadow-sm bg-light">
                        <!-- Imagen -->
                        <div class="text-center mb-3">
                            <img src="imagenes/<?php echo htmlspecialchars($evento['Imagen']); ?>"
                                alt="Imagen del Evento" class="imagen-tour">
                        </div>

                        <!-- Información -->
                        <h2 class="titulo mb-3 text-center"><?php echo htmlspecialchars($evento['Nombre']); ?></h2>
                        <ul class="infoEvento list-unstyled">
                            <li><strong>Descripción:</strong>
                                <?php echo nl2br(htmlspecialchars($evento['Descripcion'])); ?></li>
                            <li><strong>Fecha:</strong> <?php echo htmlspecialchars($evento['Fecha']); ?></li>
                            <li><strong>Hora:</strong> <?php echo substr($evento['Hora'], 0, 5); ?></li>
                            <li><strong>Precio por boleto:</strong>
                                $<?php echo htmlspecialchars($evento['Costo']); ?></li>
                            <li><strong>Cupos disponibles:</strong>
                                <?php echo htmlspecialchars($evento['Cupos']); ?></li>
                        </ul>
                    </div>
                </div>

                <!-- Columna del Formulario -->
                <div class="col-md-6">
                    <div class="p-4 rounded shadow-sm bg-white">
                        <h2 class="titulo text-center">COMPRA TUS TICKETS</h2>

                        <!-- Alertas -->
                        <?php if (isset($success)): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php elseif (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <!-- Formulario -->
                        <form method="POST" class="form-agregar-animal">
                            <div class="mb-3">
                                <label for="cantidad_tickets" class="form-label">Cantidad de Tickets</label>
                                <input type="number" id="cantidad_tickets" name="cantidad_tickets" class="form-control"
                                    min="1" max="<?php echo $evento['Cupos']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="metodo_pago" class="form-label">Método de Pago</label>
                                <select id="metodo_pago" name="metodo_pago" class="form-select" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="SINPE Móvil">SINPE Móvil</option>
                                </select>
                            </div>

                            <!-- Botón -->
                            <div class="text-center mt-4">
                                <button type="submit" class="submit-btn">COMPRAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include("fragmentos.php");
    echo $footer; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>