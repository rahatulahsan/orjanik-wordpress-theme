<?php
/** 
 * Template name: Homepage
 * */ 
get_header();
$options = get_option( 'orjanik_framework' );
global $product;
?>

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
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
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
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
                    <div class="hero__item set-bg" data-setbg="<?php echo $options['home-banner']; ?>">
                        <div class="hero__text">
                            <span><?php echo $options['banner-sub-title-1']; ?></span>
                            <h2><?php echo $options['banner-title']; ?></h2>
                            <p><?php echo $options['banner-sub-title-2']; ?></p>
                            <a href="<?php echo $options['banner-button-link']['url']; ?>" class="primary-btn"><?php echo $options['banner-button-name']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    <?php 
                    
                        $args = array(
                            'taxonomy' => 'product_cat',
                            'orderby'  =>  'name',
                            'hide_empty' => true
                        );
                        $all_cats = get_categories($args);

                        foreach($all_cats as $cat_carousel){
                            $thumbnail_id = get_woocommerce_term_meta($cat_carousel->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_url( $thumbnail_id );
                            ?>
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" data-setbg="<?php echo $image; ?>">
                                    <h5><a href="<?php echo get_term_link($cat_carousel->slug, 'product_cat'); ?>"><?php echo $cat_carousel->name; ?></a></h5>
                                </div>
                            </div>
                        <?php }
                    
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri(); ?>/assets/img/featured/feature-1.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri(); ?>/assets/img/featured/feature-2.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri(); ?>/assets/img/featured/feature-3.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri(); ?>/assets/img/featured/feature-4.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri(); ?>/assets/img/featured/feature-5.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri(); ?>/assets/img/featured/feature-6.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri(); ?>/assets/img/featured/feature-7.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri(); ?>/assets/img/featured/feature-8.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <?php if('1' == $options['banner-enable-disable']) : ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo $options['ad-image-1']; ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo $options['ad-image-2']; ?>" alt="">
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4><?php _e('Latest Products','orjanik'); ?></h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">

                                <?php
                                    $args = array(
                                        'post_type'   => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 3,  // -1 will get all the product. Specify positive integer value to get the number given number of product
                                        );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) {
                                        while ( $the_query->have_posts() ) : $the_query->the_post();?>

                                        <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <?php echo $product->get_image(); ?>
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $product->get_name(); ?></h6>
                                                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                                <span><?php echo wc_price( $price ); ?></span>
                                            </div>
                                        </a>

                                        <?php endwhile;
                                    } else {
                                        echo __( 'No products found' );
                                    }
                                    wp_reset_postdata();
                                ?>
                                

                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php
                                    $args = array(
                                        'post_type'   => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 3,
                                        'offset'        => 3
                                        );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) {
                                        while ( $the_query->have_posts() ) : $the_query->the_post();?>

                                        <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <?php echo $product->get_image(); ?>
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $product->get_name(); ?></h6>
                                                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                                <span><?php echo wc_price( $price ); ?></span>
                                            </div>
                                        </a>

                                        <?php endwhile;
                                    } else {
                                        echo __( 'No products found' );
                                    }
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4><?php _e('Top Rated Products', 'orjanik'); ?></h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">

                                <?php
                                    $args = array(
                                        'post_type'   => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 3,
                                        'orderby'       => 'meta_value_num',
                                        'meta_key'      => 'total_sales',
                                        'order'         => 'desc'
                                        );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) {
                                        while ( $the_query->have_posts() ) : $the_query->the_post();?>

                                        <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <?php echo $product->get_image(); ?>
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $product->get_name(); ?></h6>
                                                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                                <span><?php echo wc_price( $price ); ?></span>
                                            </div>
                                        </a>

                                        <?php endwhile;
                                    } else {
                                        echo __( 'No products found' );
                                    }
                                    wp_reset_postdata();
                                ?>

                            </div>
                            <div class="latest-prdouct__slider__item">
                                
                                <?php
                                    $args = array(
                                        'post_type'   => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 3,
                                        'offset'        => 3,
                                        'orderby'       => 'meta_value_num',
                                        'meta_key'      => 'total_sales',
                                        'order'         => 'desc'
                                        );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) {
                                        while ( $the_query->have_posts() ) : $the_query->the_post();?>

                                        <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <?php echo $product->get_image(); ?>
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $product->get_name(); ?></h6>
                                                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                                <span><?php echo wc_price( $price ); ?></span>
                                            </div>
                                        </a>

                                        <?php endwhile;
                                    } else {
                                        echo __( 'No products found' );
                                    }
                                    wp_reset_postdata();
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4><?php _e('Review Products', 'orjanik'); ?></h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                    $args = array(
                                        'post_type'   => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 3,
                                        'meta_query'    => array(
                                            'key'     => '_wc_average_rating',
                                            'value'   => '3',
                                            'compare' => '>='
                                        )
                                        );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) {
                                        while ( $the_query->have_posts() ) : $the_query->the_post();?>

                                        <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <?php echo $product->get_image(); ?>
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $product->get_name(); ?></h6>
                                                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                                <span><?php echo wc_price( $price ); ?></span>
                                            </div>
                                        </a>

                                        <?php endwhile;
                                    } else {
                                        echo __( 'No products found' );
                                    }
                                    wp_reset_postdata();
                                ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php
                                    $args = array(
                                        'post_type'   => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 3,
                                        'meta_query'    => array(
                                            'key'     => '_wc_average_rating',
                                            'value'   => '3',
                                            'compare' => '>='
                                        )
                                        );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) {
                                        while ( $the_query->have_posts() ) : $the_query->the_post();?>

                                        <a href="<?php the_permalink(); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <?php echo $product->get_image(); ?>
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $product->get_name(); ?></h6>
                                                <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                                                <span><?php echo wc_price( $price ); ?></span>
                                            </div>
                                        </a>

                                        <?php endwhile;
                                    } else {
                                        echo __( 'No products found' );
                                    }
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2><?php _e('From The Blog','orjanik'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                );
                $post_queries = new WP_Query($args);
                while($post_queries-> have_posts(  )){
                    $post_queries->the_post(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> <?php the_time( 'd F Y' ); ?></li>
                                    <li><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></li>
                                </ul>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p><?php the_excerpt(  ); ?> </p>
                            </div>
                        </div>
                    </div>
                <?php }
                wp_reset_postdata(  );
                ?>
                

            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <?php get_footer(); ?>