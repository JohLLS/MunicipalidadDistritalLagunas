<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $titulo = $_POST["titulo"];
  $informacion = $_POST["informacion"];

  // Directorio de destino
  $directorioDestino = "D:/imgL/";

  // Guardar las imágenes en el directorio de destino
  if (!empty($_FILES["archivos"])) {
    foreach ($_FILES["archivos"]["tmp_name"] as $index => $tmp_name) {
      $nombreArchivo = $_FILES["archivos"]["name"][$index];
      $rutaDestino = $directorioDestino . $nombreArchivo;
      move_uploaded_file($tmp_name, $rutaDestino);
    }
  }

  // Puedes realizar otras acciones aquí si es necesario

  // Responder con éxito a la solicitud AJAX
  http_response_code(200);
} else {
  // Responder con error si la solicitud no es de tipo POST
  http_response_code(400);
}
?>
