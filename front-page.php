<?php
/**
 * Main Template File
 * 
 * This file is used to display a page when nothing more specific matches a query.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package TwoDelighted_Theme
 */

get_header(); ?>


<section id="primary" role="main" class="col">


    <?php if ( have_posts() ) : ?>
        <!-- there IS content for this query -->

        <?php // check if we're on an archive page
        if ( is_archive() ) :
            // if so, print the archive title before the loop begins
            get_template_part( 'inc/archive-header' );
        endif; ?>


        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( '/inc/format', 'standard' ); ?>  

        <?php endwhile; ?>

        <nav id="main-nav-below">
            <div class="nav-previous"><?php next_posts_link( __( "Older posts", "twodelighted-theme" ) ); ?></div>
            <div class="nav-next"><?php previous_posts_link( __( "Newer posts", "twodelighted-theme" ) ); ?></div>
        </nav><!-- #nav-above -->

    <?php else : ?>
        <!-- there IS NOT content for this query -->

        <article id="post-0" class="hentry post no-results not-found">
            <header class="entry-header">
                <h1><?php _e( "Oops!", "twodelighted-theme" ); ?></h1>
            </header><!-- .entry-header -->

            <p><?php _e( "We can&#039;t find content for this page!", "twodelighted-theme" ); ?></p>
        </article><!-- #post-0 -->

    <?php endif; ?>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>