<?php get_header(); ?>

    <?php get_template_part('/templates/hero-section/hero'); ?>

    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="<?php echo get_template_directory_uri(  ); ?>/assets/img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2><?php the_title(); ?></h2>
                        <ul>
                            <li>By <?php 
                            $author_id = $post->post_author;
                            echo get_the_author_meta('display_name', $author_id); 
                            ?></li>
                            <li><?php the_time( 'd F Y' ); ?></li>
                            <li><?php echo get_comments_number(); ?> Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        
                        <div class="blog__sidebar__item">
                            <?php dynamic_sidebar( 'blog-sidebar'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                        <p><?php the_content(); ?></p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <?php 
                                            $author_id = $post->post_author;
                                            $authout_image_url = get_avatar_url($author_id);
                                        ?>
                                        <img src="<?php echo $authout_image_url; ?>" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>
                                        <?php 
                                            $author_id = $post->post_author;
                                            echo get_the_author_meta('display_name', $author_id); 
                                            ?>
                                        </h6>
                                        <?php 
                                            $author_id = $post->post_author;
                                            $theAuthorDataRoles = get_userdata($author_id);
                                            $theRolesAuthor = $theAuthorDataRoles -> roles;
                                            
                                        ?>
                                        <span><?php echo implode(',',$theRolesAuthor); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories: </span>
                                        <?php  
                                            $cats = get_categories( );
                                            foreach($cats as $cat){
                                                echo $cat->name . ',';
                                            }
                                        ?>
                                        </li>
                                        <li><span>Tags:</span> 
                                        <?php 
                                        
                                             $tags = get_the_tags();
                                            foreach($tags as $tag){
                                                echo $tag->name . ',';
                                            }
                                        
                                        ?>
                                        </li>
                                    </ul>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2><?php _e('Post You May Like','orjanik'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                );
                $related = new WP_Query($args);
                while($related->have_posts()){
                    $related->the_post(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
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
                            </div>
                        </div>
                    </div>
                <?php }

                ?>
                

            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
<?php get_footer(); ?>