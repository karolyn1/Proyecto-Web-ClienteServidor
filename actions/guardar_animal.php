<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        $nombre = $_POST['nombre'];
        $especie = $_POST['especie'];
        $raza = $_POST['raza'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $estado_salud = $_POST['estado_salud'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $historia = $_POST['historia'];
        $necesidades = $_POST['necesidades'];

        $uploadDir = 'img/';
        $destPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {

            $query = "INSERT INTO animal( Nombre, Raza, Especie, Fecha_Ingreso, Estado_Salud, Fecha_Nacimiento, Historia, Necesidades, Imagen, Apadrinado) 
            VALUES ('$nombre','$raza','$especie','$fecha_ingreso','$estado_salud','$fecha_nacimiento','$historia','$necesidades','$destPath',0)";

            if ($conn->query($query) ==  TRUE) {
                echo "<script>
                    alert('Animal registrado correctamente.');
                  </script>";
                header('Location: /Proyecto-Web-ClienteServidor/gestionAnimales.php');    
            } else {
                echo "<script>
                    alert('Error al registrar el animal.');
                  </script>";
                  header('Location: /Proyecto-Web-ClienteServidor/agregarAnimal.php');   
            }
        } else {
            echo "<p>Error al subir el archivo.</p>";
        }
    } else {
        echo "<p>Error: " . $_FILES['file']['error'] . "</p>";
    }
}

    