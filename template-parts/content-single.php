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
<div class="entry-content">
	<div class="project-intro-container">
		<div class="project-thumbnail">
			<?php the_post_thumbnail(); ?>
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
		</div><!-- .project-thumbnail -->
		
		
		
			<div class="summary-container">
				
				<?php
				// project title
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title">', '</h2>' );
				endif;
			?>
				<?php
				// short description of the project
				if(function_exists('get_field')){
					$short_description = get_field('short_description');
					echo '<div class="short-description">';
						echo '<p>'. $short_description .'</p>';
					echo '</div>';
				}

				if(is_single()){
					?>
					<div class="tools-used">
						<!-- <h4>Tools Used</h4> -->
						<?php
						// display the taxonomy terms for tools-used
						$terms = get_the_terms($post->ID, 'tools-used');
						if($terms && !is_wp_error($terms)){
							$tools = array();
							?>
							<div class="tool-container">
								<?php
								foreach ($terms as $term){
									$tools[] = $term->name;
								}
								$tools = join('</p><p class="each-tool">', $tools);
								?>
								<p class="each-tool"><?php echo $tools; ?></p>
							</div><!-- .tool-container -->
							<?php
						}
						?>
					</div><!-- .tools-used -->	
	
					<div class="long-description">
						<?php
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
						?>
					</div><!-- .long-description -->
			</div><!-- .summary-container -->
		</div><!-- .project-intro-container -->		
					<?php
			
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
							?>
							<h4><?php echo $title; ?></h4>
							<?php
						} elseif(get_row_layout() == 'text_content'){
							$content = get_sub_field('content');
							?>
							<p><?php echo $content; ?></p>;
							<?php
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
