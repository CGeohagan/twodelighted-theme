<?php
/**
 * Search form template
 *
 * @package TwoDelighted_Theme
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="assistive-text"><?php _e( 'Search', 'twodelighted-theme' ); ?></label>
	<input type="text" class="field" name="s" id="s" placeholder="WHAT WOULD YOU LIKE TO FIND?" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'SEARCH', 'twodelighted-theme' ); ?>" />
<?php /*	<div class="search-submit-button">
		<?php get_template_part( 'assets/images/inline', 'search.svg' );
		?>
	</div> */ ?>



</form>
