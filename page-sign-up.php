<?php
/**
 * Template Name: Sign up
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

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="sign-up-header">
			<div class="inner-wrapper">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );

				$pressPageTitle = get_field('press_enquiries_page_link_title') ?: null;
				$pressPageLink = get_field('press_enquiries_page_link') ?: null;

				if ( $pressPageTitle &&  $pressPageLink) echo '<p>
						<a class="link-with-arrow purple" href="'.$pressPageLink.'">'.$pressPageTitle.' <img class="style-svg arrow-purple" src="'.get_template_directory_uri().'/gfx/circled-arrow.svg" />
						</a>
					</p>';
				
				?>

			</div>
		</header>

		<section class="bg bg-yellow sign-up">
			<div class="inner-wrapper">
			<?php get_template_part( 'template-parts/partial', 'contact-form' ); ?>
			</div>
		</section>

	</article>

</main>
<?php
get_footer();
