<?php
	require_once __DIR__ . "/../config/db.php";
	// Variables para mostrar errores
	$error = "";
	$nombre = "";
	$email = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
    }
    // Validar los datos
    if($nombre === "" || $email === ""){
            $error ="Todos los campos son obligatorios";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "El email no es válido";
        }else{
            try{
                //insertar la consulta preparada
                $sql = 'INSERT INTO alumnos (nombre, email) VALUES (:nombre, :email)';
                // Preparar la consulta
                // Esta lista para ser ejecutada con los datos del formulario
                // Se utiliza prepare para evitar inyecciones SQL
                // es stmt significa statement, es decir, una sentencia SQL preparada para ser ejecutada y que puede contener marcadores de posición para los valores que se van a insertar en la base de datos.
                $stmt = $pdo -> prepare($sql);
                // Ejecutar la consulta con los datos del formulario y pasar los valores a los marcadores de posición, además de que se utiliza un array asociativo para pasar los valores a los marcadores de posición, donde las claves del array son los nombres de los marcadores de posición y los valores son los datos que se van a insertar en la base de datos.
                $stmt -> execute([
                    ':nombre' => $nombre, 
                    ':email' => $email
                    ]);
            }catch(PDOException $e){
                $error = "Error al insertar el alumno: " . $e->getMessage();
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Crear Alumno</h1>
	<p><a href="index.php"><- Regresar</a></p>
	<?php if ($error): ?>
		<p><?= htmlspecialchars($error) ?></p>
	<?php endif; ?>
	<form action="create.php" method="POST">
		<label for="">Nombre: </label>
		<input type="text" name="nombre" required value="<?= htmlspecialchars($nombre) ?>"> <br><br>
		<label for="">Correo:</label> <br><br>
		<input type="text" name="email" required value="<?= htmlspecialchars($email) ?>">
		<button type="submit">Guardar</button>
	</form>
</body>
</html>
