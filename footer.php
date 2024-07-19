<footer class="container-fluid p-0">


    <div class="container-fluid bg-humo text-negro d-flex justify-content-center">
        <div class="container py-5">
            <div class="row row cols-1-row cols-md-2">
                <div class="col text-start">
                    <a id="navbar-brand" href="<?php echo get_option('siteurl'); ?>" aria-label="Go to homepage">
                        <img src="<?php echo get_template_directory_uri() ?>/img/logo-dark.png" class="img-fluid logo-constraint my-3" alt="<?php echo get_bloginfo('name'); ?> logo">
                    </a>
                </div>
                <div class="col  d-flex justify-content-end align-items-end">
                    <?php social_icons_lightmode(false); ?>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid bg-negro text-white d-flex justify-content-center p-5">
        <div class="container">

            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-5 py-5">

                <div class="col">
                    <div class="mb-5">
                        <h6>Find Us</h6>
                        <?php 
                            $address = get_field('address', 'option');
                            if( $address ):
                                echo $address;
                            endif
                        ?>
                    </div>
                    <div>
                        <h6>Opening Hours</h6>
                        <?php
                        if (get_field('open_hours', 'option')) :  
                            display_grouped_open_hours_using_options(true);
                        endif;
                        ?>
                    </div>
                </div>

                <div class="col text-negro">

                    <?php
                    $google_map_iframe = get_field('google_map_iframe', 'options'); // Only needed for the conditional check, NOT to display the map. Check functions.php and main.js for the map display.
                    if ($google_map_iframe) :
                    ?>
                    <div id="map-placeholder" class="text-white">
                        <p>Loading map...</p>
                    </div>
                    <?php endif; ?>
                </div>

                <nav aria-label="Footer primary navigation" id="footer-menu" class="col">
                    <?php /* Super Menu */
                    wp_nav_menu( array(
                        'menu' => 'footer-menu',
                        'theme_location' => 'footer-menu',
                        'fallback_cb'    => false
                    ) );
                    ?>
                </nav>

                <div class="col">
                    <h6 class="text-white">SUBSCRIBE</h6>
                    <?php 
                    /* Flexible Content */
                    include get_theme_file_path('/inc/mailchimp-signup-form.php'); 
                    ?>
                </div>

            </div>

            <div class="row row-cols-1 row-cols-lg-3 border-top border-white border-2 pt-3 pb-5" style="font-size: 1.5rem;">

                <div class="col text-center text-lg-start pb-5">
                    &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>. All rights reserved.
                </div>

                <nav aria-label="Footer secondary navigation: Privacy" id="privacy-menu" class="col d-flex justify-content-center pt-2 pb-5">
                    <?php /* Privacy Menu */
                    wp_nav_menu( array(
                        'menu' => 'privacy-menu',
                        'theme_location' => 'privacy-menu',
                        'fallback_cb'    => false,
                    ) );
                    ?>
                </nav>

                <div class="col text-center text-lg-end pb-5">
                    <a href="https://envyus.com.au" target="blank" class="text-white">Site by EnvyUs Design</a>
                </div>
            </div>


        </div>
    </div>


</footer>
<?php wp_footer(); ?>
</body>

</html>