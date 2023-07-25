function loguear() {
    const usuario = document.getElementById("usuario-pedido").value;
    const contra = document.getElementById("clave-pedido").value;

    if (usuario === "" || contra === "") {
        Swal.fire({
            icon: 'error',
            title: 'Opss...',
            text: 'Algunos campos no han sido completados',
            allowOutsideClick: false,
        });
    } else {
        const data = new URLSearchParams();
        data.append('usuario', usuario);
        data.append('contra', contra);

        fetch('verificar_usuario.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if (data.autenticado) {
                if (data.esAdminB) {
                    window.location.href = "index.php";
                } else {
                    window.location.href = "Control.php";
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Acceso denegado',
                    text: 'Usuario o contraseña incorrecta',
                    allowOutsideClick: false,
                });
            }
        })
        .catch(error => {
            console.error('Error al verificar el usuario:', error);
        });
    }
}
