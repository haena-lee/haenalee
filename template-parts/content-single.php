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
				<div class="left-block">
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
					</div><!-- .left-block -->
					<div class="right-block">
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
					</div><!-- .right-block -->
			</div><!-- .summary-container -->
		</div><!-- .project-intro-container -->		
					<?php
			
			// display ACF flexible content
			if(function_exists('get_field')){
				if(have_rows('portfolio_content')){
					?>
					<div class="portfolio-content-background">
						<div class="portfolio-content">	
					<?php
					while(have_rows('portfolio_content')){
						?>
						<?php
						the_row();
						if(get_row_layout() == 'text_title'){
							?>
							<?php
							$title = get_sub_field('title');
							?>
							<h4><?php echo $title; ?></h4>
							<?php
						} elseif(get_row_layout() == 'text_content'){
							$content = get_sub_field('content');
							?>
							<p><?php echo $content; ?></p>
							<?php
						} elseif(get_row_layout() == 'images'){
							?>
							<?php
							$images = get_sub_field('image_gallery');
							if($images){
								foreach($images as $image){
									?>
									<img class="screenshot shadow" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></img>
									<?php
								}
							}
							?>
							<?php
						} elseif(get_row_layout() == "small_images"){
							$small_images = get_sub_field('small_image_gallery');
							if($small_images){
								?>
								<div class="responsive-content">
									<?php
								foreach($small_images as $small_image){
									?>
									<div class="each-small-image">
										<img class="small-image shadow" src="<?php echo $small_image['url']; ?>" alt="<?php echo $small_image['alt']; ?>"></img>
									</div><!-- .each-small-image -->
									<?php
								}
								?>
								</div><!-- .responsive-content -->
								<?php
							}
						} elseif(get_row_layout() == 'colours'){
							if(have_rows('colour_palette')){
								?>
								<div class="colour-palette-container">
								<?php
								while(have_rows('colour_palette')){
									the_row();
									$hex_code = get_sub_field('hex_code');
									$colour_image = get_sub_field('colour_circle');
									?>
										<div class="each-palette">
											<p class="hex"><?php echo $hex_code; ?></p>
											<img class="colour-circle" src="<?php echo $colour_image ?>"></img>
										</div><!-- .each-palette -->
										<?php
								}
								?>
								</div><!-- .colour-palette-container -->
								<?php
							}
						}// end the last elseif
						?>
						<?php
					} // end of while loop
					?>
					
					<div class="related-work">
						<div class="previous">
						<?php
						// display previous post link and font awesome arrow if previous post exists
						if(get_previous_post()){
							echo '<i class="fas fa-arrow-left fa-lg"></i>';
							?>

							<?php
							previous_post_link('%link');
						};
						?>
						</div><!-- .previous -->
						<div class="next">
						<?php
						// display next post link and font awesome arrow if next post exists
						if(get_next_post()){
							next_post_link('%link');
							echo '<i class="fas fa-arrow-right fa-lg"></i>';
						}
						?>
						</div><!-- .next -->
					</div><!-- .related-work -->
					</div> <!-- .portfolio-content -->

					</div> <!-- end of portfolio-content-background -->
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
