
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

<div class="container reseller-archive ">
    <div class="text-center test" >
         <h1><?php single_cat_title(); ?></h1>
    </div>

                
                <h1 class="text-center h-tag">Our products</h1>

                        <div class="row resellers"> 
                                
                                <?php while ( have_posts() ) : the_post(); ?>
                                                
                                <div class="col-sm-4 card text-center">

                                        <div class="">
                                                <?php  if ( has_post_thumbnail() ) { ?>
                                                <img  class="card-img-top" style="margin-top:10px; width:100%; height:350px;" src="<?php the_post_thumbnail_url(); ?>" alt="Card image cap">
                                                <?php } ?>  
                                        </div>

                                        <div class="re">
                                                <h3 class="card-title test"><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h3>
                                                <?php the_excerpt();?>
                                        </div>
                                                        
                                </div> <!--col-sm-4 card text-center-->
                                

                                <?php endwhile; // end of the loop. ?>

                        </div><!-- /.row -->
                         
                        
                <h1 class="text-center h-tag"> Find us</h1> 
                         <div class="row ">    
                         <!-- Map Column -->
                                <div class="col-12">
                                   <!-- Embedded Google Map -->
                                   <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d36080.48374909171!2d12.969378520378813!3d55.584081694594886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sikea+world+map!5e0!3m2!1sen!2sse!4v1536141812413" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                               
                                </div>
                         </div>


                        
                <h1 class="text-center h-tag">Resellers</h1>
                        <div class="row logo"> 
                                
                                <div class= "card col-sm-4">
                                        <a class="" href="#">  <img src='app/themes/internalsite/img/l.jpeg' width="80" height="80"> Dummy Logo</a>   
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#"> <img src='app/themes/internalsite/img/l1.png' width="80" height="80"> Company Name</a>
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#"><img src='app/themes/internalsite/img/l2.png' width="80" height="80"> YoYo Gimi</a> 
                                </div>

                                <div class= "card col-sm-4">
                                         <a class="" href="#">  <img src='app/themes/internalsite/img/l.jpeg' width="80" height="80"> My Dummy Company</a>   
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#"> <img src='app/themes/internalsite/img/l3.png' width="80" height="80"> JOJO hoo</a>
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#"><img src='app/themes/internalsite/img/l4.png' width="80" height="80"> Zingalalaaa</a> 
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#">  <img src='app/themes/internalsite/img/l5.png' width="80" height="80"> The Best Dummy</a>   
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#"> <img src='app/themes/internalsite/img/l6.jpeg' width="80" height="80"> Ping Pong</a>
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#"> <img src='app/themes/internalsite/img/l7.png' width="80" height="80"> JOJO hoo</a>
                                </div>

                                <div class= "card col-sm-4">
                                <a class="" href="#"><img src='app/themes/internalsite/img/l8.png' width="80" height="80"> Zingalalaaa</a> 
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#">  <img src='app/themes/internalsite/img/l9.jpeg' width="80" height="80"> Best Dummy</a>   
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#"> <img src='app/themes/internalsite/img/l10.jpeg' width="80" height="80"> Ding Dong</a>
                                </div>
                                <div class= "card col-sm-4">
                                        <a class="" href="#">  <img src='app/themes/internalsite/img/l11.jpeg' width="80" height="80"> Dummy Bummy </a>   
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#"> <img src='app/themes/internalsite/img/L11.png' width="80" height="80"> Chit Chat</a>
                                </div>

                                <div class= "card col-sm-4">
                                        <a class="" href="#"> <img src='app/themes/internalsite/img/l13.png' width="80" height="80"> Beat Boot</a>
                                </div>
                        

                 </div>


</div> <!-- container-->

                        
<?php get_footer(); ?>
        
