<?php
/**
 * Template Name: Company culture
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

	<article id="post-<?php the_ID(); ?>" <?php post_class('our-culture'); ?>>

		<header class="our-culture-header inner-wrapper-grid">
				
			<?php the_post_thumbnail('full'); ?>
			

			<div class="header-copy">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' ); 

				echo '<p class="standfirst">'.get_field('company_culture_standfirst').'</p>';

				echo '<p><a class="link-with-arrow purple" href="#our-team">Join Our Team <img class="style-svg arrow-purple" src="'.get_template_directory_uri().'/gfx/circled-arrow.svg" /></a></p>';
				?>
			</div>
		</header>

		<?php // Values ?>
		<section class="inner-wrapper-grid">
			<div class="our-values entry-content max-text-width">
				<?php the_field('our_values'); ?>
			</div>
		</section>
		

		<?php // Team ?>
		<section id="our-team">
			<?php
			// Team one
			$teamOneCopy = get_field('our_team_one') ?: null;
			$teamOneImg = get_field('our_team_one_image') ?: null;

			if ($teamOneCopy && $teamOneImg):
				echo '<div class="our-team team-one">';
					echo '<div class="entry-content">';
						echo $teamOneCopy;
					echo '</div>';

					echo wp_get_attachment_image( $teamOneImg, 'full', false, ["class" => "fill-grid"]);
				echo '</div>';
			endif;

			// Team two
			$teamTwoCopy = get_field('our_team_two') ?: null;
			$teamTwoImg = get_field('our_team_two_image') ?: null;

			if ($teamTwoCopy && $teamTwoImg):
				echo '<div class="our-team team-two">';
					echo wp_get_attachment_image( $teamTwoImg, 'full', false, ["class" => "fill-grid"]);

					echo '<div class="entry-content">';
						echo $teamTwoCopy;
					echo '</div>';
				echo '</div>';
			endif;

			// Team three
			$teamThreeCopy = get_field('our_team_three') ?: null;
			$teamThreeImg = get_field('our_team_three_image') ?: null;

			if ($teamThreeCopy && $teamThreeImg):
				echo '<div class="our-team team-three">';
					echo '<div class="entry-content">';
						echo $teamThreeCopy;
					echo '</div>';

					echo wp_get_attachment_image( $teamThreeImg, 'full', false, ["class" => "fill-grid"]);
				echo '</div>';
			endif;
			?>
		</section>

		<?php // Join us ?>
		<section class="join-us inner-wrapper-grid __two-col-center entry-content">
			<div class="join-us-heading max-text-width">
				<?php the_field('join_us'); ?>
			</div>

			<div class="join-us-form-copy">
				<?php the_field('join_us_form_text'); ?>
			</div>
			
			<div class="join-us-form bg bg-yellow">
				<?php get_template_part( 'template-parts/partial', 'contact-form' ); ?>
			</div>

			<div class="join-us-disclaimer">
				<?php the_field('join_us_disclaimer'); ?>
			</div>
		</section>

		<?php // Latest news ?>
		<section class="inner-wrapper latest-news">

			<h2>Latest News</h2>
			
			<?php get_template_part( 'template-parts/partial', 'news' ); ?>
		</section>

	</article>

</main>
<?php
get_footer();
