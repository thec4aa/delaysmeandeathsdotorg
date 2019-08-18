<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
$the_theme = wp_get_theme();
?>

	<div class="wrapper" id="wrapper-footer">

		<div class="container">

			<div class="row">

				<div class="col-md-4 offset-md-1">

					<?php dynamic_sidebar( 'footerleft' ); ?>

				</div>

				<div class="col-md-6">

					<?php dynamic_sidebar( 'footerright' ); ?>
					
				</div>

			</div>

			<div class="row">

				<div class="col-md-12">


					

						<div class="footer-menu wrapper-variable-md">
							<nav>
							    <?php
							        wp_nav_menu( array('container_class' => 'menu-footer',
							        'theme_location' => 'footer_menu') ); ?>
							</nav>



						</div>

						<div class="site-info  wrapper-variable-md">

						Safe Consumption Spaces Save Lives: <a href="//yestoscs.org">yestoscs.org</a>

						
						</br>
							

						</div><!-- .site-info -->

					</footer><!-- #colophon -->

				</div><!-- col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- wrapper end -->

<?php if ( !is_front_page() ) : ?> 	
<a href="#top-position" class="up-link" data-0="opacity:0;" data-200="opacity:1"><i class="fa fa-angle-up fa-3x" aria-hidden="true"></i></a>
<?php endif; ?>

</div><!-- #page end -->



<?php wp_footer(); ?>

<div id="bg"></div>

<!-- <script type="text/javascript">
var s = skrollr.init();


   //The options (second parameter) are all optional. The values shown are the default values.
skrollr.menu.init(s, {});
    </script> -->

<script>
jQuery(document).ready(function(){

		// scroll body to 0px on click
		jQuery('a.up-link').click(function () {
			jQuery('html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
	});


</script>

</body>

</html>
