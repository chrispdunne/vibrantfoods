<?php
// Clone field title must be "press_link" and "Prefix Field Names" set to true
$pressPageTitle = get_field('press_link_page_link_title') ?: null;
$pressPageLink = get_field('press_link_page_link') ?: null;

if ( $pressPageTitle && $pressPageLink ) 
    echo '<p>
            <a class="link-with-arrow purple" href="'.$pressPageLink.'">'.$pressPageTitle.'<img class="style-svg arrow-purple" src="'.get_template_directory_uri().'/gfx/circled-arrow.svg" /></a>
        </p>';