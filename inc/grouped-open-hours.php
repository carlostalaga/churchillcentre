<?php
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


<?php 
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
?>