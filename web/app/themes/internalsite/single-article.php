<?php get_header();?>

<div class="container">
    <div class="row">
        <div class="row align-items-end">
            <?php if (have_posts()) { ?>
            <?php while (have_posts()) { the_post() ?>
            <div class="card-title test" style="font-size: 18px;">
                <h1><?php the_title();?></h1>
            </div> 

            <div class="card-img-top" >
                <?php if ( has_post_thumbnail() ) { ?>
                <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="Card image cap">
                <?php } ?>  
            </div>
            <br/><br/>

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

            <div class="card-text">
                <?php } ?> <!--/while-->
            <?php } else { ?>

            Sorry We have no article that you are looking for!

            <?php } ?> <!--/if-->
            </div>
        </div> <!--/col-md-9-->
    </div>  <!--/row-->
</div><!--/container-->

<?php get_footer();?>