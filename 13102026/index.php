<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form action="enviar.php" method="get">
		<label for="name">NAME:</label>
		<input type="text" name="name" placeholder="Name" required maxlength="150">
		<br>
		<label for="age">AGE:</label>
		<input type="number" name="age" placeholder="Age" required>
		<br>
        <br>    
		<button type="submit">Submit</button>
	</form>
</body>

</html>