<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <?php 
    /* Flexible Content */
    include get_theme_file_path('/inc/flexible-content.php'); 
    ?>

    <?php if(is_page('stores-map')): ?>
    <div>
        <?php echo do_shortcode('[storemap]'); ?>
    </div>
    <?php endif; ?>

</article>


<?php endwhile; endif; ?>
<?php get_footer(); ?>