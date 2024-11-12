<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <?php 
        include("fragmentos.php");
        echo $navbar;        
        ?>
    </header>

    <section class="contact-section">
        <div class="contact-form">
            <img src="imagenes/logo.png" alt="Casa Natura Logo" class="logo-mascot">
        </div>
        <div class="contact-form">
            <form>
                <input type="text" placeholder="Nombre"> <input type="text" placeholder="Apellidos">
                <input type="email" placeholder="Email">
                <textarea placeholder="Mensaje"></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </section>

    <!-- Información de Contacto y Ubicación -->
    <section class="info-location">
        <div class="contact-info">
            <h2>INFORMACIÓN DE CONTACTO</h2>
            <p>Teléfono: +506 2222 3333</p>
            <p>Email: contacto@casanatura.cr</p>
            <p>Dirección: San José, Costa Rica</p>
            <p>Horario: Lunes a Viernes, 8:00 am - 5:00 pm</p>
        </div>
        <div class="location-map">
            <h2>UBICACIÓN</h2>
            <iframe src="https://maps.google.com/maps?q=San%20Jose%20Costa%20Rica&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </div>
    </section>

    <footer>
        <?php 
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>
</body>
</html>
