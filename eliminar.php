<?php
	include("conexion.php");
	$id=$_GET['id'];
	$solicitud = "DELETE FROM Usuarios WHERE id_User=$id";
	$resultado = mysqli_query($conexion, $solicitud);

	header("location:gestion.php");

?>