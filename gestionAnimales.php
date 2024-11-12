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
.user{
    background-color:#f0f0f0;

}

.agregarAnimal{
    font-weight: bold;
    color:#062D3E;
    border: 0.2px solid #062D3E;

}

.agregarAnimal:hover{
    color:#fff;
    background-color: #FFC107;
}

table{
    color:#062D3E;
width: 100%;
border-collapse:collapse;

}
th{
    background-color: #f9f9f9;
}
td{
    font-weight: 200;
}
th, td{
    color:#062D3E;
    padding:12px;
    text-align:left;
}
    .actions {
            display: flex;
            gap: 10px;
        }
        .actions button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .actions .edit {
            color:#062D3E;
            border: 0.5px solid;
            border-radius:5px;
            padding:5px;
            width: 40px;
        }
        .actions .delete {
            color:#062D3E;
            border: 0.5px solid;
            border-radius:5px;
            padding:5px;
            width: 40px;
        }

        .actions button:hover{
            color: #FFC107;
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
        <div class="d-flex justify-content-between align-items-center mb-3">
            
            <a class="agregarAnimal btn d-flex align-items-center" href="agregarAnimal.php">
            <i class="fas fa-plus p-1"></i> AGREGAR ANIMAL
            </a>
           
            <div class="input-group" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Buscar animal...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

      <!-- REALIZACION DE TABLA DE EJEMPLO -->
      <table>
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
            <tr>
                <td>1</td>
                <td>Alyvia Kelley</td>
                <td>Alyvia Kelley</td>
                <td>Cliente</td>
                <td>a.kelley@gmail.com</td>
                <td class="actions">
                    <button class="edit"><i class="fas fa-pen"></i></button>
                    <button class="delete"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jaiden Nixon</td>
                <td>Jaiden Nixon</td>
                <td>Cliente</td>
                <td>jaiden.n@gmail.com</td>
                <td class="actions">
                    <button class="edit"><i class="fas fa-pen"></i></button>
                    <button class="delete"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Ace Foley</td>
                <td>Ace Foley</td>
                <td>Cliente</td>
                <td>ace.fo@yahoo.com</td>
                <td class="actions">
                    <button class="edit" href="editarAnimal.php"><i class="fas fa-pen"><a href="editarAnimal.php"></a></i></button>
                    <button class="delete"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>  
      
    </div>
  </div>
</div>
<?php 
  include("sidebar.php");
  echo $footerAdmin;?>
  </div>
</body>
<html>