<?php
    // Incluir el archivo de conexión a la base de datos
    include("conexion.php");

    // Nombre del archivo de respaldo
    $archivo = "C:/xampp/htdocs/MunicipalidadLagunas/BD-respaldos/respaldo_lugares.txt";

    // Consulta para obtener los datos de la tabla 'Lugares'
    $solicitud = "SELECT * FROM Lugares ORDER BY id_Lugares ASC";
    $resultado = mysqli_query($conexion, $solicitud);

    // Abrir o crear el archivo de respaldo
    $handle = fopen($archivo, 'w');

    // Escribir los datos en el archivo
    while ($fila = mysqli_fetch_array($resultado)) {
        $linea = $fila['id_Lugares'] . "\t" . $fila['TituloL'] . "\n";
        fwrite($handle, $linea);
    }

    // Cerrar el archivo
    fclose($handle);

    // Redireccionar a la página de gestión de lugares
    header("Location: gestionLugares.php");

    // Salir del script
    exit;
?>
