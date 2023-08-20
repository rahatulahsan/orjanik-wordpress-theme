<?php 

/**
 * Template Name: Wishlist
 */

get_header();
?>

<?php get_template_part( '/templates/breadcrumb/breadcrumb' ); ?>

<div class="container wishlist_page">
    <div class="row">
        <div class="col-md-12">
            <?php echo do_shortcode( '[yith_wcwl_wishlist] ' ); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>