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
                            <h5>Contact</h5>

                            <?php 
                            $phone = get_field('phone'); 
                            if ($phone):
                            ?>
                            <div class="mb-3">
                                PH: <?php echo $phone; ?>
                            </div>
                            <?php endif; ?>

                            <div class="mb-5">
                                <?php social_icons_lightmode(true, false); ?>
                            </div>


                            <?php 
                            $website = get_field('website');
                            if( $website ): 
                                $website_url = $website['url'];
                                $website_title = $website['title'];
                                $website_target = $website['target'] ? $website['target'] : '_self';
                            endif;
                            ?>
                            <?php if ($website): ?>
                            <div class="text-center">
                                <a class="btn btn-light" href="<?php echo $website_url; ?>">
                                    VISIT&nbsp;WEBSITE
                                </a>
                            </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>

                <div class="col-6 offset-1">
                    <div class="mb-3">
                        <h1 class="mb-3"><?php the_title(); ?></h1>
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
                            echo '<span class="text-prose-semibold text-uppercase mb-5
                            
                            ">' . $terms_string . '</span>';
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


                    <div id="store-open-hours" class="my-5 py-4 y-borders">

                        <div class="my-3">
                            <h5>Open Hours</h5>
                        </div>

                        <?php 
                        if (get_field('open_hours')) :  
                            display_grouped_open_hours_using_options(false); 
                        endif; 
                        ?>

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