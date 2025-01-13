var menu = document.querySelector('.menu');
var sideMenu = document.querySelector('.side-menu');

menu.addEventListener('click', function menuToglle(){
    sideMenu.classList.toggle('hidden');
})
