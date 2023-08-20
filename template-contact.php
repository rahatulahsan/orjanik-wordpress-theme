<?php
/**
 * Template Name: Contact
 *  */ 
get_header();
$options = get_option( 'orjanik_framework' );
?>
    
    <?php get_template_part('/templates/hero-section/hero'); ?>

    <?php get_template_part('/templates/breadcrumb/breadcrumb'); ?>

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4><?php _e('Phone','orjanik'); ?></h4>
                        <p><?php echo $options['contact-phone']; ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4><?php _e('Address','orjanik'); ?></h4>
                        <p><?php echo $options['contact-address']; ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4><?php _e('Open time','orjanik'); ?></h4>
                        <p><?php echo $options['contact-opening-hour']; ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4><?php _e('Email','orjanik'); ?></h4>
                        <p><?php echo $options['contact-email']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
    <?php  
    
    $map_key = $options['map-key'];
    $map_address = $options['map-address'];
    $map_phone = $options['map-phone'];
    $map_state = $options['map-state'];
    
    ?>
    <iframe style="height:100%;width:100%;border:0;" frameborder="0" 
    src="https://www.google.com/maps/embed/v1/place?q=<?php echo $map_address; ?>&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4><?php echo $map_state; ?></h4>
                <ul>
                    <li>Phone: <?php echo $map_phone; ?></li>
                    <li>Add: <?php echo $map_address; ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2><?php _e('Leave Message','orjanik'); ?></h2>
                    </div>
                </div>
            </div>
            <?php echo do_shortcode( '[contact-form-7 id="91779f4" title="Contact Page Form"]' ); ?>
        </div>
    </div>
    <!-- Contact Form End -->
<?php get_footer(); ?>