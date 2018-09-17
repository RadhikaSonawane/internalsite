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

<div class="container blog block">
	<h1><?php single_cat_title(); ?></h1>
	
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="row">
		<div class=" col-md-4 image-fluid thum-img  ">
		 
			<?php  if ( has_post_thumbnail() ) { ?>
			<img  class="card-img-top rounded-circle" style="margin-top:10px; width:100%; height:350px;" src="<?php the_post_thumbnail_url(); ?>" alt="Card image cap">
			<?php } ?>  
		</div>

		<div class=" col-md-7 card text text-center">
			<h3 class="card-title test">
				<a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a>
			</h3>
			<?php the_excerpt();?>
			
		</div>
		</div>
		<?php endwhile; // end of the loop. ?>
	<!-- /.row -->
</div> <!-- container-->


<?php get_footer(); ?>
