<?php
/**
 * Generates a set of social media icons with links.
 *
 * This function creates a div containing social media icons with links.
 * It can be used on both pages using 'options', and regular pages/posts using their own fields (linkedin, facebook, etc).
 *
 * @param bool $lightmode Whether to use light mode styling (default: true).
 * @param bool $is_option_page Whether the function is being used on an options page (default: true).
 *
 * @return void Outputs HTML directly.
 *
 * @example
 * // Use on an options page with light mode (default behavior)
 * social_icons_lightmode();
 * or
 * social_icons_lightmode(true);
 *
 * @example
 * // Use on an options page with dark mode
 * social_icons_lightmode(false);
 *
 * @example
 * // Use on a regular page/post (e.g., single-store.php) with light mode
 * social_icons_lightmode(true, false);
 *
 * @example
 * // Use on a regular page/post with dark mode
 * social_icons_lightmode(false, false);
 */
function social_icons_lightmode($lightmode = true, $is_option_page = true) {
    // Determine the CSS class based on the lightmode parameter
    $mode_id = $lightmode ? 'social-icons-lightmode' : 'social-icons-darkmode';
    
    // Define an array of social media platforms with their respective icons, URL prefixes, and display names
    $social_icons = [
        'mail' => ['icon' => 'fa-solid fa-envelope', 'prefix' => 'mailto:', 'name' => 'Email'],
        'facebook' => ['icon' => 'fa-brands fa-facebook-f', 'prefix' => '', 'name' => 'Facebook'],
        'twitter' => ['icon' => 'fa-brands fa-twitter', 'prefix' => '', 'name' => 'Twitter'],
        'instagram' => ['icon' => 'fa-brands fa-instagram', 'prefix' => '', 'name' => 'Instagram'],
        'linkedin' => ['icon' => 'fa-brands fa-linkedin-in', 'prefix' => '', 'name' => 'LinkedIn']
    ];
    ?>
<div id="<?php echo esc_attr($mode_id); ?>" class="d-flex flex-wrap">
    <?php foreach ($social_icons as $key => $value): ?>
    <?php 
            // Retrieve the ACF field value based on whether it's an option page or not
            $field = $is_option_page ? get_field($key, 'option') : get_field($key);
            
            // Extract URL, title, and target from the ACF link field 
            $url = isset($field['url']) ? $field['url'] : '';
            $title = isset($field['title']) ? $field['title'] : $value['name'];
            $target = isset($field['target']) ? $field['target'] : '_blank';
            
            // Only display the icon if a URL is provided
            if ($url): 
            ?>
    <a target="<?php echo esc_attr($target); ?>" class="text-light me-2 mb-2" href="<?php echo esc_url($value['prefix'] . $url); ?>" title="<?php echo esc_attr($title); ?>" aria-label="Go to <?php 
        if ($is_option_page) {
            echo esc_attr(get_bloginfo('name'));
        } else {
            echo esc_attr(get_the_title());
        }
    ?> <?php echo esc_attr($value['name']); ?>">
        <i class="<?php echo esc_attr($value['icon']); ?>" aria-hidden="true"></i>
    </a>&nbsp;
    <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php
}
?>