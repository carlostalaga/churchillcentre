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
    $mode_id = $lightmode ? 'social-icons-lightmode' : 'social-icons-darkmode';
    $social_icons = [
        'mail' => ['icon' => 'fa-solid fa-envelope', 'prefix' => 'mailto:'],
        'facebook' => ['icon' => 'fa-brands fa-facebook-f', 'prefix' => ''],
        'twitter' => ['icon' => 'fa-brands fa-twitter', 'prefix' => ''],
        'instagram' => ['icon' => 'fa-brands fa-instagram', 'prefix' => ''],
        'linkedin' => ['icon' => 'fa-brands fa-linkedin-in', 'prefix' => '']
    ];
    ?>
<div id="<?php echo esc_attr($mode_id); ?>" class="d-flex">
    <?php /*
     * Loop through the $social_icons array and retrieve the corresponding field value using get_field() function.
     * If the field value exists, execute the code block inside the if statement.
    */ ?>
    <?php foreach ($social_icons as $key => $value): ?>
    <?php 
        // Use the $is_option_page parameter to determine how to call get_field()
        $field = $is_option_page ? get_field($key, 'option') : get_field($key);
        // Expecting $field to be an array with 'url' and 'target' keys
        $url = isset($field['url']) ? $field['url'] : '';
        $target = isset($field['target']) ? $field['target'] : '_blank';
    ?>
    <?php if ($url): ?>
    <?php /* for full control on target replace _blank with <?php echo esc_attr($target); ?> */ ?>
    <a target="_blank " class="text-light" href="<?php echo esc_url($value['prefix'] . $url); ?>">
        <i class="<?php echo esc_attr($value['icon']); ?> ms-2" aria-hidden="true"></i>
    </a>&nbsp;
    <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php
}
?>