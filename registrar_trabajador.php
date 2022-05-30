<?php
include("conexion.php");

$nombre = $_POST["usuario"];
$pass  = $_POST["contraseña"];

//login trabajador
if(isset($_POST["benviar"])){
    $query = mysqli_query($conn, "SELECT * FROM login WHERE usuario = '$nombre' AND contraseña = '$pass'");
    $nr = mysqli_num_rows($query);

    if($nr==1){
        echo "<script> alert ('Bienvenido $nombre'); window.location = 'test.html' </script>";
    }else{
        echo "<script> alert ('No existe el usuario'); window.location = 'index.html' </script>";
    }
}

//Registrar trabajador
if(isset($_POST["registrar"])){
    $sqlgrabar = "INSERT INTO login (usuario,contraseña) values ('$nombre','$pass')";
    if(mysqli_query($conn,$sqlgrabar)){
        echo "<script> alert ('Se registro con exito: $nombre'); window.location = 'index.html' </script>";
    }else{
        echo "Error: ".$sql."<br>".$mysql_error($conn);
    }


}

?>