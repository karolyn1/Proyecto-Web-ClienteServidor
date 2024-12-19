<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
</head>

<body>
<nav>
    <?php
        include("fragmentos.php");
        echo $navbar;
    ?>
    </nav>

    <main>
        <div class="container">
        <h1 class="title-formulario">APOYA CON TU DONACIÓN</h1>
            <p class="textoFormDonar">A través de este formulario, puedes contribuir al bienestar de los animales que
                más lo necesitan.
                Selecciona la cantidad y la frecuencia de tu donación, elige un animal o causa que te gustaría apoyar, y
                completa los detalles para hacer tu contribución.
                Cada aporte es valioso y ayuda a mejorar la vida de estos animales.
                ¡Gracias por ser parte del cambio!</p>
            <div class="container">
                <form id="formDonar" class="form-agregar-animal" method="post">
                    <div class="mb-3">
                        <label for="monto">Monto a donar</label>
                        <input type="number" id="montoDonacion" name="monto" required >
                    </div>
                    <div class="mb-3">
                        <label for="metodo">Método de pago</label>
                        <select id="metodoPago" name="metodo" class="form-select" required onchange="mostrarModal()" >
                            <option value="">Selecciona un método de pago</option>
                            <option value="tarjeta">Tarjeta crédito/débito</option>
                            <option value="sinpe">Sinpe móvil</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <button type="submit" class="submit-btn" id="submit-button">DONAR</button>
                </form>
                    <!-- Modal para tarjeta -->
                    <div class="modal fade form-agregar-animal" id="modalTarjeta" tabindex="-1" aria-labelledby="modalTarjetaLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTarjetaLabel">Pago con Tarjeta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="numeroTarjeta">Número de tarjeta</label>
                                            <input type="text" class="form-control" id="numeroTarjeta" placeholder="XXXX-XXXX-XXXX-XXXX">
                                        </div>
                                        <div class="mb-3">
                                            <label for="titularTarjeta">Nombre del titular</label>
                                            <input type="text" class="form-control" id="titularTarjeta" placeholder="Nombre del titular">
                                        </div>
                                        <div class="mb-3">
                                            <label for="codigoSeguridad">Código de seguridad</label>
                                            <input type="text" class="form-control" id="codigoSeguridad" placeholder="XXX">
                                        </div>
                                        <button type="button" class="submit-btn" data-bs-dismiss="modal">Finalizar</button>
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Realice su Sinpe al número: <strong>70265643</strong></p>
                                    <p>Nombre del titular: <strong>Casa Natura</strong></p>
                                    <button type="button" class="submit-btn" data-bs-dismiss="modal">HECHO</button>
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
                                    <form class="form-agregar-animal">
                                        <div class="mb-3">
                                            <label for="usuarioPaypal">Usuario de PayPal</label>
                                            <input type="text" class="form-control" id="usuarioPaypal" placeholder="Usuario">
                                        </div>
                                        <div class="mb-3">
                                            <label for="contrasenaPaypal">Contraseña</label>
                                            <input type="password" class="form-control" id="contrasenaPaypal" placeholder="Contraseña">
                                        </div>
                                        <button type="button" class="submit-btn" data-bs-dismiss="modal">Finalizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <script>
        function mostrarModal() {
            const metodo = document.getElementById('metodoPago').value;
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
    </script>

    <?php
        include("fragmentos.php");
        echo $footer;
    ?>




</body>
</html>