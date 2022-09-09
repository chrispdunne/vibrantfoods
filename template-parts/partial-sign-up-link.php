<?php
// Clone field title must be "signup_link" and "Prefix Field Names" set to true

$signUpTitle = get_field('signup_link_page_link_title') ?: null;
$signUpLink = get_field('signup_link_page_link') ?: null;

if ( $signUpTitle && $signUpLink ) 
    echo '<p>
            <a class="link-with-arrow purple" href="'.$signUpLink.'">'.$signUpTitle.'<img class="style-svg arrow-purple" src="'.get_template_directory_uri().'/gfx/circled-arrow.svg" /></a>
        </p>';

