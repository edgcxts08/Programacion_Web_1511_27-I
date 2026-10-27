<?php
//un pdo ayuda a conectarse a la base de datos, es un objeto que nos permite conectarnos a la base de datos y ejecutar consultas con cualquier motor de base de datos, en este caso mysql


$config = require __DIR__ . '/config.php';

//EXTRAER LAS VARIABLES DE ENTORNO DEL ARRAY DE CONFIGURACIÓN
$host = $config['DB_HOST'];
$dbname = $config['DB_NAME'];
$user = $config['DB_USER'];
$pass = $config['DB_PASS'];
$charset = $config['DB_CHARSET'];


//OPCIONES RECOMENDADASA PARA LA CONEXIÓN PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //para que nos muestre los errores en excepción de la base de datos
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //para que nos devuelva los resultados en un array asociativo
    PDO::ATTR_EMULATE_PREPARES => false, //para que nos devuelva los resultados en un array asociativo
];

try {
    //DSN (Data Source Name) es una cadena que contiene la información necesaria para conectarse a la base de datos: indica el motor + host + nombre de la base de datos + charset
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("DB error: " . $e->getMessage()); //mensaje d error si no se concecta a la base de datos
}



?>
