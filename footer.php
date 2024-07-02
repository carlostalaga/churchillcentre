    <footer class="container-fluid p-0">


        <div class="container-fluid bg-humo text-negro d-flex justify-content-center">
            <div class="container py-5">
                <div class="row row cols-1-row cols-md-2">
                    <div class="col text-start">
                        <img src="<?php echo get_template_directory_uri() ?>/img/logo-dark.png" class="img-fluid logo-constraint my-3" alt="Churchill Centre">
                    </div>
                    <div class="col  d-flex justify-content-end align-items-end">
                        <?php social_icons_lightmode(false); ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid bg-negro text-white d-flex justify-content-center">
            <div class="container">

                <div class="row g-5 py-5">

                    <div class="col col-md-6 col-lg-3">
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

                    <div class="col col-md-6 col-lg-3 text-negro">

                        <?php
                        $google_map_iframe = get_field('google_map_iframe', 'options'); // Only needed for the conditional check, NOT to display the map. Check functions.php and main.js for the map display.
                        if ($google_map_iframe) :
                        ?>
                        <div id="map-placeholder" class="text-white">
                            <p>Loading map...</p>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div id="footer-menu" class="col col-md-6 col-lg-2">
                        <?php /* Super Menu */
                        wp_nav_menu( array(
                            'menu' => 'footer-menu',
                            'theme_location' => 'footer-menu',
                            'fallback_cb'    => false
                        ) );
                        ?>
                    </div>
                    <div class="col col-md-6 col-lg-4">
                        <h6 class="text-white">SUBSCRIBE</h6>
                        <?php 
                        /* Flexible Content */
                        include get_theme_file_path('/inc/mailchimp-signup-form.php'); 
                        ?>
                    </div>

                </div>

                <div class="row border-top border-white border-2 pt-3 pb-5" style="font-size: 1.5rem;">
                    <div class="col col-md-6 col-lg-4 text-center text-md-start">
                        &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>. All rights reserved.
                    </div>
                    <div id="privacy-menu" class="col col-md-6 col-lg-4 d-flex justify-content-center">
                        <?php /* Privacy Menu */
                        wp_nav_menu( array(
                            'menu' => 'privacy-menu',
                            'theme_location' => 'privacy-menu',
                            'fallback_cb'    => false,
                        ) );
                        ?>
                    </div>
                    <div class="col col-md-6 col-lg-4 text-center text-md-end">
                        <a href="https://envyus.com.au" target="blank" class="text-white">Site by EnvyUs Design</a>
                    </div>
                </div>


            </div>
        </div>


    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>