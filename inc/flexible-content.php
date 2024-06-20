<?php

// Check value exists.
if( have_rows('flexible_content') ):

    // Loop through rows.
    while ( have_rows('flexible_content') ) : the_row();
?>









<?php
        /*                                                                                                   
        ██   ██       ██████      ██  █████       ██████  ██████  ██      
        ██   ██ ▄ ██ ▄     ██    ██  ██   ██     ██      ██    ██ ██      
        ███████  ████  █████    ██    █████      ██      ██    ██ ██      
             ██ ▀ ██ ▀██       ██    ██   ██     ██      ██    ██ ██      
             ██       ███████ ██      █████       ██████  ██████  ███████ 
        */
        // Case: Last layout (ends with endif;).
        if( get_row_layout() == '4_double_&_8_columns' ): 
            $column_order = get_sub_field('column_order');
            $image_4a = get_sub_field('image_4a');
            if ($image_4a) :
                $image_4a_url = $image_4a['sizes']['720p'];
                $image_4a_alt = $image_4a['alt'];
            endif;
            $image_4b = get_sub_field('image_4b');
            if ($image_4b) :
                $image_4b_url = $image_4b['sizes']['720p'];
                $image_4b_alt = $image_4b['alt'];
            endif;
            $image_8 = get_sub_field('image_8');
            if ($image_8) :
                $image_8_url = $image_8['sizes']['1080p'];
                $image_8_alt = $image_8['alt'];
            endif;
            ?>



<div class="container">
    <div class="row no-gutters">
        <div class="col-12 col-lg-4 d-flex flex-column justify-content-between <?php if( $column_order == '4_8' ): ?> order-1 <?php elseif( $column_order == '8_4' ): ?> order-2 <?php endif; ?>">
            <div class="position-relative">
                <img src="<?php echo $image_4a_url ?>" alt="<?php echo $image_4a_alt ?>" class="img-fluid img-darken">
                <div class="position-absolute top-50 start-0 translate-middle-y w-100 ps-5 text-start">
                    <h1 class="text-white">Your Title Here</h1>
                    <button class="btn btn-outline-light rounded-pill text-uppercase">LEARN&nbsp;MORE</button>
                </div>
            </div>
            <div class="position-relative">
                <img src="<?php echo $image_4b_url ?>" alt="<?php echo $image_4b_alt ?>" class="img-fluid img-darken">
                <div class="position-absolute top-50 start-0 translate-middle-y w-100 ps-5 text-start">
                    <h1 class="text-white">Your Title Here</h1>
                    <button class="btn btn-outline-light rounded-pill text-uppercase">LEARN&nbsp;MORE</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 position-relative <?php if( $column_order == '4_8' ): ?> order-2 <?php elseif( $column_order == '8_4' ): ?> order-1 <?php endif; ?>">
            <img src="<?php echo $image_8_url ?>" alt="<?php echo $image_8_alt ?>" class="img-fluid img-darken">
            <div class="position-absolute top-50 start-0 translate-middle-y w-100 ps-5 text-start">
                <h1 class="text-white">Your Title Here</h1>
                <h4 class="text-white">Your Text Description</h4>
                <button class="btn btn-outline-light rounded-pill text-uppercase">LEARN&nbsp;MORE</button>
            </div>
        </div>
    </div>
</div>













<?php
/*

 ██████╗ █████╗ ██████╗ ██████╗ ███████╗
██╔════╝██╔══██╗██╔══██╗██╔══██╗██╔════╝
██║     ███████║██████╔╝██║  ██║███████╗
██║     ██╔══██║██╔══██╗██║  ██║╚════██║
╚██████╗██║  ██║██║  ██║██████╔╝███████║
 ╚═════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═════╝ ╚══════╝
                                                                                                       
*/
elseif( get_row_layout() == 'cards' ):
    $card_columns = get_sub_field('card_columns');  
?>

<div id="cardsBlock-<?php echo $iBlock; ?>" class="container-fluid py-5 border border-0">
    <div class="container">


        <!-- Cards Repeater -->
        <?php
        if( have_rows('cards_repeater') ): $iCards = 0;  
        ?>

        <div class="row row-cols-1 <?php if( $card_columns == '2_col' ) : echo 'row-cols-md-2'; elseif( $card_columns == '3_col' ) :  echo 'row-cols-md-2 row-cols-lg-3'; elseif( $card_columns == '4_col' ) :  echo 'row-cols-md-2 row-cols-lg-4'; endif;?> g-5 d-flex justify-content-center">

            <?php
            while ( have_rows('cards_repeater') ) : the_row();  

            $card_image = get_sub_field('card_image');
            if($card_image):
            $card_image_url = $card_image['sizes']['16-9r720'];
            $card_image_url_43 = $card_image['sizes']['4-3r576'];
            $card_image_alt = $card_image['alt'];
            endif;

            $card_headline = get_sub_field('card_headline');
            $card_subtitle = get_sub_field('card_subtitle');                    
            
            $card_link = get_sub_field('card_link');
            if( $card_link ) : 
                $card_link_url = $card_link['url'];
                $card_link_title = $card_link['title'];
                $card_link_target = $card_link['target'] ? $card_link['target'] : '_self';
            endif;                    
            ?>


            <div class="col">

                <div class="bg-dark h-100">

                    <div>


                        <div class="position-relative text-start" style="position: relative;">
                            <?php if( $card_columns == '2_col' ) : ?>
                            <h2 class="position-absolute text-above-image m-4 text-white">Text for 2 Columns</h2>
                            <img src="<?php echo $card_image_url; ?>" class="img-fluid img-darken" alt="<?php echo $card_image_alt; ?>">
                            <?php elseif( $card_columns == '3_col' ) : ?>
                            <h2 class="position-absolute text-above-image m-4 text-white">Text for 3 Columns</h2>
                            <img src="<?php echo $card_image_url_43; ?>" class="img-fluid img-darken" alt="<?php echo $card_image_alt; ?>">
                            <?php elseif( $card_columns == '4_col' ) : ?>
                            <h2 class="position-absolute text-above-image m-4 text-white">Text for 4 Columns</h2>
                            <img src="<?php echo $card_image_url_43; ?>" class="img-fluid img-darken" alt="<?php echo $card_image_alt; ?>">
                            <?php endif; ?>
                        </div>


                        <div class="p-5 bg-dark">
                            <div class="pb-1">
                                <?php if( $card_columns == '2_col' ) : ?>
                                <h3 class="text-white"><?php echo $card_headline; ?></h3>
                                <?php elseif( $card_columns == '3_col' ) : ?>
                                <h3 class="text-white"><?php echo $card_headline; ?></h3>
                                <?php elseif( $card_columns == '4_col' ) : ?>
                                <h3 class="text-white"><?php echo $card_headline; ?></h3>
                                <?php endif; ?>
                            </div>
                            <?php if( $card_subtitle ):  ?>
                            <div class="fs-3 text-white pb-4">
                                <?php echo $card_subtitle; ?>
                            </div>
                            <?php endif; ?>

                            <?php if( $card_link): ?>
                            <div class="w-100">
                                <a class="button" href="<?php echo esc_url( $card_link_url ); ?>" target="<?php echo esc_attr( $card_link_target ); ?>">
                                    <button class="btn btn-outline-light rounded-pill text-uppercase">LEARN&nbsp;MORE</button>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

            </div>



            <?php $iCards++; 
          endwhile; 
          ?>

        </div>

        <?php
        else :
        echo 'Carpe diem';
        endif;
        ?>
        <!-- //end Cards Repeater -->


    </div>
</div>









<?php /*

 █████╗ ██████╗     ██╗  ██╗ ██████╗  ██████╗
██╔══██╗██╔══██╗    ██║  ██║██╔═══██╗██╔════╝
███████║██║  ██║    ███████║██║   ██║██║
██╔══██║██║  ██║    ██╔══██║██║   ██║██║
██║  ██║██████╔╝    ██║  ██║╚██████╔╝╚██████╗
╚═╝  ╚═╝╚═════╝     ╚═╝  ╚═╝ ╚═════╝  ╚═════╝

███████╗██╗     ██╗██████╗ ███████╗██████╗
██╔════╝██║     ██║██╔══██╗██╔════╝██╔══██╗
███████╗██║     ██║██║  ██║█████╗  ██████╔╝
╚════██║██║     ██║██║  ██║██╔══╝  ██╔══██╗
███████║███████╗██║██████╔╝███████╗██║  ██║
╚══════╝╚══════╝╚═╝╚═════╝ ╚══════╝╚═╝  ╚═╝

*/
elseif( get_row_layout() == 'ad_hoc_slider' ):
    // Do something...
?>

<?php if( have_rows('ad_hoc_slider_repeater') ): ?>
<div id="block-swiper-adhoc" class="swiper-container swiper-adhoc">
    <div class="swiper-wrapper">
        <?php while( have_rows('ad_hoc_slider_repeater') ): the_row();
            $video = get_sub_field('video');
            $image = get_sub_field('image');
            $image_url = $image['sizes']['slider'];
            $headline = get_sub_field('headline');
            $tagline = get_sub_field('tagline');
            $adhoc_link = get_sub_field('adhoc_link');
            $adhoc_link_name_white_part = get_sub_field('adhoc_link_name_white_part');
            $adhoc_link_name_black_part = get_sub_field('adhoc_link_name_black_part');
        // Do something...
        ?>


        <div class="swiper-slide">




            <div class="swiper-slide-cover bg-prussian" style="width: 100%; height: auto;">
                <?php if($video): // Si hay un video definido, lo privilegia respecto a la imagen
                ?>

                <?php if( get_sub_field('adhoc_link')) { ?>
                <a href="<?php echo $adhoc_link; ?>">
                    <?php } ?>

                    <video playsinline autoplay muted loop>
                        <source src="<?php echo $video['url']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <?php if( get_sub_field('adhoc_link')) { ?>
                </a>
                <?php } ?>


                <?php else: ?>



                <?php if( get_sub_field('adhoc_link')) { ?>
                <a href="<?php echo $adhoc_link; ?>">
                    <?php } ?>

                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid" />

                    <?php if( get_sub_field('adhoc_link')) { ?>
                </a>
                <?php } ?>


                <?php endif; ?>
            </div>




        </div>


        <?php endwhile; ?>
    </div>


    <?php
    else :
    // Background image and content...
    ?>

    <div class="swiper-main bg-light d-flex flex-column justify-content-center align-items-center" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/port-noarlunga.jpg); background-position: center; background-repeat: no-repeat; background-size: cover; z-index: 10;">

        <div class="d-flex flex-column justify-content-center align-items-center" style="width: 100vw; height: 100%; z-index: 11; background-color: rgba(0,0,0,0.2);">

            <div class="swiper-headline text-center text-white" style="text-shadow: 0px 0px 8px #000;">
                <?php echo the_title(); ?>
            </div>

            <div class="swiper-description my-3 my-md-4 px-5 d-none d-md-block" style="text-shadow: 0px 0px 8px #000;">
                <?php echo get_bloginfo( 'name' ); ?>
            </div>

        </div>

    </div>

    <?php
    endif;
    ?>


</div>












<?php
            // End cases
        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>