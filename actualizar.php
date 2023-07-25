<?php
    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $solicitud = "SELECT * FROM Usuarios WHERE id_User = ?";
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
                <title>Municipalidad - Actualizar usuario</title>

                <link rel="stylesheet" type="text/css" href="estilosindex.css">
            </head>
            <body>
                <h1>Modificar Usuario</h1>
                <form action="guardar_actualizacion.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $fila['id_User']; ?>">
                    Nombre de Usuario: <input type="text" name="name_user" value="<?php echo $fila['nombre_user']; ?>"><br/><br/>
                    Contraseña: <input type="text" name="password" value="<?php echo $fila['contraseña']; ?>"><br/><br/>
                    <input type="submit" name="enviar" value="Actualizar">
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
