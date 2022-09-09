<?php
/**
 * Template Name: News
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

<main id="primary" class="site-main news">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header __generic">
			<div class="inner-wrapper">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</header>

		<div class="entry-content inner-wrapper">

			<div class="standfirst">
				<?php the_content(); ?>
			</div>

			<div class="news-links">
				<?php 
				get_template_part( 'template-parts/partial', 'sign-up-link' );
				get_template_part( 'template-parts/partial', 'press-link' ); 
				?>
			</div>
		</div>

		<section class="inner-wrapper">

			<?php get_template_part( 'template-parts/partial', 'news' ); ?>

		</section>

		<section class="bg bg-yellow">
			<div class="inner-wrapper">
				<?= do_shortcode('[contact-form-7 id="249" title="Get in Touch"]'); ?>
			</div>
		</section>

	</article>

</main>
<?php
get_footer();
