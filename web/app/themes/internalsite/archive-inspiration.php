<?php
/* 
*Template Name: Archives
*
*learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
*
*@package bootstrap
*/
get_header(); 
?>
<div class="wrapper">

    <div id="primary" class="site-content">
        <div id="content" role="main">
            <div class="row">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-4 card text-center test">               
                        <h1 class="entry-title test"><?php the_title(); ?></h1>

                        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        
                        <div class="entry-content">
                        
                                <?php the_content(); ?>
                                
                                /* Custom Archives Functions Go Below this line */
                                
                                
                                
                                /* Custom Archives Functions Go Above this line */
                        
                        </div><!-- .entry-content -->
                    </div><!-- .col-md-4 card text-center -->
        </div><!--.row-->

            
            <?php endwhile; // end of the loop. ?>
        
        </div><!-- #content -->
    </div><!-- #primary -->
</div><!--.wrapper-->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>