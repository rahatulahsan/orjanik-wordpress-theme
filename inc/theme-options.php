<?php 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'orjanik_framework';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => 'Theme Options',
    'menu_slug'  => 'orjanik-framework',
  ) );

  //
  // Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'header_tab', // Set a unique slug-like ID
    'title' => 'Header',
  ) );

   // Create a sub-tab
   CSF::createSection( $prefix, array(
    'parent' => 'header_tab', // The slug id of the parent section
    'title'  => 'General',
    'fields' => array(

            // Phone
            array(
                'id'    => 'header-phone',
                'type'  => 'text',
                'title' => 'Phone No',
            ),
            // After Phone 
            array(
                'id'    => 'header-phone-text',
                'type'  => 'text',
                'title' => 'After Message',
                'default' => 'support 24/7 time'
            ),
        )
    ));

  //
  // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'header_tab', // The slug id of the parent section
    'title'  => 'Top Bar',
    'fields' => array(

      // Email
      array(
        'id'    => 'header-email',
        'type'  => 'text',
        'title' => 'Email',
      ),

      // A Message field
      array(
        'id'    => 'header-message',
        'type'  => 'text',
        'title' => 'Header Message',
        'default' => 'Free Shipping for all Order of $99'
      ),

      // Social Repeater
      array(
        'id'     => 'header-socials',
        'type'   => 'repeater',
        'title'  => 'Social Icons',
        'fields' => array(
      
            array(
                'id'    => 'social-icon',
                'type'  => 'icon',
                'title' => 'Icon',
            ),
            array(
                'id'    => 'social-link',
                'type'  => 'link',
                'title' => 'Social Link',
            ),
      
        ),
      ),

    )
  ) );


  //
  // Create a top-tab
  CSF::createSection( $prefix, array(
    'id'    => 'home_tab', // Set a unique slug-like ID
    'title' => 'Homepage',
  ) );


  //
  // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'home_tab', // The slug id of the parent section
    'title'  => 'Banner',
    'fields' => array(

        // Banner Image
        array(
            'id'           => 'home-banner',
            'type'         => 'upload',
            'title'        => 'Upload Banner Image',
            'library'      => 'image',
            'placeholder'  => 'https://',
            'button_title' => 'Add Image',
            'remove_title' => 'Remove Image',
            'preview'      => true
        ),
        // Before Title
        array(
            'id'      => 'banner-sub-title-1',
            'type'    => 'text',
            'title'   => 'Before Main Title',
            'default' => 'FRUIT FRESH'
        ),
        // Title
        array(
            'id'      => 'banner-title',
            'type'    => 'text',
            'title'   => 'Banner Main Title',
            'default' => 'Vegetable 100% Organic'
        ),
        // After Title
        array(
            'id'      => 'banner-sub-title-2',
            'type'    => 'text',
            'title'   => 'After Main Title',
            'default' => 'Free Pickup and Delivery Available'
        ),
        // Button Name
        array(
            'id'      => 'banner-button-name',
            'type'    => 'text',
            'title'   => 'Button Text',
            'default' => 'SHOP NOW'
        ),
        // Button Link
        array(
            'id'    => 'banner-button-link',
            'type'  => 'link',
            'title' => 'Button Link',
        ),

    )
  ) );

  //
  // Advertisement Tabs
  CSF::createSection( $prefix, array(
    'id'    => 'ads_tab', // Set a unique slug-like ID
    'title' => 'Advertisement',
    'fields' => array(

        array(
            'id'         => 'banner-enable-disable', // field id
            'type'       => 'switcher',
            'title'      => 'Enable/Disable ADS',
            'default'    => true
        ),

        array(
            'id'           => 'ad-image-1',
            'type'         => 'upload',
            'title'        => 'Upload Image 1',
            'library'      => 'image',
            'placeholder'  => 'http://',
            'button_title' => 'Add Image',
            'remove_title' => 'Remove Image',
            'dependency' => array( 'banner-enable-disable', '==', 'true' ),
            'preview'      => true
        ),
        array(
            'id'           => 'ad-image-2',
            'type'         => 'upload',
            'title'        => 'Upload Image 2',
            'library'      => 'image',
            'placeholder'  => 'http://',
            'button_title' => 'Add Image',
            'remove_title' => 'Remove Image',
            'dependency' => array( 'banner-enable-disable', '==', 'true' ),
            'preview'      => true
        ),
  
      )
  ) );


  //
  // Footer Tabs
  CSF::createSection( $prefix, array(
    'id'    => 'Contact_tab', // Set a unique slug-like ID
    'title' => 'Contact Page',
    'fields' => array(
        // Address
        array(
          'id'      => 'contact-address',
          'type'    => 'text',
          'title'   => 'Address',
          'default' => '60-49 Road 11378 New York'
        ),
        // Phone
        array(
          'id'      => 'contact-phone',
          'type'    => 'text',
          'title'   => 'Phone',
          'default' => '+65 11.188.666'
        ),
        // Email
        array(
          'id'      => 'contact-email',
          'type'    => 'text',
          'title'   => 'Email',
          'default' => 'hello@organic.com'
        ),
        // Working hour
        array(
          'id'      => 'contact-opening-hour',
          'type'    => 'text',
          'title'   => 'Open Time',
          'default' => '10:00 am to 23:00 pm'
        ),
        // Map Key
        array(
          'id'      => 'map-key',
          'type'    => 'text',
          'title'   => 'Map Key',
          'default'  => 'AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8',
          'subtitle' => 'Please get the key from Google Map'
          
        ),
        // Map Address
        array(
          'id'      => 'map-address',
          'type'    => 'text',
          'title'   => 'Map Address',
          'default' => '16 Creek Ave. Farmingdale, NY'
        ),
        // Map State
        array(
          'id'      => 'map-state',
          'type'    => 'text',
          'title'   => 'Map State',
          'default' => 'New York'
        ),
        // Map Phone
        array(
          'id'      => 'map-phone',
          'type'    => 'text',
          'title'   => 'Map Phone',
          'default' => '+12-345-6789'
        ),
      )
      ));


   //
  // Footer Tabs
  CSF::createSection( $prefix, array(
    'id'    => 'footer_tab', // Set a unique slug-like ID
    'title' => 'Footer',
    'fields' => array(
      // Footer Logo
      array(
        'id'           => 'footer-logo',
        'type'         => 'upload',
        'title'        => 'Footer Logo',
        'library'      => 'image',
        'placeholder'  => 'http://',
        'button_title' => 'Add Image',
        'remove_title' => 'Remove Image',
        'preview'      => true
      ),
      // Address
      array(
        'id'      => 'footer-address',
        'type'    => 'text',
        'title'   => 'Address',
        'default' => '60-49 Road 11378 New York'
      ),
      // Phone
      array(
        'id'      => 'footer-phone',
        'type'    => 'text',
        'title'   => 'Phone',
        'default' => '+65 11.188.666'
      ),
      // Email
      array(
        'id'      => 'footer-email',
        'type'    => 'text',
        'title'   => 'Email',
        'default' => 'hello@colorlib.com'
      ),
      // Newsletter Heading
      array(
        'id'      => 'footer-newsletter-heading',
        'type'    => 'text',
        'title'   => 'Newsletter Heading',
        'default' => 'Join Our Newsletter Now'
      ),
      // Newsletter Sub-Heading
      array(
        'id'      => 'footer-newsletter-sub-heading',
        'type'    => 'text',
        'title'   => 'Newsletter Sub Heading',
        'default' => 'Get E-mail updates about our latest shop and special offers.'
      ),
      // Social Repeater
      array(
        'id'     => 'footer-socials',
        'type'   => 'repeater',
        'title'  => 'Social Icons',
        'fields' => array(
      
            array(
                'id'    => 'footer-social-icon',
                'type'  => 'icon',
                'title' => 'Icon',
            ),
            array(
                'id'    => 'footer-social-link',
                'type'  => 'link',
                'title' => 'Social Link',
            ),
      
        ),
      ),
      // Copyright
      array(
        'id'    => 'footer-copyright',
        'type'  => 'wp_editor',
        'title' => 'Copyright',
      ),

      // Payment Image
      array(
        'id'           => 'payment-logo',
        'type'         => 'upload',
        'title'        => 'Payment Logo',
        'library'      => 'image',
        'placeholder'  => 'http://',
        'button_title' => 'Add Image',
        'remove_title' => 'Remove Image',
        'preview'      => true
      ),
    )
  ));

}
