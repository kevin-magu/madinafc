document.addEventListener("DOMContentLoaded", function(){
    const overlay = document.querySelector('.team-logo-overlay');
    const clubLogo = document.querySelector('.team-circle-logo');
    const squadLayoutPic = document.querySelector('.squad-layout-pic');
    const squadLayoutOverlay = document.querySelector('.before-squad-load');

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
    if (squadLayoutPic && squadLayoutPic.tagName === "IMG") {
        squadLayoutPic.onload = function() {
            if (squadLayoutOverlay) squadLayoutOverlay.style.display = 'none';
        };
    } else {
        console.warn("squadLayoutPic is not an <img> element, so 'onload' will not work.");
    }

    console.log("scripts are working");
});
