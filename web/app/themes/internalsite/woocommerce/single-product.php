<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-7 col-lg-7 entry-summary">
				<?php
				get_header( 'shop' ); ?>
					<?php
						/**
						 * woocommerce_before_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						 * @hooked woocommerce_breadcrumb - 20
						 */
						do_action( 'woocommerce_before_main_content' );
					?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'single-product' ); ?>

						<?php endwhile; // end of the loop. ?>

					<?php
						/**
						 * woocommerce_after_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
					?>
					<h3>Related Product</h3>
				<div class="row">
						<?php
						global $product;
						$id = $product->get_id();
						?>
						<?php $related_products = wc_get_related_products($id);
						foreach ($related_products as $related_product ) { ?>
						<div class="related_product col-lg-4 col-md-4 col-sm-12">
							<img style="width:200px; height:200px;" src="<?php echo get_the_post_thumbnail_url( $related_product );  ?>" alt="">
							<a href="<?php echo get_permalink($related_product); ?>">
							<h3><?php echo get_the_title($related_product);?><h3>
							</a>
							<p><?php $related_product_object = wc_get_product( $related_product );
							echo $related_product_object->get_price_html(); ?></P>
							<?php echo "<br>";?>
							</div>	
							<?php
							}
							?>	
						</div> 						
				</div>
				<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					//do_action( 'woocommerce_sidebar' );?>
					<div class="col-sm-12 col-md-4 col-lg-4 sidebar text-center">
						
									<?php if(is_active_sidebar('sidebar-2')):?>
									<?php dynamic_sidebar('sidebar-2');?>
									<?php endif; ?>
						
					</div><!--/col-md-4-->				
	</div>													
</div>
<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
