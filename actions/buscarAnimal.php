<?php
include("conexion.php");

$search = $_POST["search"];

if(!empty($search)){
    $sql = "SELECT * FROM animal WHERE Nombre LIKE '$search%'";
    $result = $conn->query($sql);

    if(!$result){
        die("ERROR:". $conn->error);
    }

    $json = array();

    while($animal = $result->fetch_assoc()){
            $json[] = [
                "Nombre" => $animal["Nombre"],
                "Raza" => $animal["Raza"],
                "Especie" => $animal["Especie"],
                "Apadrinado" => $animal["Apadrinado"],
                "ID_Animal" => $animal["ID_Animal"],
                "FechaIngreso" => $animal["Fecha_Ingreso"],
                "EstadoSaludo" => $animal["Estado_Salud"],
                "FechaNacimeinto" => $animal["Fecha_Nacimiento"],
                "Historia" => $animal["Historia"],
                "Necesidades" => $animal["Necesidades"],
                "Imagen" => $animal["Imagen"]
            ];
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
}