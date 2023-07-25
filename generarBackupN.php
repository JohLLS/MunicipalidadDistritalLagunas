<?php
    // Incluir el archivo de conexión a la base de datos
    include("conexion.php");

    // Nombre del archivo de respaldo
    $archivo = "C:/xampp/htdocs/MunicipalidadLagunas/BD-respaldos/respaldo_noticias.txt";

    // Consulta para obtener los datos de la tabla 'Noticias'
    $solicitud = "SELECT * FROM Noticias ORDER BY id_Noticias ASC";
    $resultado = mysqli_query($conexion, $solicitud);

    // Abrir o crear el archivo de respaldo
    $handle = fopen($archivo, 'w');

    // Escribir los datos en el archivo
    while ($fila = mysqli_fetch_array($resultado)) {
        $linea = $fila['id_Noticias'] . "\t" . $fila['Titulo'] . "\n";
        fwrite($handle, $linea);
    }

    // Cerrar el archivo
    fclose($handle);

    // Redireccionar a la página de gestión de noticias
    header("Location: gestionNoticias.php");

    // Salir del script
    exit;
?>
