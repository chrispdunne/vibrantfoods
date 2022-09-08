<?php
/**
 * Template Name: Sustainability Targets
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
the_post();
?>

<main id="primary" class="site-main">

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

		<section class="sus-targets inner-wrapper">
			<?php
			$susTargetsTitle = get_field('sus_targets_title') ?: null;
			$susTargetsSubTitle = get_field('sus_targets_subtitle') ?: null;

			echo '<div class="sus-targets-row">';  
				// Heading
				if ( $susTargetsTitle && $susTargetsSubTitle):
					echo '<h2>'.$susTargetsTitle.'<span>'.$susTargetsSubTitle.'</span></h2>';
				endif;

				// Targets
				if ( have_rows('sus_targets') ):
					$targetsArr = array();
				
					while ( have_rows('sus_targets') ):
						the_row();

							echo wp_get_attachment_image( get_sub_field('target_img'), 'full', false);

							echo '<div class="targets-row-copy">';
								echo '<h3>'.get_sub_field('target_title').'</h3>';
								the_sub_field('target_copy');
							echo '</div>';
						
					endwhile;
				endif;

				// Impact report
				$susImpactImg = get_field('sus_impact_img') ?: null;
				$susImpactTitle = get_field('sus_impact_title') ?: null;
				$susImpactCopy = get_field('sus_impact_copy') ?: null;
				$susImpactDownloadTitle = get_field('sus_impact_download_title') ?: null;
				$susImpactDownloadFile = get_field('sus_impact_download_file') ?: null;

				if ( $susImpactImg && $susImpactTitle && $susImpactCopy ):
					
					echo wp_get_attachment_image( $susImpactImg, 'full', false);

					echo '<div class="targets-row-copy impact-report">';
						echo '<h2>'.$susImpactTitle.'</h2>';
						echo $susImpactCopy;

						if ( $susImpactDownloadTitle && $susImpactDownloadFile ):
							echo '<p class="no-bottom-margin">'.$susImpactDownloadTitle.'</p>';
							echo '<a href="'.$susImpactDownloadFile.'">Download now</a>';
						endif;
					echo '</div>';
					
				endif;
			echo '</div>'; // .sus-targets-row
			?>
		</section>

	</article>

</main>
<?php
get_footer();
