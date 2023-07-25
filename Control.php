<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Municipalidad Distrital Lagunas: Gestor de Noticias y Lugares</title>

    <link rel="shortcut icon" type="image/png" href="foic/logoLagunas.png">
    <link rel="stylesheet" type="text/css" href="css/ControlGeneral.css">

</head>
<body>
    <div class="container">
        <?php
            // Iniciar la sesión para recuperar el nombre de usuario
            session_start();

            // Verificar si el nombre de usuario está en la sesión
            if (isset($_SESSION['usuario'])) {
                $nombreUsuario = $_SESSION['usuario'];
                echo "<h1>Bienvenido usuario '" .$nombreUsuario. "' al Gestor de Noticias y Lugares</h1>";
            }
        ?>
        <a href="generarNoticia.php" class="boton">Noticias</a>
        <a href="generarLugar.php" class="boton">Lugares</a>
        <a href="Login.html" class="boton" style="background-color: red;">CERRAR SESION</a>
    </div>   
</body>
</html>