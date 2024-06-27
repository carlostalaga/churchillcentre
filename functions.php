<?php



function add_theme_scripts() {

    /* CSS */
    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css', array(), '5.3.3');
    wp_enqueue_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css', array(), '11.0.5');
    wp_enqueue_style('slickcss', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.9.0');
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array(), '6.2.0');
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






/*
 ██████  ██       ██████  ██████   █████  ██
██       ██      ██    ██ ██   ██ ██   ██ ██
██   ███ ██      ██    ██ ██████  ███████ ██
██    ██ ██      ██    ██ ██   ██ ██   ██ ██
 ██████  ███████  ██████  ██████  ██   ██ ███████


████████  █████  ██   ██  ██████  ███    ██  ██████  ███    ███ ██    ██
   ██    ██   ██  ██ ██  ██    ██ ████   ██ ██    ██ ████  ████  ██  ██
   ██    ███████   ███   ██    ██ ██ ██  ██ ██    ██ ██ ████ ██   ████
   ██    ██   ██  ██ ██  ██    ██ ██  ██ ██ ██    ██ ██  ██  ██    ██
   ██    ██   ██ ██   ██  ██████  ██   ████  ██████  ██      ██    ██

*/
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

    // Fetch all public post types
    $post_types = get_post_types(array('public' => true), 'names');

    // Register the taxonomy for all public post types
    register_taxonomy('days', $post_types, $args);
}
add_action('init', 'create_days_taxonomy', 0);





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


function remove_default_post_content_editor() {
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');
    //remove_post_type_support('store', 'editor');
}
add_action('init', 'remove_default_post_content_editor');




/*
███████ ██   ██  ██████ ███████ ██████  ██████  ████████
██       ██ ██  ██      ██      ██   ██ ██   ██    ██
█████     ███   ██      █████   ██████  ██████     ██
██       ██ ██  ██      ██      ██   ██ ██         ██
███████ ██   ██  ██████ ███████ ██   ██ ██         ██

*/
// Define a function to generate a custom excerpt
function get_excerpt($limit, $source = null) {
    global $post; // Access the global $post object to get current post's ID

    // Choose the source of the excerpt based on the $source parameter
    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();

    // Remove shortcodes and square bracketed text which might be shortcodes or block markers
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);

    // Strip shortcodes and HTML tags to ensure clean text
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);

    // Trim the excerpt to the specified $limit ensuring it ends at a complete word
    $excerpt = mb_substr($excerpt, 0, $limit);
    $excerpt = mb_substr($excerpt, 0, mb_strripos($excerpt, " "));

    // Normalize whitespace to a single space between words
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));

    // Append a "read more" link to the excerpt
    $excerpt .= '<a href="'.get_permalink($post->ID).'"> ... </a>';

    return $excerpt; // Return the final excerpt
}






/*
 ██████  ██████   ██████  ██    ██ ██████  ███████ ██████
██       ██   ██ ██    ██ ██    ██ ██   ██ ██      ██   ██
██   ███ ██████  ██    ██ ██    ██ ██████  █████   ██   ██
██    ██ ██   ██ ██    ██ ██    ██ ██      ██      ██   ██
 ██████  ██   ██  ██████   ██████  ██      ███████ ██████


 ██████  ██████  ███████ ███    ██     ██   ██  ██████  ██    ██ ██████  ███████
██    ██ ██   ██ ██      ████   ██     ██   ██ ██    ██ ██    ██ ██   ██ ██
██    ██ ██████  █████   ██ ██  ██     ███████ ██    ██ ██    ██ ██████  ███████
██    ██ ██      ██      ██  ██ ██     ██   ██ ██    ██ ██    ██ ██   ██      ██
 ██████  ██      ███████ ██   ████     ██   ██  ██████   ██████  ██   ██ ███████


*/
    function display_grouped_open_hours_using_options($use_options = true) {        
        // The purpose of initialise a $grouped_hours empty array is to group all the open days that share the same opening and closing times.
        $grouped_hours = [];

        // Determine which arguments to pass to have_rows()
        $have_rows_args = $use_options ? ['open_hours', 'option'] : ['open_hours'];

        // Loop through each row of the 'open_hours' repeater field
        while (have_rows(...$have_rows_args)) : the_row(); 
            // Get the open days, open from time, and open to time for each row
            $open_days = get_sub_field('open_days');
            $open_from = get_sub_field('open_from');
            $open_to = get_sub_field('open_to');

            // Check if there are open days
            if ($open_days):
                // Create a unique key for the time range
                $time_range = $open_from . ' to ' . $open_to;

                // Checks if the key $time_range does not already exist in the $grouped_hours array.
                if (!isset($grouped_hours[$time_range])) {
                    $grouped_hours[$time_range] = [];
                }

                // Loop through each day in the $open_days array
                foreach ($open_days as $day) {
                    $grouped_hours[$time_range][] = $day->name;
                }
            endif;
        endwhile;

        // Output the grouped hours
        foreach ($grouped_hours as $time_range => $days):
            $day_list = implode(', ', $days); ?>
<p>
    <span class="fw-bold"><?php echo esc_html($day_list); ?></span>: <?php echo esc_html($time_range); ?>
</p>
<?php endforeach;
    }

    // Usage examples:
    // To use with 'option':
    // display_grouped_open_hours_using_options(true);

    // To use without 'option':
    // display_grouped_open_hours_using_options(false);

    /*
            Example:

        Suppose you have the following input data:

            Row 1: Open days = [Monday, Wednesday, Friday], Open from = "9:00 am", Open to = "5:30 pm"
            Row 2: Open days = [Thursday], Open from = "9:00 am", Open to = "9:00 pm"

        The process would look like this:

            For Row 1:
                $time_range = "9:00 am to 5:30 pm"
                $grouped_hours["9:00 am to 5:30 pm"] is initialized as an empty array.
                Days [Monday, Wednesday, Friday] are added to $grouped_hours["9:00 am to 5:30 pm"].

            For Row 2:
                $time_range = "9:00 am to 9:00 pm"
                $grouped_hours["9:00 am to 9:00 pm"] is initialized as an empty array.
                Day [Thursday] is added to $grouped_hours["9:00 am to 9:00 pm"].

        After processing all rows, $grouped_hours would look like this:

        php

        $grouped_hours = [
            "9:00 am to 5:30 pm" => ["Monday", "Wednesday", "Friday"],
            "9:00 am to 9:00 pm" => ["Thursday"]
        ];

        This structure allows us to easily output the grouped days and their corresponding time ranges, as each unique time range is a key, and the days are stored as an array under that key. This approach ensures that days with the same time range are grouped together and displayed accordingly.

        Summary of Actions and Methods:

            Create a unique key: Use concatenation to form a unique identifier for each time range.
            Check existence: Use isset to check if the key already exists in the array.
            Initialize if needed: If the key doesn't exist, initialize it with an empty array.
            Append to array: Use foreach to iterate over days and append each day's name to the appropriate array under the unique time range key.

        This process groups open days by their time ranges, facilitating the desired output format.
        */ 



/*
███████  ██████   ██████ ██  █████  ██          ██  ██████  ██████  ███    ██ ███████
██      ██    ██ ██      ██ ██   ██ ██          ██ ██      ██    ██ ████   ██ ██
███████ ██    ██ ██      ██ ███████ ██          ██ ██      ██    ██ ██ ██  ██ ███████
     ██ ██    ██ ██      ██ ██   ██ ██          ██ ██      ██    ██ ██  ██ ██      ██
███████  ██████   ██████ ██ ██   ██ ███████     ██  ██████  ██████  ██   ████ ███████

Include the social-icons.php file to have access to the social_icons_lightmode function.
*/
require_once get_template_directory() . '/inc/social-icons.php';