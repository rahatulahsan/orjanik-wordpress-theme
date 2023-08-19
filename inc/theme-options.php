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

}