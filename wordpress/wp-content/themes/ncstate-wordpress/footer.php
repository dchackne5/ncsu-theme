<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package unite
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-info container">


		<div class='footer-widgets copyright'>

			<div class='row'>

			<div class='footer-widgets col-lg-3 col-md-6 col-xs-12 col-sm-12'>

				<?php if( is_active_sidebar('footer_left') ) dynamic_sidebar( 'footer_left' ); ?>

			</div> <!-- .footer-widgets -->

			<div class='footer-widgets col-lg-3 col-md-6 col-xs-12 col-sm-12'>

				<?php if( is_active_sidebar('footer_center-left') ) dynamic_sidebar( 'footer_center-left' ); ?>

			</div> <!-- .footer-widgets -->

			<div class='footer-widgets col-lg-3 col-md-6 col-xs-12 col-sm-12'>

				<?php if( is_active_sidebar('footer_center-right') ) dynamic_sidebar( 'footer_center-right' ); ?>

			</div> <!-- .footer-widgets -->

			<div class='footer-widgets col-lg-3 col-md-6 col-xs-12 col-sm-12'>

				<?php if( is_active_sidebar('footer_right') ) dynamic_sidebar( 'footer_right' ); ?>

			</div> <!-- .footer-widgets -->

			</div> <!-- .row -->

		</div> <!-- .footer-widgets -->



			<div class="row">
				<nav role="navigation" class="col-md-6">
					<?php unite_footer_links(); ?>
				</nav>

				<div class="copyright col-md-6">
					<?php do_action( 'unite_credits' ); ?>
					<?php echo of_get_option( 'custom_footer_text', 'unite' ); ?>
					<?php do_action( 'unite_footer' ); ?>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>