
<section class="about" id="about">

<!-- Page Content -->
<div class="container text-center">


<?php
        // hämta ut alla blogginlägg från kategorin about
        $about = new WP_Query([
        'cat' => '5',
        'order_by' => 'post_title',	// sortera efter inläggets titel
        'order' => 'ASC',			// sortera i bokstavsordning (A-Z)
        'posts_per_page' => 1,		// hur många inlägg per sida vill vi visa
                        ]);

      if ($about->have_posts()) :
  ?>

    <div class="row ">
                <br/><br/>
                        <?php while ($about->have_posts()) : ?>
                        <?php $about->the_post(); ?>

                        <div class="">
                           <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                           <?php the_content(); ?>
                           <br/><br/>
                        </div>

    </div><!-- /.row -->

                        <?php endwhile; ?>
   </div><!-- /.container -->

         <?php
                 endif;
        ?>

</section>
