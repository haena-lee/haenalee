<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package haenalee
 */

?>

	</div><!-- #content -->
	<a href="#" class="scrollup">
		<!-- <i class="fas fa-angle-up fa-2x"></i> -->
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="-2 -2 32.634 32.634" style="enable-background:new 0 0 32.634 32.634;" xml:space="preserve" width="25px" height="25px">
<g>
	<path d="M16.317,32.634c-0.276,0-0.5-0.224-0.5-0.5V0.5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v31.634   C16.817,32.41,16.594,32.634,16.317,32.634z" fill="#ce4235"/>
	<path d="M28.852,13.536c-0.128,0-0.256-0.049-0.354-0.146L16.319,1.207L4.135,13.39c-0.195,0.195-0.512,0.195-0.707,0   s-0.195-0.512,0-0.707L15.966,0.146C16.059,0.053,16.186,0,16.319,0l0,0c0.133,0,0.26,0.053,0.354,0.146l12.533,12.536   c0.195,0.195,0.195,0.512,0,0.707C29.108,13.487,28.98,13.536,28.852,13.536z" fill="#ce4235"/>
	</a>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="copyright">
				<p>&copy; Haena Lee | Vancouver</p>
			</div><!-- .copyright -->

			<div class="social-links">
			<?php
			if (have_rows('social_media', 13)){
				while(have_rows('social_media', 13)){
					the_row();
					$social_media_name = get_sub_field('social_media_name');
					$social_media_link = get_sub_field('social_media_link');
					?>
					<a href="<?php echo $social_media_link ?>" target="_blank"><?php echo $social_media_name; ?></a>
				<?php
				}
			}
			?>
			</div><!-- .social-links -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
