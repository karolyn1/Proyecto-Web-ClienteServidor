<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Gestión de Usuarios</title>
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
                        <h1><b>CREAR NUEVO USUARIO</b></h1>
                        <form action="actions/guardar_usuario.php" method="POST" class="form-agregar-animal">
                            <div class="row">
                                <div class="col form-group-agregar-animal mb-3">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control" required>
                                </div>
                                <div class="col form-group-agregar-animal mb-3">
                                    <label for="apellido1">Primer Apellido</label>
                                    <input type="text" id="apellido1" name="apellido1" placeholder="Primer Apellido" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group-agregar-animal mb-3">
                                    <label for="apellido2">Segundo Apellido</label>
                                    <input type="text" id="apellido2" name="apellido2" placeholder="Segundo Apellido" class="form-control" required>
                                </div>
                                <div class="col form-group-agregar-animal mb-3">
                                    <label for="correo">Email</label>
                                    <input type="email" id="correo" name="correo" placeholder="Email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group-agregar-animal mb-3">
                                <label for="telefono">Teléfono</label>
                                <input type="text" id="telefono" name="telefono" placeholder="Teléfono" class="form-control" required>
                            </div>
                            <div class="form-group-agregar-animal mb-3">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" class="form-control" required>
                            </div>
                            <div class="form-group-agregar-animal mb-3">
                                <label for="rol">Rol</label>
                                <select id="rol" name="rol" class="form-control" required>
                                    <option value="">Seleccione un rol</option>
                                    <option value="admin">Administrador</option>
                                    <option value="cliente">Cliente</option>
                                </select>
                            </div>
                            <button type="submit" class="submit-btn ">GUARDAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php 
        include("sidebar.php");
        echo $footerAdmin;
    ?>

    <script>
        // Mostrar imagen de perfil seleccionada
        const loadFile = event => {
            const output = document.getElementById('profileImage');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = () => URL.revokeObjectURL(output.src);
        };
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>