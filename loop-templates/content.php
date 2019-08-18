<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="row">

			<div class="col-md-12 wrapper-no-padding">
			
				<?php if ( has_post_thumbnail() ) : ?>
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large') ); ?>

						<div class="entry-image-hero" style="background-image:url(<?php echo $url ?>);">

							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

								<span class="overlay"></span>

							</a>

						</div>

				<?php endif; ?>

			</div>

		</div>

		<div class="row wrapper-variable-lg">

			<header class="col-md-4 offset-md-1 entry-header">

				<?php the_title( sprintf( '<h2 class="entry-title display-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta">

						<?php understrap_posted_on(); ?>

						<?php understrap_entry_footer(); ?>

					</div><!-- .entry-meta -->

				<?php endif; ?>

			</header><!-- .entry-header -->



			<div class="col-md-6 entry-content">
				<?php
				the_excerpt();
				?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'core-understrap' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

		</div>

	</article><!-- #post-## -->

