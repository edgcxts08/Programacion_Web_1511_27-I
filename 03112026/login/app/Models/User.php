<?php
declare (strict_types=1);
namespace App\Models;
use App\Core\Conexion;


//Modelo de MVC par conectar SQL y conectar persistencia, sin generar HTML, solo formularios de datos, para que el controlador los use y genere la vista, con el fin de separar responsabilidades y mantener el código limpio y organizado.
final class User{
    //Recibe administardor de la base de datos y la configuracio de la conexion
    public function __construct(private Conexion $conexion){

    
    }

    public function getUserByEmail(string $email): array|false|null{
        $query = $this->conexion->getConnection()->prepare("SELECT id, username, email, password_hash FROM users WHERE email = :email");
        $query->execute([':email' => $email]);
        return $query->fetch();
        
    }
    //funcion para generar un nuevo usuario en la base de datos, recibe el nombre de usuario, correo y contraseña, y devuelve el id del usuario creado

    public function createUser(String $username, string $email, string $hash): int{
        
    }

}
?>
