<?php get_header(); ?>

    <?php get_template_part( '/templates/hero-section/hero' ); ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo get_template_directory_uri(  ); ?>/assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php _e('Blog','orjanik'); ?></h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo home_url(); ?>"><?php _e('Home','orjanik'); ?></a>
                            <span><?php _e('Blog','orjanik'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        
                        <div class="blog__sidebar__item">
                            <?php dynamic_sidebar( 'blog-sidebar'); ?>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">

                    <?php 
                    
                    while(have_posts()){
                        the_post(); ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?php echo the_post_thumbnail_url('orjanik-blog-featured'); ?>" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?php the_time( 'd F Y' ); ?></li>
                                        <li><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></li>
                                    </ul>
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <p><?php the_excerpt(  ); ?> </p>
                                    <a href="<?php the_permalink(); ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                    <?php }
                    
                    ?>
                        

                        <div class="col-lg-12">
                            <?php the_posts_pagination(array(
                                'prev_text' => __( '<i class="fa fa-long-arrow-left"></i>', 'orjanik' ),
                                'next_text' => __( '<i class="fa fa-long-arrow-right"></i>', 'orjanik' ),
                            )); ?>
                            <!--
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

  <?php get_footer(); ?>