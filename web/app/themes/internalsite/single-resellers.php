<section class=reseller>

<?php get_header();?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-8 card re-all">
            <?php if (have_posts()) { ?>
            <?php while (have_posts()) { the_post() ?>
                <?php get_template_part('content', 'single');?>
            <div class="card-title text-center test" style="font-size: 18px;">
                <h1><?php the_title();?></h1>
            </div>

            <div class="img-fluid" >
                <?php if ( has_post_thumbnail() ) { ?>
                <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="Card image cap" onclick="currentDiv">
                <?php } ?>  
            </div>
            <br/>
            <div class="row">
                    <?php 
                    $images = get_field('gallery');
                    $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

                    if( $images ): ?>
                        <div class="gallery">
                            <?php foreach( $images as $image ): ?>
                                   <a class="Responsive-image"> <?php echo wp_get_attachment_image( $image['ID'], $size ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
            </div><br/>

            <div class="card-text">
                <?php the_content(); ?>
                <?php get_template_part('partials/content', 'single');?> 
                <h1>Price:<?php echo get_field('price') . get_field('label'); ?></h1><br/>
                <button class= "btn btn-danger" href="#">Add to the Chart</button>
                <?php } ?> <!--/while-->
            <?php } else { ?>

            Sorry We have no article that you are looking for!

            <?php } ?> <!--/if-->
            </div>
        </div> <!--/col-md-9-->

       
       <div class="col-sm-12 col-sm-8 col-lg-4">
                    <div class="container-fluid blog-sidebar">
                                <div class="sitebar">
                                    <?php if(is_active_sidebar('custom-side-bar')):?>
                                    <?php dynamic_sidebar('custom-side-bar');?>
                                    <?php endif; ?>
                                </div>
                    </div>  <!--/row-->
                </div><!--/col-md-3-->
       

    </div>  <!--/row-->
</div><!--/container-->
</section>
<?php get_footer();?>

