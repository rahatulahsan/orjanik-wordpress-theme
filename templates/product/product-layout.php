<?php global $product; ?>
<div class="product__item__pic set_bg" style="background-image: url(<?php echo the_post_thumbnail_url(); ?>)!important;">
    <?php woocommerce_show_product_loop_sale_flash(); ?>
    <ul class="product__item__pic__hover">
        <li><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></li>
        <li><a href="<?php echo site_url(); ?>?action=yith-woocompare-add-product&amp;id=<?php echo get_the_ID(); ?>" 
        class="compare button" data-product_id="<?php echo get_the_ID(); ?>" rel="nofollow"><i class="fa fa-retweet"></i></a></li>
        <li><a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" 
        data-product_id="<?php echo get_the_ID(); ?>"><i class="fa fa-shopping-cart"></i></a></li>
    </ul>
</div>
<div class="product__item__text">
    <span class="shop_prod_cat"><?php $category = $product->get_categories(); echo $category; ?></span>
    <h6><a href="<?php the_permalink(); ?>"><?php woocommerce_template_loop_product_title(); ?></a></h6>
    <h5><?php woocommerce_template_loop_price(); ?></h5>
</div>