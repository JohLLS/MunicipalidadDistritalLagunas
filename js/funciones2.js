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
  
    window.changeTab = changeTab;
  });