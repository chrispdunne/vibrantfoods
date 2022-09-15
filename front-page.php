<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vibrant_Foods
 */

get_header();
?>

	<article id="primary" class="site-main">

		<?php
		while ( have_posts() ) :

			the_post();

            // Hero
            $strap = get_field('strap_line') ?: null;
            $heroImg = get_field('hero_image') ?: null;

            if ( $strap && $heroImg ) :
                ?>
                <header id="home-hero" class="bg">
                    <div class="hero-image-container">
                        <?php echo wp_get_attachment_image( $heroImg, 'full', false, ["class" => "hero-image"]); ?>
                    </div>
                    <div class="hero-video-container">
                        <video muted loop autoplay src="<?php echo get_field( 'video' )['url'] ?>" >
                        </video>
                    </div>
                    <div class="hero-content">
                        <div class="inner-wrapper content-indent">
                        <div class="img__copy entry-content">
                            <div class="hero-content__text">
                                <?php the_title('<h1 class="uppercase">', '</h1>'); ?>
                                <p class="standfirst"><?= $strap; ?></p>
                            </div>
                            <a class="purpose_link" href="#our-purpose"><img class="style-svg arrow-down arrow-black" src="<?= get_template_directory_uri(); ?>/gfx/circled-arrow.svg" /><span class="screen-reader-text">Jump to Our Purposes</span></a>
                        </div>
                    </div>
                    </div>

                </header>
                <?php
            endif;


            // Our Purpose
            $purposeHeading = get_field('purpose_heading') ?: null;
            $purposeCopy = get_field('purpose_copy') ?: null;
            $purposeImg = get_field('purpose_image') ?: null;

            if ( $purposeHeading && $purposeCopy && $purposeImg ) :
                ?>
                <section id="our-purpose">
                    <div class="our-purpose__inner max-width">
                        <div class="purpose-img">
                            <?php echo wp_get_attachment_image( $purposeImg, 'full', false); ?>
                        </div>

                        <div class="purpose-copy">
                            <div class="entry-content">
                                <h2><?= $purposeHeading; ?></h2>
                                <p class="standfirst"><?= $purposeCopy; ?></p>
                            </div>
                        </div>
                    </div>
                </section>

                <?php
            endif;


            // The Vibrant Way
            $vibrantHeading = get_field('vibrant_heading') ?: null;
            $vibrantSub = get_field('vibrant_sub') ?: null;
            $vibrantAccordions = have_rows('vibrant_accordions') ?: null; 
            $vibrantParallaxBG = preg_replace('/ /', '<br>', $vibrantHeading, 1);
    


            if ( $vibrantHeading && $vibrantSub && $vibrantAccordions ) :
                ?>
                <section id="vibrant-way" class="bg bg-parallax bg-purple">
                    
                    <div class="inner-wrapper content-indent">
                        
                        <div class="parallaxBG"><?= $vibrantParallaxBG; ?></div>

                        <div class="parallaxContent">
                            <h2><?= $vibrantHeading; ?></h2>
                            <p class="subheading copy-indent"><?= $vibrantSub; ?></p>

                            <div id="vibrant-way-accordions" class="accordion-group copy-indent">
                                <?php
                                while ( have_rows('vibrant_accordions') ) :
                                    the_row();
                                    ?>
                                    <div class="aGroup">

                                        <div class="aHead">
                                            <?= '<img src="'.get_sub_field('icon').'"/>' ?: null; ?>
                                            <?= get_sub_field('heading') ?: null; ?>
                                            <img class="style-svg arrow-green" src="<?= get_template_directory_uri(); ?>/gfx/circled-arrow.svg" />
                                        </div>
                                        
                                        <div class="aBody">
                                            <?= get_sub_field('copy') ?: null; ?>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
            endif;

            // Our Brands
            $brandsHeading = get_field('brands_heading') ?: null;
            $brandsSub = get_field('brands_sub') ?: null;
            $paralaxBG = str_replace(' ', '<br>', $brandsHeading );

            if ( $brandsHeading && $brandsSub ) :
                ?>
                <section id="our-brands" class="bg bg-parallax bg-white">
                    
                    <div class="inner-wrapper content-indent">
                        
                        <div class="parallaxBG"><?= $paralaxBG; ?></div>

                        <div class="parallaxContent">
                            <h2 class="purple"><?= $brandsHeading; ?></h2>
                            <p class="standfirst copy-indent"><?= $brandsSub; ?></p>
                        </div>
                    </div>

                    <div class="grid-for-carousel">

                        <div class="brands-carousel-nav carousel-nav __to-edge"></div>

                        <div class="carousel-container __to-edge">
                            <?php 
                            // get all the brand logos
                            $args = array(
                                'post_type' => 'brand',
                                'post_status' => 'publish',
                                'posts_per_page' => -1, 
                                'orderby' => 'menu_order', 
                                'order' => 'ASC', 
                            );

                            $brandsLoop = new WP_Query( $args ); 

                            // display them with links
                            if ( $brandsLoop->have_posts() ) :

                                echo '<div class="brands-carousel carousel">';

                                    while ( $brandsLoop->have_posts() ) : $brandsLoop->the_post(); 
                                        $logo = get_field('brand_logo') ?: null;

                                        if( $logo )  :
                                            echo '<div>';
                                                echo '<a href="'.get_the_permalink().'" alt="'.get_the_title().'">';
                                                    echo wp_get_attachment_image( $logo, 'full', false, ["class" => "carousel-image"] );
                                                echo '</a>';
                                            echo '</div>';
                                        endif;
                                        
                                    endwhile;

                                echo '</div>';

                                wp_reset_postdata(); 
                            endif;
                            ?>
                        </div>
                    </div>
                </section>
                <?php
            endif;


            // Our Mission
            $missionHeading = get_field('mission_heading') ?: null;
            $missionSub = get_field('mission_sub') ?: null;
 
            if ( $missionHeading && $missionSub ) :
                ?>
                <section id="our-mission" class="tab-title-below">
                    
                    <div class="bg bg-parallax bg-purple">
                        <div class="inner-wrapper content-indent">                        
                            <div class="parallaxContent">
                                <h2><?= $missionHeading; ?></h2>
                                <p class="standfirst copy-indent"><?= $missionSub; ?></p>
                            </div>
                        </div>
                    </div>

                    <?php
                    // Our Mission Carousel
                    ?>
                    <div class="bg-grey-gradient">
                        <div class="mission-carousel-wrapper">
                            <div class="mission-carousel-grid">

                                <div class="mission-carousel-img">
                                    <img src="<?= get_template_directory_uri(); ?>/gfx/mission-carousel.png" />
                                </div>

                                <div class="mission-carousel-container">
                                    <?php
                                    if ( have_rows('deliver_slides') ):
                                        echo '<div class="mission-carousel carousel">';
                                        while ( have_rows('deliver_slides') ):
                                            the_row();
                                            echo '<div>';
                                                the_sub_field('deliver_slide');
                                            echo '</div>';
                                        endwhile;
                                        echo '</div>';
                                    endif;
                                    ?>

                                    <div class="mission-carousel-nav carousel-nav"></div>
                                </div>
                                

                            </div>
                        </div>
                    </div>

                    <?php
                    // How we Deliver Our Mission
                    $deliverHeading = get_field('deliver_heading') ?: null;
                    $deliverPoints = have_rows('delivery_points') ?: null;
                    
                    if ( $deliverHeading && $deliverPoints ) :
                        $rowNum = 0;
                        ?>
                        <div class="bg bg-white inner-wrapper deliver-mission">
                            <h2><?= $deliverHeading; ?></h2>

                            <ul class="delivery-points">
                                <?php
                                while ( have_rows('delivery_points')):
                                    $rowNum++;
                                    the_row();
                                    echo '<li>';
                                        echo '<img src="'.get_sub_field('icon').'"/>' ?: null;
                                        echo '<span class="delivery-point-heading">'.$rowNum.'.<br>'.get_sub_field('heading').'</span>' ?: null;
                                        echo '<span class="delivery-point-body">'.get_sub_field('copy').'</span>' ?: null;
                                    echo '</li>';
                                endwhile;
                                ?>
                            </ul>   
                        </div>
                        <?php
                    endif;
                    
                    // Spoon
                    $deliverImg = get_field('deliver_image');
                    if( $deliverImg ) {
                        echo wp_get_attachment_image( $deliverImg, 'full', true, ["class" => "align-right"] );
                    }
                    ?>
                </section>
                <?php
            endif;


            // Our Vision
            $visionHeading = get_field('vision_heading') ?: null;
            $visionSub = get_field('vision_sub') ?: null;
            $visionImg = get_field('vision_image') ?: null;
            
            if ( $visionHeading && $visionSub && $visionImg ) :
                ?>
                <section class="bgImg-title-panel our-vision" style="background-image:url(<?= $visionImg; ?>)">
                    <div class="inner-wrapper content-indent">
                        <div class="title-panel bg-purple">
                            <h2><?= $visionHeading; ?></h2>
                            <p><?= $visionSub; ?></p>
                        </div>
                    </div>
                </section>
                <?php
            endif;


            // Our Products
            $productsHeading = get_field('products_heading') ?: null;
            $productsSub = get_field('products_sub') ?: null;
            $productsPage = get_field('products_products_page') ?: null;

            if ( $productsHeading && $productsSub && $productsPage ) :
                ?>
                <section id="our-products" class="bg bg-parallax bg-purple">
                    <div class="inner-wrapper content-indent">
                        <div class="parallaxContent">
                            <h2><?= $productsHeading; ?></h2>
                            <p class="standfirst"><?= $productsSub; ?></p>
                        </div>
                    </div>

                    <?php 
                    if ( have_rows('products', $productsPage) ):
                        ?>
                        <div class="grid-for-carousel __products">

                            <div class="carousel-container __to-edge">
                                
                                <div class="products-carousel carousel">
                                    <?php
                                    while ( have_rows('products', $productsPage) ):
                                        the_row();
                                        // get the title
                                        $productTitle = get_sub_field('product_title');

                                        // turn into lowercase - instead of space for sectionID
                                        $productSectionID = str_replace(' ', '-', strtolower($productTitle));
                                        
                                        $html = '<a class="product-slide" href="'.get_permalink($productsPage).'#'.$productSectionID.'">';
                                        $html .= wp_get_attachment_image( get_sub_field('product_carousel_img'), 'full', false, ["class" => "carousel-image"] );
                                        $html .= '<span>'.$productTitle.'</span>';
                                        $html .= '</a>';

                                        echo $html;
                                        
                                    endwhile;
                                    ?>
                                </div>

                            </div>
                            
                            <div class="products-carousel-nav carousel-nav __to-edge"></div>
                        </div>
                        <?php
                    endif;
                    ?>

                </section>
                <?php
            endif;

		endwhile; // End of the loop.
		?>

	</main>

<?php
get_footer();
