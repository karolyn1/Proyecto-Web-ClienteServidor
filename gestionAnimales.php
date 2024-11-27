<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
        include("sidebar.php");
        echo $sidebarAdmin2;
    ?>

    <?php
        // Incluir el archivo de conexión a la base de datos
        include("actions/conexion.php");

        // Verificar si se pasó un ID para la eliminación
        if (isset($_GET['id'])) {
            $id_animal = $_GET['id'];
        
            // Consulta para verificar si el animal está apadrinado
            $sql = "SELECT COUNT(*) AS apadrinado_count FROM animal_usuario WHERE id_animal = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_animal);  // 'i' para integer
            $stmt->execute();
            $result = $stmt->get_result();
            $apadrinadoCount = $result->fetch_assoc()['apadrinado_count'];
        
            if ($apadrinadoCount == 0) {
                // Si no está apadrinado, se puede eliminar lógicamente
                $sql = "UPDATE animal SET activo = 0 WHERE id_animal = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_animal);
                $stmt->execute();
        
                // Redirigir a la página de gestión de animales
                header('Location: gestionAnimales.php');
                exit;
            } else {
                // Si está apadrinado, no se permite eliminar
                echo "<script>alert('No puedes eliminar este animal porque está apadrinado.'); window.location.href = 'gestionAnimales.php';</script>";
            }
        }

        // Consulta para obtener los animales y sus apadrinadores (si los tienen)
        $sql = "
            SELECT a.id_animal, a.nombre, a.raza, a.especie, u.nombre AS apadrinado
            FROM animal a
            LEFT JOIN animal_usuario au ON a.id_animal = au.id_animal
            LEFT JOIN usuario u ON au.id_usuario = u.id_usuario
            WHERE a.activo = 1"; // Filtrar solo los animales activos

        $result = $conn->query($sql); // Usamos query() en lugar de prepare() para esta consulta simple

        if ($result->num_rows > 0) {
            // Si hay resultados, los obtenemos
            $animales = [];
            while ($row = $result->fetch_assoc()) {
                $animales[] = $row;
            }
        } else {
            $animales = []; // En caso de que no haya resultados
        }
    ?>

    <main>
        <div id="viewport">
            <div id="content">
                <!-- Navbar -->
                <nav class="navbar">
                    <div class="container-fluid">
                        <h2 class="titulo">Gestión de Animales</h2>
                    </div>
                </nav>

                <!-- Contenido principal -->
                <div class="contenedor">
                    <!-- Encabezado con botón y búsqueda -->
                    <div class="fila-header">
                        <!-- Botón Agregar Animal -->
                        <div class="boton-agregar">
                            <a class="btn-agregar" href="agregarAnimal.php">
                                <i class="fas fa-plus icono-agregar"></i> AGREGAR ANIMAL
                            </a>
                        </div>

                        <!-- Input de búsqueda -->
                        <div class="buscador">
                            <div class="input-grupo">
                                <input type="text" class="campo-buscar" placeholder="Buscar animal...">
                                <button class="btn-buscar">
                                    <i class="fas fa-search icono-buscar"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla -->
                    <div class="container contenedor-tabla">
                        <table class="tabla text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Raza</th>
                                    <th>Especie</th>
                                    <th>Apadrinado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($animales as $index => $animal): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($index + 1) ?></td>
                                        <td><?= htmlspecialchars($animal['nombre']) ?></td>
                                        <td><?= htmlspecialchars($animal['raza']) ?></td>
                                        <td><?= htmlspecialchars($animal['especie']) ?></td>
                                        <td><?= htmlspecialchars($animal['apadrinado'] ?? 'No') ?></td>
                                        <td class="actions">
                                            <a class="edit btn btn-warning btn-sm" href="editarAnimal.php?id=<?= $animal['id_animal'] ?>">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a class="delete btn btn-danger btn-sm" href="?id=<?= $animal['id_animal'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este animal?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
        include("sidebar.php");
        echo $footerAdmin;
    ?>

</body>
</html>