<?php
/** 
 * Template name: My Account
 * */ 
get_header(); 
?>
<section class="breadcrumb-section set-bg" style="background-image: url(<?php echo get_template_directory_uri(  ); ?>/assets/img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?php the_title(); ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo home_url(); ?>">Home</a>
                        <span><?php the_title(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container checkout">
    <div class="row">
        <div class="col-md-12">
            <?php echo do_shortcode('[woocommerce_my_account]'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>