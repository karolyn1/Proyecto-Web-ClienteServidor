<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donacioens</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
        include("fragmentos.php");
        echo $navbar;
    ?>
    <main>
        <div class="p-5">
        <h1 class="title-formulario">APOYA CON TU DONACIÓN</h1>
        <p class="textoFormDonar">A través de este formulario, puedes contribuir al bienestar de los animales que más lo necesitan. 
            Selecciona la cantidad y la frecuencia de tu donación, elige un animal o causa que te gustaría apoyar, y completa los detalles para hacer tu contribución. 
            Cada aporte es valioso y ayuda a mejorar la vida de estos animales. 
            ¡Gracias por ser parte del cambio!</p>
    <div class="container">
    <form action="donacion.php" class="formDonaciones" method="post">
    <div class="mb-3">
    <label for="nombre">Nombre completo del donador</label>
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
    <label for="cantidad">Cantidad a donar</label>
    <select id="cantidad" name="cantidad" required>
        <option value="10">$10</option>
        <option value="25">$25</option>
        <option value="50">$50</option>
    </select>
    <input type="number" id="otra-cantidad" name="otra-cantidad" placeholder="Digite alguna otra cantidad">
</div>
<div class="mb-3">
    <label for="frecuencia">Frecuencia de la donación</label>
    <select id="frecuencia" name="frecuencia" required>
        <option value="una_sola_vez">Una sola vez</option>
        <option value="mensual">Mensual</option>
        <option value="trimestral">Trimestral</option>
        <option value="anual">Anual</option>
    </select>
</div>
<div class="mb-3">
    <label for="metodo">Método de pago</label>
    <select id="metodo" name="metodo" required>
        <option value="tarjeta">Tarjeta crédito/débito</option>
        <option value="sinpe">Sinpe móvil</option>
        <option value="paypal">PayPal</option>
    </select>
</div>
<button type="submit" class="btnDonar">Donar</button>
</form>
</div>
</div>
    </main>
  
<?php
    include("fragmentos.php");
    echo $footer;
?>

</body>

</html>