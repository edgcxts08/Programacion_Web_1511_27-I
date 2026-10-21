<?php
//datos del servidor de la base de datos, MySQL
$host= "127.0.0.1:3306";
$user="root";
$pass="edgar1010";
$dbName="crud_app";
$conn= new mysqli($host, $user, $pass, $dbName);


if($conn->connect_error){
    die("Error en la conexión: ".$conn->connect_error);
}else{
    echo "Conexión exitosa";
} 

?>