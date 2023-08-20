<?php get_header(); ?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo get_template_directory_uri(  ); ?>/assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?php _e('404','orjanik'); ?></h2>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<div class="container contact">
    <div class="row">
        <div class="col-md-12">
            <h2><?php _e('The page you are looking for are not available','orjanik'); ?></h2><br>
            <a href="<?php echo home_url(); ?>" class="primary-btn"><?php _e('SHOP NOW', 'orjanik'); ?></a>
        </div>
    </div>
</div>

<?php get_footer(); ?>