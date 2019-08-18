<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */
$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'large') );
?>

<!-- content-single.php -->

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="container" id="content" tabindex="-1">

		<?php if (has_post_format('video')) : ?>


<!-- 				<?php
				// Get the video URL and put it in the $video variable
				$videoID = get_post_meta($post->ID, 'memorial-vimeo-link', true);
				// Check if there is in fact a video URL
				if ($videoID) {
					echo '<div class="videoContainer">';
					// Echo the embed code via oEmbed
					echo wp_oembed_get( 'https://vimeo.com/' . $videoID ); 
					echo '</div>';
				}
				?> -->

				<?php
				// Get the video URL and put it in the $video variable
				$videoID = get_post_meta($post->ID, 'memorial-vimeo-link', true);

				if ($videoID) {
					echo '<div class="videoContainer">';
					// Echo the embed code via oEmbed
					echo '<iframe src="https://player.vimeo.com/video/' . $videoID . '?title=0&byline=0&portrait=0" width="940" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'; 
					echo '</div>';
				} ?>
				


			
			
		<?php endif; ?>

		<?php if ( has_post_thumbnail() ) : ?>

			<div class="row">	

				<div class="col-md-12 wrapper-no-padding">

					<div class="entry-image-hero" style="background-image:url(<?php echo $feat_image_url ?>);">

					</div>

				</div>

			</div>

		<?php endif; ?>

	</div>

	<div class="container">

		<div class="row wrapper-variable-lg">

			<header class="col-md-4 offset-md-1">

			<div class="entry-header">

				<?php the_title( sprintf( '<h1 class="entry-title display-4">', esc_url( get_permalink() ) ),'</h1>' ); ?>

					<div class="entry-meta">
						
					<!-- Showing the value from custom field "meta-description" -->	
					<?php $meta_value = get_post_meta( $post->ID, 'meta-description', true ); 
			            if  (!empty( $meta_value )) {
			            	echo '<div class="meta-description">' . $meta_value . '</div>';}
			            else {} ?>

			           
						
						<?php if ( 'post' == get_post_type() ) : ?>
			
							
							<?php understrap_entry_footer(); ?>
							
						<?php endif; ?>

					</div><!-- .entry-meta -->


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

	</div>

	</article><!-- #post-## -->

	<div class="container">


		<?php if (! is_page() ): ?>

			<div class="row">

				<div class="col-md-10 offset-md-1">

					<?php understrap_post_nav(); ?>

				</div>

			</div>

		<?php endif; ?>




		<?php if ( comments_open() ): ?>



								<div class="row wrapper-variable-lg">

									<?php if (is_single() ): ?>

									<div class="col-md-4 offset-md-1">

										<?php /* get_template_part( 'global-templates/author-loop' );*/ ?>

									</div>

									<?php endif; ?>

									<div class="<?php if (is_single() ): ?>col-md-6<?php else : ?>col-md-10 offset-md-1<?php endif; ?>">
										<?php
										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
										?>
									</div>

								</div>


		<?php endif; ?>

<!-- end content-single.php-->