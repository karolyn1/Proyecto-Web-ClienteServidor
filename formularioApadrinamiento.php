<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Apadrinamiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
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
<body>
    <?php
        include("fragmentos.php");
        echo $navbar;
    ?>
    <main>
        <div class="p-5">
            <h1 class="title-formulario">Apadrinamiento</h1>
            <p>A través de este formulario, puedes contribuir al bienestar de los animales que más lo necesitan. Selecciona la cantidad y la frecuencia de tu apadrinamiento y completa los detalles para hacer tu contribución. ¡Gracias por ser parte del cambio!</p>
            <div class="container">
                <form action="donacion.php" method="post" onsubmit="return validarCantidad()">
                    <div class="mb-3">
                        <label for="nombre">Nombre completo del apadrinador</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono">Teléfono de contacto</label>
                        <input type="tel" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="monto">Monto mensual de la apadrinación (mínimo $50)</label>
                        <input type="number" id="monto" name="monto" placeholder="Ingrese el monto en dólares" required>
                    </div>
                    <div class="mb-3">
                        <label for="metodo">Método de pago</label>
                        <select id="metodo" name="metodo" required>
                            <option value="tarjeta">Tarjeta crédito/débito</option>
                            <option value="sinpe">Sinpe móvil</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn">Donar</button>
                </form>
            </div>
        </div>
    </main>
    <?php
        include("fragmentos.php");
        echo $footer;
    ?>
    <script>
        function validarCantidad() {
            const monto = document.getElementById("monto").value;
            if (monto < 50) {
                alert("El monto de donación debe ser al menos $50.");
                return false; // Evita el envío del formulario
            }
            return true;
        }
    </script>
</body>
</html>