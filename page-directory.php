<?php 
/*
Template Name: Directory Page
*/
?>

<?php get_header(); ?>
<main id="main-content" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php 
    /* Flexible Content */
    include get_theme_file_path('/inc/flexible-content.php'); 
    ?>

        <?php 
    /*
    ███████ ███████  █████  ██████   ██████ ██   ██        ██        ███████ ██ ██      ████████ ███████ ██████
    ██      ██      ██   ██ ██   ██ ██      ██   ██        ██        ██      ██ ██         ██    ██      ██   ██
    ███████ █████   ███████ ██████  ██      ███████     ████████     █████   ██ ██         ██    █████   ██████
         ██ ██      ██   ██ ██   ██ ██      ██   ██     ██  ██       ██      ██ ██         ██    ██      ██   ██
    ███████ ███████ ██   ██ ██   ██  ██████ ██   ██     ██████       ██      ██ ███████    ██    ███████ ██   ██

    */
    ?>

        <div class="container-fluid py-5">

            <div class="container px-5 px-md-0 ">
                <div>
                    <?php echo do_shortcode( '[searchandfilter id="91"]' ) ?>
                </div>
            </div>

            <div class="container my-5 px-5 px-md-0 d-none d-md-block">

                <?php
            // Get the current section from the URL
            $current_section = isset($_GET['_sft_section']) ? sanitize_text_field($_GET['_sft_section']) : '';

            // Get all terms in the custom taxonomy 'section'
            $terms = get_terms(array(
                'taxonomy' => 'section',
                'hide_empty' => false, // Change to true if you want to hide empty terms
            ));

            // Check if there are any terms
            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<div class="section-buttons">';
                foreach ($terms as $term) {
                    $term_name = $term->name;
                    $term_slug = $term->slug;
                    $url = get_site_url() . '/directory/?_sft_section=' . $term_slug;
                    // Check if the current term slug matches the current section
                    $active_class = ($term_slug == $current_section) ? 'active' : '';
                    ?>
                <a href="<?php echo esc_url($url); ?>">
                    <button class="btn btn-outline-dark rounded-pill text-uppercase <?php echo esc_attr($active_class); ?>"><?php echo esc_html($term_name); ?></button>
                </a>
                <?php
                }
                echo '</div>';
            } else {
                echo 'No terms found or an error occurred.';
            }
            ?>

            </div>

        </div>

        <div class="container-fluid">

            <div class="container">
                <div class="row row-cols-md-2 row-cols-lg-3 g-5 d-flex justify-content-center">
                    <?php
                $args = array('post_type' => 'store', 'paged' => get_query_var('paged') ? get_query_var('paged') : 1);
                $args['search_filter_id'] = 91;
                $stores = new WP_Query($args);

                if ($stores->have_posts()) {
                    while ($stores->have_posts()) {
                        $stores->the_post();
                        ?>
                    <div class="col">
                        <div class="m-3 ">

                            <div class="card-header-custom text-center text-white pt-3 fosforos d-flex justify-content-center align-items-center">
                                <h3><?php the_title(); ?></h3>
                            </div>

                            <div class="card-body-custom text-center py-5 px-5">
                                <?php if (has_post_thumbnail()) : ?>
                                <div class="featured-image pb-5">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid thumb-cool']); ?>
                                </div>
                                <?php else : ?>
                                <div class="featured-image pb-5">
                                    <img src="https://via.placeholder.com/320x320" alt="Placeholder Image" class="img-fluid">
                                </div>
                                <?php endif; ?>
                                <div class="text-start pb-5">
                                    <?php
                                    if ( get_the_content() ) {
                                        echo get_excerpt(102, 'content');
                                    } else {
                                        echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';
                                    }
                                ?>
                                </div>
                                <div class="w-100">
                                    <a class="btn btn-dark" href="<?php echo esc_url( get_permalink() ); ?>">
                                        LEARN&nbsp;MORE
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>No stores found.</p>';
                }
                ?>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="container-fluid bg-light">
            <div class="container my-5 py-5">
                <div class="pagination d-flex justify-content-center">
                    <?php 
                echo paginate_links(array(
                    'total' => $stores->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'format' => '?paged=%#%',
                    'show_all' => false,
                    'type' => 'plain',
                    'end_size' => 2,
                    'mid_size' => 2,
                    'prev_next' => true,
                    'prev_text' => __('<i class="fas fa-chevron-left"></i>'),
                    'next_text' => __('<i class="fas fa-chevron-right"></i>'),
                    'add_args' => false,
                    'add_fragment' => '',
                ));
                ?>
                </div>
            </div>
        </div>



    </article>


    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>