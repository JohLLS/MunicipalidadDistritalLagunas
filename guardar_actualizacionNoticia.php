<?php
    include("conexion.php");

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $desG = $_POST['desG'];
        $desT = $_POST['desT'];

        // Verificar si se proporcionó una nueva imagen
        if (isset($_FILES['imge']['tmp_name']) && $_FILES['imge']['tmp_name'] != '') {
            $imgGe = $_FILES['imge']['name'];
            $imgGe_tmp = $_FILES['imge']['tmp_name'];
            move_uploaded_file($imgGe_tmp, "ruta/donde/guardar/la/imagen/" . $imgGe);
        } else {
            // Si no se proporcionó una nueva imagen, obtener la imagen actual de la base de datos
            $solicitud = "SELECT ImgGe FROM Noticias WHERE id_Noticias = ?";
            $stmt = mysqli_prepare($conexion, $solicitud);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            $fila = mysqli_fetch_assoc($resultado);
            $imgGe = $fila['ImgGe'];
        }

        $solicitud = "UPDATE Noticias SET Titulo = ?, DescripGen = ?, DescripTot = ?, ImgGe = ? WHERE id_Noticias = ?";
        $stmt = mysqli_prepare($conexion, $solicitud);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssssi', $titulo, $desG, $desT, $imgGe, $id);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "<script>alert('La noticia ha sido actualizada correctamente.');</script>";
            } else {
                echo "<script>alert('No se realizaron cambios en la noticia.');</script>";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Error al actualizar la noticia: " . mysqli_error($conexion) . "');</script>";
        }
    } else {
        echo "<script>alert('ID de noticia no proporcionado.');</script>";
    }

    header("Location: gestionNoticias.php");
?>
