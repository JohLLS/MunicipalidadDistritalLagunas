fetch('get_noticias.php')
    .then(response => response.json())
    .then(data => {
        // Creamos el HTML con los datos obtenidos y lo agregamos al contenedor
        const noticiasContainer = document.getElementById('noticiasContainer');

        data.forEach(noticia => {
            const workerDiv = document.createElement('div');
            workerDiv.classList.add('worker');

            const img = document.createElement('img');
            img.src = `imgNoticias/${noticia.ImgGe}`;
            img.width = 300;
            img.height = 300;
            img.alt = noticia.Titulo;

            const h2 = document.createElement('h2');
            h2.textContent = noticia.Titulo;

            const p = document.createElement('p');
            p.textContent = noticia.DescripGen;

            workerDiv.appendChild(img);
            workerDiv.appendChild(h2);
            workerDiv.appendChild(p);

            noticiasContainer.appendChild(workerDiv);
        });
    })
    .catch(error => console.error('Error al obtener los datos:', error));
