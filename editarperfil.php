<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Eventos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Casa Natura</title>

</head>
<body>
        <?php
        include('fragmentos.php');
        echo $navbar;
        ?>
        <main>
            <div class="dashboard-container">
            <?php
        include('fragmentos.php');
        echo $sidebar;
        ?>
            <div class="main-content-perfil">
            <div class="card-container">
                <!-- Tarjeta de Información de la Cuenta -->
                <div class="card">
                    <img src="imagenes/user.png" alt="User Profile Picture">
                    <h2>Información de la Cuenta</h2>
                    <p><strong>Nombre:</strong> User Ejemplo</p>
                    <p><strong>Región:</strong> Región - País</p>
                    <p><strong>Email:</strong> emailtest@gmail.com</p>
                    <p><strong>Teléfono:</strong> +1-000-000-0000</p>
                    <button class="submit-btn" onclick="editarCuenta()">Editar Cuenta</button>
                </div>

                <!-- Tarjeta de Dirección de User -->
                <div class="card">
                    <h2>Dirección de User</h2>
                    <p><strong>Ejemplo:</strong> Dirección de Cliente Ejemplo</p>
                    <p><strong>Provincia:</strong> Provincia, Cantón, Distrito</p>
                    <p><strong>Teléfono:</strong> +1-000-000-0000</p>
                    <p><strong>Email:</strong> emailtest@gmail.com</p>
                    <button class="submit-btn" onclick="editarDireccion()">Editar Dirección</button>
                </div>
            </div>
            </div>

            </div>
        </main>
   

        <?php 
        include("fragmentos.php");
        echo $footer;
        ?>


    <script>
        function editarCuenta() {
            
            alert('Editar cuenta');
        }

        function editarDireccion() {
            
            alert('Editar dirección');
        }
    </script>
</body>
</html>

