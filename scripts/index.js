document.addEventListener("DOMContentLoaded", function(){
    const overlay = document.querySelector('.team-logo-overlay');
    const clubLogo = document.querySelector('.team-circle-logo');
    const image = document.querySelector('.squad-layout-pic');
    const imageOverlay = document.querySelector('.before-squad-load');


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

    console.log("scripts are working");
});
