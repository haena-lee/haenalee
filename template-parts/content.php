<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package haenalee
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	</header><!-- .entry-header -->

	<?php haenalee_post_thumbnail(); ?>
	
	<?php
		// project title
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
	?>
	<div class="entry-content">
		<?php

		if(is_single()){
			// display the taxonomy terms for tools-used
			$terms = get_the_term_list($post->ID, 'tools-used', 'Tools used: ', ' | ', '');
			$terms = strip_tags($terms);
			echo '<p>'. $terms .'</p>';

			// display content
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'haenalee' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			
			// check that ACF exists
			if(function_exists('get_field')){
				if(have_rows('project_detail')){
					while(have_rows('project_detail')){
						the_row();
						// store each sub-field in a variable
						$images = get_sub_field('project_detail_images');
						$title = get_sub_field('project_detail_name');
						$content = get_sub_field('project_detail_description');
						echo '<div class="project-detail-section">';
							echo '<h3>'. $title .'</h3>';
							echo '<p>'. $content .'</p>';
							if($images){
								foreach($images as $image){
									echo '<img src="'. $image['url'] .'" alt="'. $image['alt'] .'">';
								}
							}
						echo '</div>';
					}
				}
			}
	
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'haenalee' ),
				'after'  => '</div>',
			) );
		}

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
