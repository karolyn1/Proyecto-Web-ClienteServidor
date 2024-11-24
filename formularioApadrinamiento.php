<!DOCTYPE html>
<html lang="es">
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

    <?php
        include("actions/conexion.php");

        // Consultar los animales registrados en la base de datos
        $query_animales = "SELECT id, nombre FROM animal";
        $result_animales = $conn->query($query_animales);

        if (!$result_animales) {
            die("Error al obtener los animales: " . $conn->error);
        }
    ?>

    <main>
        <div class="p-5">
            <h1 class="title-formulario">Apadrinamiento</h1>
            <p>A través de este formulario, puedes contribuir al bienestar de los animales que más lo necesitan. Selecciona la cantidad y la frecuencia de tu apadrinamiento y completa los detalles para hacer tu contribución. ¡Gracias por ser parte del cambio!</p>
            <div class="container">
                <form action="datos_formularioApadrinamiento.php" method="post" onsubmit="return validarFormulario()">
                    <div class="mb-3">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" required minlength="3" maxlength="50" title="Introduce al menos 3 caracteres.">
                    </div>
                    <div class="mb-3">
                        <label for="apellido1">Primer apellido</label>
                        <input type="text" id="apellido1" name="apellido1" required minlength="3" maxlength="50">
                    </div>
                    <div class="mb-3">
                        <label for="apellido2">Segundo apellido</label>
                        <input type="text" id="apellido2" name="apellido2" required minlength="3" maxlength="50">
                    </div>
                    <div class="mb-3">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" id="correo" name="correo" required title="Introduce un correo válido.">
                    </div>
                    <div class="mb-3">
                        <label for="telefono">Teléfono de contacto</label>
                        <input type="tel" id="telefono" name="telefono" required pattern="[0-9]{8,15}" title="Introduce un número de teléfono válido.">
                    </div>
                    <div class="mb-3">
                        <label for="id_animal">Animal a apadrinar</label>
                        <select id="id_animal" name="id_animal" required>
                            <option value="">Seleccione un animal</option>
                            <?php
                                // Generar las opciones dinámicamente
                                while ($row = $result_animales->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nombre']) . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="monto">Monto mensual (mínimo $50)</label>
                        <input type="number" id="monto" name="monto" required min="50" title="El monto mínimo es $50.">
                    </div>
                    <div class="mb-3">
                        <label for="metodo">Método de pago</label>
                        <select id="metodo" name="metodo" required>
                            <option value="tarjeta">Tarjeta crédito/débito</option>
                            <option value="sinpe">Sinpe móvil</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn">Apadrinar</button>
                </form>
            </div>
        </div>
    </main>

    <?php
        include("fragmentos.php");
        echo $footer;
    ?>

    <script>
         function validarFormulario() {
            const nombre = document.getElementById("nombre").value.trim();
            const correo = document.getElementById("correo").value.trim();
            const telefono = document.getElementById("telefono").value.trim();
            const monto = parseFloat(document.getElementById("monto").value);

            if (!nombre || nombre.length < 3) {
                alert("El nombre es obligatorio y debe tener al menos 3 caracteres.");
                return false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(correo)) {
                alert("Por favor, ingresa un correo válido.");
                return false;
            }

            const phoneRegex = /^[0-9]{8,15}$/;
            if (!phoneRegex.test(telefono)) {
                alert("Por favor, ingresa un número de teléfono válido.");
                return false;
            }

            if (isNaN(monto) || monto < 50) {
                alert("El monto debe ser al menos $50.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>