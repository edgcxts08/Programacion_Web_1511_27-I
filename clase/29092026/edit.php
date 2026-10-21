<?php
include ('db.php');
$id = $_GET['id'];

//consulta para obtener los datos del usuario a editar
$sql = "SELECT * FROM users WHERE id = $id";
if ($result = $conn->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Usuario no encontrado";
        exit();
    }
} else {
    echo "Error al obtener los datos del usuario: " . $conn->error;
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    //consulta para actualizar los datos del usuario
    $sql = "UPDATE users SET username='$name', email='$email', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado correctamente";
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
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
    <h1>Editar Usuario</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?php echo $row['username']; ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>">
        <br>
        <label for="phone">Teléfono:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>">
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
