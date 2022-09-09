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