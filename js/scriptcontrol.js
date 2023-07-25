document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("noticia-form");
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    // Obtener valores del formulario
    const titulo = document.getElementById("titulo").value;
    const archivos = document.getElementById("archivos").files;
    const informacion = document.getElementById("informacion").value;

    // Crear objeto FormData para enviar datos al servidor
    const formData = new FormData();
    formData.append("titulo", titulo);
    formData.append("informacion", informacion);

    // Agregar archivos al FormData (pueden ser múltiples)
    for (let i = 0; i < archivos.length; i++) {
      formData.append("archivos[]", archivos[i]);
    }

    // Crear solicitud AJAX al servidor
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "guardar_imagen.php", true); // Reemplaza "guardar_imagen.php" con la URL del script en tu servidor que procesa y guarda la imagen
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          // La solicitud se ha completado correctamente
          // Puedes realizar acciones adicionales aquí si es necesario
          console.log("Imagen guardada correctamente en el servidor.");
        } else {
          // Ha ocurrido un error al guardar la imagen
          console.error("Error al guardar la imagen en el servidor.");
        }
      }
    };

    // Enviar el FormData al servidor
    xhr.send(formData);

    // Limpiar formulario
    form.reset();
  });
});
