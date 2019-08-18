<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

    // Get the theme data
    $the_theme = wp_get_theme();

    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'popper-scripts', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), false);

    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    // This is to enqueue CountUp.js, but I figured out how to do it within gulp
    // wp_enqueue_script( 'countup', 'https://cdn.jsdelivr.net/npm/countup@1.8.2/dist/countUp.min.js'__FILE__, array(), $the_theme->get( 'Version' ), true );


}
/******************************************************************************************************
* FUNCTION TO CALCULATE DEATHS - Steve Lambert
******************************************************************************************************/

function getDayCount(){
    date_default_timezone_set('America/Los_Angeles');
    $dateTaskForce = strtotime('2016-09-15'); // date task force published
    $dateToday = strtotime("now"); // get the server time
    $diffSeconds = abs($dateToday - $dateTaskForce); // calculate diff in seconds
    $numberDays = $diffSeconds/86400;  // 86400 seconds in one day
    $numberDays = intval($numberDays); // convert to integer
    return $numberDays; // return
}


function getDeathCount(){                         
    $days = getDayCount(); // currently 427
    $deathToll = $days*0.9095890411; // should be 388, but I get 4270??
    $deathToll = intval($deathToll); // convert to integer
    return $deathToll; // print current death rate
    }  


/******************************************************************************************************
* Overwriting the parent themes post_nav function
******************************************************************************************************/
    function understrap_post_nav() {
        // // Don't print empty markup if there's nowhere to navigate.
        // $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
        // $next     = get_adjacent_post( false, '', false );

        // if ( ! $next && ! $previous ) {
        //     return;
        // }
        ?>

                <nav class="navigation post-navigation">
                    <div class="footer_death"><?php echo getDayCount(); ?> days and <span style="color:red"><?php echo getDeathCount(); ?> deaths</span>.</div> 
                    <h2 class="sr-only"><?php _e( 'Post navigation', 'core-understrap' ); ?></h2>
                    <div class="nav-links">
                        <?php

                            previous_post_link_plus( array(
                                    'order_by' => 'post_date',
                                    'order_2nd' => 'post_date',
                                    'meta_key' => '',
                                    'post_type' => '',
                                    'loop' => true,
                                    'end_post' => false,
                                    'thumb' => false,
                                    'max_length' => 0,
                                    'format' => '%link &raquo;',
                                    'link' => '%title',
                                    'date_format' => '',
                                    'tooltip' => '%title',
                                    'in_same_cat' => false,
                                    'in_same_tax' => false,
                                    'in_same_format' => false,
                                    'in_same_author' => false,
                                    'in_same_meta' => false,
                                    'ex_cats' => '',
                                    'ex_cats_method' => 'weak',
                                    'in_cats' => '',
                                    'ex_posts' => '',
                                    'in_posts' => '',
                                    'before' => '<span class="nav-previous float-left">People like <i class="fa"></i>',
                                    'after' => '</span>',
                                    'num_results' => 1,
                                    'return' => ''));

                            next_post_link_plus( array(
                                    'order_by' => 'post_date',
                                    'order_2nd' => 'post_date',
                                    'meta_key' => '',
                                    'post_type' => '',
                                    'loop' => true,
                                    'end_post' => false,
                                    'thumb' => false,
                                    'max_length' => 0,
                                    'format' => '%link &raquo;',
                                    'link' => '%title',
                                    'date_format' => '',
                                    'tooltip' => '%title',
                                    'in_same_cat' => false,
                                    'in_same_tax' => false,
                                    'in_same_format' => false,
                                    'in_same_author' => false,
                                    'in_same_meta' => false,
                                    'ex_cats' => '',
                                    'ex_cats_method' => 'weak',
                                    'in_cats' => '',
                                    'ex_posts' => '',
                                    'in_posts' => '',
                                    'before' => '<span class="nav-next float-right">And people like <i class="fa"></i>',
                                    'after' => '</span>',
                                    'num_results' => 1,
                                    'return' => ''
                                ));?>


                   
                    </div><!-- .nav-links -->
                </nav><!-- .navigation -->
        <?php
    }

/******************************************************************************************************
* Adds a custom read more link to all excerpts, manually or automatically generated
* @param string $post_excerpt Posts's excerpt.
* @return string
******************************************************************************************************/
    function all_excerpts_get_more_link( $post_excerpt ) {
        return $post_excerpt . ' [...]<p><a class="btn btn-lg btn-secondary understrap-read-more-link" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More...',
        'core-understrap' ) . '</a></p>';
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }



// ADD MENUS

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'understrap-child'),
    'footer_menu' => __( 'Secondary Menu', 'understrap-child' ),
 ) );

// ONLY HAVE TWO POST-FORMATS:
add_action( 'after_setup_theme', 'childtheme_formats', 11 );
function childtheme_formats(){
     add_theme_support( 'post-formats', array( 'standard', 'video' ) );
}

// SET OEMBED WIDTH:
if ( ! isset( $content_width ) ) $content_width = 940;

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

}
