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
				<a href="">Sign up for news here <img class="style-svg arrow-purple" src="<?= get_template_directory_uri(); ?>/gfx/circled-arrow.svg"/></a>
				<a href="">Press: For all press equiries <img class="style-svg arrow-purple" src="<?= get_template_directory_uri(); ?>/gfx/circled-arrow.svg"/></a>    
			</div>
		</div>

		<section class="inner-wrapper">

			<ul class="news-posts">
				<?php
				// get all the news posts
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => -1
				);

				$newsLoop = new WP_Query( $args ); 

				// display them with links
				if ( $newsLoop->have_posts() ) :
					
					while ( $newsLoop->have_posts() ) : $newsLoop->the_post(); 
					// featured image for background if set
					$bgImg = wp_get_attachment_url( get_post_thumbnail_id() );

					// news_doc as link if set
					$docLink = get_field('news_doc') ?: '#';
					?>
					<li class="news-item" style="--bg:url(<?= $bgImg;?>)">
						
						<a href="<?= $docLink; ?>">

							<?php the_title(); ?>
							
						</a>
					</li>
					<?php
					endwhile;
					wp_reset_postdata(); 
				endif;
				?>
			</ul>

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
