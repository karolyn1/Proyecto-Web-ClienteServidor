<?php
include("conexion.php");

$data = $_POST;

switch ($data['action']) {
    case 'delete':
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $buscar= "SELECT * FROM animal_usuario WHERE ID_Animal = '$id'";
            $response = $conn->query($buscar);
            if ($response->num_rows > 0) {
                $up = "UPDATE animal SET Estado = 0, Apadrinado = 0 WHERE ID_Animal = '$id'";
                $response = $conn->query($up);
                if($response){
                    $cambiar = "UPDATE animal_usuario SET FechaFin = CURDATE(), Estado = 0 WHERE ID_Animal = '$id' AND Estado != 0";
                    $ejecutar = $conn->query($cambiar);
                    if ($ejecutar) {
                        echo json_encode(["status" => "00", "message" => "Animal desactivado correctamente"]);
                    } else {
                        echo json_encode(["status" => "99", "message" => "Error al desactivar el animal"]);
                    }
                }
            } else {
                $getAnimal = "SELECT * FROM animal WHERE ID_Animal ='$id'";
                $ejec=$conn->query($getAnimal);
                if($ejec && $ejec->num_rows > 0){
                    $animal = $ejec->fetch_assoc();
                    if($animal['Apadrinado']==1){
                        $upAnimalUsuario = "UPDATE animal_usuario SET Estado=0, FechaFin = CURDATE() WHERE ID_Animal = '$id' AND FechaFin IS NULL";
                        $eliminar=$conn->query($upAnimalUsuario);
                    }
                }  
                $sql = "DELETE FROM animal WHERE ID_Animal = '$id'";
                $result = $conn->query($sql);
                if ($result) {
                    echo json_encode(["status" => "00", "message" => "Animal eliminado correctamente"]);
                } else {
                    echo json_encode(["status" => "99", "message" => "Error al eliminar el animal"]);
                }
            }
            
        }
        break;
    case 'getAll':
        $sql = "SELECT * FROM animal";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $animales = [];
            while ($animal = $result->fetch_assoc()) {
                $animales[] = [
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
                    "Imagen" => $animal["Imagen"],
                    "Estado" => $animal["Estado"]
                ];
            }
            echo json_encode(["status" => "00", "animales" => $animales]);
        } else {
            echo json_encode(["status" => "99", "animales" => []]);
        }
        break;
   
           
    default:

        break;
}