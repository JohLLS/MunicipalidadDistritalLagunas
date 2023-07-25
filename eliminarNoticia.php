<?php
	include("conexion.php");
	$id=$_GET['id'];
	$solicitud = "DELETE FROM Noticias WHERE id_Noticias=$id";
	$resultado = mysqli_query($conexion, $solicitud);

	header("location:gestionNoticias.php");

?>