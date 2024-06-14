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
    <header>
        <!-- bootstrap menu integration -->
        <nav id="navbar-fx" class="navbar navbar-expand-sm justify-content-center">


            <div class="container bg-warning p-0">

                <div class="row bg-danger w-100 m-0">

                    <div class="col-4 bg-light">
                        <a id="navbar-brand" href="<?php echo get_option('siteurl'); ?>">
                            <img id="logo-change" src="<?php echo get_template_directory_uri() ?>/img/logo-dark.png" class="img-fluid logo-constraint" alt="">
                        </a>
                    </div>

                    <div class="col bg-success d-flex justify-content-end">
                        <button class="navbar-toggler first-button" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="animated-icon1"><span></span><span></span><span></span></div>
                        </button>
                    </div>

                    <div class="col-6 collapse navbar-collapse bg-info" id="main-menu">

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