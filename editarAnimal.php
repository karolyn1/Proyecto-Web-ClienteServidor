<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Editar Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<style>


#viewport {
  padding-left: 250px;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#content {
  width: 100%;
  position: relative;
  margin-right: 0;
}

.titulo{
    color:#062D3E;
    font-weight:bold;
    padding:20px;
  
}

form{
    
    padding: 10px;
}
.form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .form-group div {
            flex: 1 1 45%;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],.form-group input[type="date"], .form-group select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .profile-pic {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-pic img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }
        .profile-pic input[type="file"] {
            display: none;
        }
        .profile-pic label {
            cursor: pointer;
            color:#062D3E;;
            font-weight: bold;
        }
        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color:  #062D3E;;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #FFC107;
        }
        .container {
            width: 1000px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            font-size: 20px;
            color:#062D3E;
            margin-bottom: 20px;
        }
        .container-fluid{
            color:#062D3E;
            padding:10px;
        }

</style>
<body>
    <?php 
        include("sidebar.php");
        echo $sidebarAdmin2;

        // Asegúrate de usar la conexión mysqli
        include("actions/conexion.php");

        // Obtener el ID del animal de la URL
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (!$id) {
            echo "ID del animal no proporcionado.";
            exit;
        }

        // Usamos consultas preparadas con mysqli para obtener datos del animal
        $sql = "SELECT * FROM animales WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id); // "i" indica que el parámetro es un entero
            $stmt->execute();
            $result = $stmt->get_result(); // Obtener el resultado de la consulta

            $animal = $result->fetch_assoc(); // Obtener los datos del animal

            // Verificar si el animal existe
            if (!$animal) {
                echo "Animal no encontrado.";
                exit;
            }
        } else {
            echo "Error en la preparación de la consulta.";
            exit;
        }
    ?>

<div id="viewport">
    <div id="content">
        <nav class="navbar navbar-default user">
            <div class="container-fluid">
                <h2 class="titulo">Gestión de Animales - Editar</h2>
            </div>
        </nav>
        <div class="container mt-4">
            <h1><b>Editar Animal</b></h1>
            <form action="actualizarAnimal.php" method="POST">
                <!-- Campo oculto para el ID del animal -->
                <input type="hidden" name="id" value="<?= htmlspecialchars($animal['id']) ?>">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($animal['nombre']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="especie">Especie</label>
                    <input type="text" id="especie" name="especie" value="<?= htmlspecialchars($animal['especie']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="raza">Raza</label>
                    <input type="text" id="raza" name="raza" value="<?= htmlspecialchars($animal['raza']) ?>">
                </div>

                <div class="form-group">
                    <label for="fecha_ingreso">Fecha de Ingreso</label>
                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="<?= htmlspecialchars($animal['fecha_ingreso']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= htmlspecialchars($animal['fecha_nacimiento']) ?>">
                </div>

                <div class="form-group">
                    <label for="estado_salud">Estado de Salud</label>
                    <input type="text" id="estado_salud" name="estado_salud" value="<?= htmlspecialchars($animal['estado_salud']) ?>">
                </div>

                <button type="submit" class="btn submit-btn">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>