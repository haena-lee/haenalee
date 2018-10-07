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

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="copyright">
				<p>&copy; Haena Lee | 2018</p>
			</div><!-- .copyright -->
			<!-- <div class="social-links">
				<a href="https://www.instagram.com/haenaleedesign/" target="_blank">Instagram</a>
				<a href="https://twitter.com/haenaleedesign" target="_blank">Twitter</a>
				<a href="https://www.linkedin.com/in/haena-lee-profile/" target="_blank">LinkedIn</a>
			</div> .social-links -->

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
