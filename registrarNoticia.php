<?php
    include("conexion.php");

    $Titulo = $_POST['titulo'];
    $ImgG = $_POST['imge'];
    // Obtener solo el nombre del archivo de la imagen general
    $ImgG_nombre = basename($ImgG);

    $DesGen = $_POST['desG'];
    $DesTot = $_POST['desT'];

    $solicitud = "INSERT INTO noticias(Titulo, ImgGe, DescripGen, DescripTot) VALUES ('$Titulo','$ImgG_nombre','$DesGen','$DesTot')";
    $resultado = mysqli_query($conexion, $solicitud);

    if ($resultado) {
        echo "La noticia se ha registrado exitosamente.";
    } else {
        echo "Error al registrar la Noticia: " . mysqli_error($conexion);
    }

    // Redireccionar a generarLugar.php después de mostrar el mensaje
    header("Location: generarNoticia.php");
?>
