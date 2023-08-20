<?php 
require_once get_theme_file_path( '/inc/tgm.php' );
require_once get_theme_file_path( '/inc/theme-options.php' );


function orjanik_theme_setup(){
    load_theme_textdomain('orjanik', get_theme_file_uri('/languages'));
    add_theme_support( 'title-tag' );
    add_theme_support('custom-logo');
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support('html5', array('comment-form', 'search-form'));
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'video', 'quote', 'audio', 'link' ) );
    add_theme_support( 'woocommerce' );
    add_editor_style('/assets/css/editor-style.css');


    register_nav_menu( 'primary', __('Primary Menu', 'orjanik') );
    register_nav_menu( 'mobile-nav', __('Mobile Menu', 'orjanik') );

    add_image_size('orjanik-blog-featured', 360, 260, true);
}
add_action('after_setup_theme', 'orjanik_theme_setup');


function orjanik_assets(){
    wp_enqueue_style( 'style-css', get_stylesheet_uri());

    wp_enqueue_style( 'cairo-font', '//fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap');

    wp_enqueue_style( 'fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '1.0', 'all');
    wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', '1.0', 'all');
    wp_enqueue_style( 'elegant-icons-css', get_template_directory_uri() . '/assets/css/elegant-icons.css', '1.0', 'all');
    wp_enqueue_style( 'nice-select-css', get_template_directory_uri() . '/assets/css/nice-select.css', '1.0', 'all');
    wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', '1.0', 'all');
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', '1.0', 'all');
    wp_enqueue_style( 'slicknav-css', get_template_directory_uri() . '/assets/css/slicknav.min.css', '1.0', 'all');
    wp_enqueue_style( 'orjanik-style-css', get_template_directory_uri() . '/assets/css/style.css', '1.0', 'all');

    wp_enqueue_script( 'bootrstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'nice-select-js', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'slicknav-js', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'maxitup-js', get_template_directory_uri() . '/assets/js/mixitup.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), 1.0,true);
    wp_enqueue_script( 'orjanik-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 1.0,true);

    wp_enqueue_script( 'share-js', '//static.elfsight.com/platform/platform.js');

}
add_action('wp_enqueue_scripts', 'orjanik_assets');



/**
 * Change number or products per row to 3
 */


if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
add_filter('loop_shop_columns', 'loop_columns', 999);

// Display the Woocommerce Discount Percentage on the Sale Badge for variable products and single products
add_filter( 'woocommerce_sale_flash', 'display_percentage_on_sale_badge', 20, 3 );
function display_percentage_on_sale_badge( $html, $post, $product ) {

  if( $product->is_type('variable')){
      $percentages = array();

      // This will get all the variation prices and loop throughout them
      $prices = $product->get_variation_prices();

      foreach( $prices['price'] as $key => $price ){
          // Only on sale variations
          if( $prices['regular_price'][$key] !== $price ){
              // Calculate and set in the array the percentage for each variation on sale
              $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
          }
      }
      // Displays maximum discount value
      $percentage = max($percentages) . '%';

  } elseif( $product->is_type('grouped') ){
      $percentages = array();

     // This will get all the variation prices and loop throughout them
      $children_ids = $product->get_children();

      foreach( $children_ids as $child_id ){
          $child_product = wc_get_product($child_id);

          $regular_price = (float) $child_product->get_regular_price();
          $sale_price    = (float) $child_product->get_sale_price();

          if ( $sale_price != 0 || ! empty($sale_price) ) {
              // Calculate and set in the array the percentage for each child on sale
              $percentages[] = round(100 - ($sale_price / $regular_price * 100));
          }
      }
     // Displays maximum discount value
      $percentage = max($percentages) . '%';

  } else {
      $regular_price = (float) $product->get_regular_price();
      $sale_price    = (float) $product->get_sale_price();

      if ( $sale_price != 0 || ! empty($sale_price) ) {
          $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
      } else {
          return $html;
      }
  }
  return '<div class="product__discount__percent">' . esc_html__( '-', 'woocommerce' ) . ' '. $percentage . '</div>'; // If needed then change or remove "up to -" text
}


// 1. Show plus minus buttons
  
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus">+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus">-</button>';
}
  
// -------------
// 2. Trigger update quantity script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   " );
}

// Register Sidebar
function orjanik_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar-1', 'orjanik' ),
		'id'            => 'footer-sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on footer.', 'orjanik' ),
		'before_widget' => '<ul>',
		'after_widget'  => '</ul>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer Sidebar-2', 'orjanik' ),
		'id'            => 'footer-sidebar-2',
		'description'   => __( 'Widgets in this area will be shown on footer.', 'orjanik' ),
		'before_widget' => '<ul>',
		'after_widget'  => '</ul>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
    register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'orjanik' ),
		'id'            => 'blog-sidebar',
		'description'   => __( 'Widgets in this area will be shown on the blog page', 'orjanik' ),
		'before_widget' => '<ul>',
		'after_widget'  => '</ul>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'orjanik_widgets_init' );


function orjanik_custom_css() {
    $breadcrumb_img = get_template_directory_uri().'/assets/img/breadcrumb.jpg';
    ?>
        <style>
            .breadcrumb-section{
                background-image: url(<?php echo $breadcrumb_img; ?>)!important;
            }


        </style>
    <?php
}
add_action('wp_head', 'orjanik_custom_css');



