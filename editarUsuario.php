<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Editar Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/java.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>

</style>

<body>
    <?php
    include("sidebar.php");
    echo $sidebarAdmin2;

    // Obtener el ID del usuario desde la URL
    include("actions/conexion.php");

    // Obtener el ID del usuario desde la URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if (!$id) {
        echo "ID del usuario no proporcionado.";
        exit;
    }

    // Obtener los datos del usuario
    $sql = "SELECT a.Nombre, a.Apellido1, a.Apellido2, a.Correo, b.Rol, a.Telefono, a.ID_Usuario, a.Estado
        FROM usuario a
        INNER JOIN roles b ON a.ID_Usuario = b.ID_Usuario
        WHERE a.ID_Usuario = '$id'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
    ?>
    <main>
        <main>
            <div class="viewport">
                <div class="content">
                    <nav class="navbar ">
                        <div class="container-fluid">
                            <h2 class="titulo">Gestión de Usuarios</h2>
                        </div>
                    </nav>
                    <div class="mt-5 container-fluid">
                        <div class="container container-animales-agregar mt-4">
                            <h1><b>EDITAR USUARIO</b></h1>
                            <form id="actualizarUsuario" class="form-agregar-animal">
                                <div class="row">
                                    <input type="hidden" name="idUsuario" id="idUsuarioEditar" value="<?php echo $usuario['ID_Usuario']; ?>">
                                    <div class="col form-group-agregar-animal mb-3">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" id="nombreEditar" name="nombre" placeholder="Nombre"
                                            class="form-control" value="<?php echo $usuario['Nombre']; ?> " required>
                                    </div>
                                    <div class="col form-group-agregar-animal mb-3">
                                        <label for="apellido1">Primer Apellido</label>
                                        <input type="text" id="apellido1Editar" name="apellido1" placeholder="Primer Apellido"
                                            class="form-control" value="<?php echo $usuario['Apellido1']; ?> " required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group-agregar-animal mb-3">
                                        <label for="apellido2">Segundo Apellido</label>
                                        <input type="text" id="apellido2Editar" name="apellido2"
                                            placeholder="Segundo Apellido" class="form-control"
                                            value="<?php echo $usuario['Apellido2']; ?> " required>
                                    </div>
                                    <div class="col form-group-agregar-animal mb-3">
                                        <label for="correo">Email</label>
                                        <input type="email" id="correoEditar" name="correo" placeholder="Email"
                                            class="form-control" value="<?php echo $usuario['Correo']; ?> " required>
                                    </div>
                                </div>
                                <div class="form-group-agregar-animal mb-3">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" id="telefonoEditar" name="telefono" placeholder="Teléfono"
                                        value="<?php echo $usuario['Telefono']; ?> " class="form-control" required>
                                </div>
                                <div class="form-group-agregar-animal mb-3">
                                    <label for="rol">Rol</label>
                                    <select id="rolEditar" name="rol" class="form-control" required>
                                        <option value="" disabled>Seleccione un rol</option>
                                        <option value="admin" <?php echo $usuario['Rol'] === 'admin' ? 'selected' : ''; ?>>Administrador</option>
                                        <option value="cliente" <?php echo $usuario['Rol'] === 'cliente' ? 'selected' : ''; ?>>Cliente</option>
                                    </select>
                                </div>
                                <div class="form-group-agregar-animal mb-3">
                                    <label for="rol">Estado</label>
                                    <select id="estadoEditar" name="estado" class="form-control" required>
                                        <option value="" disabled>Seleccione un estado</option>
                                        <option value="Inactivo" <?php echo $usuario['Estado'] === 'Inactivo' ? 'selected' : ''; ?>>Inactivo</option>
                                        <option value="Activo" <?php echo $usuario['Estado'] === 'Activo' ? 'selected' : ''; ?>>Activo</option>
                                    </select>
                                </div>
                                <button type="submit" class="submit-btn ">GUARDAR</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mensajeModalLabel">CasaNatura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="mensajeModalBody">
                        <!-- El mensaje dinámico se colocará aquí -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="submit-btn" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
</main>
    </main>


    <?php
    include("sidebar.php");
    echo $footerAdmin;
    ?>

</body>

</html>