<?php get_header();?>

    <div class="container">
        <div class="row">
            <div class="postContent col-md-9">
                
                <?php if (have_posts()) { ?>
                    <!--pagination-->
                    <?php get_template_part('partials/pagination');?>
                        <?php while (have_posts()) { the_post() ?>
                            <div>

                                <?php get_template_part('partials/content', get_post_format());?> 
                            </div>
                        <?php } ?> <!--/while-->
                   <!--pagination-->
                         <?php get_template_part('partials/pagination');?>
                            <?php //the_pots_pagination();?> 
                            
                              
                   <?php }else { ?>

                   Sorry We have no article that you are looking for!

                <?php } ?> <!--/if-->
            </div> <!--/col-md-9-->
            <div class="col-md-3">
                <div class="sitebar">
                    
                    <?php get_sidebar();?>
                </div>
            </div>
        </div> <!--/row-->
    </div><!--/container-->

<?php get_footer();?>