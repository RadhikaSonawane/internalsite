<?php get_header();?>

<div class="container"> 
    <div class="row">
        <div class="col-sm-12 col-lg-8 card blog-con">
            <?php if (have_posts()) { ?>
            <?php while (have_posts()) { the_post() ?>
            <div class="card-title text-center test" style="font-size: 18px;">
                <h1><?php the_title();?></h1>
            </div> 

             <!-- Add image-->
            <div class="img-fluid" >
                <?php if ( has_post_thumbnail() ) { ?>
                <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="Card image cap">
                <?php } ?>  
            </div>
            <br/>

                      <?php get_template_part('flexible-content', 'flexible-content');?>
             <!-- Add Content -->
            <div class="card-text">
                    <?php the_content(); ?> 
                    <?php $postid = get_the_ID();?>
                    
                    
              <!-- Add Comment section -->          
                <?php get_template_part('comment', 'comment');?>
                <?php $args = array(
                    'post_id' => $postid,
                );?>

                        <div class= "cantainer">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <?php
                                        $comments = get_comments($args);?>
                                            <div class="post-description">     
                                                <?php
                                                foreach ($comments as $comment) {
                                                    echo "<div class='col-md-12 card' style='margin:5px; background-color:#f5f2ed;'>";
                                                    echo $comment->comment_author;
                                                    echo "<br>";
                                                    echo $comment->comment_content;
                                                    echo "<br>";
                                                    echo $comment->comment_date;
                                                    echo "<br/>";
                                                    echo "</div>";
                                                };
                                                ?>
                                            </div><!--/post-description-->
                                    </div><!--/col-sm-8-->
                                </div><!--/row-->
                        </div><!--/cantainer-->


                        <?php } ?> <!--/while-->
                            <?php } else { ?>

                                Sorry We have no article that you are looking for!

                            <?php } ?> <!--/if-->
            </div><!--/card-text-->
        </div> <!--/col-md-9-->


        <!-- Add sidebar-->                       
        <div class="col-sm-12 col-sm-8 col-lg-4">
                    <div class="container-fluid blog-sidebar">
                                <div class="sitebar">
                                    <?php if(is_active_sidebar('custom-side-bar')):?>
                                    <?php dynamic_sidebar('custom-side-bar');?>
                                    <?php endif; ?>
                                </div>
                    </div>  <!--/row-->
                </div><!--/col-md-4-->
        
    </div>  <!--/row-->
</div><!--/container-->

<?php get_footer();?>