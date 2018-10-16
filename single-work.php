<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package haenalee
 */

get_header();
?>

	<div id="primary" class="single-work-container">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );

			?>
			<div class="related-projects">
				<?php
				//he_post_navigation();
				?>
			</div><!-- .related-projects -->
			<?php

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
