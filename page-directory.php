<?php 
/*
Template Name: Directory Page
*/
?>

<?php get_header(); ?>
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

    <div class="container-fluid">
        <div class="container">
            <div>
                <?php echo do_shortcode( '[searchandfilter id="91"]' ) ?>
            </div>
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

                        <div class="card-header-custom text-center text-white fosforos d-flex justify-content-center align-items-center">
                            <div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </div>

                        <div class="card-body-custom text-center py-5 px-5">
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image pb-5">
                                <?php the_post_thumbnail('4-3r320', ['class' => 'img-fluid thumb-cool']); ?>
                            </div>
                            <?php else : ?>
                            <div class="featured-image pb-5">
                                <img src="https://via.placeholder.com/320x240" alt="Placeholder Image" class="img-fluid">
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
                                <a class="btn btn-dark rounded-pill text-uppercase" href="<?php echo esc_url( get_permalink() ); ?>">
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
    <div class="container-fluid">
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
<?php get_footer(); ?>