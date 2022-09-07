<?php
/**
 * Template part for displaying page content in page-sustainability-targets.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vibrant_Foods
 */

?>

<article id="sustainaibility-targets" <?php post_class('our-products'); ?>>

	<header class="sus-targets-hero">
        <div class="hero-copy">
            <?php
            the_title('<h1 class="uppercase">','</h1>');
            echo '<div class="standfirst">';
                the_content();
            echo '</div>';
            ?>
        </div>

        <div class="hero-image">
            <?php the_post_thumbnail(); ?>
        </div>
	</header>

    <section class="sus-targets-sub-hero">
        <?php 
        $subHeroImg = get_field('sus_sub_hero_img') ?: null;
        $subHeroCopy = get_field('sus_sub_hero_copy') ?: null;
        if ( $subHeroCopy ):
            echo '<div class="sus-sub-hero-image">';
                echo wp_get_attachment_image( $subHeroImg, 'full', false);
            echo '</div>';

            echo '<div class="sus-sub-hero-copy">';
                echo $subHeroCopy;
            echo '</div>';
        endif;
        ?>
    </section>

    <section class="sus-targets">
        <?php
        $susTargetsTitle = get_field('sus_targets_title') ?: null;
        $susTargetsSubTitle = get_field('sus_targets_subtitle') ?: null;
        
        if ( $susTargetsTitle && $susTargetsSubTitle):
            echo $susTargetsTitle;
            echo $susTargetsSubTitle;
        endif;

        if ( have_rows('sus_targets') ):
            $targetsArr = array();
        
            while ( have_rows('sus_targets') ):
                the_row();

                echo '<div>';
                    echo wp_get_attachment_image( get_sub_field('target_img'), 'full', false);
                    the_sub_field('target_title');
                    the_sub_field('target_copy');
                echo '</div>';
                
             endwhile;
        endif;

        $susImpactImg = get_field('sus_impact_img') ?: null;
        $susImpactTitle = get_field('sus_impact_title') ?: null;
        $susImpactCopy = get_field('sus_impact_copy') ?: null;
        $susImpactDownloadTitle = get_field('sus_impact_download_title') ?: null;
        $susImpactDownloadFile = get_field('sus_impact_download_file') ?: null;

        if ( $susImpactImg && $susImpactTitle && $susImpactCopy ):
            echo wp_get_attachment_image( $susImpactImg, 'full', false);
            echo $susImpactTitle;
            echo $susImpactCopy;

            if ( $susImpactDownloadTitle && $susImpactDownloadFile ):
                echo $susImpactDownloadTitle;
                echo $susImpactDownloadFile;
            endif;

        endif;

        ?>
    </section>

</article>
