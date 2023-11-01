// script.js

document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
      // Global settings 
      duration: 800, 
      offset: 100,    
      easing: 'ease',
      once: true, 
      delay: 100, 
    //   anchorPlacement: 'center-bottom', 
      mirror: true, 
      startEvent: 'DOMContentLoaded', 
      disable: 'mobile',
    });    
});

// Background carousel at index page
var counter = 1;
setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if(counter > 4) {
        counter = 1;
    }
}, 8000);

// script for hamburger icon, listening for the cick event 

document.addEventListener("DOMContentLoaded", function () {
    let menuToggle = document.querySelector(".menu-toggle");
    let menuContainer = document.querySelector(".menu-container");

    menuToggle.addEventListener("click", function () {
        menuToggle.classList.toggle("active");

        if (menuToggle.classList.contains("active")) {
            menuContainer.style.display = "block";
        } else {
            menuContainer.style.display = "none";
        }
    });
});








