<?php
    include("conexion.php");

    $consulta = "SELECT * FROM Noticias";
    $result = mysqli_query($conexion, $consulta);

    $noticias = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $noticias[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($noticias);
?>
