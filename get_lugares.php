<?php
include("conexion.php");

$solicitud = "SELECT * FROM Lugares";
$resultado = mysqli_query($conexion, $solicitud);

$lugares = array();

while ($fila = mysqli_fetch_assoc($resultado)) {
    $lugares[] = $fila;
}

echo json_encode($lugares);
?>
