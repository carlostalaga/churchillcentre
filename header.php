<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="bg-black">

        <div class="container-fluid bg-white">
            <nav aria-label="Secondary navigation: Shortcuts" id="super-menu" class="container d-flex  justify-content-end">
                <?php /* Super Menu */
                wp_nav_menu( array(
                    'menu' => 'super-menu',
                    'theme_location' => 'super-menu',
                    'fallback_cb'    => false
                ) );
                ?>
            </nav>
        </div>

        <!-- bootstrap menu integration -->
        <nav aria-label="Primary navigation" id="navbar-fx" class="navbar sticky-bottom navbar-expand-lg justify-content-center" data-bs-theme="dark">


            <div class="container p-0">

                <div class="row w-100 m-0">

                    <div class="col-4">
                        <a id="navbar-brand" href="<?php echo get_option('siteurl'); ?>" aria-label="Go to homepage">
                            <img id="logo-change" src="<?php echo get_template_directory_uri() ?>/img/logo-light.png" class="img-fluid logo-constraint my-3" alt="<?php echo get_bloginfo('name'); ?> logo">
                        </a>
                    </div>

                    <div class="col d-flex justify-content-end">
                        <button class="navbar-toggler first-button" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="animated-icon1"><span></span><span></span><span></span></div>
                        </button>
                    </div>

                    <div class="col-6 collapse navbar-collapse" id="main-menu">

                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto  mb-2 mb-md-0 %2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new bootstrap_533_wp_nav_menu_walker()
                        ));
        			    ?>

                    </div>

                </div>



            </div>
        </nav>
    </header>