<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product; ?>
<section class="breadcrumb-section set_bg"  style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb.jpg&quot;);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2><?php the_title(); ?></h2>
					<div class="breadcrumb__option">
						<a href="<?php echo site_url(); ?>">Home</a>
						<?php $category = $product->get_categories(); echo $category; ?>
						<span class="single_bread_prod"><?php woocommerce_template_single_title(); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php 

do_action('woocommerce_before_single_product');
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<!-- Product Details Section Begin -->
<section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
							<?php woocommerce_show_product_sale_flash(); ?>
                            <?php if ( has_post_thumbnail( $product->id ) ) {
								$attachment_ids[0] = get_post_thumbnail_id( $product->id );
								$attachment = wp_get_attachment_image_src($attachment_ids[0], 'full' ); ?>    
								<img src="<?php echo $attachment[0] ; ?>" class="card-image"  />
							<?php } ?>
								
                        </div>
						
							<div class="product__details__pic__slider owl-carousel">
								<?php 
								
								$attachment_ids = $product->get_gallery_image_ids(); 
								
								foreach($attachment_ids as $attach_id){?>
									<img src="<?php echo wp_get_attachment_url($attach_id); ?>" alt="">
								<?php }
								
								?>
							</div>
						
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <?php woocommerce_template_single_title(); ?>
                        <div class="product__details__rating">
							<?php woocommerce_template_single_rating(); ?>
                        </div>
                        <?php woocommerce_template_single_price(); ?>
                        <p><?php woocommerce_template_single_excerpt(); ?></p>
                        <div class="shop_cart"><?php woocommerce_template_single_add_to_cart(); ?>
                        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
                        <ul>
                            <li><b>Availability</b> <span><?php echo $product->get_stock_status(); ?></span></li>
                            <li><b>Shipping</b> <span><?php echo $product->get_shipping_class(); ?></span></li>
                            <li><b>Weight</b> <span><?php echo $product->get_weight(); ?></span></li>
							<div class="elfsight-app-a247f3c8-29ee-4a6a-bdd6-dc5d03f1a0c6"></div>
                            
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
</section>


<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
