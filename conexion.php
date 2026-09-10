<?php
$host = 'localhost';
$user = "root";
$password = "edgar10"; // contraseña del gestorde base de datos
$dbName = "crud_app"; // nombre de la base de datos

$conexion = new mysqli($host, $user, $password, $dbName);
if($conexion->connect_error){
    echo "Error en la conexión: ", $conexion->connect_error;
}else{
    echo "<h1>Conexión exitosa a la base de datos</h1>";
}

