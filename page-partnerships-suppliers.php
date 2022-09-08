<?php
/**
 * Template Name: Partnerships/Suppliers
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

<main id="primary" class="site-main partnerships-suppliers">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header __generic">
			<div class="inner-wrapper">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</header>

		<div class="entry-content inner-wrapper two-col-grid"> 

			<div>
				<?php the_content(); ?>
			</div>

            <div class="bg bg-yellow form-container">
                
                <?php get_template_part( 'template-parts/partial', 'contact-form' ); ?>
                
            </div>
		</div> 

	</article>

</main>
<?php
get_footer();
