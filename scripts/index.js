document.addEventListener("DOMContentLoaded", function(){
    const overlay = document.querySelector('.team-logo-overlay');
    const clubLogo = document.querySelector('.team-circle-logo');

    //preload the bg image -- for circular logos
    
    const img = new Image ()
    img.src = clubLogo.style.backgroundImage.replace(/url\(["']?/, '').replace(/["']?\)$/, '');

    img.onload = function(){
        overlay.style.display = 'none';
    }
    console.log("scripts are working");
});