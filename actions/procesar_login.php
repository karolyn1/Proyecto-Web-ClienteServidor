<?php 
include('conexion.php');

session_start();
if(!empty($_POST)){
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "SELECT a.Nombre, a.Apellido1, a.Correo, a.ID_Usuario, b.Rol, a.Password
    FROM Usuario a
    INNER JOIN roles b
    ON a.ID_Usuario = b.ID_Usuario
    WHERE a.Correo = '".$username."'";

    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
       ;
        while($row = $result->fetch_assoc()){
            if(password_verify($password, $row["Password"])){      
                $_SESSION["username"] = $row["Correo"];
                $_SESSION["rol"] = $row["Rol"];
                $_SESSION["IdUsuario"] = $row["ID_Usuario"];
                $_SESSION["Nombre"] = $row["Nombre"];
                $_SESSION["Apellido1"] = $row["Apellido1"];

                if($_SESSION["rol"] === "admin"){
                    header("Location: /Proyecto-Web-ClienteServidor/dashboardAdmin.php");
                } elseif ($_SESSION["rol"] === "cliente") {
                    header("Location: /Proyecto-Web-ClienteServidor/index.php");
                } else {
                    header("Location: /Proyecto-Web-ClienteServidor/index.php");
                }

                exit();

            } else {
                echo "<script>
                alert('Error en Usuario o Contraseña');
                window.location.href = 'login.php'; // Redirige si no hay datos
              </script>";
        exit();
                session_destroy();
            }
        }
    } else {
        echo "El usuario no existe.";
    }

}