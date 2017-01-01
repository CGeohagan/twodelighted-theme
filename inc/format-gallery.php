
<div class="grid-item">
    <a href="<?php the_permalink(); ?>">
    <h2 class="caption"><?php the_title(); ?></h2>
    <!-- displays thumbnail if it exists -->
    <?php if ( get_the_post_thumbnail($post_id) != '' ) {
        echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
        the_post_thumbnail();
        echo '</a>';
    } else {
        echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
        echo '<img src="';
        echo catch_that_image();
        echo '" alt="" />';
        echo '</a>';
    } ?>    
    </a>
    <div class="entry-excerpt"><?php the_excerpt(); ?></div>
    <div class="more"><a class="more-tag" href="<?php echo get_permalink(); ?>"> Read More</a></div> 
</div>