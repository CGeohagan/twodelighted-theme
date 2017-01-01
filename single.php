<?php
/**
 * Single post template
 *
 * @package TwoDelighted_Theme
 */

get_header(); ?>

<section id="primary">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h2 class="category-header">
                    <?php 
                        $category = get_the_category(); 
                        echo $category[0]->cat_name;
                    ?>
                </h2>
                <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <div class="entry-details">
                    <span class="entry-date">Posted on <?php echo get_the_date(); ?></span>
                    <span class="entry-author"> By <?php echo get_the_author(); ?></span>
                </div>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twodelighted-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->

            <footer class="entry-meta">

                <?php the_tags( '<div class="post-tags">' . __( 'Tagged: ', 'twodelighted-theme' ) , ', ', '</div>' ); ?>

                <div class="comments-link">
                    <?php comments_popup_link( 
                         __( 'Leave a comment', 'twodelighted-theme' ), 
                         __( '1 comment', 'twodelighted-theme' ), 
                         __( '% comments', 'twodelighted-theme' ) ); 
                    ?>
                </div>
            </footer><!-- #entry-meta -->
        </article><!-- #post-<?php the_ID(); ?> -->

        <?php comments_template( '', true ); ?>

        <!-- You could also put some between-post links here (next post, previous post) -->
        <nav id="nav-below">
            <div class="nav-previous"><?php previous_post_link('%link', 'Previous Post'); ?></div>
            <div class="nav-next"><?php next_post_link( '%link', 'Next post'); ?></div>
        </nav><!-- #nav-above -->

    <?php endwhile; // end of the loop. ?>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>