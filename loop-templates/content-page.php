<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<?php $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large') ); ?>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="row">	
				<div class="col-md-12 wrapper-no-padding">
					
					<div class="entry-image-hero" style="background-image:url(<?php echo $feat_image_url ?>);">
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="row wrapper-variable-lg">

			<header class="col-md-4 offset-md-1 entry-header">

				<?php the_title( sprintf( '<h1 class="entry-title display-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h1>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta">
						<?php understrap_posted_on(); ?>

						<?php understrap_entry_footer(); ?>
					</div><!-- .entry-meta -->

				<?php endif; ?>

				<?php get_sidebar( 'left' ); ?>

			</header><!-- .entry-header -->

			<div class="col-md-6 entry-content">

				<?php
				the_content();
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


