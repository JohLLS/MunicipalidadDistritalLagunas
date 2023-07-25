<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipalidad - Registrar usuarios</title>

    <link rel="stylesheet" type="text/css" href="css/Control.css">
</head>
<body>
    <center><h1>Bienvenido Administrador</h1>
    <h3>Resgistro-Usuarios</h3></center>
	<form action="registrar.php" method="POST">
		Nombre de Usuario: <input type="text" name="name_user" maxlength="7" required><br/><br/>
		Contraseña: <input type="text" name="password" maxlength="11" required><br/><br/>
		<input type="submit" name="enviar" value="ENVIAR">
	</form>
    <br/>
    <form action="gestion.php">
        <button type="submit">Gestionar Usuarios</button>
    </form>
    <br/>
    <form action="Login.html">
        <button type="submit" style="background-color: red;">CERRAR CESION</button>
    </form>
</body>
</html>