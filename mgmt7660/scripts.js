var menu = document.querySelector('.menu');
var sideMenu = document.querySelector('.side-menu');

menu.addEventListener('click', function menuToglle(){
    sideMenu.classList.toggle('menu-hidden');
    console.log(sideMenu.classList.contains('menu-hidden')? 'Side menu hidden' : 'side menu visible');
})
