<?php
/**
 * The footer template
 *
 * Contains the closing of <div id="main"> and all content after.
 *
 * @package TwoDelighted_Theme
 */
?>

    </div><!-- #main -->

</div><!-- #page -->
<div class="to-top">
    <?php get_template_part( 'assets/images/inline', 'chevrontop.svg' );
                        ?>
</div>
<footer id="colophon" role="contentinfo">
	<div class="wrapper">
		<div id="tertiary1" class="widget_area" role="complementary">
			<?php dynamic_sidebar('footer-area1'); ?>
		</div><!-- #tertiary .widget-area -->
		<div id="tertiary2" class="widget_area" role="complementary">
			<?php dynamic_sidebar('footer-area2'); ?>
		</div><!-- #tertiary .widget-area -->

	    <div id="copyright">
	        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?><br>
	        <a href="https://cgeohagan.github.io/" rel="nofollow">theme by Colleen Geohagan</a>
	    </div>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?> 
</body>
</html>