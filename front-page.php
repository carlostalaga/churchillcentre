<?php get_header(); ?>
<main id="main-content" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


        <?php 
    /* Flexible Content */
    include get_theme_file_path('/inc/flexible-content.php'); 
    ?>

    </article>


    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>