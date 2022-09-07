<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vibrant_Foods
 */

?>

	<footer class="site-footer">

		<div class="inner-wrapper">

			<div class="footer-menus-container">

				<?php
				// The Vibrant Site menu
				$menu_obj = vibrantfoods_get_menu_by_location('menu-2'); 
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2', 
						'menu_class'        => 'footer-menu',
						'container'            => 'nav',
						'container_aria_label' => esc_html($menu_obj->name),
						'items_wrap'=> '<h5>'.esc_html($menu_obj->name).'</h5><ul id="%1$s" class="footer-menu">%3$s</ul>',
						)
				); 
				
				// Legal menu
				$menu_obj = vibrantfoods_get_menu_by_location('menu-3'); 
				wp_nav_menu(
					array(
						'theme_location' => 'menu-3', 
						'menu_class'        => 'footer-menu',
						'container'            => 'nav',
						'container_aria_label' => esc_html($menu_obj->name),
						'items_wrap'=> '<h5>'.esc_html($menu_obj->name).'</h5><ul id="%1$s" class="footer-menu">%3$s</ul>',
						)
				); 

				// Find us online
				if ( isACF() && get_field('company_linkedin', 'options') ) :
					echo '<div class="footer-menu find-us">';
						echo '<h5>Find Us Online</h5>';
						echo '<p><a href="'.get_field('company_linkedin', 'options').'"><img src="'.get_template_directory_uri().'/gfx/icon-linkedin.svg">LinkedIn</a></p>';
					echo '</div>';
				endif;
				
				// Get in touch
				if ( isACF() && get_field('company_address', 'options') ) :
					echo '<div class="footer-menu get-in-touch">';
						echo '<h5>Get in Touch</h5>';
						echo '<address>'.get_field('company_address','options').'</address>';

						if ( get_field('company_email','options') ) echo '<p><a href="'.get_field('company_email','options').'">'.get_field('company_email','options').'</a>';
					echo '</div>';
				endif;
				?>

			</div>
			
			<div class="colophon footer-menu">
				<p><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'vibrantfoods' ) ); ?>">&copy; Vibrant Foods Limited <?= date("Y"); ?></a></p>

				<?php if ( isACF() && get_field('company_reg', 'options') ) echo '<p>Registered company number ' . get_field('company_reg', 'options').'</p>'; ?>
			</div>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>