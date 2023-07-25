<?php
	include("conexion.php");
	$id=$_GET['id'];
	$solicitud = "DELETE FROM Lugares WHERE id_Lugares=$id";
	$resultado = mysqli_query($conexion, $solicitud);

	header("location:gestionLugares.php");

?>