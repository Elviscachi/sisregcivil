<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver imagen</title>
</head>
<body>
	<form action="">
		<input type="text" name="id">
		<button name="enviar" type="submit">Consultar</button>
	</form>

	<h1>Foto:</h1>
	<img src="view/
    display.php?id=<?php echo $_REQUEST['id']; ?>">
</body>
</html>