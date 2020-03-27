<?php

function load_stylesheets()
{
    // main stylesheet
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
    // webpack stylesheet
    wp_register_style('custom', get_template_directory_uri() . '/app.css', '', 1, 'all');
    wp_enqueue_style('custom');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

// load scripts
function load_javascript()
{
    // webpack javascript
    wp_register_script('custom', get_template_directory_uri() . '/app.js', 'jquery', 1, true);
    wp_enqueue_script('custom');
}

add_action('wp_enqueue_scripts', 'load_javascript');

// enable options for wordpress panel
add_theme_support('menus');
add_theme_support('post-thumbnails');
// Enable WooCommerce Product Gallery, Zoom & Lightbox (v3.0+)
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );


// register_menus array
register_nav_menus( 
    array(
        'top_menu' => __('Top Menu')
    )
);

// image size transform all uploaded images into size
add_image_size('post_iamge', 1100, 750, true);

// add sidebar method
register_sidebar( array(
    'name' => 'Page Sidebar',
    'id' => 'page-sidebar',
    'class' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
) );

// Declaring woocomerce_custom_theme Support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


// cart menu
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

//end


// Add the cart link to menu
function wpex_add_menu_cart_item_to_menus( $items, $args ) {

	// Make sure your change 'wpex_main' to your Menu location !!!!
	if ( $args->theme_location === 'wpex_main' ) {

		$css_class = 'menu-item menu-item-type-cart menu-item-type-woocommerce-cart';
		
		if ( is_cart() ) {
			$css_class .= ' current-menu-item';
		}

		$items .= '<li class="' . esc_attr( $css_class ) . '">';

			$items .= wpex_menu_cart_item();

		$items .= '</li>';

	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'wpex_add_menu_cart_item_to_menus', 10, 2 );

// Function returns the main menu cart link
function wpex_menu_cart_item() {

	$output = '';

	$cart_count = WC()->cart->cart_contents_count;

	$css_class = 'wpex-menu-cart-total wpex-cart-total-'. intval( $cart_count );

	if ( $cart_count ) {
		$url  = WC()->cart->get_cart_url();
	} else {
		$url  = wc_get_page_permalink( 'shop' );
	}

	$html = $cart_extra = WC()->cart->get_cart_total();
	$html = str_replace( 'amount', '', $html );

	$output .= '<a href="'. esc_url( $url ) .'" class="' . esc_attr( $css_class ) . '">';

		$output .= '<span class="fa fa-shopping-bag"></span>';

		$output .= wp_kses_post( $html );

	$output .= '</a>';

	return $output;
}


// Update cart link with AJAX
function wpex_main_menu_cart_link_fragments( $fragments ) {
	$fragments['.wpex-menu-cart-total'] = wpex_menu_cart_item();
	return $fragments;
}
add_filter( 'add_to_cart_fragments', 'wpex_main_menu_cart_link_fragments' );


?>