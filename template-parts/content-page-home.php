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
			// store field content in variabes
			$home_cta_text = get_field('home_cta_text');
			$home_cta_link = get_field('home_cta_link');
			// check that ACFs are filled out
			if(get_field('home_cta_text') && get_field('home_cta_link')){
				?>
				<p class="home-cta-text"><a href="<?php echo $home_cta_link; ?>"><?php echo $home_cta_text; ?></a></p>
				<?php
			}
		}
		?>
				
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
