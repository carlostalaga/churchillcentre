<?php



function add_theme_scripts() {

    /* CSS */
    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css', array(), '5.3.3');
    wp_enqueue_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css', array(), '11.0.5');
    wp_enqueue_style('slickcss', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.9.0');
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3');
    wp_enqueue_style('animatecss', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');
    wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap', array(), '1.0');
    wp_enqueue_style('lightgallerycss', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css', array(), '2.7.2');
    wp_enqueue_style('lightgallerAutoplay', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-autoplay.min.css', array(), '2.7.2');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');
    
    /* JS */
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0', true);
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js', array('jquery'), '2.9.3', true);
    wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js', array('jquery'), '5.3.3', true);
    /* Include Swiper JS New versions before the initialisation script // WordPress doesn't support ES modules out of the box when enqueueing */
    wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), '1.9.0', true);
    wp_enqueue_script('matchHeight', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array('jquery'), '0.7.2', true);
    wp_enqueue_script('lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.umd.min.js', array('jquery'), '2.7.2', true);
    wp_enqueue_script('lightgallerypluginthumbnails', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js', array('lightgallery'), '2.7.2', true);
    wp_enqueue_script('lightgallerypluginzoom', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js', array('lightgallery'), '2.7.2', true);
    wp_enqueue_script('lightgallerypluginautoplay', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/autoplay/lg-autoplay.umd.min.js', array('lightgallery'), '2.7.2', true);

    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
    
    /*
     * Version numbers are added to each enqueued file for cache busting.
     * The 'true' parameter is used to load JavaScript files in the footer.
     * Dependencies are specified for scripts that rely on other scripts.
     */
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');




/*

███    ██  █████  ██    ██ ██     ██  █████  ██      ██   ██ ███████ ██████
████   ██ ██   ██ ██    ██ ██     ██ ██   ██ ██      ██  ██  ██      ██   ██
██ ██  ██ ███████ ██    ██ ██  █  ██ ███████ ██      █████   █████   ██████
██  ██ ██ ██   ██  ██  ██  ██ ███ ██ ██   ██ ██      ██  ██  ██      ██   ██
██   ████ ██   ██   ████    ███ ███  ██   ██ ███████ ██   ██ ███████ ██   ██

Register Custom Navigation Walker
*/

if (! file_exists(get_template_directory() . '/bs533-navwalker.php')) {
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the bs533-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    require_once get_template_directory() . '/bs533-navwalker.php';
}


/* Menus Registration */
function register_my_menus()
{
    //add_filter( 'show_admin_bar', '__return_false' );
    register_nav_menus(array(
        'main-menu' => __('Main menu', 'broucek') ,
        'footer-menu' => __('Footer menu', 'broucek') ,
        'privacy-menu' => __('Privacy menu', 'broucek') ,
    ));
}
add_action('init', 'register_my_menus');