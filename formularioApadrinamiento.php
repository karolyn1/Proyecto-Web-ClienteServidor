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
            <h1  class="animales-apadrinar-title">Apadrinamiento</h1>
            <p class="textoFormDonar">A través de este formulario, puedes contribuir al bienestar de los animales que más lo necesitan. Selecciona la cantidad y la frecuencia de tu apadrinamiento y completa los detalles para hacer tu contribución. ¡Gracias por ser parte del cambio!</p>
            <div class="container">
                <form id="formApadrinarAnimal" method="post" class="form-agregar-animal">
                    <input type="hidden" id="idAnimalApadrinar" name="idAnimal" value="<?php echo $idAnimal; ?>">
                    <div class="mb-3">
                        <label for="monto">Monto mensual (mínimo $50)</label>
                        <input type="number" id="montoDonarForm" name="montoDonarForm" class="form-control mt-2" placeholder="Digite la cantidad, monto mínimo 50" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="metodo">Método de pago</label>
                        <select id="metodo" name="metodo" class="form-control" required onchange="mostrarModal()">
                            <option value="">Selecciona un método de pago</option>
                            <option value="tarjeta">Tarjeta crédito/débito</option>
                            <option value="sinpe">Sinpe móvil</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <button type="submit" class="submit-btn" id="submit-button">Donar</button>

                    <!-- Modal para tarjeta -->
            <div class="modal fade form-agregar-animal" id="modalTarjeta" tabindex="-1" aria-labelledby="modalTarjetaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTarjetaLabel">Pago con Tarjeta</h5>
                            <button type="button" class="close" id="closeTarjeta" aria-label="Close" disabled>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formTarjeta" novalidate>
                                <div class="form-group">
                                    <label for="numeroTarjeta">Número de tarjeta</label>
                                    <input type="text" class="form-control" id="numeroTarjeta" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                                </div>
                                <div class="form-group">
                                    <label for="titularTarjeta">Nombre del titular</label>
                                    <input type="text" class="form-control" id="titularTarjeta" placeholder="Nombre del titular" required>
                                </div>
                                <div class="form-group">
                                    <label for="codigoSeguridad">Código de seguridad</label>
                                    <input type="text" class="form-control" id="codigoSeguridad" placeholder="XXX" required>
                                </div>
                                <button type="button" class="submit-btn" onclick="validarTarjeta()">Finalizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para Sinpe -->
            <div class="modal fade form-agregar-animal" id="modalSinpe" tabindex="-1" aria-labelledby="modalSinpeLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSinpeLabel">Pago por Sinpe Móvil</h5>
                            <button type="button" class="close" id="closeSinpe" aria-label="Close" disabled>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formSinpe" novalidate>
                                <p>Realice su Sinpe al número: <strong>70265643</strong></p>
                                <p>Nombre del titular: <strong>Casa Natura</strong></p>
                                <button type="button" class="submit-btn" onclick="validarSinpe()">HECHO</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para PayPal -->
            <div class="modal fade form-agregar-animal" id="modalPaypal" tabindex="-1" aria-labelledby="modalPaypalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalPaypalLabel">Pago con PayPal</h5>
                            <button type="button" class="close" id="closePaypal" aria-label="Close" disabled>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formPaypal" novalidate>
                                <div class="form-group">
                                    <label for="usuarioPaypal">Usuario de PayPal</label>
                                    <input type="text" class="form-control" id="usuarioPaypal" placeholder="Usuario" required>
                                </div>
                                <div class="form-group">
                                    <label for="contrasenaPaypal">Contraseña</label>
                                    <input type="password" class="form-control" id="contrasenaPaypal" placeholder="Contraseña" required>
                                </div>
                                <button type="button" class="submit-btn" onclick="validarPaypal()">Finalizar</button>
                            </form>
                        </div>
                    </div>
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

<script>
        // Función para validar el formulario principal
        function validarFormulario() {
            let cantidad = document.getElementById("montoDonarForm").value;
            let metodo = document.getElementById("metodo").value;
            if (!cantidad || !metodo) {
                alert("Por favor, completa todos los campos.");
                return false;
            }
            return true;
        }

        // Función para validar el formulario principal
        function validarFormulario() {
            var cantidad = document.getElementById("montoDonarForm").value; // Suponiendo que el campo de cantidad tiene el ID 'cantidad'

            // Verificar si la cantidad es mayor o igual a 50
            if (cantidad < 50) {
                alert("La cantidad debe ser mayor o igual a 50.");
                return false; // Impide el envío del formulario
            }

            return true; // Permite el envío del formulario
    }

        // Función para mostrar el modal correspondiente
        function mostrarModal() {
            let metodo = document.getElementById("metodo").value;
            if (metodo === "tarjeta") {
                $('#modalTarjeta').modal('show');
            } else if (metodo === "sinpe") {
                $('#modalSinpe').modal('show');
            } else if (metodo === "paypal") {
                $('#modalPaypal').modal('show');
            }
        }

        // Validar el formulario de tarjeta
        function validarTarjeta() {
            let numeroTarjeta = document.getElementById("numeroTarjeta").value;
            let titularTarjeta = document.getElementById("titularTarjeta").value;
            let codigoSeguridad = document.getElementById("codigoSeguridad").value;

            if (!numeroTarjeta || !titularTarjeta || !codigoSeguridad) {
                alert("Por favor, complete todos los campos.");
                return false;
            }
            // Habilitar el botón de cierre del modal
            document.getElementById("closeTarjeta").removeAttribute("disabled");
            $('#modalTarjeta').modal('hide');
            alert('Pago completado');
            return true;
        }

        // Validar el formulario de Sinpe
        function validarSinpe() {
            // Habilitar el botón de cierre del modal
            document.getElementById("closeSinpe").removeAttribute("disabled");
            $('#modalSinpe').modal('hide');
            alert('Pago completado');
            return true;
        }

        // Validar el formulario de PayPal
        function validarPaypal() {
            let usuarioPaypal = document.getElementById("usuarioPaypal").value;
            let contrasenaPaypal = document.getElementById("contrasenaPaypal").value;

            if (!usuarioPaypal || !contrasenaPaypal) {
                alert("Por favor, complete todos los campos.");
                return false;
            }
            // Habilitar el botón de cierre del modal
            document.getElementById("closePaypal").removeAttribute("disabled");
            $('#modalPaypal').modal('hide');
            alert('Pago completado');
            return true;
        }

        function limpiarFormulario() {
            document.getElementById("formApadrinarAnimal").reset(); // Limpia todos los campos del formulario
        }

        // Ejemplo de cómo usarlo en el cierre del modal:
        var modal = document.getElementById('modal'); // Suponiendo que el ID del modal es 'modal'
        var closeButton = document.getElementsByClassName('close')[0]; // Suponiendo que el botón de cierre tiene la clase 'close'

        // Cuando se cierra el modal, limpia el formulario
        closeButton.onclick = function() {
            modal.style.display = "none"; // Oculta el modal
            limpiarFormulario(); // Limpia los campos del formulario
        }
    </script>

<?php
    include("fragmentos.php");
    echo $footer;
?>
</body>
</html>