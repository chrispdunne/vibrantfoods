<?php
/**
 * Template Name: Contact
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

$newsTitle = get_field('news_title') ?: null;
	$newsLink = get_field('news_link') ?: null;
	$pressTitle = get_field('press_title') ?: null;
	$pressLink = get_field('press_link') ?: null;
	$address = get_field('company_address', 'option') ?: null;
	$title = get_the_title();
	$parallaxBG = str_replace(' ', '<br>', $title );
?>

<main id="primary" class="site-main">
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('get-in-touch'); ?>>
	
		<header class="bg bg-yellow">
			<div class="inner-wrapper">
				<div class="parallaxBG"><?= $parallaxBG; ?></div>
				<?php
				the_title( '<h1 class="uppercase">', '</h1>' ); 
				
				get_template_part( 'template-parts/partial', 'sign-up-link' );
				get_template_part( 'template-parts/partial', 'press-link' );
				?>
	
			</div>
	
			<div class="spacer __shallow"></div>
	
			<div class="inner-wrapper __narrow">
				
				<?php get_template_part( 'template-parts/partial', 'contact-form' ); ?>
	
			</div>
		</header>
	
		<section class="map">
	
			<iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Vibrant%20Foods%20Ltd,%20Building%203,%20Hatters%20Lane,%20Watford,%20WD18%208YG&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			
			<div class="title-panel-container">
				<div class="inner-wrapper __narrow">
					<div class="title-panel bg-purple">
						<h2>Head Office</h2>
						<?php
						if ( $address ) echo '<address>'.$address.'</address>';
						?>
					</div>
				</div>
			</div>
		</section>
	
	</article>

</main>
<?php
get_footer();
