<?php
/** 
 * Template name: My Account
 * */ 
get_header(); 
?>
<?php get_template_part( '/templates/breadcrumb/breadcrumb' ); ?>

<div class="container checkout">
    <div class="row">
        <div class="col-md-12">
            <?php echo do_shortcode('[woocommerce_my_account]'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>