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
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
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
                <form id="formApadrinarAnimal" method="post" onsubmit="return validarFormulario()">
                    <input type="hidden" id="idAnimalApadrinar" name="idAnimal" value="<?php echo $idAnimal; ?>">
                    <div class="mb-3">
                        <label for="monto">Monto mensual (mínimo $50)</label>
                        <input type="number" id="montoDonarForm" name="monto" required min="50" title="El monto mínimo es $50.">
                    </div>
                    <div class="mb-3">
                        <label for="metodo">Método de pago</label>
                        <select id="metodo" name="metodo" class="form-select" required onchange="mostrarModal()">
                            <option value="">Selecciona un método de pago</option>
                            <option value="tarjeta">Tarjeta crédito/débito</option>
                            <option value="sinpe">Sinpe móvil</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn" id="submit-button">Donar</button>

                    <!-- Modal para tarjeta -->
                    <div class="modal fade" id="modalTarjeta" tabindex="-1" aria-labelledby="modalTarjetaLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTarjetaLabel">Pago con Tarjeta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formTarjeta" onsubmit="return validarModalTarjeta()">
                                        <div class="mb-3">
                                            <label for="numeroTarjeta">Número de tarjeta</label>
                                            <input type="text" class="form-control" id="numeroTarjeta" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="titularTarjeta">Nombre del titular</label>
                                            <input type="text" class="form-control" id="titularTarjeta" placeholder="Nombre del titular" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="codigoSeguridad">Código de seguridad</label>
                                            <input type="text" class="form-control" id="codigoSeguridad" placeholder="XXX" required>
                                        </div>
                                        <button type="submit" class="btn">Finalizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para Sinpe -->
                    <div class="modal fade" id="modalSinpe" tabindex="-1" aria-labelledby="modalSinpeLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalSinpeLabel">Pago por Sinpe Móvil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Realice su Sinpe al número: <strong>70265643</strong></p>
                                    <p>Nombre del titular: <strong>Casa Natura</strong></p>
                                    <button type="button" class="btn" data-bs-dismiss="modal">HECHO</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para PayPal -->
                    <div class="modal fade" id="modalPaypal" tabindex="-1" aria-labelledby="modalPaypalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalPaypalLabel">Pago con PayPal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formPaypal" onsubmit="return validarModalPaypal()">
                                        <div class="mb-3">
                                            <label for="usuarioPaypal">Usuario de PayPal</label>
                                            <input type="text" class="form-control" id="usuarioPaypal" placeholder="Usuario" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="contrasenaPaypal">Contraseña</label>
                                            <input type="password" class="form-control" id="contrasenaPaypal" placeholder="Contraseña" required>
                                        </div>
                                        <button type="submit" class="btn">Finalizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Validación del formulario principal
        function validarFormulario() {
            const monto = parseFloat(document.getElementById("montoDonarForm").value);
            if (isNaN(monto) || monto < 50) {
                alert("El monto debe ser al menos $50.");
                return false;
            }
            return true; // Permitimos el envío del formulario si la validación es correcta
        }

        // Mostrar modal y evitar validación del formulario principal
        function mostrarModal() {
            const metodo = document.getElementById('metodo').value;

            // Mostrar el modal correspondiente según el método seleccionado
            if (metodo === 'tarjeta') {
                const modal = new bootstrap.Modal(document.getElementById('modalTarjeta'));
                modal.show();
            } else if (metodo === 'sinpe') {
                const modal = new bootstrap.Modal(document.getElementById('modalSinpe'));
                modal.show();
            } else if (metodo === 'paypal') {
                const modal = new bootstrap.Modal(document.getElementById('modalPaypal'));
                modal.show();
            }
        }

        // Validación de los campos dentro del modal de tarjeta
        function validarModalTarjeta() {
            const numeroTarjeta = document.getElementById("numeroTarjeta").value.trim();
            const titularTarjeta = document.getElementById("titularTarjeta").value.trim();
            const codigoSeguridad = document.getElementById("codigoSeguridad").value.trim();

            // Validar si todos los campos están completos
            if (!numeroTarjeta || !titularTarjeta || !codigoSeguridad) {
                alert("Todos los campos del pago con tarjeta son obligatorios.");
                return false;
            }

            // Si los datos son correctos, cierra el modal, limpia el formulario y muestra un mensaje
            alert("Pago con tarjeta registrado correctamente.");
            limpiarFormularioModal();  // Limpiar los formularios

            // Cerrar el modal correctamente usando Bootstrap
            var modal = new bootstrap.Modal(document.getElementById('modalTarjeta'));
            modal.hide(); // Este es el método para cerrar el modal

            return false;
        }

        // Limpiar formulario dentro del modal
        function limpiarFormularioModal() {
            document.getElementById("formTarjeta").reset();
            document.getElementById("formPaypal").reset();
        }

        // Validación del formulario PayPal
        function validarModalPaypal() {
            const usuarioPaypal = document.getElementById("usuarioPaypal").value.trim();
            const contrasenaPaypal = document.getElementById("contrasenaPaypal").value.trim();

            if (!usuarioPaypal || !contrasenaPaypal) {
                alert("Todos los campos de PayPal son obligatorios.");
                return false;
            }

            // Si los datos son correctos, cierra el modal, limpia el formulario y muestra un mensaje
            alert("Pago con PayPal registrado correctamente.");
            limpiarFormularioModal();
            const modal = bootstrap.Modal.getInstance(document.getElementById('modalPaypal'));
            modal.hide();
            return false;
        }
    </script>
</body>
</html>
