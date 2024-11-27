<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Casa Natura - Iniciar Sesión / Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include("fragmentos.php");
    echo $navbar;
    ?>
    <main>
        
            <!-- Formulario de Inicio de Sesión -->
            <div class="form-container" id="login-form">
                <h2>Iniciar Sesión</h2>
                <form action="procesar_login.php" method="POST">
                    <label> Usuario: </label> <br>
                    <input type="text" name="username" id="username"><br>
                    <label> Contraseña: </label> <br>
                    <input type="password" name="password"  id="password"><br>
                    <div class="remember">
                        <a href="olvide_contra.php">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" name="login">INICIAR SESIÓN</button>
                </form>
                <div class="toggle-section">
                    ¿No tienes cuenta? <a onclick="toggleForms('register-form')">Registrarse aquí</a>
                </div>
            </div>

            <!-- Formulario de Registro -->
            <div class="form-container" id="register-form" style="display: none;">
                <h2>Registro</h2>
                <form action="registro.php" method="POST">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <input type="text" name="primer_apellido" placeholder="Primer Apellido" required>
                    <input type="text" name="segundo_apellido" placeholder="Segundo Apellido" required>
                    <input type="text" name="provincia" placeholder="Provincia" required>
                    <input type="text" name="cantpn" placeholder="Cantón" required>
                    <input type="text" name="distrito" placeholder="Distrito" required>
                    <input type="text" name="direccion" placeholder="Dirección" required>
                    <input type="email" name="correo" placeholder="Correo Electrónico" required>
                    <input type="password" name="contraseña" placeholder="Contraseña" required>
                    <button type="submit" name="registrar">Registrarme</button>
                </form>
                <div class="toggle-section">
                    ¿Ya tienes cuenta? <a onclick="toggleForms('login-form')">Iniciar Sesión aquí</a>
                </div>
            </div>

            <div class="animal-images">
                <img src="imagenes/caballito.jpg" alt="Animales Casa Natura">
            </div>
        </div>
    </main>
    <footer>
        <?php
        include("fragmentos.php");
        echo $footer;
        ?>
    </footer>

    <script>
        // Función para alternar entre el formulario de inicio de sesión y el de registro
        function toggleForms(formToShow) {
            document.getElementById("login-form").style.display = formToShow === "login-form" ? "block" : "none";
            document.getElementById("register-form").style.display = formToShow === "register-form" ? "block" : "none";
        }
    </script>
</body>

</html>