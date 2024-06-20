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


                $args = array('post_type' => 'store');
                $args['search_filter_id'] = 91;
                $stores = new WP_Query($args);

                if ($stores->have_posts()) {
                    while ($stores->have_posts()) {
                        $stores->the_post();
                        ?>
                <div class="col">
                    <div class="m-3">
                        <div class="card-header-custom text-center text-white">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="card-body-custom text-center py-5  bg-danger">
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image pb-5">
                                <?php the_post_thumbnail('4-3r320', ['class' => 'img-fluid thumb-cool']); ?>
                            </div>
                            <?php else : ?>
                            <div class="featured-image pb-5">
                                <img src="https://via.placeholder.com/320x240" alt="Placeholder Image" class="img-fluid">
                            </div>
                            <?php endif; ?>
                            <div class="text-start pb-5 px-5">
                                To molorest venis quiscid ut
                                fugiam dolupta quis accum
                                ra voluptaqui que vit volupta
                                turiossimus dere licabo. Natio
                                id ex experum faccus eos....
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
                }
                ?>
            </div>
        </div>
    </div>




</article>


<?php endwhile; endif; ?>
<?php get_footer(); ?>