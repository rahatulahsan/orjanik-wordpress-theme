<?php $options = get_option( 'orjanik_framework' ); ?>
<!-- Footer Section Begin -->
<footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo $options['footer-logo']; ?>" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: <?php echo $options['footer-address']; ?></li>
                            <li>Phone: <?php echo $options['footer-phone']; ?></li>
                            <li>Email: <?php echo $options['footer-email']; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <?php 
                            
                            dynamic_sidebar( 'footer-sidebar-1' );
                            
                        ?>
                        <?php 
                            
                            dynamic_sidebar( 'footer-sidebar-2' );
                            
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6><?php echo $options['footer-newsletter-heading']; ?></h6>
                        <p><?php echo $options['footer-newsletter-sub-heading']; ?></p>
                        <?php echo do_shortcode( '[mc4wp_form id=132]' ); ?>
                        <div class="footer__widget__social">
                            <?php 
                                
                                $footer_socials = $options['footer-socials'];
                                foreach($footer_socials as $social){?>
                                    <a href="<?php echo $social['footer-social-link']['url']; ?>"><i class="<?php echo $social['footer-social-icon']; ?>"></i></a>
                                <?php }
                                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><?php echo $options['footer-copyright']; ?></p></div>
                        <div class="footer__copyright__payment"><img src="<?php echo $options['payment-logo']; ?>" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <?php wp_footer(); ?>

</body>

</html>