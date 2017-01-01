<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="category-header">
            <?php 
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                }
            ?>
        </h2>
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        <div class="entry-details">
            <span class="entry-date">Posted on <?php echo get_the_date(); ?></span>
            <span class="entry-author"> By <?php echo get_the_author(); ?></span>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
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
        <div class="entry-excerpt"><?php the_excerpt(); ?></div>
        <div class="more"><a class="more-tag" href="<?php echo get_permalink(); ?>"> Read More</a></div> 
        <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twodelighted-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
                    
        <div class="comments-link">
            <?php comments_popup_link( 
                __( 'Leave a comment', 'twodelighted-theme' ), 
                __( '1 comment', 'twodelighted-theme' ), 
                __( '% comments', 'twodelighted-theme' ) ); 
            ?>
        </div>
                    
        <div class="postmeta">
            <?php the_tags( '<div class="post-tags">' . __( 'Tagged: ', 'twodelighted-theme' ) , ', ', '</div>' ); ?>
        </div>
                    
    </footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->