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
		// display email ACF
		if(function_exists('get_field')){
			if(get_field('email_me') && get_field('contact_email')){
				$email_me = get_field('email_me');
				$email_link = get_field('contact_email');
				?>
				<p><?php echo $email_me; ?><a href="mailto:<?php echo $email_link; ?>"><?php echo $email_link; ?></a></p>
				<?php
			}
		}

		?>

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
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
