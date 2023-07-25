<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Municipalidad: Registrar Noticias</title>

    <link rel="stylesheet" type="text/css" href="css/Control.css">
</head>
<body>
        <?php
            // Iniciar la sesión para recuperar el nombre de usuario
            session_start();

            // Verificar si el nombre de usuario está en la sesión
            if (isset($_SESSION['usuario'])) {
                $nombreUsuario = $_SESSION['usuario'];
                echo "<center><h1>Bienvenido usuario '". $nombreUsuario ."' al Resgistro de Noticias</h1></center>";
            }
        ?>
    
	<form action="registrarNoticia.php" method="POST">
		Título - Noticia: <input type="text" name="titulo" maxlength="200" required><br/><br/>
		Imagen de Presentación: <input type="file" name="imge" accept="image/*" required><br/><br/>
        Descripción de Presentación: <input type="text" name="desG" maxlength="500" required><br/><br/>
        Información Total: <input type="text" name="desT" required><br/><br/>            
		<input type="submit" name="enviar" value="ENVIAR">
	</form>
    <br/>
    <form action="gestionNoticias.php">
        <button type="submit">Gestionar Noticia</button>
    </form>
    <br/>
    <form action="Control.php">
        <button type="submit">Regresar</button>
    </form>
</body>
</html>