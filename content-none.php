<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package TwoDelighted_Theme
 */
?>

<article class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'twodelighted-theme' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_archive() ) : ?>
		
			<p><?php _e( 'There are no published posts for this archive. Try searching using keywords instead.', 'twodelighted-theme' ); ?></p>
			

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'No matches were found for your search terms. Please try again with different keywords.', 'twodelighted-theme' ); ?></p>
			

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps a search would help?', 'twodelighted-theme' ); ?></p>
			

		<?php endif; ?>
	</div><!-- .entry-content -->
</article>