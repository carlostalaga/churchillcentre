<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>





    <div id="content" class="container-fluid py-5">

        <div class="container  my-5 pt-5">
            <div class="row d-flex justify-content-center">

                <div class="col-3">
                    <div class="card-header-custom text-center text-white">
                        &nbsp;
                    </div>
                    <div class="card-body-custom text-start pt-0 pb-5  bg-black">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-image pb-5 px-5">
                            <?php the_post_thumbnail('4-3r320', ['class' => 'img-fluid thumb-cool']); ?>
                        </div>
                        <?php else : ?>
                        <div class="featured-image pb-5 px-5">
                            <img src="https://via.placeholder.com/320x240" alt="Placeholder Image" class="img-fluid">
                        </div>
                        <?php endif; ?>
                        <div class="px-5  text-white">
                            <h3 class="text-uppercase mb-5">Contact</h3>

                            <?php 
                            $phone = get_field('phone'); 
                            if ($phone):
                            ?>
                            <div class="">
                                PH: <?php echo $phone; ?>
                            </div>
                            <?php endif; ?>


                            <?php 
                            $website = get_field('website');
                            if( $website ): 
                                $website_url = $website['url'];
                                $website_title = $website['title'];
                                $website_target = $website['target'] ? $website['target'] : '_self';
                            endif;
                            ?>
                            <?php if ($website): ?>
                            <div class="text-center mt-5">
                                <a class="btn btn-light rounded-pill text-uppercase" href="<?php echo $website_url; ?>">
                                    VISIT&nbsp;WEBSITE
                                </a>
                            </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>

                <div class="col-6 offset-1">
                    <div class="mb-3">
                        <h1 class="text-uppercase fw-bold mb-3"><?php the_title(); ?></h1>
                        <?php
                        $post_id = get_the_ID(); // Get the current post ID
                        $taxonomy_name = 'section';
                        $terms = wp_get_post_terms($post_id, $taxonomy_name); // Retrieve all terms in the 'section' taxonomy for the current post

                        // Define a static array mapping term names to color codes
                        $term_colors = [
                            'car-auto' => '#f16465', 
                            'eat-drink' => '#fae6e7',
                            'fashion-accessories' => '#c1e1bf',
                            'fresh-food-liquor' => '#f5a47a',
                            'gifts-stationery' => '#f4efe3',
                            'health-beauty' => '#EF476F',
                            'home-lifestyle' => '#a3d2ea',
                            'services' => '#f5de65',
                            'technology' => '#fff6a3',
                        ];

                        if (!is_wp_error($terms) && !empty($terms)) {
                            $term_names = array_map(function($term) use ($term_colors) {
                                $color = $term_colors[$term->slug] ?? '#FFFFFF'; // Default color if term slug not found
                                return '<span class="py-1 px-2" style="background-color:' . esc_attr($color) . ';">' . esc_html($term->name) . '</span>';
                            }, $terms);

                            $terms_string = implode(', ', $term_names); // Join term names with a comma
                            echo '<h5 class="text-uppercase mb-5">' . $terms_string . '</h5>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <?php 
                        if ( get_the_content() ) {
                            the_content();
                        } else {
                            echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
                        }
                        ?>
                    </div>

                    <?php 
                    /*
                     ██████  ██████  ███████ ███    ██     ██   ██  ██████  ██    ██ ██████  ███████
                    ██    ██ ██   ██ ██      ████   ██     ██   ██ ██    ██ ██    ██ ██   ██ ██
                    ██    ██ ██████  █████   ██ ██  ██     ███████ ██    ██ ██    ██ ██████  ███████
                    ██    ██ ██      ██      ██  ██ ██     ██   ██ ██    ██ ██    ██ ██   ██      ██
                     ██████  ██      ███████ ██   ████     ██   ██  ██████   ██████  ██   ██ ███████


                    */
                    ?>
                    <div id="open-hours" class="my-5 py-4 y-borders">

                        <div class="my-3">
                            <h3 class="text-uppercase fw-bold">Open Hours</h3>
                        </div>

                        <?php if (have_rows('open_hours')) : ?>
                        <div class="mb-3">
                            <?php /* 
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

                            <?php 
                                // The purpose of initialise a $grouped_hours empty array is to group all the open days that share the same opening and closing times.
                                $grouped_hours = [];

                                // Loop through each row of the 'open_hours' repeater field
                                while (have_rows('open_hours')) : the_row(); 
                                    // Get the open days, open from time, and open to time for each row
                                    $open_days = get_sub_field('open_days'); // This returns an array of term objects or similar
                                    $open_from = get_sub_field('open_from');
                                    $open_to = get_sub_field('open_to');

                                    // Check if there are open days
                                    if ($open_days):
                                        // Create a unique key for the time range
                                        $time_range = $open_from . ' to ' . $open_to;


                                        // Checks if the key $time_range does not already exist in the $grouped_hours array.
                                        if (!isset($grouped_hours[$time_range])) {
                                            // If this time range does not exist in the array, it initializes an empty array for this time range
                                            // This ensures that for each unique time range, there is an array initialized to hold the days.
                                            $grouped_hours[$time_range] = [];
                                        }

                                        // Loop through each day in the $open_days array
                                        foreach ($open_days as $day) {
                                            // Appends the day's name to the array corresponding to the current time range
                                            // $day->name accesses the name property of the $day object, which is assumed to be a term object.
                                            $grouped_hours[$time_range][] = $day->name;
                                        }
                                    endif;
                                endwhile;

                                // Loop through the grouped_hours array to output the days and times
                                foreach ($grouped_hours as $time_range => $days):
                                    // Convert the array of days into a comma-separated string
                                    $day_list = implode(', ', $days); ?>
                            <p>
                                <!-- Output the days and the time range -->
                                <span class="fw-bold"><?php echo esc_html($day_list); ?></span>: <?php echo esc_html($time_range); ?>
                            </p>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>


                    </div>


                </div>


                <div class="col-10 mt-5 pt-5">

                    <?php 
                    /*
                    ███    ██  █████  ██    ██
                    ████   ██ ██   ██ ██    ██
                    ██ ██  ██ ███████ ██    ██
                    ██  ██ ██ ██   ██  ██  ██
                    ██   ████ ██   ██   ████


                    */
                    ?>
                    <div class="row text-uppercase">
                        <?php
                        // Ensure the global post variable is available
                        global $post;
                        // Get the terms of the current post
                        $terms = wp_get_post_terms($post->ID, 'section', array("fields" => "ids"));
                        // Check if there are any terms
                        if (!empty($terms)) :
                            // Assuming 'section' is your custom taxonomy
                            $term_ids = implode(',', $terms); // Convert array of term IDs to a string
                        ?>

                        <div class="col-4   d-flex flex-column justify-content-center align-items-start text-break">
                            <?php 
                            // Display link to the previous post in the same 'section' taxonomy
                            previous_post_link('%link', '<i class="fas fa-chevron-left"></i> %title', true, '', 'section'); 
                            ?>
                        </div>

                        <div class="col d-flex flex-column justify-content-center align-items-center">
                            <a href="<?php echo get_option("siteurl"); ?>/directory">
                                Back to Directory
                            </a>
                        </div>

                        <div class="col-4    d-flex flex-column justify-content-center align-items-end text-break">
                            <?php 
                            // Display link to the next post in the same 'section' taxonomy
                            next_post_link('%link', '%title <i class="fas fa-chevron-right"></i>', true, '', 'section'); 
                            ?>
                        </div>

                        <?php endif; ?>
                    </div>

                </div>


            </div>
        </div>

    </div>

</article>



<?php endwhile; endif; ?>
<?php get_footer(); ?>