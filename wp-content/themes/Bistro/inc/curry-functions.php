<?php

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