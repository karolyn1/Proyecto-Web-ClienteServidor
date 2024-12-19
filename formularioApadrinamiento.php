<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Apadrinamiento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .formulario {
        align-items: center;
    }
    label {
        font-weight: bold;
    }
    input, select, button {
        width: 100%;
        margin-bottom: 15px;
        padding: 8px;
        border-radius: 3px;
        border: 1px solid #ccc;
    }
    .btn {
        background-color: #062D3E;
        color: #fff;
    }
    .btn:hover {
        background-color: #e0a800;
    }
</style>

<?php

include("actions/conexion.php");

// Consultar los animales registrados en la base de datos
$query_animales = "SELECT * FROM animal";
$stmt_animales = $conn->prepare($query_animales); // Preparar la consulta
$stmt_animales->execute(); // Ejecutar la consulta
$result_animales = $stmt_animales->get_result(); // Obtener los resultados de la consulta

if (!$result_animales) {
    die("Error al obtener los animales: " . $conn->error); // Mostrar error si no hay resultados
}
?>

<body>
    <nav>
    <?php
        include("fragmentos.php");
        echo $navbar;
        $idAnimal = isset($_GET['id']) ? intval($_GET['id']) : 0;
    ?>
    </nav>


<main>
    <div class="container">
        <h1 class="animales-apadrinar-title">Apadrinamiento</h1>
        <p>A través de este formulario, puedes contribuir al bienestar de los animales que más lo necesitan. Selecciona la cantidad y la frecuencia de tu apadrinamiento y completa los detalles para hacer tu contribución. ¡Gracias por ser parte del cambio!</p>
        <div class="container">
            <form action="" id="formApadrinarAnimal" method="post" onsubmit="return validarFormulario()">
            <input type="hidden" id="idAnimalApadrinar" name="idAnimal" value=<?php echo $idAnimal;?>>
                <div class="mb-3">
                    <label for="monto">Monto mensual (mínimo $50)</label>
                    <input type="number" id="montoDonarForm" name="monto" required min="50" title="El monto mínimo es $50.">
                </div>
                <div class="mb-3">
                    <label for="metodo">Método de pago</label>
                    <select id="metodo" name="metodo" required>
                        <option value="tarjeta">Tarjeta crédito/débito</option>
                        <option value="sinpe">Sinpe móvil</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                <button type="submit" class="submit-btn">Apadrinar</button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mensajeModalLabel">CasaNatura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="mensajeModalBody">
                        <!-- El mensaje dinámico se colocará aquí -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="submit-btn" data-bs-dismiss="modal">Cerrar</button>
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
         function validarFormulario() {
            const monto = parseFloat(document.getElementById("montoDonarForm").value);

            if (isNaN(monto) || monto < 50) {
                alert("El monto debe ser al menos $50.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>