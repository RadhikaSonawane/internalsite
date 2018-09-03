
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
    <div class="text-center" >
         <h1><?php single_cat_title(); ?></h1>
    </div>

                
                <h1 class="text-center">Our products</h1>

                        <div class="row resellers"> 
                                
                                <?php while ( have_posts() ) : the_post(); ?>
                                                
                                <div class="col-sm-4 card text-center">

                                        <div class="">
                                                <?php  if ( has_post_thumbnail() ) { ?>
                                                <img  class="card-img-top" style="margin-top:10px; width:100%; height:350px;" src="<?php the_post_thumbnail_url(); ?>" alt="Card image cap">
                                                <?php } ?>  
                                        </div>

                                        <div class="card-body">
                                                <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h3>
                                                <?php the_excerpt();?>
                                        </div>
                                                        
                                </div> <!--col-sm-4 card text-center-->
                                

                                <?php endwhile; // end of the loop. ?>

                        </div><!-- /.row -->
                         
                        
                <h1 class="text-center"> Find us</h1> 
                         <div class="row map card">    
                         <!-- Map Column -->
                                <div class="col-12">
                                   <!-- Embedded Google Map -->
                                        <!-- <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJK6sgElehU0YRuwnp8VqwmS4&key=AIzaSyCPTl_O2Y9HjQ2TN02K572kcDn59hTpcLM"></iframe>-->
                                                <img src='app/themes/internalsite/img/map.jpg' width="100%" height="400px" >
                                </div>
                         </div>


                        
                <h1 class="text-center">Resellers</h1>
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
        
