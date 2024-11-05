document.addEventListener("DOMContentLoaded", function(){
    const overlay = document.querySelector('.team-logo-overlay');
    const clubLogo = document.querySelector('.team-circle-logo');
    const image = document.querySelector('.squad-layout-pic');
    const imageOverlay = document.querySelector('.before-squad-load');
    const squadLayOutCloseButton = document.querySelector('.close-squad-layout');
    const squadLayoutDiv = document.querySelector('.squad-layout-div');
    const openSquadLayoutButton = document.querySelector('.open-squad-layout')


    // Preload the background image for circular logo
    if (clubLogo) {
        const img = new Image();
        const backgroundImage = clubLogo.style.backgroundImage;

        if (backgroundImage) {
            // Extract URL from background image style
            img.src = backgroundImage.replace(/url\(["']?/, '').replace(/["']?\)$/, '');
        }

        img.onload = function() {
            if (overlay) overlay.style.display = 'none';
        };
    }

    // Check if squadLayoutPic is an <img> element
   
  if (image.complete && image.naturalHeight !== 0) {
      console.log("Image is fully downloaded.");
      imageOverlay.style.display = 'none'
      
  } else {
      image.onload = () => {
          console.log("Image has finished downloading.");
          imageOverlay.style.display = 'none'
      };
      image.onerror = () => {
          console.log("Error: Image could not be loaded.");
      };
  }

  squadLayOutCloseButton.addEventListener('click', function(){
    squadLayoutDiv.style.display = 'none'
  })
  openSquadLayoutButton.addEventListener('click', function(){
    squadLayoutDiv.style.display = 'flex'
  })
//   window.addEventListener('scroll', function(){
//     squadLayoutDiv.style.display = 'none'
//   })

 //swipper ini
 const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'vertical',
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });
  
 

    console.log("scripts are working");
});
