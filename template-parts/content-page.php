<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package haenalee
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header-about">
		<?php the_title(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content-about">
		<?php
		the_content();
		?>
		<div class="about-picture">
			<?php the_post_thumbnail('haenalee-small-med'); ?>
		</div><!-- .about-picture -->
		<?php

		// check that ACF exists
		if(function_exists('get_field')){
			// parent repeater
			if(have_rows('about_me')){
				while(have_rows('about_me')){
					the_row();
					?>
					<div class="about-container">
					<?php
					// store each sub-field in a variable
						$about_title = get_sub_field('about_title');
						?>
						<h4><?php echo $about_title; ?></h4>
						<?php
						// check for rows in child repeater
						if(have_rows('about_list')){
							while(have_rows('about_list')){
								the_row();
								?>
								<ul>
								<?php
								if(get_sub_field('qualification')){
									?>
									<li><i class="fas fa-angle-right fa-sm"> </i> <?php echo the_sub_field('qualification'); ?></li>
									<?php
								}
								?>
								</ul>
								<?php
							}
						}
					?>
					</div><!-- .about-container -->
					<?php
				}
			}
		}

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
