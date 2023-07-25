fetch('get_lugares.php')
    .then(response => response.json())
    .then(data => {
        // Creamos el HTML con los datos obtenidos y lo agregamos al contenedor
        const lugaresContainer = document.getElementById('lugaresContainer');

        data.forEach(lugar => {
            const workerDiv = document.createElement('div');
            workerDiv.classList.add('worker');

            const img = document.createElement('img');
            img.src = `imgLugares/${lugar.ImgG}`;
            img.width = 300;
            img.height = 300;
            img.alt = lugar.TituloL;

            const h2 = document.createElement('h2');
            h2.textContent = lugar.TituloL;

            const p = document.createElement('p');
            p.textContent = lugar.DesGen;

            workerDiv.appendChild(img);
            workerDiv.appendChild(h2);
            workerDiv.appendChild(p);

            lugaresContainer.appendChild(workerDiv);
        });
    })
    .catch(error => console.error('Error al obtener los datos:', error));
