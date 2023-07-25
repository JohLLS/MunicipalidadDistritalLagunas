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

	$solicitud = "SELECT * FROM Lugares ORDER BY id_Lugares ASC";
	$resultado = mysqli_query($conexion, $solicitud);

echo "<table border='1'><tr><td>ID_Noticia</td><td>Título</td><td colspan='2'>ACCIONES</td>";
	while($fila=mysqli_fetch_array($resultado)){
		echo "<tr>";
			echo "<td>".$fila['id_Lugares']."</td>";
            echo "<td>".$fila['TituloL']."</td>";		
			echo "<td><a href='eliminarLugar.php?id=".$fila['id_Lugares']."'>Eliminar</a></td>";
			echo "<td><a href='actualizarLugar.php?id=".$fila['id_Lugares']."'>Modificar</a></td>";
        echo "</tr>";

	}
echo "</table>";
?>

	</div>
	<br/><br/>
    <form action="generarLugar.php">
        <button type="submit">Regresar</button>
    </form>
	<br/><br/>
    <form action="generarBackupL.php" method="post">
        <button type="submit" name="generarBackup">Generar Backup</button>
    </form>
</body>
</html>