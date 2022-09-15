<?php
/**
 * Template Name: Manufacturing Capabilites
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

	<article id="post-<?php the_ID(); ?>" <?php post_class('manufacturing-capabilites'); ?>>

		<header class="entry-header">
			<div class="inner-wrapper __narrow">
				<?php
				the_title( '<h1 class="uppercase">', '</h1>' );
				if ( get_field('standfirst') ) echo '<span class="standfirst"> ' . get_field('standfirst') . '</span>';
				?>
			</div>
		</header>

		<?php
		// At a glance
		$glanceTitle = get_field('glance_title') ?: null;
		$glanceDetails = have_rows('details') ?: null;
		$glanceCorrectAt = get_field('details_correct') ?: null;
		$locationsParallaxBG = get_field('manufacturing_locations_bg') ?: null;
		$locations = get_field('manufacturing_locations') ?: null;
		$locationMap = get_field('manufacturing_map') ?: null;

		if ( $glanceTitle && $glanceDetails ):
			echo '<section class="bg bg-purple glance">';
				echo '<div class="inner-wrapper __narrow">';
					echo '<h2 class="uppercase">'.$glanceTitle.'</h2>';
				echo '</div>';

				echo '<div class="inner-wrapper">';

					// Manufacturing details
					echo '<div class="manufacturing-details">';
						while ( have_rows('details') ):
							the_row();
							$icon = get_sub_field('detail_icon') ?: null;
							echo '<div class="detail bg-pink" style="--bg: url('.$icon.')">';
								$heading = get_sub_field('detail_heading') ?: null;
								$subHeading = get_sub_field('detail_sub_heading') ?: null;
								if ( $heading ) echo '<p class="h3">'. $heading . '</p>'; 
								if ( $subHeading ) echo '<p>'. $subHeading . '</p>';
							echo '</div>';
						endwhile;
					echo '</div>';
				
					if ( $glanceCorrectAt ) echo '<p class="correct-at">'.$glanceCorrectAt.'</p>';

					// Locations
					if ( $locations && $locationMap):
						echo '<div class="locations">';

							echo '<div class="location-copy">';
								echo '<div class="parallaxBG">'.$locationsParallaxBG.'</div>';
								
								echo $locations;
							echo '</div>';

							echo '<div class="location-map">'.wp_get_attachment_image( $locationMap, 'full', false, 'style-svg' ) . '</div>';
						echo '</div>';
					endif;
				echo '</div>';

			echo '</section>';
		endif;

		// Our supplier
		$supplierParallaxBG = get_field('manufacturing_suppliers_bg') ?: null;
		$supplierTitle = get_field('manufacturing_suppliers_title') ?: null;
		$supplierCopyOne = get_field('manufacturing_suppliers_copy_one') ?: null;
		$supplierImgOne = get_field('manufacturing_suppliers_image_one') ?: null;
		$supplierVideoURL = get_field('manufacturing_suppliers_video_url') ?: null;
		$supplierCopyTwo = get_field('manufacturing_suppliers_copy_two') ?: null;
		$supplierImgTwo = get_field('manufacturing_suppliers_image_two') ?: null;
		$supplierRows = get_field('manufacturing_suppliers_additional_rows') ?: null;

		if ( $supplierTitle && $supplierCopyOne && $supplierImgOne) :
			echo '<section class="manufacturing-suppliers">';

				// Upper
				echo '<div class="bg bg-pink">';
					echo '<div class="inner-wrapper">';
						// copy and image
						echo '<div class="copy-and-image">';
							echo '<div class="mf-suppliers-copy entry-content">';

								echo '<div class="parallaxBG">'.$supplierParallaxBG.'</div>';

								echo '<h3 class="uppercase">'.$supplierTitle.'</h3>';
								echo $supplierCopyOne;
							echo '</div>';
							
							echo '<div class="mf-suppliers-image">';
								echo wp_get_attachment_image( $supplierImgOne, 'full', false);
							echo '</div>';
						echo '</div>'; 

						// video
						if ( $supplierVideoURL ):
							// get the youtube ID from url exploded into array
							$id = explode('=', $supplierVideoURL)[1];
				
							echo '<lite-youtube videoid="'.$id.'" params="modestbranding=1&rel=0">';
								echo '<a href="https://youtube.com/watch?v='.$id.'" class="lty-playbtn" title="Play Video">';
									echo '<span class="lyt-visually-hidden">Play Video</span>';
								echo '</a>';
							echo '</lite-youtube>';
						endif;
					echo '</div>';
				echo '</div>';
				
				// lower
				if ( $supplierCopyTwo && $supplierImgTwo ) :
					echo '<div class="spacer"></div>';

					echo '<div class="bg is-overlapped">';

						echo '<div class="img-left__img">';
							echo wp_get_attachment_image( $supplierImgTwo, 'full', false);
						echo '</div>';

						echo '<div class="inner-wrapper img-left__copy">';
							echo '<div class="img__copy pink entry-content">';
								echo $supplierCopyTwo;
							echo '</div>';
						echo '</div>';

					echo '</div>';
				endif;


				if ( $supplierRows ) { 
					foreach ( $supplierRows as $supplierRow ) : ?>

 					<section class="bg-parallax bg-white manufacturing-safety">

						<div class="inner-wrapper entry-content">

							<div class="parallaxContent">
								<h3 class="purple"><?php echo $supplierRow['title'] ?></h3>
								<div class="copy-indent">
									<?php echo $supplierRow['body'] ?>
								</div>
							</div>
						</div>

						<div class="spacer __shallow"></div>

					</section>

					<?php endforeach;
				}
			echo '</section>';
		endif;

		// Technology
		$techTitle = get_field('technology_title') ?: null;
		$techCopy = get_field('technology_copy') ?: null;
		$techImg = get_field('technology_image') ?: null;

		if ( $techTitle && $techCopy && $techImg ) :
			echo '<section class="bg bg-pink manfucturing-technology">';
				echo '<div class="inner-wrapper copy-image">';
					
					echo '<div class="copy-image__copy entry-content">';

						// echo '<div class="parallaxBG">'.$techTitle.'</div>';

						echo '<h3 class="uppercase">'.$techTitle.'</h3>';
						echo $techCopy;
					echo '</div>';

					echo '<div class="copy-image__image overlaps-top-bottom">';
						echo wp_get_attachment_image( $techImg, 'full', false);
					echo '</div>';

				echo '</div>';
			echo '</section>';
		endif;


		// Transport
		$transTitle = get_field('transport_title') ?: null;
		$transCopy = get_field('transport_copy') ?: null;
		$transImg = get_field('transport_image') ?: null;

		if ( $transTitle && $transCopy && $transImg ) :
			echo '<section class="bg is-overlapped manfucturing-transport">';

				echo '<div class="img-left__img">';
					echo wp_get_attachment_image( $transImg, 'full', false);
				echo '</div>';

				echo '<div class="inner-wrapper img-left__copy">';
					echo '<div class="img__copy pink entry-content">';
						echo '<h3>'.$transTitle.'</h3>';
						echo $transCopy;
					echo '</div>';
				echo '</div>';

			echo '</section>';
		endif;


		// Food Safety
		$safetyTitle = get_field('manufacturing_safety_title') ?: null;
		$safetyCopy = get_field('manufacturing_safety_copy') ?: null;
		$safetyImg = get_field('manufacturing_safety_image') ?: null;

		echo '<section class="bg-parallax bg-white manufacturing-safety">';

			echo '<div class="inner-wrapper entry-content">';

				echo '<div class="parallaxContent">';
					echo '<h3 class="purple">'.$safetyTitle.'</h3>';
					echo '<div class="copy-indent">';
						echo $safetyCopy;
					echo '</div>';

				echo '</div>';

			echo '</div>';

			echo '<div class="spacer __shallow"></div>';

			echo wp_get_attachment_image( $safetyImg, 'full', false);
		echo '</section>';


		// Become a supplier
		echo '<section class="bg bg-yellow">';
			echo '<div class="inner-wrapper __narrow">';
				echo '<h2 class="h3 uppercase">Become our Supplier</h2>';
				echo do_shortcode('[contact-form-7 id="248" title="Become a Supplier"]');
			echo '</div>';
		echo '</section>';
		?>


	</article>

</main>
<?php
get_footer();
