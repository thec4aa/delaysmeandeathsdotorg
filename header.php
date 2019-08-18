<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="//gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>

    <!-- Added 2018-09-15 - simpler -->
	<meta name="twitter:card" value="summary" />
	<meta name="twitter:url" value="http://delaysmeandeaths.org" />
	<meta name="twitter:title" value="DELAYS MEAN DEATHS" />
	<meta name="twitter:description" value="Learn how many have died while we wait for King County to follow through." />
	<meta name="twitter:image" value="https://delaysmeandeaths.org/wp-content/uploads/2018/09/dealysmeandeaths512.png" />
	<meta name="twitter:site" value="@yestoscs" />

</head>

	<body <?php body_class('is-loading'); ?> id="skrollr-body">

<a name="top-position"></a>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper wrapper-fluid wrapper-navbar wrapper-variable-lg " id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content',
		'core-understrap' ); ?></a>

		<nav class="navbar navbar-light site-navigation navbar-main" itemscope="itemscope" itemtype="//schema.org/SiteNavigationElement" data-0="position:relative;" data-top="position:fixed;top:0px;background-color:transparent;z-index:20;" >

			<div class="container" >

					<div class="navbar-header">

						<div class="row">

						 	<div class="col-lg-10 offset-lg-1 col-xs-12">

							<!-- <div class="span9"> -->

								<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
<!-- 								<button class="navbar-toggle navbar-toggler-right" type="button" data-toggle="modal" data-target="#ModalNav" data-backdrop="true" aria-expanded="false"
								        aria-label="Toggle navigation"></button> -->

								<!-- Your site title as branding in the menu -->
								<?php if ( ! has_custom_logo() ) { ?>
								<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
								   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
									<?php bloginfo( 'name' ); ?>
								</a>
								<?php } else {
									the_custom_logo();
									} 
								?><!-- end custom logo -->

							</div>

						</div>

					</div>
				
				
				
			</div> <!-- .container -->

		</nav><!-- .site-navigation -->

		<!-- The WordPress Off Canvas / Drop Down Menu comes here -->

		<?php get_template_part( 'global-templates/modal-nav'); ?>

	</div><!-- .wrapper-navbar end -->
