<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Tour - Casa Natura</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <nav>
        <?php
            include("fragmentos.php");
            echo $navbar;
        ?>
    </nav>
    <section class="registro-section">
        <div class="registro-form">
            <img src="imagenes/animalesVarios.png" alt="Casa Natura Logo" class="logo-form">
        </div>
        <div class="cregistro-form">
        <form>
            <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ingresa tu nombre completo">
            <input type="email" class="form-control" id="email" name="email" required placeholder="Ingresa tu correo electrónico">
            <input type="tel" class="form-control" id="telefono" name="telefono" required placeholder="Ingresa tu número de teléfono">
            <input type="date" class="form-control" id="fecha" name="fecha" required>
            <input type="number" class="form-control" id="personas" name="personas" required min="1" placeholder="¿Cuántas personas asistirán al evento?">
            <textarea class="form-control" id="comentarios" name="comentarios" rows="3" placeholder="Escribe cualquier solicitud o comentario especial"></textarea>
            <button type="submit">Enviar</button>
        </form>
    </div>
    </section>
   


    <footer class="mt-5">
        <?php
            include("fragmentos.php");
            echo $footer;
        ?>
    </footer>
    </body>

</html>