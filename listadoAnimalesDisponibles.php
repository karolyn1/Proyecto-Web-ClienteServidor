<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">

    <style>
        /* Estilos personalizados */
        .animales-apadrinar-title {
            margin-top: 20px;
            margin-bottom: 30px;
            text-align: center;
        }
        .animales-apadrinar-subtitle {
            margin-bottom: 50px; /* Mayor espacio debajo del subtítulo */
            text-align: center;
            color: #555;
        }
        .animales-apadrinar-list-title {
            text-align: center;
            color: #062D3E; /* Azul específico */
            font-weight: bold;
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .animal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .animal-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            background-color: #f9f9f9;
        }
        .animal-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
        }
        .animal-card a {
            display: block;
            margin-top: 10px;
            font-size: 16px;
            color: #062D3E;
            text-decoration: none;
        }
        .animal-card a:hover {
            text-decoration: underline;
        }
    </style>
</head>

    <body>
        <nav>
            <?php
                include("fragmentos.php");
                echo $navbar;
            ?>
        </nav>

    <div class="container">
        <h1 class="animales-apadrinar-title">Animales Disponibles para Apadrinar</h1>
        <p class="animales-apadrinar-subtitle">Apadrinar un animal es una forma maravillosa de apoyar a los seres más vulnerables, ayudándolos a obtener cuidado, alimentación y atención médica que necesitan.</p>

        <h3 class="animales-apadrinar-list-title">Lista de Animales Disponibles</h3>

        
        <!--     Grid de animales con BD 
             
            <div class="animal-grid"> --> 
            <?php

            /*
                //Conectar a la base de datos 
                //$conexion = new mysqli("localhost", "usuario", "contraseña", "base_datos");

                // Verificar conexión
                 if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                // Consultar animales disponibles
                $sql = "SELECT id, nombre, foto FROM animales WHERE disponible = 1";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    // Mostrar cada animal en una tarjeta
                    while ($animal = $resultado->fetch_assoc()) {
                        echo '<div class="animal-card">';
                        echo '<img src="ruta_a_imagenes/' . $animal['foto'] . '" alt="Foto de ' . htmlspecialchars($animal['nombre']) . '">';
                        echo '<a href="animal.php?id=' . $animal['id'] . '">' . htmlspecialchars($animal['nombre']) . '</a>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No hay animales disponibles para apadrinar en este momento.</p>";
                }

                $conexion->close();

            */
                ?>
            <!-- </div>
            </div>
            Final de vista con conexion a BD --> 
  

        <!-- Grid de animales -->
        <div class="animal-grid">
            <!-- Ejemplo de tarjeta de animal 1 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+1" alt="Foto de Animal 1">
                <a href="animal.php?id=1">Animal 1</a>
            </div>

            <!-- Ejemplo de tarjeta de animal 2 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+2" alt="Foto de Animal 2">
                <a href="animal.php?id=2">Animal 2</a>
            </div>

            <!-- Ejemplo de tarjeta de animal 3 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+3" alt="Foto de Animal 3">
                <a href="animal.php?id=3">Animal 3</a>
            </div>

            <!-- Ejemplo de tarjeta de animal 4 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+4" alt="Foto de Animal 4">
                <a href="animal.php?id=4">Animal 4</a>
            </div>

            <!-- Ejemplo de tarjeta de animal 5 -->
            <div class="animal-card">
                <img src="https://via.placeholder.com/200x200.png?text=Animal+5" alt="Foto de Animal 5">
                <a href="animal.php?id=5">Animal 5</a>
            </div>
        </div>
    </div>

    <footer>
        <?php
         include("fragmentos.php");
         echo $footer;
         ?>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>