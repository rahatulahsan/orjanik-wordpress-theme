<?php 
global $woocommerce; 
global $current_user;
$theme_options = get_option( 'orjanik_framework' );
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta <?php bloginfo( 'charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
    <?php wp_body_open(  ); ?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
             <?php 

            if(has_custom_logo()){
                the_custom_logo();
            }else{
                echo '<h1 class="logo_name"><a href='.home_url("/").'>'.get_bloginfo('name'). '</a></h1>';
            }

            ?>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="<?php echo get_page_link(96); ?>"><i class="fa fa-heart"></i> <span><?php
                
                $count = 0;
                if(function_exists('yith_wcwl_count_products')){
                    $count = yith_wcwl_count_products();
                    echo $count;
                }
                ?></span></a></li>
                <li><a href="<?php echo $woocommerce->cart->get_cart_url()?>"><i class="fa fa-shopping-bag"></i> <span><?php echo $woocommerce->cart->cart_contents_count; ?></span></a></li>
            </ul>
            <div class="header__cart__price">item: <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <?php 
                
                if(!is_user_logged_in(  )){?>
                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><i class="fa fa-user"></i> <?php _e('Login','orjanik'); ?></a>
                <?php }else{?>
                    <a href="#"><?php echo $current_user->display_name; ?></a>
                <?php }
                
                ?>
            </div>
        </div>
        
        <?php 
        
            $navigation = wp_nav_menu(array(
                'theme_location' => 'mobile-nav',
                'container' => 'nav',
                'container_class' => 'humberger__menu__nav mobile-menu',
                'echo' => false
            ));
            $navigation = str_replace('sub-menu', 'header__menu__dropdown', $navigation);
            echo wp_kses_post($navigation);
        ?>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <?php 
                                    
                $header_socials = $theme_options['header-socials'];
                foreach($header_socials as $social){?>
                    <a href="<?php echo $social['social-link']['url']; ?>"><i class="<?php echo $social['social-icon']; ?>"></i></a>
                <?php }
                                
            ?>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i><?php echo $theme_options['header-email']; ?></li>
                <li><?php echo $theme_options['header-message']; ?></li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?php echo $theme_options['header-email']; ?></li>
                                <li><?php echo $theme_options['header-message']; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <?php 
                                
                                    $header_socials = $theme_options['header-socials'];
                                    foreach($header_socials as $social){?>
                                        <a href="<?php echo $social['social-link']['url']; ?>"><i class="<?php echo $social['social-icon']; ?>"></i></a>
                                    <?php }
                                
                                ?>

                            </div>
                            <div class="header__top__right__language">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <?php 
                                
                                if(!is_user_logged_in(  )){?>
                                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><i class="fa fa-user"></i> Login</a>
                                <?php }else{?>
                                    <a href="#"><?php echo $current_user->display_name; ?></a>
                                <?php }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <?php 

                        if(has_custom_logo()){
                            the_custom_logo();
                        }else{
                            echo '<h1 class="logo_name"><a href='.home_url("/").'>'.get_bloginfo('name'). '</a></h1>';
                        }

                        ?>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    
                    <?php 
                    
                        $navigation = wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => 'nav',
                            'container_class' => 'header__menu',
                            'echo' => false
                        ));
                        $navigation = str_replace('sub-menu', 'header__menu__dropdown', $navigation);
                        echo wp_kses_post($navigation);
                    ?>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="<?php echo get_page_link(96); ?>"><i class="fa fa-heart"></i> <span><?php 
                            $count = 0;
                            if(function_exists('yith_wcwl_count_products')){
                                $count = yith_wcwl_count_products();
                                echo $count;
                            }
                            
                            ?></span></a></li>
                            <li><a href="<?php echo $woocommerce->cart->get_cart_url()?>"><i class="fa fa-shopping-bag"></i> <span><?php echo $woocommerce->cart->cart_contents_count; ?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->