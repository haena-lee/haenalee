<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package haenalee
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main work-page">

		<?php if ( have_posts() ) : ?>



			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				?>
				<div class="project-container">
					<?php
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

					// display ACF for project description and its link
					if(function_exists('get_field')){
						$short_description = get_field('short_description');
						echo '<div class="description-container">';
							echo '<div class="short-description">';
								echo '<p>'. $short_description .'</p>';
							echo '</div>';
							
							$project_link = get_field('project_link');
							echo '<div class="project-link">';
								echo '<a href="'. $project_link .'">View Project</a>';
							echo '</div>';
						echo '</div>'; // end of description-container
					}

					?>
				</div><!-- .project-container -->
				<?php

				


			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main .work-page -->
	</div><!-- #primary -->

<?php
get_footer();
