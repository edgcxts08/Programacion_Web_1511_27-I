<?php
session_start();
$data_name = $_GET['data_name'];
$data_age = $_GET['data_age'];

// $edad = 10;
// echo "Hola, mi nombre es $nombre y tengo $edad años.";
// echo "<br>";
// echo "<h2>" . $nombre ."</h2>";
// echo "<br>";
// echo "<h2>" . $edad ."</h2>";


if ($data_age < 0) {
    echo "Edad no válida";
    exit;
} elseif ($data_age >= 18) {
    $_SESSION['nombre'] = $data_name;
    $_SESSION['edad'] = $data_age;
    header("Location: mayor.php");
    exit;
} else {
    header("Location: menor.html");
    exit;
}


?>
<!--
This block of code contains the HTML structure for displaying age-related information inside a PHP script. It checks if the user is of legal age (18 or older) and displays a message accordingly. If the user is a minor, it shows a red-colored heading indicating that they are underage. The HTML is commented out, so it won't be rendered in the browser.
-->
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($edad >= 18): ?>
        <p>Eres mayor de edad.</p>
    <?php else: ?>
        <h1 style="color: red;">Eres menor de edad.</h1>
    //<?php endif; ?>
</body>
</html>
-->
