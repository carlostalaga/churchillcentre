/* Include Swiper JS */
let script = document.createElement('script');
script.src = "https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js";
//  this script is loaded in the footer by appending it to the end of the body
document.body.appendChild(script);



/* Initiate Hamburger icon animation */
jQuery(document).ready(function () {

    jQuery('.first-button').on('click', function () {

        jQuery('.animated-icon1').toggleClass('open');
    });
    jQuery('.second-button').on('click', function () {

        jQuery('.animated-icon2').toggleClass('open');
    });
    jQuery('.third-button').on('click', function () {

        jQuery('.animated-icon3').toggleClass('open');
    });
});


/*
███    ███  █████  ████████  ██████ ██   ██ ██   ██ ███████ ██  ██████  ██   ██ ████████
████  ████ ██   ██    ██    ██      ██   ██ ██   ██ ██      ██ ██       ██   ██    ██
██ ████ ██ ███████    ██    ██      ███████ ███████ █████   ██ ██   ███ ███████    ██
██  ██  ██ ██   ██    ██    ██      ██   ██ ██   ██ ██      ██ ██    ██ ██   ██    ██
██      ██ ██   ██    ██     ██████ ██   ██ ██   ██ ███████ ██  ██████  ██   ██    ██


*/
jQuery(document).ready(function ($) {
    // $() will work as an alias for jQuery() inside of this function

    $(document).ready(function () {
        $('.fosforos').matchHeight();
    })

});