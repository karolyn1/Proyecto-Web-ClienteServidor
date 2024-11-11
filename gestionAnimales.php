<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
<?php
include("sidebar.php");
echo $sidebarAdmin2;
?>

<div class="content">
        <!-- Título principal Dashboard -->
        <div class="main-title">Gestión de Usuarios</div>

        <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Botón para agregar usuario -->
            <h2 class="d-flex align-items-center">
                <i class="fas fa-plus-circle mr-2"></i>Agregar Usuario
            </h2>
            <!-- Campo de búsqueda -->
            <div class="input-group" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Buscar usuario...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
 
<?php 
    include("sidebar.php");
    echo $footerAdmin;
    ?>
</body>
<html>