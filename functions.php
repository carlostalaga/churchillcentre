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




/*
 ██████ ██████  ████████
██      ██   ██    ██
██      ██████     ██
██      ██         ██
 ██████ ██         ██


*/

function create_store_post_type() {
    $labels = array(
        'name' => __( 'Stores' ),
        'singular_name' => __( 'Store' ),
        'menu_name' => __( 'Stores' ),
        'all_items' => __( 'All Stores' ),
        'add_new' => __( 'Add New' ),
        'add_new_item' => __( 'Add New Store' ),
        'edit_item' => __( 'Edit Store' ),
        'new_item' => __( 'New Store' ),
        'view_item' => __( 'View Store' ),
        'search_items' => __( 'Search Stores' ),
        'not_found' => __( 'No stores found' ),
        'not_found_in_trash' => __( 'No stores found in trash' ),
        'parent_item_colon' => __( 'Parent Store:' ),
        'featured_image' => __( 'Featured Image' ),
        'set_featured_image' => __( 'Set featured image' ),
        'remove_featured_image' => __( 'Remove featured image' ),
        'use_featured_image' => __( 'Use as featured image' ),
        'archives' => __( 'Store archives' ),
        'insert_into_item' => __( 'Insert into store' ),
        'uploaded_to_this_item' => __( 'Uploaded to this store' ),
        'filter_items_list' => __( 'Filter stores list' ),
        'items_list_navigation' => __( 'Stores list navigation' ),
        'items_list' => __( 'Stores list' ),
        'attributes' => __( 'Store attributes' ),
        'name_admin_bar' => __( 'Store' ),
        'item_published' => __( 'Store published' ),
        'item_published_privately' => __( 'Store published privately' ),
        'item_reverted_to_draft' => __( 'Store reverted to draft' ),
        'item_scheduled' => __( 'Store scheduled' ),
        'item_updated' => __( 'Store updated' ),
    );

    $args = array(
        'label' => __( 'Store' ),
        'description' => __( 'Stores' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-store',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );

    register_post_type( 'store', $args );
}
add_action( 'init', 'create_store_post_type', 0 );


function create_section_taxonomy() {
    $labels = array(
        'name' => __( 'Sections' ),
        'singular_name' => __( 'Section' ),
        'search_items' => __( 'Search Sections' ),
        'all_items' => __( 'All Sections' ),
        'parent_item' => __( 'Parent Section' ),
        'parent_item_colon' => __( 'Parent Section:' ),
        'edit_item' => __( 'Edit Section' ),
        'update_item' => __( 'Update Section' ),
        'add_new_item' => __( 'Add New Section' ),
        'new_item_name' => __( 'New Section Name' ),
        'menu_name' => __( 'Sections' ),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'section' ),
        'show_in_rest' => true,
    );

    register_taxonomy( 'section', 'store', $args );
}
add_action( 'init', 'create_section_taxonomy', 0 );


function create_days_taxonomy() {
    $labels = array(
        'name' => __( 'Days' ),
        'singular_name' => __( 'Day' ),
        'search_items' => __( 'Search Days' ),
        'all_items' => __( 'All Days' ),
        'parent_item' => __( 'Parent Day' ),
        'parent_item_colon' => __( 'Parent Day:' ),
        'edit_item' => __( 'Edit Day' ),
        'update_item' => __( 'Update Day' ),
        'add_new_item' => __( 'Add New Day' ),
        'new_item_name' => __( 'New Day Name' ),
        'menu_name' => __( 'Days' ),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => false,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'day' ),
        'show_in_rest' => true,
    );
    register_taxonomy( 'days', 'store', $args );
}
add_action( 'init', 'create_days_taxonomy', 0 );




/*
████████ ██   ██ ██    ██ ███    ███ ██████  ███████
   ██    ██   ██ ██    ██ ████  ████ ██   ██ ██
   ██    ███████ ██    ██ ██ ████ ██ ██████  ███████
   ██    ██   ██ ██    ██ ██  ██  ██ ██   ██      ██
   ██    ██   ██  ██████  ██      ██ ██████  ███████


*/

add_theme_support('post-thumbnails');

function custom_thumbs()
{
    add_image_size('slider1920', 1920, 648, array(
        'center',
        'center'
    ));
    // add_image_size('slider1600', 1600, 540, array(
    //     'center',
    //     'center'
    // ));
    add_image_size('1080p', 1920, 1080, array(
        'center',
        'center'
    ));
    add_image_size('720p', 1280, 720, array(
        'center',
        'center'
    ));
    // add_image_size('3-2r1200', 1200, 800, array(
    //     'center',
    //     'center'
    // ));
    add_image_size('4-3r960', 960, 720, array(
        'center',
        'center'
    ));
    add_image_size('16-9r720', 720, 405, array(
        'center',
        'center'
    ));
    add_image_size('576sm', 576, 576, array(
        'center',
        'center'
    ));
    add_image_size('4-3r576', 576, 432, array(
        'center',
        'center'
    ));
    add_image_size('4-3r320', 320, 240, array(
        'center',
        'center'        
    ));

}
add_action('after_setup_theme', 'custom_thumbs');







/*

 ██████  ██    ██ ████████ ███████ ███    ██ ██████  ███████ ██████   ██████       ██████  ██    ██ ████████
██       ██    ██    ██    ██      ████   ██ ██   ██ ██      ██   ██ ██           ██    ██ ██    ██    ██
██   ███ ██    ██    ██    █████   ██ ██  ██ ██████  █████   ██████  ██   ███     ██    ██ ██    ██    ██
██    ██ ██    ██    ██    ██      ██  ██ ██ ██   ██ ██      ██   ██ ██    ██     ██    ██ ██    ██    ██
 ██████   ██████     ██    ███████ ██   ████ ██████  ███████ ██   ██  ██████       ██████   ██████     ██


*/
add_filter('use_block_editor_for_post', '__return_false');