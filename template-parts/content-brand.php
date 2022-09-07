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
            the_post_navigation(
				array(
					// 'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'vibrantfoods' ) . '</span> <span class="nav-title">%title</span>',
                    'prev_text' => '<img class="style-svg arrow arrow-purple arrow-left" src="'.get_template_directory_uri().'/gfx/circled-arrow.svg" /> PREVIOUS BRAND',
					// 'next_text' => '%title <img class="style-svg arrow arrow-purple" src="'.get_template_directory_uri().'/gfx/circled-arrow.svg" />',
                    'next_text' => 'NEXT BRAND <img class="style-svg arrow arrow-purple" src="'.get_template_directory_uri().'/gfx/circled-arrow.svg" />',
				)
			);
            ?>
            <!-- <a class="brand-nav" href="#">NEXT BRAND <img class="style-svg arrow arrow-purple" src="<?= get_template_directory_uri(); ?>/gfx/circled-arrow.svg" /></a> -->
        </div>
	</header>
    
    <section class="bgImg-title-panel brand-hero" <?php if ( $featuredImgUrl ) echo 'style="background-image:url('.$featuredImgUrl.')"'; ?>>
        <div class="inner-wrapper">
            <div class="title-panel bg-blue">
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
