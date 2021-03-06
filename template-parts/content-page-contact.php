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
	<header class="entry-header-contact">
		<?php // the_title(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content-contact">
		<div class="contact-text">
			<?php
			the_content();
			// display email ACF
			if(function_exists('get_field')){
				if(get_field('email_me') && get_field('contact_email')){
					$email_me = get_field('email_me');
					$email_link = get_field('contact_email');
					?>
					<div class="contact-info">
						<p><?php echo $email_me; ?><a href="mailto:<?php echo $email_link; ?>"><?php echo $email_link; ?></a></p>
					</div><!-- .contact-info -->
				<?php
				}
			}
			
			// display large social media
			?>
			<div class="large-social-media">
				<?php
				if(function_exists('get_field')){
					if(have_rows('social_media')){
						while(have_rows('social_media')){
							the_row();
							$social_media_name = get_sub_field('social_media_name');
							$social_media_link = get_sub_field('social_media_link');
							?>
							<a href="<?php echo $social_media_link ?>" target="_blank"><?php echo $social_media_name; ?></a>
							<?php
						}
					}
				}

				?>
			</div><!-- .large-social-media -->
		</div><!-- .contact-text -->

		<?php
		// display contact form
		if(function_exists('get_field')){
			if(get_field('contact_form')){
				$contact_form = get_field('contact_form');
				?>
				<div class="contact-form"><?php echo $contact_form; ?></div>
				<?php
			}
		}

		?>
	</div><!-- .entry-content-contact -->

</article><!-- #post-<?php the_ID(); ?> -->
