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
                        <h2><?php _e('Featured Product','orjanik'); ?></h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php 
                            
                            $args = array(
                                'taxonomy' => 'product_cat',
                                'orderby'  =>  'name',
                                'hide_empty' => true
                            );
                            $all_cats = get_categories($args);
                            //var_dump($all_cats);
                            foreach($all_cats as $cats){?>
                                <li data-filter=".<?php echo $cats->slug; ?>"><?php echo $cats->cat_name; ?></li>
                            <?php }
                            ?>
   
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 8
                );

                $featured_products = new WP_Query($args);
                while($featured_products->have_posts()){
                    $featured_products->the_post(); 
                    $catsName = get_the_terms( $post->ID, 'product_cat' );
                    foreach($catsName as $catName){
                    $cat_name = $catName->slug;
                    }
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $cat_name; ?>">
                        <div class="featured__item">
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
                        </div>
                    </div>
                <?php }
                wp_reset_postdata(  );
                ?>
                

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