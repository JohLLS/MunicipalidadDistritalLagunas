<?php
	include("conexion.php");

	$nombre_user = $_POST['name_user'];
	$contraseña = $_POST['password'];

	$solicitud = "INSERT INTO Usuarios(nombre_user, contraseña)VALUES('$nombre_user','$contraseña')";

	$resultado = mysqli_query($conexion, $solicitud);

    if ($resultado) {
        echo "El usuario se ha registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($conexion);
    }
    
    // Redirecciona a index.php después de mostrar el mensaje
    header("Location: index.php");

?>