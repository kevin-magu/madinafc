document.addEventListener("DOMContentLoaded", function() {
    const overlay = document.querySelector('.team-logo-overlay');
    const clubLogo = document.querySelector('.team-circle-logo');
    const circleLogo = document.querySelector('.card-team-circle-logo');

    // Check if elements exist and have background images set
    const clubLogoImage = window.getComputedStyle(clubLogo).backgroundImage;
    const circleLogoImage = window.getComputedStyle(circleLogo).backgroundImage;

    // Preload the background images if they are set
    const img = new Image();

    if (clubLogoImage && clubLogoImage !== 'none') {
        img.src = clubLogoImage.replace(/url\(["']?/, '').replace(/["']?\)$/, '');
    } else if (circleLogoImage && circleLogoImage !== 'none') {
        img.src = circleLogoImage.replace(/url\(["']?/, '').replace(/["']?\)$/, '');
    }

    // Hide overlay after the image is loaded
    img.onload = function() {
        overlay.style.display = 'none';
    }

    console.log("Scripts are working");
});
