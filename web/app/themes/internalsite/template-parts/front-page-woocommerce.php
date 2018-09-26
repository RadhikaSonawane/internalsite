<section class="woocommerce" id="woocommerce">
<h1 class="my-4 text-center text"><a  href="<?php echo get_page_link(211); ?>"><?php echo get_the_title(211);?></a><h1>
    <div class="container">
        <div class="row">
            <?php
            // Setup your custom query
            $args = array( 'post_type'      => 'product',
            'posts_per_page' => 3,
            );
            $loop = new WP_Query( $args );?>
            <?php 
            while ( $loop->have_posts() ) : $loop->the_post(); 
            ?>
            <?php 
            $product = wc_get_product( get_the_ID() );
            ?>
            <div class="col-sm-4 card text-center internal">
                <?php 
                the_post_thumbnail();
                ?>
                <h3>
                <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
                <?php 
                the_title(); 
                ?>  
                </a>
                <h3>
                <li>
                <?php 
                echo $product->get_price_html(); 
                ?>
                <li>
            </div>  
                <?php 
                endwhile; wp_reset_query(); // Remember to reset 
                ?>  
            </div>
    </div>
</section>