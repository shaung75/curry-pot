<?php

/**
 * Add in Wordpress Bootstrap Nav Walker
 */
require_once('wp-bootstrap-navwalker.php');

/**
 * Remove default WooCommerce wrappers
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/**
 * Add in custom WooCommerce wrappers
 */
add_action('woocommerce_before_main_content', 'cp_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'cp_wrapper_end', 10);

function cp_wrapper_start() {
  echo '<!-- WooCommerce start --><div class="container"><div class="row">';
}

function cp_wrapper_end() {
  echo '</div></div><!-- WooCommerce end -->';
}

/**
 * Add in Shop sidebar
 */
function cp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Shop', 'fabthemes' ),
		'id'            => 'shop',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cp_widgets_init' );

/**
 * Removes showing results
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

add_filter( 'woocommerce_subcategory_count_html', 'jk_hide_category_count' );
function jk_hide_category_count() {
	// No count
}

/**
 * Enqueue scripts and styles.
 */
function cp_scripts() {

	wp_enqueue_style( 'cp-styles', get_template_directory_uri() . '/css/curry-pot.css');
	
	wp_register_script( 
        'cp-scripts', 
        get_template_directory_uri() . '/js/curry-pot.js', 
        array( 'jquery' )
    );
	wp_enqueue_script('cp-scripts');
}
add_action( 'wp_enqueue_scripts', 'cp_scripts' );

/**
 * Limit products per page to 9
 */

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 9;
  return $cols;
}