<?php
    include("conexion.php");

    $TituloL = $_POST['titulo'];
    $ImgG = $_POST['imge'];
    // Obtener solo el nombre del archivo de la imagen general
    $ImgG_nombre = basename($ImgG);

    $DesGen = $_POST['desG'];
    $DesTot = $_POST['desT'];

    $solicitud = "INSERT INTO Lugares(TituloL, ImgG, DesGen, DesTot) VALUES ('$TituloL','$ImgG_nombre','$DesGen','$DesTot')";
    $resultado = mysqli_query($conexion, $solicitud);

    if ($resultado) {
        echo "El lugar se ha registrado exitosamente.";
    } else {
        echo "Error al registrar el lugar: " . mysqli_error($conexion);
    }

    // Redireccionar a generarLugar.php después de mostrar el mensaje
    header("Location: generarLugar.php");
?>
