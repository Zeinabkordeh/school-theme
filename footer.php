<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Taze
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			
			<a  href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
				<img alt="logo" src="<?php echo esc_url("https://wp.bcitwebdeveloper.ca/school-demo/wp-content/uploads/2023/04/iconmonstr-school-white.png");?>">
			</a>
			
			
			<div class="footer-contant">
				<h3>Credits</h3>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'taze' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'taze' ), 'WordPress' );
					?>
				</a>
				<span class="sep"></span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s', 'taze' ), 'taze', '<a href="https://zeiko.ca">Zeinab Kordeh & Taylor Hillier</a>' );
				?>
			</div>
			<div class='footer-navigation'>
				<h3>Links</h3>
				<?php wp_nav_menu( array('theme_location'   => 'footer-right'));?>
			</div>
		</div><!-- site-info -->
		

	</footer><!-- #colophon -->
	
	<?php wp_footer(); ?>
</div><!-- #page -->

</body>
</html>
