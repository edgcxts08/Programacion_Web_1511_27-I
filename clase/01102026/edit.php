<?php
include('db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET username='$username', email='$email', phone='$phone' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="tema.css"> 
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label for="username">Nombre:</label>
        <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>">
        <br>
        <label for="phone">Teléfono:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>">
        <br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>

