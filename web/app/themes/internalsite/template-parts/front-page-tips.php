<section class='tips' id='tips'>

<div class="container">
<?php
    $args = array(
        'cat'           => 3,
    );

    $my_posts = get_posts( $args );
    foreach ($my_posts as $key => $data) {
        $post_url = $data->guid;
    }
    ?>
    <h1 class="my-4 text-center text"><a href="<?php echo get_tag_link(3); ?>">Tips</a><h1>


            <?php
                    // hämta ut alla blogginlägg från kategorin USPs
                   $tips = new WP_Query([
                        'cat' => 3,					// hämta bara inlägg ifrån kategori med ID 5
                        'order_by' => 'post_title',	// sortera efter inläggets titel
                        'order' => 'ASC',			// sortera i bokstavsordning (A-Z)
                        'posts_per_page' => 3,		// hur många inlägg per sida vill vi visa
                    ]);
                    if ($tips->have_posts()) :
                        ?>

                  <div class="row">
                            <?php while ($tips->have_posts()) : ?>
                                    <?php $tips->the_post(); ?>

                    
                    <div class="col-sm-4 card text-center">

                            <?php the_post_thumbnail('tips-image');?>
                        <div class="ti">
                            <h3 class="homepage-post-title test"><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h3>
                            <?php the_excerpt(); ?>
                       </div>
                     </div>

                        <?php endwhile; ?>

			</div><!-- /.row -->

				<?php
			endif;
		?>


</div>
