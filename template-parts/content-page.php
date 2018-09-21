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
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php haenalee_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'haenalee' ),
			'after'  => '</div>',
		) );

		// check that ACF exists
		if(function_exists('get_field')){
			// parent repeater
			if(have_rows('about_me')){
				while(have_rows('about_me')){
					the_row();
					echo '<div class="about-section">';
					// store each sub-field in a variable
						$about_title = get_sub_field('about_title');
						echo '<h4>'. $about_title .'</h4>';
						// check for rows in child repeater
						if(have_rows('about_list')){
							while(have_rows('about_list')){
								the_row();
								echo '<ul>';
									if(get_sub_field('qualification')){
										echo '<li>';
											the_sub_field('qualification');
										echo '</li>';
									}
								echo '</ul>';
							}
						}
					echo '</div>';
				}
			}
		}

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
