<section class='inspiration' id='inspiration'>

<div class="container">
<?php
    $args = array(
        'cat'           => 2,
    );

    $my_posts = get_posts( $args );
    foreach ($my_posts as $key => $data) {
        $post_url = $data->guid;
    }
    ?>
    <h1 class="my-4 text-center test"><a href="<?php echo get_tag_link(2); ?>">Inspiration</a><h1>


            <?php
                    // hämta ut alla blogginlägg från kategorin USPs
                   $inspiration = new WP_Query([
                        'cat' => 2,					// hämta bara inlägg ifrån kategori med ID 2
                        'order_by' => 'post_title',	// sortera efter inläggets titel
                        'order' => 'ASC',			// sortera i bokstavsordning (A-Z)
                        'posts_per_page' => 3,		// hur många inlägg per sida vill vi visa
                    ]);
                    if ($inspiration->have_posts()) :
                        ?>

                  <div class="row">
                            <?php while ($inspiration->have_posts()) : ?>
                                    <?php $inspiration->the_post(); ?>

                    <div class="col-sm-4 card text-center">

                            <?php the_post_thumbnail('inpiration-image');?>
                        <div class="card in">
                            <h3 class="homepage-post-title test"><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h3>
                            <?php the_excerpt(); ?>
                    </div>
    
                     </div>

                        <?php endwhile; ?>

			</div><!-- /.row -->

				<?php
			endif;
		?>


</div><!-- /.container -->
