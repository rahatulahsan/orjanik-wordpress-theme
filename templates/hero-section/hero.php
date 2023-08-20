<?php $options = get_option( 'orjanik_framework' ); ?>
<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span><?php _e('All departments','orjanik'); ?></span>
                    </div>
                    <ul>
                    <?php  

                        $args = array(
                            'taxonomy' => 'product_cat',
                            'orderby'  =>  'name',
                            'hide_empty' => true
                        );
                        $all_cats = get_categories($args);

                        foreach($all_cats as $cats){?>
                            <li><a href="<?php echo get_term_link($cats->slug, 'product_cat'); ?>"><?php echo $cats->name; ?></a></li>
                        <?php }

                    ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <?php echo do_shortcode( '[wd_asp elements="search" ratio="100%" id=1]' ); ?>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5><?php echo $options['header-phone']; ?></h5>
                            <span><?php echo $options['header-phone-text']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Hero Section End -->