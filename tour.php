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
    die("ID de tour inválido.");
}

$id_tour = intval($_GET['id']);

// Consultar los detalles del tour
$sql = "SELECT * FROM tours WHERE ID_Tour = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_tour);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("El tour no existe.");
}

$tour = $result->fetch_assoc();

// Procesar la reserva
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cantidad_tickets = intval($_POST['cantidad_tickets']);
    $metodo_pago = $_POST['metodo_pago'];
    $error = '';

    if ($cantidad_tickets <= 0) {
        $error = "La cantidad de tickets debe ser mayor a 0.";
    } elseif ($cantidad_tickets > $tour['Tickets_Disponibles']) {
        $error = "No hay suficientes tickets disponibles.";
    } else {
        $tickets_restantes = $tour['Tickets_Disponibles'] - $cantidad_tickets;
        $tickets_vendidos = $tour['TicketsVendidos'] + $cantidad_tickets;

        $update_sql = "UPDATE tours SET Tickets_Disponibles = ?, TicketsVendidos = ? WHERE ID_Tour = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("iii", $tickets_restantes, $tickets_vendidos, $id_tour);

        if ($update_stmt->execute()) {
            // Insertar en la tabla usuario_tour
            $id_usuario = $_SESSION['usuario_id'];  // Obtener ID del usuario de la sesión
            $total = $tour['Precio_Boleto'] * $cantidad_tickets;

            $insert_sql = "INSERT INTO usuario_tour (ID_Usuario, ID_Tour, MetodoPago, BoletosAdquridos, Total) 
                           VALUES (?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("iisid", $id_usuario, $id_tour, $metodo_pago, $cantidad_tickets, $total);

            if ($insert_stmt->execute()) {
                $success = "Reserva realizada exitosamente.";
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php 
        include("fragmentos.php");
        echo $navbar;
    ?>

    <!-- Contenido del Tour -->
    <div class="container mt-5 tour-container">
        <div class="row">
            <!-- Imagen grande a la izquierda -->
            <div class="col-md-6">
                <img src="imagenes/<?php echo htmlspecialchars($tour['Imagen']); ?>" alt="Imagen del Tour" class="img-fluid tour-img">
            </div>

            <!-- Información del Tour -->
            <div class="col-md-6 tour-info d-flex flex-column justify-content-center">
                <h1><?php echo htmlspecialchars($tour['Nombre']); ?></h1>
                <p><strong>Descripción:</strong> <?php echo nl2br(htmlspecialchars($tour['Descripcion'])); ?></p>
                <p><strong>Fecha:</strong> <?php echo htmlspecialchars($tour['Fecha']); ?></p>
                <p><strong>Hora:</strong> <?php echo substr($tour['Hora'], 0, 5); ?></p>
                <p><strong>Precio por boleto:</strong> $<?php echo htmlspecialchars($tour['Precio_Boleto']); ?></p>
                <p><strong>Tickets disponibles:</strong> <?php echo htmlspecialchars($tour['Tickets_Disponibles']); ?></p>
            </div>
        </div>

        <!-- Formulario de Reserva -->
        <div class="row form-reserva">
            <div class="col-12 text-center">
                <h2>Reservar Tickets</h2>

                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php elseif (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="POST" class="mb-5 mt-5">
                    <div class="form-group">
                        <label for="cantidad_tickets">Cantidad de Tickets</label>
                        <input type="number" id="cantidad_tickets" name="cantidad_tickets" 
                               class="form-control mx-auto" style="max-width: 200px;" 
                               min="1" max="<?php echo $tour['Tickets_Disponibles']; ?>" required>
                    </div>

                    <!-- Dropdown de Métodos de Pago -->
                    <div class="form-group">
                        <label for="metodo_pago">Método de Pago</label>
                        <select id="metodo_pago" name="metodo_pago" class="form-control" required>
                        <option value="empty"></option>
                            <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                            <option value="PayPal">PayPal</option>
                            <option value="SINPE Móvil">SINPE Móvil</option>
                        </select>
                    </div>

                    <!-- Campos de pago condicionales -->
                    <div id="tarjeta_fields" style="display: none;">
                        <div class="form-group">
                            <label for="numero_tarjeta">Número de Tarjeta</label>
                            <input type="text" id="numero_tarjeta" name="numero_tarjeta" class="form-control" placeholder="Número de tarjeta" required>
                        </div>
                        <div class="form-group">
                            <label for="vencimiento">Fecha de Vencimiento</label>
                            <input type="month" id="vencimiento" name="vencimiento" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" class="form-control" placeholder="CVV" required>
                        </div>
                    </div>

                    <div id="paypal_fields" style="display: none;">
                        <p>Inicie sesión en su cuenta de PayPal.</p>
                        <p>Cuenta: cuenta@paypal.com</p>
                    </div>

                    <div id="sinpe_fields" style="display: none;">
                        <p>Por favor realice el pago a este número de teléfono:</p>
                        <p>+506 8486 7434 Johnny Castillo Fallas</p>
                    </div>

                    <button type="submit" class="btn btn-reservar mt-3">Reservar Ahora</button>
                </form>
            </div>
        </div>
    </div>

    <?php 
    include("fragmentos.php");
    echo $footer;
    ?>

    <script>
        document.getElementById('metodo_pago').addEventListener('change', function() {
            var metodo = this.value;
            // Ocultar todos los campos
            document.getElementById('tarjeta_fields').style.display = 'none';
            document.getElementById('paypal_fields').style.display = 'none';
            document.getElementById('sinpe_fields').style.display = 'none';
            
            // Mostrar campos según el método de pago
            if (metodo === 'Tarjeta de Crédito') {
                document.getElementById('tarjeta_fields').style.display = 'block';
            } else if (metodo === 'PayPal') {
                document.getElementById('paypal_fields').style.display = 'block';
            } else if (metodo === 'SINPE Móvil') {
                document.getElementById('sinpe_fields').style.display = 'block';
            }
        });
    </script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
