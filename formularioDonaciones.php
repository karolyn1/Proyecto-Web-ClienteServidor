<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
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
    <?php
    include("fragmentos.php");
    echo $navbar;
    ?>


    <main>
        <div class="p-5">
            <h1 class="title-formulario">APOYA CON TU DONACIÓN</h1>
            <p class="textoFormDonar">A través de este formulario, puedes contribuir al bienestar de los animales que
                más lo necesitan.
                Selecciona la cantidad y la frecuencia de tu donación, elige un animal o causa que te gustaría apoyar, y
                completa los detalles para hacer tu contribución.
                Cada aporte es valioso y ayuda a mejorar la vida de estos animales.
                ¡Gracias por ser parte del cambio!</p>
            <div class="container">
                <form method="post" class="form-agregar-animal" id="form-donaciones">
                    <div class="mb-3">
                        <label for="monto">Cantidad a donar</label>
                        <select id="monto-select" name="monto" class="form-control" required
                            onchange="toggleOtraCantidad()">
                            <option value="10">$10</option>
                            <option value="25">$25</option>
                            <option value="50">$50</option>
                            <option value="otra">Otra cantidad</option>
                        </select>
                        <!-- Campo para otra cantidad -->
                        <input type="number" id="otra-cantidad" name="otra_cantidad" class="form-control mt-2"
                            placeholder="Digite otra cantidad" style="display: none;" min="1">
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
                </form>

                <!-- Modal para tarjeta -->
                <div class="modal fade form-agregar-animal" id="modalTarjeta" tabindex="-1" role="dialog"
                    aria-labelledby="modalTarjetaLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTarjetaLabel">Pago con Tarjeta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="numeroTarjeta">Número de tarjeta</label>
                                        <input type="text" class="form-control" id="numeroTarjeta"
                                            placeholder="XXXX-XXXX-XXXX-XXXX">
                                    </div>
                                    <div class="form-group">
                                        <label for="titularTarjeta">Nombre del titular</label>
                                        <input type="text" class="form-control" id="titularTarjeta"
                                            placeholder="Nombre del titular">
                                    </div>
                                    <div class="form-group">
                                        <label for="codigoSeguridad">Código de seguridad</label>
                                        <input type="text" class="form-control" id="codigoSeguridad" placeholder="XXX">
                                    </div>
                                    <button type="button" class="submit-btn" data-dismiss="modal">Finalizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para Sinpe -->
                <div class="modal fade form-agregar-animal" id="modalSinpe" tabindex="-1" role="dialog"
                    aria-labelledby="modalSinpeLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSinpeLabel">Pago por Sinpe Móvil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body form-agregar-animal">
                                <p>Realice su Sinpe al número: <strong>70265643</strong></p>
                                <p>Nombre del titular: <strong>Casa Natura</strong></p>
                                <button type="button" class="submit-btn" data-dismiss="modal">HECHO</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para PayPal -->
                <div class="modal fade form-agregar-animal" id="modalPaypal" tabindex="-1" role="dialog"
                    aria-labelledby="modalPaypalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalPaypalLabel">Pago con PayPal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="usuarioPaypal">Usuario de PayPal</label>
                                        <input type="text" class="form-control" id="usuarioPaypal"
                                            placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="contrasenaPaypal">Contraseña</label>
                                        <input type="password" class="form-control" id="contrasenaPaypal"
                                            placeholder="Contraseña">
                                    </div>
                                    <button type="button" class="submit-btn" data-dismiss="modal">Finalizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de confirmación de donación -->
                <div class="modal fade form-agregar-animal" id="donationModal" tabindex="-1"
                    aria-labelledby="donationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="donationModalLabel">¡Gracias por tu donación!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Tu donación se ha realizado correctamente. ¡Agradecemos tu apoyo!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
    

                    function toggleOtraCantidad() {
                        var select = document.getElementById('monto-select');
                        var otraCantidad = document.getElementById('otra-cantidad');
                        if (select.value === 'otra') {
                            otraCantidad.style.display = 'block';
                        } else {
                            otraCantidad.style.display = 'none';
                        }
                    }

                    function mostrarModal() {
                        var metodo = document.getElementById('metodo').value;
                        if (metodo === 'tarjeta') {
                            $('#modalTarjeta').modal('show');
                        } else if (metodo === 'sinpe') {
                            $('#modalSinpe').modal('show');
                        } else if (metodo === 'paypal') {
                            $('#modalPaypal').modal('show');
                        }
                    }
                </script>
    </main>

    <?php
    include("fragmentos.php");
    echo $footer;
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script src="./js/java.js" defer></script>



</body>

</html>