<?php
    include("conexion.php");

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $nombre_user = $_POST['name_user'];
        $contraseña = $_POST['password'];

        $solicitud = "UPDATE Usuarios SET ";

        $updateData = array();

        // Verifica si se modificó el nombre de usuario y agrega el campo a la consulta
        if ($nombre_user != "") {
            $updateData[] = "nombre_user='$nombre_user'";
        }

        // Verifica si se modificó la contraseña y agrega el campo a la consulta
        if ($contraseña != "") {
            $updateData[] = "contraseña='$contraseña'";
        }

        // Verifica si se ha modificado al menos un campo para realizar la actualización
        if (!empty($updateData)) {
            $solicitud .= implode(", ", $updateData);
            $solicitud .= " WHERE id_User=?";
            $stmt = mysqli_prepare($conexion, $solicitud);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'i', $id);
                mysqli_stmt_execute($stmt);

                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    echo "<script>alert('El usuario ha sido actualizado correctamente.');</script>";
                } else {
                    echo "No se realizaron cambios en el usuario.');</script>";
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error al actualizar el usuario: " . mysqli_error($conexion) . "');</script>";
            }
        } else {
            echo "<script>alert('No se han realizado modificaciones.');</script>";
        }
    } else {
        echo "<script>alert('ID de usuario no proporcionado.');</script>";
    }

    header("Location: gestion.php");
?>
