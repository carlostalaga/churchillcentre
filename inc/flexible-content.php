<?php
// Check value exists.
if( have_rows('flexible_content') ): 
    $iBlock = 0;
    $firstContentBlockFound = false;

    // Loop through rows.
    while ( have_rows('flexible_content') ) : the_row();
?>









<?php
/*
 ██████  ██████  ███    ██ ████████ ███████ ███    ██ ████████
██      ██    ██ ████   ██    ██    ██      ████   ██    ██
██      ██    ██ ██ ██  ██    ██    █████   ██ ██  ██    ██
██      ██    ██ ██  ██ ██    ██    ██      ██  ██ ██    ██
 ██████  ██████  ██   ████    ██    ███████ ██   ████    ██


*/
// Case: Last layout (ends with endif;).
if( get_row_layout() == 'content' ): 
    $headline = get_sub_field('headline');
    $content = get_sub_field('content');
    $image = get_sub_field('image');
    if($image):
        $image_url = $image['sizes']['576sm'];
        $image_alt = $image['alt'];
    endif;
    $image_rounded = get_sub_field('image_rounded');
    $link = get_sub_field('link');
    ?>


<div id="content-<?php echo $iBlock; ?>" class="container-fluid px-5 px-md-0">
    <div class="container my-5">
        <div class="row g-5 py-5">

            <div class="col-12 <?php if($image): ?> col-md-6 <?php else: endif;?>">

                <div class="mb-3">
                    <?php if($headline): ?>
                    <?php if(!$firstContentBlockFound): ?>
                    <h1><?php echo $headline; ?></h1>
                    <?php $firstContentBlockFound = true; ?>
                    <?php else: ?>
                    <h2><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="mb-5">
                    <?php if($content): echo $content; endif; ?>
                </div>

                <div>
                    <?php if ($link && is_array($link)): ?>

                    <a href="<?php echo esc_url($link['url']); ?>" <?php echo $link['target'] ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                        <button class="btn btn-outline-dark rounded-pill text-uppercase"><?php echo esc_html($link['title']); ?></button>
                    </a>

                    <?php endif; ?>
                </div>

            </div>

            <?php if($image): ?>
            <div class="col-12 col-md-6 col-lg-5 offset-lg-1">

                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="<?php if ($image_rounded): ?> rounded-circle <?php else: endif;?> img-fluid px-md-5">

            </div>
            <?php endif; ?>

        </div>
    </div>
</div>












<?php
        /*                                                                                                   
        ██   ██       ██████      ██  █████       ██████  ██████  ██      
        ██   ██ ▄ ██ ▄     ██    ██  ██   ██     ██      ██    ██ ██      
        ███████  ████  █████    ██    █████      ██      ██    ██ ██      
             ██ ▀ ██ ▀██       ██    ██   ██     ██      ██    ██ ██      
             ██       ███████ ██      █████       ██████  ██████  ███████ 
        */
        // Case: Last layout (ends with endif;).
        elseif( get_row_layout() == '4_double_&_8_columns' ): 
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


<div id="4_double_&_8_columns-<?php echo $iBlock; ?>" class="container-fluid py-5">
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
</div>













<?php
/*
 ██████  █████  ██████  ██████  ███████
██      ██   ██ ██   ██ ██   ██ ██
██      ███████ ██████  ██   ██ ███████
██      ██   ██ ██   ██ ██   ██      ██
 ██████ ██   ██ ██   ██ ██████  ███████

*/
elseif( get_row_layout() == 'cards' ):
    $card_columns = get_sub_field('card_columns');  
?>

<div id="cards-<?php echo $iBlock; ?>" class="container-fluid py-5 border border-0 px-5 px-md-0">
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

                <div class="h-100">

                    <div>


                        <?php
                        // Determine any variable that might change based on the condition
                        $image_url = $card_image_url; // Default thumbnail to the standard image URL
                        if ($card_columns == '3_col' || $card_columns == '4_col') {
                            $image_url = $card_image_url_43; // Use the 4:3 thumbnails for 3 or 4 columns
                        }
                        ?>
                        <div class="position-relative text-start" style="position: relative;">
                            <div class="position-absolute text-above-image text-card-headline text-white m-4"><?php echo $card_headline; ?></div>
                            <img src="<?php echo $image_url; ?>" class="img-fluid img-darken img-card-rounded" alt="<?php echo $card_image_alt; ?>">
                        </div>


                        <div class="pt-4 pb-3 px-5 bg-dark text-center">

                            <?php 
                            $card_tagline = get_sub_field('card_tagline');
                            if( $card_tagline ):
                            ?>
                            <div class="pb-1">
                                <div class="text-card-tagline text-white">
                                    <a class="button text-white" href="<?php echo esc_url( $card_link_url ); ?>" target="<?php echo esc_attr( $card_link_target ); ?>">
                                        <?php echo $card_tagline; ?>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if( $card_subtitle ):  ?>
                            <div class="fs-3 text-white mb-4">
                                <?php echo $card_subtitle; ?>
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









<?php
/*
███████ ██      ██ ██████  ███████ ██████
██      ██      ██ ██   ██ ██      ██   ██
███████ ██      ██ ██   ██ █████   ██████
     ██ ██      ██ ██   ██ ██      ██   ██
███████ ███████ ██ ██████  ███████ ██   ██
*/
elseif( get_row_layout() == 'slider' ):
    // Do something...
?>

<?php if (have_rows('slider_repeater')): ?>
<div id="slider-<?php echo $iBlock; ?>" class="swiper-container">
    <div class="swiper-wrapper">
        <?php while (have_rows('slider_repeater')): the_row();
                $video = get_sub_field('video');
                $image = get_sub_field('image');
                    if ($image):
                    $image_url = $image['sizes']['slider1920'];
                    endif;
                $headline = get_sub_field('headline');
                $tagline = get_sub_field('tagline');
                $link = get_sub_field('link');
            ?>

        <div class="swiper-slide">
            <div class="swiper-slide-cover">
                <?php if ($video): ?>
                <?php if ($link && is_array($link)): ?><a href="<?php echo esc_url($link['url']); ?>" <?php echo $link['target'] ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>><?php endif; ?>
                    <video playsinline autoplay muted loop>
                        <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <?php if ($link && is_array($link)): ?></a><?php endif; ?>
                <?php else: ?>
                <?php if ($link && is_array($link)): ?><a href="<?php echo esc_url($link['url']); ?>" <?php echo $link['target'] ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>><?php endif; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid">
                    <?php if ($link && is_array($link)): ?></a><?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if ($headline || $tagline): ?>
            <div class="container-fluid" style="position: absolute;">
                <div class="container">
                    <div class="swiper-slide-content">
                        <div class="position-relative text-start px-5 px-md-0" style="position: relative;">
                            <?php if ($headline): ?><h2 class="text-slider-headline text-white"><?php echo esc_html($headline); ?></h2><?php endif; ?>
                            <?php if ($tagline): ?><div class="text-slider-tagline text-white mb-3 d-none d-sm-block"><?php echo esc_html($tagline); ?></div><?php endif; ?>

                            <?php if (get_sub_field('display_logo')) : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/img/logo-light.png" class="img-fluid logo-constraint mb-5 d-none d-md-block" alt="">
                            <?php endif; ?>

                            <div>
                                <?php if ($link && is_array($link)): ?>
                                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" class="btn btn-outline-light">Learn More</a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
        <?php endwhile; ?>
    </div>
</div>
<!-- Include Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
$(document).ready(function() {
    var swiper = new Swiper('#block-swiper-adhoc', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
    });
});
</script>

<!-- Add some CSS for positioning -->
<style>
.swiper-container {
    position: relative;
}

.swiper-pagination {
    position: absolute;
    bottom: 10px;
    left: 0;
    width: 100%;
    text-align: center;
}

.swiper-button-next, .swiper-button-prev {
    position: absolute;
    top: 50%; /* Center vertically */
    transform: translateY(-50%); /* Adjust for the button's height */
    width: 44px;
    height: 44px;
    margin-top: 0;
}

.swiper-button-next {
    right: -3px;
}

.swiper-button-prev {
    left: -3px;
}

/*  ensure that both videos and images within .swiper-slide-cover maintain the 1920x648 aspect ratio while covering the entire container area without losing their aspect ratios. The object-fit: cover; property is used to ensure the video or image covers the area completely, cropping it if necessary to maintain the aspect ratio. */
.swiper-slide-cover {
    position: relative;
    width: 100%;
    /* Maintain aspect ratio 1920x648 */
    padding-top: 33.75%; /* (648 / 1920) * 100% */
    overflow: hidden;
}

.swiper-slide-cover video,
.swiper-slide-cover img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Cover the container without losing aspect ratio */
}


.swiper-slide {
    position: relative; /* This makes it the reference for its absolutely positioned children */
    display: flex;
    justify-content: center; /* This centers its children horizontally */
    align-items: center; /* This centers its children vertically */
}
</style>

<?php else: ?>
<!-- No slides found -->
<?php endif; ?>












<?php 
// Ends the last case if/elseif/
endif;
// End C A S E S
        $iBlock++;
    // End loop.
    endwhile;
// No value.
else :
    // Do something...
endif;
?>