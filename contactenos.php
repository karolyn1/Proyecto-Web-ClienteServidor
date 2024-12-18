<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donacioens</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
</head>
<body>
    <header>
    <?php 
        include("fragmentos.php");
        echo $navbar;   
        
        $usuarioNombre = $usuarioApellido1 = $usuarioCorreo = ""; // Valores predeterminados
        if (!empty($_SESSION['usuario_id'])) {
            $usuarioNombre = $_SESSION['usuario_nombre'] ?? "";
            $usuarioApellido1 = $_SESSION['usuario_apellido1'] ?? "";
            $usuarioCorreo = $_SESSION['usuario_correo'] ?? "";
        }

        ?>
    </header>
<main>
<section class="contact-section">
        <div class="contact-form">
            <img src="imagenes/logo.png" alt="Casa Natura Logo" class="logo-mascot">
        </div>
        <div class="contact-form">
        <form id="contact-form  form-agregar-animal" action="#">
            <h3 class="contacto-title-form">¿TIENES ALGUNA DUDA?</h3>

            <!-- Campo Nombre -->
            <input type="text" id="nombreConsulta" name="nombre" placeholder="Nombre"  value="<?php echo htmlspecialchars($usuarioNombre); ?>"  required>
            <small class="error-message" style="color: red; display: none;">Por favor, ingresa tu nombre.</small>

            <!-- Campo Apellidos -->
            <input type="text" id="apellidoConsulta" name="apellidos" placeholder="Apellido" value="<?php echo htmlspecialchars($usuarioApellido1); ?>"  required>
            <small class="error-message" style="color: red; display: none;">Por favor, ingresa tus apellidos.</small>

            <!-- Campo Correo Electrónico -->
            <input type="email" id="emailConsulta" name="email" placeholder="Email" value="<?php echo htmlspecialchars($usuarioCorreo); ?>"  required>
            <small class="error-message" style="color: red; display: none;">Por favor, ingresa un correo válido.</small>

            <!-- Campo Mensaje -->
            <textarea id="mensajeConsulta" name="mensaje" placeholder="Mensaje" required></textarea>
            <small class="error-message" style="color: red; display: none;">Por favor, escribe un mensaje.</small>

            <button type="submit" class="about-btn">ENVIAR</button>
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
    </main>
    <footer>
        <?php 
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>


</body>
</html>
