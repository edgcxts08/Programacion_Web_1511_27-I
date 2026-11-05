<?php
declare(strict_types=1);
//workspace to make the database connection, using the .env file to get the database credentials
namespace App\Core;

use PDO; 
final class Conexion{
    private ?PDO $pdo = null;
    public function __construct(private array $config){

    }
    //lambda function to get the database connection, if the connection is null, it will create a new connection, otherwise it will return the existing connection
    public function getConnection():PDO{
        if($this->pdo === null){
            $c = $this->config;
            //dsn is the data source name, it is a string that contains the information needed to connect to the database, in this case it is using the mysql driver, the host, the port and the database name
            
            //motor, server, database, port, charset
            $dsn = sprintf('mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4', $c['host'], $c['port'], $c['name']);
            $this->pdo = new PDO($dsn, $c['username'], $c['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
            $this->pdo->exec("SET time_zone = '+00:00'");
            

        }
        return $this->pdo;
    }
}
?>