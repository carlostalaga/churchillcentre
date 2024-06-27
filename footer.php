    <footer class="container-fluid p-0">


        <div class="container-fluid bg-light text-black d-flex justify-content-center">
            <div class="container py-5">
                <div class="row row cols-1-row cols-md-2">
                    <div class="col text-start">
                        <img src="<?php echo get_template_directory_uri() ?>/img/logo-dark.png" class="img-fluid logo-constraint my-3" alt="Churchill Centre">
                    </div>
                    <div class="col  d-flex align-items-end">
                        <?php social_icons_lightmode(false); ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid bg-black text-white d-flex justify-content-center">
            <div class="container">

                <div class="row g-5 py-5">

                    <div class="col col-md-6 col-lg-3">
                        <div class="mb-5">
                            <h3>Find Us</h3>
                            <?php 
                                $address = get_field('address', 'option');
                                if( $address ):
                                    echo $address;
                                endif
                            ?>
                        </div>
                        <div>
                            <h3>Opening Hours</h3>
                            <?php
                            if (get_field('open_hours', 'option')) :  
                                display_grouped_open_hours_using_options(true);
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="col col-md-6 col-lg-3 bg-dark text-black">
                        [map]
                    </div>
                    <div class="col col-md-6 col-lg-2">
                        [vert menu]
                    </div>
                    <div class="col col-md-6 col-lg-4 bg-dark text-black">
                        <?php 
                        /* Flexible Content */
                        include get_theme_file_path('/inc/mailchimp-signup-form.php'); 
                        ?>
                    </div>

                </div>

                <div class="row border-top border-white border-2 pt-3 pb-5">
                    <div class="col col-md-6 text-center text-md-start">
                        &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>. All rights reserved.
                    </div>
                    <div class="col col-md-6 text-center text-md-end">
                        <a href="https://envyus.com.au" target="blank" class="text-white">Site by EnvyUs Design</a>
                    </div>
                </div>


            </div>
        </div>


    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>