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

	<div class="project-thumbnail">
		<a href="<?php echo the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
	</div><!-- .project-thumbnail -->
	
	
	<?php
		// display ACF live site link
		if(function_exists('get_field')){
			if(get_field('live_site_link')){
				$live_site_link = get_field('live_site_link');
				?>
				<p class="view-live"><a href="<?php echo $live_site_link['url'];?>" target="<?php echo $live_site_link['target'] ?>"><?php echo $live_site_link['title']; ?></a></p>
				<?php
			}
		}
	?>

	<?php
		// project title
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title">', '</h2>' );
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
			
			// display ACF flexible content
			if(function_exists('get_field')){
				if(have_rows('portfolio_content')){
					?>
					<div class="portfolio-content-block">	
					<?php
					while(have_rows('portfolio_content')){
						the_row();
						if(get_row_layout() == 'text_title'){
							$title = get_sub_field('title');
							echo '<h4>'. $title .'</h4>';
						} elseif(get_row_layout() == 'text_content'){
							$content = get_sub_field('content');
							echo '<p>'. $content .'</p>';
						} elseif(get_row_layout() == 'images'){
							$images = get_sub_field('image_gallery');
							if($images){
								foreach($images as $image){
									echo '<img src="'. $image['url'] .'" alt="'. $image['alt'] .'">';
								}
							}
						} // end the last elseif
					} // end of while loop
					?>
					</div> <!-- end of portfolio-content-block -->
					<?php
				}
			}

			// ACF repeater field to add a variety of content to portfolio page
			// check that ACF exists
			// if(function_exists('get_field')){
			// 	if(have_rows('project_detail')){
			// 		while(have_rows('project_detail')){
			// 			the_row();
			// 			// store each sub-field in a variable
			// 			$images = get_sub_field('project_detail_images');
			// 			$title = get_sub_field('project_detail_name');
			// 			$content = get_sub_field('project_detail_description');
			// 			echo '<div class="project-detail-section">';
			// 				echo '<h3>'. $title .'</h3>';
			// 				echo '<p>'. $content .'</p>';
			// 				if($images){
			// 					foreach($images as $image){
			// 						echo '<img src="'. $image['url'] .'" alt="'. $image['alt'] .'">';
			// 					}
			// 				}
			// 			echo '</div>';
			// 		}
			// 	}
			// }
	
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'haenalee' ),
				'after'  => '</div>',
			) );
		}

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
