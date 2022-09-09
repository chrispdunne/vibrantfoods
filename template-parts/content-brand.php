<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vibrant_Foods
 */

if ( isACF() ):
    $sub = get_field('brand_sub') ?: null;
    $featuredImgUrl = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    $logo = get_field('brand_logo') ?: null;
    $content = get_field('brand_copy') ?: null;
    $contentImgUrl = get_field('brand_image') ?: null;
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header brand-header">

        <div class="inner-wrapper">
            <h1 class="uppercaser">Our<br>Brands</h1>
            <?php
                $brands = get_posts( ['post_type' => 'brand', 'numberpostsint' => 9] );
                if ( $brands && !is_wp_error( $brands ) ) {
                    echo '<div class="brand-logo-links"><a href="">';
                    foreach ( $brands as $brand ) {
                        echo '<a id="' . sanitize_title( $brand->post_title ) . '" href="' . get_permalink( $brand->ID ) . '">';
                        echo '<img class="brand-logo-link" src="';
                        echo wp_get_attachment_image_src( get_field( 'brand_logo', $brand->ID ), 'medium' )[0];
                        echo '" />';
                        echo '</a>';
                    }
                    echo '</div>';
                }
            ?>
         </div>
	</header>
    
    <section class="bgImg-title-panel brand-hero" <?php if ( $featuredImgUrl ) echo 'style="background-image:url('.$featuredImgUrl.')"'; ?>>
        <div class="inner-wrapper">
            <div class="title-panel bg-blue" <?php if ( get_field( 'brand_color' ) ) { echo 'style="background-color: ' . get_field( 'brand_color' ) . '"'; }?>>
                <h2 class="uppercase"><?= get_the_title(); ?></h2>
                <?= $sub; ?>
            </div>
        </div>
    </section>

    <!-- <div class="brand-content" <?php if ( $contentImgUrl ) echo 'style="background-image:url('.$contentImgUrl.')"'; ?>> -->
	<div class="brand-content" <?php if ( $contentImgUrl ) echo 'style="--bg: url('.$contentImgUrl.')"'; ?>>
        <div class="inner-wrapper">

            <div class="brand-content-copy">
                <?php
                if( $logo )  echo wp_get_attachment_image( $logo, 'full', false, ["class" => "brand-logo"] );

                echo $content ?: null;
                ?>
            </div>

            
        </div>

	</div>

	<footer class="entry-footer">
		<?php vibrantfoods_entry_footer(); ?>
	</footer>

</article>
