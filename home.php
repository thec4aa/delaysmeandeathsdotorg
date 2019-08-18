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
    // get_sidebar( 'statichero' );
}
?>

<div class="wrapper" id="wrapper-home">

    <div class="container" id="content" tabindex="-1">

            <!-- Do the left sidebar check -->
            <div class="content-area" id="primary">
            
                <main class="site-main" id="main">

                    <h1 id="home-rec-date" class="fade-in">
                        Mayor Durkan, the King County Heroin Task Force recommendation for <a href="//yestoscs.org" target="_blank" >Safe Consumption Spaces</a> was published on September 15, 2016.
                        <br/>
                        <br />
                    </h1>
                    
                    <h1 id="home-today-date" class="fade-in">
                        Today is <span class="number-block"><?php echo date_i18n('F j, Y');?></span>.
                        <br />
                        <br />
                    </h1>
                        
                    <h1 id="home-dates-death" class="fade-in">
                        <div class="dates-death-sentence">That is <span class="number-block"><span id="daycount">0</span></span> days and <span style="color:red"><span class="number-block"><span id="deathcount">0</span></span> deaths</span>.</div>
                        </br>
                    </h1>

                    <div id="people-like-name" class="fade-in">
                        <?php
                        //Create WordPress Query with 'orderby' set to 'rand' (Random)
                        $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '1' ) );
                        // output the random post
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                            echo '<h1>Deaths of people like ';
                            the_title( sprintf( '<span class="memorial_name"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ));
                            echo '</a>.</span></br></br> </h1>';
                        endwhile;

                        // Reset Post Data
                        wp_reset_postdata();
                    
                                        
                        ?>
                    </div>

                </main><!-- #main -->

            <?php understrap_pagination(); ?>

            </div><!-- #primary -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
