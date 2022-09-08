<?php 
$formShortcode = get_field('contact_form') ?: null;

if ( $formShortcode ):
    echo do_shortcode($formShortcode);
endif;