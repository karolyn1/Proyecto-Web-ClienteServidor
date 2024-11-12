<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Iniciar Sesión / Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: center;
            background-color: #003049;
            padding: 10px 0;
        }

        .navbar a {
            color: #ffffff;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            gap: 20px;
            box-sizing: border-box;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            box-sizing: border-box;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .form-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #FFC107;
            color: #ffffff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            font-weight: bold;
        }

        .form-container button:hover {
            background-color: #FFA000;
        }

        .remember {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }

        .remember input {
            margin-right: 5px;
        }

        .remember a {
            color: #007bff;
            text-decoration: none;
        }

        .remember a:hover {
            text-decoration: underline;
        }

        .animal-images {
            width: 100%;
            max-width: 600px;
        }

        .animal-images img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        footer {
            background-color: #003049;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%;
        }

        .toggle-section {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .toggle-section a {
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        .toggle-section a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php 
        include("fragmentos.php");
        echo $navbar;
    ?>

    <div class="container">
        <!-- Formulario de Inicio de Sesión -->
        <div class="form-container" id="login-form">
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="POST">
                <input type="text" id="username" name="username" placeholder="Email o Usuario" required>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>

                <div class="remember">
                    <label><input type="checkbox" name="remember"> Recordar Usuario</label>
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

                <div class="checkbox-container">
                    <input type="checkbox" name="voluntario" id="voluntario">
                    <label for="voluntario">¿Te gustaría ser voluntario?</label>
                </div>
                
                <button type="submit" name="registrar">Registrarme</button>
            </form>
            <div class="toggle-section">
                ¿Ya tienes cuenta? <a onclick="toggleForms('login-form')">Iniciar Sesión aquí</a>
            </div>
        </div>

        <div class="animal-images">
            <img src="imagenes/img3.png" alt="Animales Casa Natura">
        </div>
    </div>

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
