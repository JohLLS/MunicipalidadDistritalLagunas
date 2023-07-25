<?php
    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $solicitud = "SELECT * FROM Noticias WHERE id_Noticias = ?";
        $stmt = mysqli_prepare($conexion, $solicitud);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_array($resultado);
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Municipalidad - Actualizar Noticia</title>

                <link rel="stylesheet" type="text/css" href="css/Control.css">
            </head>
            <body>
                <center><h1>Modificar Noticia</h1></center>
                <form action="guardar_actualizacionNoticia.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $fila['id_Noticias']; ?>">                
                    Título - Noticia: <input type="text" name="titulo" value="<?php echo $fila['Titulo']; ?>" maxlength="200"><br/><br/>
                    Imagen de Presentación: <input type="file" name="imge" accept="image/*" value="<?php echo $fila['ImgGe']; ?>"><br/><br/>
                    Descripción de Presentación: <input type="text" name="desG" maxlength="500" value="<?php echo $fila['DescripGen']; ?>"><br/><br/>
                    Información Total: <input type="text" name="desT" value="<?php echo $fila['DescripTot']; ?>"><br/><br/>
                    <input type="submit" name="enviar" value="Actualizar">
                </form>
                <br/>
                <form action="gestionNoticias.php">
                    <button type="submit">Regresar</button>
                </form>

            </body>
            </html>
<?php
        } else {
            echo "No se encontraron datos para el ID proporcionado.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "ID de usuario no proporcionado.";
        exit; // Salir del script para evitar más procesamiento innecesario
    }
?>
