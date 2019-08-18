<?php
/**
 * The template for displaying single pages or articles.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();
?>

<div class="wrapper" id="wrapper-single">

		<div class="content-area" id="primary">
			
			<main class="site-main" id="main">

					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'loop-templates/content', 'single', get_post_format() );
							?>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

				<?php understrap_pagination(); ?>

				</div><!-- Closes .container from loop -->

			</main><!-- #main -->

		</div><!-- #primary -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>