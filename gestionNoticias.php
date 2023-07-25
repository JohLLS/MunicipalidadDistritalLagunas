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

	$solicitud = "SELECT * FROM Noticias ORDER BY id_Noticias ASC";
	$resultado = mysqli_query($conexion, $solicitud);

echo "<table border='1'><tr><td>ID_Noticia</td><td>Título</td><td colspan='2'>ACCIONES</td>";
	while($fila=mysqli_fetch_array($resultado)){
		echo "<tr>";
			echo "<td>".$fila['id_Noticias']."</td>";
            echo "<td>".$fila['Titulo']."</td>";		
			echo "<td><a href='eliminarNoticia.php?id=".$fila['id_Noticias']."'>Eliminar</a></td>";
			echo "<td><a href='actualizarNoticia.php?id=".$fila['id_Noticias']."'>Modificar</a></td>";
        echo "</tr>";

	}
echo "</table>";
?>

	</div>
	<br/><br/>
    <form action="generarNoticia.php">
        <button type="submit">Regresar</button>
    </form>
	<br/><br/>
	<form action="generarBackupN.php" method="post">
        <button type="submit" name="generarBackup">Generar Backup</button>
    </form>
</body>
</html>