<?php
session_start();
$nombre =$_SESSION['nombre'];
$edad = $_SESSION['edad'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome, <?php echo $nombre; ?>!</h1>
    <p>You have been identified as an adult.</p>
    <p>You are <?php echo $_SESSION['edad']; ?> years old.</p>
    <a href="index.html">Return to the form</a>
</body>
</html>