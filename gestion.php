<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
	
	<link rel="stylesheet" type="text/css" href="css/estilogestion.css">
</head>
<body>
    <div>

<?php
	include ("conexion.php");

	$solicitud = "SELECT *FROM Usuarios ORDER BY id_User ASC";
	$resultado = mysqli_query($conexion, $solicitud);

echo "<table border='1'><tr><td>ID_Usuario</td><td>Nombre_Usuario</td><td>Contraseña_Usuario</td><td colspan='2'>ACCIONES</td>";
	while($fila=mysqli_fetch_array($resultado)){
		echo "<tr>";
			echo "<td>".$fila['id_User']."</td>";
            echo "<td>".$fila['nombre_user']."</td>";
			echo "<td>".$fila['contraseña']."</td>";
			echo "<td><a href='eliminar.php?id=".$fila['id_User']."'>Eliminar</a></td>";
			echo "<td><a href='actualizar.php?id=".$fila['id_User']."'>Modificar</a></td>";
        echo "</tr>";

	}
echo "</table>";
?>

	</div>
	<br/><br/>
    <form action="index.php">
        <button type="submit">Regresar</button>
    </form>
</body>
</html>