<?php
include ('db.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (username, email, phone) VALUES ('$name', '$email', '$phone')";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
    }else{
        echo "Error: ".$sql."<br>".$conn->error;
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
    <h1>Create User</h1>
    <form action="create.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required placeholder="Enter your name">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address">
        <br>
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required placeholder="Enter your phone number" maxlength="10" pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number">
        <br>
        <button type="submit">Create User</button>
    </form>
    <a href="index.php"></a>
</body>
</html>