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


/*
 ██████   ██████   ██████   ██████  ██      ███████     ███    ███  █████  ██████
██       ██    ██ ██    ██ ██       ██      ██          ████  ████ ██   ██ ██   ██
██   ███ ██    ██ ██    ██ ██   ███ ██      █████       ██ ████ ██ ███████ ██████
██    ██ ██    ██ ██    ██ ██    ██ ██      ██          ██  ██  ██ ██   ██ ██
 ██████   ██████   ██████   ██████  ███████ ███████     ██      ██ ██   ██ ██


██       █████  ███████ ██    ██     ██       ██████   █████  ██████
██      ██   ██    ███   ██  ██      ██      ██    ██ ██   ██ ██   ██
██      ███████   ███     ████       ██      ██    ██ ███████ ██   ██
██      ██   ██  ███       ██        ██      ██    ██ ██   ██ ██   ██
███████ ██   ██ ███████    ██        ███████  ██████  ██   ██ ██████


*/

document.addEventListener("DOMContentLoaded", function () {
    // Select the map placeholder element
    var mapPlaceholder = document.getElementById('map-placeholder');

    // Create an Intersection Observer to observe when the map placeholder enters the viewport
    var observer = new IntersectionObserver(function (entries) {
        // If the placeholder is in the viewport, load the iframe and stop observing
        if (entries[0].isIntersecting) {
            loadMapIframe();
            observer.disconnect();
        }
    });

    // Start observing the map placeholder
    observer.observe(mapPlaceholder);
});

function loadMapIframe() {
    // Get the iframe code from the localized data
    var iframeCode = acfData.iframe_code;

    // Parse the iframe code to extract the src attribute
    var parser = new DOMParser();
    var doc = parser.parseFromString(iframeCode, 'text/html');
    var iframeSrc = doc.querySelector('iframe').getAttribute('src');

    // Create a new iframe element
    var iframe = document.createElement('iframe');
    iframe.src = iframeSrc;
    iframe.width = "100%";
    iframe.height = "100%";
    iframe.style.border = "0";
    iframe.allowFullscreen = "";
    iframe.loading = "lazy";
    iframe.referrerPolicy = "no-referrer-when-downgrade";

    // Replace the map placeholder with the new iframe
    document.getElementById('map-placeholder').replaceWith(iframe);
}
