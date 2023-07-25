<?php
    include("conexion.php");

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $tituloL = $_POST['titulo'];
        $desG = $_POST['desG'];
        $desT = $_POST['desT'];

        // Verificar si se proporcionó una nueva imagen
        if (isset($_FILES['imge']['tmp_name']) && $_FILES['imge']['tmp_name'] != '') {
            $imgG = $_FILES['imge']['name'];
            $imgG_tmp = $_FILES['imge']['tmp_name'];
            move_uploaded_file($imgG_tmp, "ruta/donde/guardar/la/imagen/" . $imgG);
        } else {
            // Si no se proporcionó una nueva imagen, obtener la imagen actual de la base de datos
            $solicitud = "SELECT ImgG FROM Lugares WHERE id_Lugares = ?";
            $stmt = mysqli_prepare($conexion, $solicitud);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            $fila = mysqli_fetch_assoc($resultado);
            $imgG = $fila['ImgG'];
        }

        $solicitud = "UPDATE Lugares SET TituloL = ?, DesGen = ?, DesTot = ?, ImgG = ? WHERE id_Lugares = ?";
        $stmt = mysqli_prepare($conexion, $solicitud);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssssi', $tituloL, $desG, $desT, $imgG, $id);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "<script>alert('El lugar ha sido actualizado correctamente.');</script>";
            } else {
                echo "<script>alert('No se realizaron cambios en el lugar.');</script>";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Error al actualizar el lugar: " . mysqli_error($conexion) . "');</script>";
        }
    } else {
        echo "<script>alert('ID de lugar no proporcionado.');</script>";
    }

    header("Location: gestionLugares.php");
?>
