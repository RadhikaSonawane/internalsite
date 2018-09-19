<?php   get_header();?>

<div class="container">
    <?php 
 
    get_template_part('flexible-content', 'flexible-content'); 
    get_template_part('comment', 'comment');/*Add Comment section*/ 
    $postid = get_the_ID();        
    $args = array('post_id' => $postid,);
    ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
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
        </div>
</div>

    <?php get_footer();?>