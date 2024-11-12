<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
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
  echo $sidebarAdmin2;?>
  </div>
<div id="viewport">
  <div id="content">
        <nav class="navbar navbar-default user">
      <div class="container-fluid">
        <h2 class="nav navbar-nav navbar-right titulo">Gestión de Animales</h2>
      </div>
        </nav>
        <div class="container-fluid">
        <div class="container mt-4">
       
        <h1 ><b>EDITAR ANIMAL</b></h1>
        <div class="profile-pic">
            <img id="profileImage" src="https://via.placeholder.com/100" alt="Foto de perfil">
            <input type="file" id="imageUpload" accept="image/*" onchange="loadFile(event)">
            <label for="imageUpload">Subir foto</label>
        </div>
            <form action="agregarAnimal.php" method="POST">
                <div class="form-group">
                    <div class="mb-3">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" placeholder="Nombre del animal">
                    </div>
                    <div class="mb-3">
                    <label for="species">Especie</label>
                    <input type="text" id="species" name="species" placeholder="Especie">
                </div>
                <div class="mb-3">
                    <label for="breed">Raza</label>
                    <input type="text" id="breed" name="breed" placeholder="Raza">
                </div>
                <div class="mb-3">
                    <label for="admission-date">Fecha Ingreso</label>
                    <input type="date" id="admission-date" name="admission-date" placeholder="Fecha Ingreso">
                </div>
                <div class="mb-3">
                    <label for="history">Historia</label>
                    <input type="text" id="history" name="history" placeholder="Historia">
                </div>
                <div class="mb-3">
                    <label for="birth-date">Fecha Nacimiento</label>
                    <input type="text" id="birth-date" name="birth-date" placeholder="Fecha Nacimiento">
                </div>
                <div class="mb-3">
                    <label for="health-status">Estado Salud</label>
                    <input type="text" id="health-status" name="health-status" placeholder="Estado Salud">
                </div>
                <input type="hidden" id="apadrinado">
                </div>
            <button type="submit" class="btn submit-btn">GUARDAR</button>
        </form>
           
           
          
        </div>

    
    </div>
  </div>
</div>
<?php 
  include("sidebar.php");
  echo $footerAdmin;?>
  </div>
</body>
<html>