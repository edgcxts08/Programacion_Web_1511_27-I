<?php

require_once __DIR__ . "/../config/db.php";

//Toma el ID desde la URL, si no existe, asigna 0
$id = (int)($_GET["id"] ?? 0);
if ($id <= 0) {
    die("ID inválido");
}

//buscar el registro en la base de datos por medio del id

$sql = "SELECT id, nombre, email FROM alumnos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$alumno = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$alumno){
    die("Alumno no encontrado");
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //trim() elimina los espacios en blanco al inicio y al final de la cadena, y el operador ?? devuelve una cadena vacía si no se encuentra el valor en $_POST
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Validar los datos
    if($nombre === "" || $email === ""){
        die("Todos los campos son obligatorios");
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("El email no es válido");
    }else{
        try{
            // Actualizar el registro en la base de datos
            $sql = "UPDATE alumnos SET nombre = :nombre, email = :email WHERE id = :id";
            // prepare() se utiliza para preparar la consulta SQL antes de ejecutarla, lo que permite utilizar marcadores de posición para los valores que se van a actualizar en la base de datos. Esto ayuda a prevenir inyecciones SQL y mejora la seguridad de la aplicación.
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                //corchetes asociativos para pasar los valores a los marcadores de posición, donde las claves del array son los nombres de los marcadores de posición y los valores son los datos que se van a actualizar en la base de datos.
                //con esto se evita la inyección SQL, ya que los valores se pasan como parámetros y no se concatenan directamente en la consulta SQL.
                ':nombre' => $nombre,
                ':email' => $email,
                ':id' => $id
            ]);
            header("Location: index.php");
            exit;
        }catch(PDOException $e){
            die("Error al actualizar el alumno: " . $e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Editar</h1>
    <p><a href="index.php"><- Regresar </a></p>
    <form action="" method="post">
        <label for="">NOMBRE</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($alumno['nombre']) ?>"> <br><br>
        <label for="">EMAIL</label>
        <input type="email" name="email" value="<?= htmlspecialchars($alumno['email']) ?>"> <br><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>