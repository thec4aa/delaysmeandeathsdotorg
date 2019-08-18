<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();
if ( is_front_page() && is_home() ) {
	get_sidebar( 'statichero' );
}
?>

<div class="wrapper" id="wrapper-home">

	<div class="container" id="content" tabindex="-1">

			<!-- Do the left sidebar check -->
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
								get_template_part( 'loop-templates/content', get_post_format() );
							?>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

				</main><!-- #main -->

			<?php understrap_pagination(); ?>

			</div><!-- #primary -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
