<?php get_header(); ?>

<div id="content" class="container-fluid bg-light">
    <div class="container bg-white">
        <h1>Welcome to My Minimal Theme</h1>
        <p>This is a basic WordPress theme with minimal code.</p>
        <div>
            <?php echo do_shortcode('[storemap]'); ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>