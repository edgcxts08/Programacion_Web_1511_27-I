<?php
$host = 'localhost';
$user = "root";
$password = "edgar10"; // contraseña del gestorde base de datos
$dbName = "crud_app"; // nombre de la base de datos

try {
    $conexion = new mysqli($host, $user, $password, $dbName);
    echo "<h1>Conexión exitosa a la base de datos</h1>";
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}




