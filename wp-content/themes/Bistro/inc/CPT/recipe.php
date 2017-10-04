<?php

// Register Custom Post type

$recipes = new CPT('recipe', array(
    'supports' => array('title', 'editor', 'thumbnail','comments', 'custom-fields'),
     'has_archive'         => true,
     'publicly_queryable'  => true,
     'capability_type'     => 'post'
));

// define the columns to appear on the admin edit screen

$recipes->columns(array(
    'cb' 	  => '<input type="checkbox" />',
    'title'   => __('Title'),
    'icon' 	  => __('Photo'),
    'type'    => __('Type'),
    'cuisine' => __('Cuisine'),
    'date' 	  => __('Date')
));

// Set post type Dashicon

$recipes->menu_icon("dashicons-carrot");

// Register Taxonomy

$recipes->register_taxonomy(array(
    'taxonomy_name' => 'type',
    'singular' 		=> 'Type',
    'plural' 		=> 'Types',
    'query_var'     => true,
    'rewrite'       => array( 'slug' => 'type' ),
));

$recipes->register_taxonomy(array(
    'taxonomy_name' => 'cuisine',
    'singular' 		=> 'Cuisine',
    'plural' 		=> 'Cuisines',
     'query_var'    => true,
    'rewrite'       => array( 'slug' => 'cuisines' ),
));


require_once dirname( __FILE__ ) . '/custom-thumbnail.php';

new Featured_Image_Metabox_Customizer(array(
	'post_type'     => 'recipe',
	'metabox_title' => __( 'Dish photo', 'fabthemes' ),
	'set_text'      => __( 'Set Dish photo', 'fabthemesg' ),
	'remove_text'   => __( 'Remove Dish photo', 'fabthemes' )
));