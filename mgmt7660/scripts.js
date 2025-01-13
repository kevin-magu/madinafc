var menu = document.querySelector('.menu');
var sideMenu = document.querySelector('.side-menu');

menu.addEventListener('click', function menuToglle(){
    if( sideMenu.style.display = 'flex' ){
        sideMenu.style.display = "none";
        console.log(sideMenu.style.display)
    }else if(sideMenu.style.display = 'none'){
        sideMenu.style.display = "flex"
        console.log(sideMenu.style.display)
    }
    
})
