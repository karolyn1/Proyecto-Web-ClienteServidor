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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
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
        <h1 class="animales-apadrinar-title">Animales Disponibles para Apadrinar</h1>
        <p class="animales-apadrinar-subtitle">Apadrinar un animal es una forma maravillosa de apoyar a los seres más vulnerables, ayudándolos a obtener cuidado, alimentación y atención médica que necesitan.</p>

        <h3 class="animales-apadrinar-list-title">Lista de Animales Disponibles</h3>

        <div class="animal-grid">
            <?php
                // Incluir archivo de conexión a la base de datos
                include("conexion.php");

                try {
                    // Consulta para obtener animales sin usuario asociado
                    $sql = "
                        SELECT a.id_animal, a.nombre, a.foto 
                        FROM animal a
                        LEFT JOIN animal_usuario au ON a.id_animal = au.id_animal
                        WHERE au.id_usuario IS NULL AND a.activo = 1";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $animales = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($animales)) {
                        // Mostrar cada animal como una tarjeta
                        foreach ($animales as $animal) {
                            echo '<div class="animal-card">';
                            echo '<img src="./ruta_a_imagenes/' . htmlspecialchars($animal['foto']) . '" alt="Foto de ' . htmlspecialchars($animal['nombre']) . '">';
                            echo '<a href="animal.php?id=' . $animal['id_animal'] . '">' . htmlspecialchars($animal['nombre']) . '</a>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No hay animales disponibles para apadrinar en este momento.</p>";
                    }
                } catch (PDOException $e) {
                    echo "<p>Error al cargar los animales: " . htmlspecialchars($e->getMessage()) . "</p>";
                }
            ?>
        </div>
    </div>
</main>
    <footer>
        <?php
         include "fragmentos.php";
         echo $footer;
         ?>
    </footer>
</body>

</html>