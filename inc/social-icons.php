<?php
function social_icons_lightmode($lightmode = true) {
    $mode_id = $lightmode ? 'social-icons-lightmode' : 'social-icons-darkmode';
    $social_icons = [
        'mail' => ['icon' => 'fa-solid fa-envelope', 'prefix' => 'mailto:'],
        'facebook' => ['icon' => 'fa-brands fa-facebook-f', 'prefix' => ''],
        'twitter' => ['icon' => 'fa-brands fa-twitter', 'prefix' => ''],
        'instagram' => ['icon' => 'fa-brands fa-instagram', 'prefix' => ''],
        'linkedin' => ['icon' => 'fa-brands fa-linkedin-in', 'prefix' => '']
    ];
    ?>
<div id="<?php echo esc_attr($mode_id); ?>" class="w-100 d-flex justify-content-start justify-content-md-end">
    <!-- 
     * Loop through the $social_icons array and retrieve the corresponding field value using get_field() function.
     * If the field value exists, execute the code block inside the if statement.
     -->
    <?php foreach ($social_icons as $key => $value): ?>
    <?php $field = get_field($key, 'option'); ?>
    <?php if ($field): ?>
    <?php
            // Ensure $field is a string. If it's an array, you might need to adjust this logic.
            /**
             * Converts an array to a string, separating the elements with a comma.
             *
             * @param mixed $field The value to be converted.
             * @return string The converted string.
             */
            $field_value = is_array($field) ? implode(', ', $field) : $field;
            ?>
    <a target="_blank" class="text-light" href="<?php echo esc_url($value['prefix'] . $field_value); ?>">
        <i class="<?php echo esc_attr($value['icon']); ?> ms-2" aria-hidden="true"></i>
    </a>&nbsp;
    <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php
}