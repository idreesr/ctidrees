<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CustomTheme
 */
	
	/* The following code checks which option is selected in the options page */
	$options = get_option('ct_options_settings');
	/* this if statement checks if the 'Hide widgets'
	box is checked */
	if ( isset($options['ct_checkbox_field']) =='on' ) {
		/* if it is checked, then it hides the footer widgets */
		?> <style type="text/css">
				#footer-widgets {
					display: none;
				}
			</style>
	<?php
	}
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<!-- this shows the footer widget areas -->
			<div id="footer-widgets">
	            <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
	                <aside id="widget-foot-1" class="widget-foot">
	                    <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
	                </aside>
	            <?php endif; ?>

	            <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
	                <aside id="widget-foot-2" class="widget-foot">
	                    <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
	                </aside>
	            <?php endif; ?>
		    </div><!-- end #footer-widgets -->

			<div id="foot-menu">
				<?php wp_nav_menu( array( 'theme_location'=>'secondary', 'menu_class'=>'foot-menu' ) ); ?>
			</div><!-- #footer-menu -->

			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ct' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'ct' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'ct' ), 'ct', '<a href="https://www.sheridancollege.ca/" rel="designer">Rida Idrees</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- container -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
