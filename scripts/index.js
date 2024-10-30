document.addEventListener("DOMContentLoaded", function(){
    const overlay = document.querySelector('.team-logo-overlay');
    const clubLogo = document.querySelector('.team-circle-logo');

    const cardLogo = document.querySelector('.card-team-circle-logo');
    const cardOverlay = document.querySelector('.card-team-logo-overlay')
    


    //preload the bg image -- for circular logos
    
    const img = new Image ()
 //   const cardImage = new Image () 
    img.src = clubLogo.style.backgroundImage.replace(/url\(["']?/, '').replace(/["']?\)$/, '');

    const circleLogo= new Image ()
    circleLogo.src = cardLogo.style.backgroundImage.replace(/url\(["']?/, '').replace(/["']?\)$/, '');
    

    img.onload = function(){
        overlay.style.display = 'none';
     //   cardOverlay.style.display = 'none'
    }
    circleLogo.onload = function(){
        cardOverlay.style.display = 'none';
    }

    console.log("scripts are working");
});