<?php
/**
 * Template part for displaying page content in page-our-products.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vibrant_Foods
 */

/**
 * get the data out of the repeater and and into an array for use later
 * array will hold array of (title, product title for section ID (lowercase & '-' for spaces), copy, image)
 */
if ( have_rows('products') ):
    $productsArr = array();

    while ( have_rows('products') ):
        the_row();
        $productTitle = get_sub_field('product_title');
        $productSectionID = str_replace(' ', '-', strtolower($productTitle));
        $productCopy = get_sub_field('product_copy');
        $productImage = get_sub_field('product_image');

        array_push( $productsArr, array("productTitle" => $productTitle, "productSectionID" => $productSectionID, "productCopy" => $productCopy, "productImage" => $productImage) );
    endwhile;
endif;
?>

<article id="products" <?php post_class('our-products'); ?>>

	<header class="entry-header copy-and-image-grid">

        <div class="copy-and-image-grid__copy">
            <div class="entry-content">
                <?php
                the_title( '<h1 class="uppercase">', '</h1>' );
                the_content();
                ?>

                <ul class="jump-links">
                    <?php
                    foreach ( $productsArr as $product ):
                        echo '<li><a href="#'.$product['productSectionID'].'">'.$product['productTitle'].'</a></li>';
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>

        <div class="copy-and-image-grid__img">
            <?php the_post_thumbnail('full'); ?>
        </div>

	</header>

    <?php
    foreach ( $productsArr as $product ):
        // Pulses
        if ( $product['productTitle'] === "Pulses" ):
            echo '<section id="'.$product['productSectionID'].'" class="bg-purple copy-and-image-grid __has-panel">';
                echo '<div class="copy-and-image-grid__copy __panel">';

                    echo '<div class="parallaxBG">'.$product['productTitle'].'</div>';

                    echo '<h2>'.$product['productTitle'].'</h2>';
                    echo $product['productCopy'];
                echo '</div>';

                echo '<div class="copy-and-image-grid__img __panel">';
                    echo wp_get_attachment_image( $product['productImage'], 'full', false);
                echo '</div>';
            echo '</section>';
        // Spices
        elseif ( $product['productTitle'] === "Spices" ):
            echo '<section id="'.$product['productSectionID'].'" class="copy-and-image-grid __image_left bg-white">';
                echo '<div class="copy-and-image-grid__img __image_left">';
                    echo wp_get_attachment_image( $product['productImage'], 'full', false);
                echo '</div>';

                echo '<div class="copy-and-image-grid__copy __image_left">';
                    
                    echo '<div class="parallaxBG">'.$product['productTitle'].'</div>';

                    echo '<h2>'.$product['productTitle'].'</h2>';
                    echo $product['productCopy'];
                echo '</div>';
            echo '</section>';
        // Flours
        elseif ( $product['productTitle'] === "Flours" ):
            echo '<section id="'.$product['productSectionID'].'" class="bg-purple copy-and-image-grid __has-panel">';
                echo '<div class="copy-and-image-grid__copy __panel">';

                    echo '<div class="parallaxBG">'.$product['productTitle'].'</div>';

                    echo '<h2>'.$product['productTitle'].'</h2>';
                    echo $product['productCopy'];
                echo '</div>';

                echo '<div class="copy-and-image-grid__img __panel">';
                    echo wp_get_attachment_image( $product['productImage'], 'full', false);
                echo '</div>';
            echo '</section>';
        // Nuts
        elseif ( $product['productTitle'] === "Nuts" ):
            echo '<section id="'.$product['productSectionID'].'" class="copy-and-image-grid __image_left bg-white">';
                echo '<div class="copy-and-image-grid__img __image_left">';
                    echo wp_get_attachment_image( $product['productImage'], 'full', false);
                echo '</div>'; 

                echo '<div class="copy-and-image-grid__copy __image_left">';

                    echo '<div class="parallaxBG">'.$product['productTitle'].'</div>';

                    echo '<h2>'.$product['productTitle'].'</h2>';
                    echo $product['productCopy'];
                echo '</div>';
            echo '</section>';
        // Snacks
        elseif ( $product['productTitle'] === "Snacks" ):
            echo '<section id="'.$product['productSectionID'].'" class="bg-img bg-img-dark copy-and-image-grid __has-panel">';
                echo '<div class="copy-and-image-grid__copy __panel">';

                    echo '<div class="parallaxBG">'.$product['productTitle'].'</div>';

                    echo '<h2>'.$product['productTitle'].'</h2>';
                    echo $product['productCopy'];
                echo '</div>';

                echo '<div class="copy-and-image-grid__img __panel">';
                    echo wp_get_attachment_image( $product['productImage'], 'full', false);
                echo '</div>';
            echo '</section>';
        // Dairy
        elseif ( $product['productTitle'] === "Dairy" ):
            echo '<section id="'.$product['productSectionID'].'" class="copy-and-image-grid __image_left bg-white">';
                echo '<div class="copy-and-image-grid__img __image_left">';
                    echo wp_get_attachment_image( $product['productImage'], 'full', false);
                echo '</div>';

                echo '<div class="copy-and-image-grid__copy __image_left">';

                    echo '<div class="parallaxBG">'.$product['productTitle'].'</div>';

                    echo '<h2>'.$product['productTitle'].'</h2>';
                    echo $product['productCopy'];
                echo '</div>';
            echo '</section>';
        endif;
    endforeach;
    ?>

</article><!-- #post-<?php the_ID(); ?> -->
