<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

$consulta = "SELECT * FROM Usuarios WHERE nombre_user = '$usuario' AND contraseña = '$contra'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $esAdminB = false;

    // Verificar si el usuario es "AdminBD" con la contraseña "511PS270137"
    if ($usuario === "AdminBD" && $contra === "511PS270137") {
        $esAdminB = true;
    }

    
    // Consultar el ID del usuario autenticado
    $consultaIdUsuario = "SELECT id_User FROM Usuarios WHERE nombre_user = '$usuario'";
    $resultadoIdUsuario = mysqli_query($conexion, $consultaIdUsuario);
    $filaIdUsuario = mysqli_fetch_assoc($resultadoIdUsuario);
    $idUsuario = $filaIdUsuario['id_User'];

    // Iniciar la sesión y guardar el nombre de usuario y el ID en la sesión
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['idUsuario'] = $idUsuario;

    
    $response = array(
        'autenticado' => true,
        'esAdminB' => $esAdminB
    );
} else {
    $response = array(
        'autenticado' => false
    );
}

header('Content-Type: application/json');
echo json_encode($response);
?>
