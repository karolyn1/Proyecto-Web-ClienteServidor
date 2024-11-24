<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donacioens</title>
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
  include("sidebar.php");
  echo $sidebarAdmin2;
?>
<main>
<div id="viewport">
  <div id="content">
        <nav class="navbar ">
            <div class="container-fluid">
                <h2 class="titulo">Gestión de Usuarios</h2>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="container container-animales-agregar mt-4">
                <h1><b>CREAR NUEVO USUARIO</b></h1>
                <div class="profile-pic">
                    <img id="profileImage" src="https://via.placeholder.com/100" alt="Foto de perfil">
                    <input type="file" id="imageUpload" accept="image/*" onchange="loadFile(event)">
                    <label for="imageUpload">Subir foto</label>
                </div>
                <form action="agregarUsuario.php" method="POST" class="form-agregar-animal">
                    <div class="row">
                    <div class="col form-group-agregar-animal mb-3">
                        <label for="full-name">Nombre</label>
                        <input type="text" id="full-name" name="full-name" placeholder="Nombre" required>
                    </div>
                    <div class="col form-group-agregar-animal mb-3">
                        <label for="full-name">Primer Apellido</label>
                        <input type="text" id="full-name" name="full-name" placeholder="Primer Apellido" required>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col form-group-agregar-animal mb-3">
                        <label for="full-name">Segundo Apellido</label>
                        <input type="text" id="full-name" name="full-name" placeholder="Segundo Apellido" required>
                    </div>
                    <div class="col form-group-agregar-animal mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    </div>
                    <div class="form-group-agregar-animal mb-3">
                        <label for="email">Teléfono</label>
                        <input type="phone" id="email" name="email" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group-agregar-animal mb-3">
                        <label for="email">Contraseña</label>
                        <input type="password" id="email" name="email" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group-agregar-animal mb-3">
                        <label for="role">Rol</label>
                        <select id="role" name="role" required>
                            <option value="">Seleccione un rol</option>
                            <option value="admin">Administrador</option>
                            <option value="cliente">Cliente</option>
                        </select>
                    </div>
                    <button type="submit" class="submit-btn">GUARDAR</button>
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
</body>
</html>