document.addEventListener("DOMContentLoaded", function() {
  var currentTab = 1;

  changeTab(currentTab);

  function changeTab(tab) {
    document.getElementById('content-' + currentTab).classList.remove('active');
    document.getElementById('content-' + tab).classList.add('active');
    document.getElementsByClassName('nav-item')[currentTab - 1].classList.remove('active');
    document.getElementsByClassName('nav-item')[tab - 1].classList.add('active');
    currentTab = tab;
  }

  function prevSlide() {
    var carouselInner = document.getElementsByClassName('carousel-inner')[currentTab - 1];
    var workers = carouselInner.getElementsByClassName('worker');
    var lastWorker = workers[workers.length - 1];
    carouselInner.insertBefore(lastWorker, workers[0]);
  }

  function nextSlide() {
    var carouselInner = document.getElementsByClassName('carousel-inner')[currentTab - 1];
    var workers = carouselInner.getElementsByClassName('worker');
    carouselInner.appendChild(workers[0]);
  }

  window.changeTab = changeTab;
  window.prevSlide = prevSlide;
  window.nextSlide = nextSlide;

  function agregarNoticia(noticiaHTML) {
    var carouselInner = document.getElementById('content-' + currentTab).getElementsByClassName('carousel-inner')[0];
    var newWorker = document.createElement('div');
    newWorker.className = 'worker';
    newWorker.innerHTML = noticiaHTML;
    carouselInner.appendChild(newWorker);
  }

  window.agregarNoticia = agregarNoticia;
});
