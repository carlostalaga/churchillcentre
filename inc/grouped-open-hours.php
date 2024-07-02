<?php
/**
 * Display grouped open hours from ACF repeater field.
 *
 * This function retrieves open hours data from an Advanced Custom Fields (ACF) repeater field,
 * groups the hours by time range, and displays them in a formatted manner.
 *
 * @param bool $use_options Whether to use the 'option' parameter for ACF fields (default: true).
 *
 * @return void Outputs HTML directly.
 *
 * Usage examples:
 * @example
 * // To use with 'option' (e.g., on an options page):
 * display_grouped_open_hours_using_options(true);
 *
 * @example
 * // To use without 'option' (e.g., on a regular page/post):
 * display_grouped_open_hours_using_options(false);
 *
 * Input Data Structure:
 * The function expects an ACF repeater field named 'open_hours' with the following sub-fields:
 * - open_days (Checkbox or Multi-select field)
 * - open_from (Time field)
 * - open_to (Time field)
 *
 * Example Input:
 * Row 1: Open days = [Monday, Wednesday, Friday], Open from = "9:00 am", Open to = "5:30 pm"
 * Row 2: Open days = [Thursday], Open from = "9:00 am", Open to = "9:00 pm"
 *
 * Process Overview:
 * 1. Initialize an empty array to group hours.
 * 2. Loop through each row of the 'open_hours' repeater field.
 * 3. For each row, create a unique key using the time range.
 * 4. Group days with the same time range together.
 * 5. Output the grouped hours in a formatted manner.
 *
 * Resulting Data Structure:
 * $grouped_hours = [
 *     "9:00 am to 5:30 pm" => ["Monday", "Wednesday", "Friday"],
 *     "9:00 am to 9:00 pm" => ["Thursday"]
 * ];
 *
 * Key Methods:
 * - have_rows(): ACF function to loop through repeater field rows.
 * - get_sub_field(): ACF function to get the value of a sub-field.
 * - isset(): PHP function to check if an array key exists.
 * - implode(): PHP function to join array elements with a string.
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
            $day_list = implode(', ', $days); 
        ?>

<p>
    <span class="text-prose-semibold"><?php echo esc_html($day_list); ?></span>: <?php echo esc_html($time_range); ?>
</p>

<?php endforeach;
}
?>