<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_recipe_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_recipe_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['recipe_metabox'] = array(
		'id'         => 'recipe_metabox',
		'title'      => __( 'Recipe Details', 'cmb' ),
		'pages'      => array( 'recipe', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(

			array(
				'name'  => __( 'Time required', 'cmb' ),
				'desc'  => __( 'Time required for the recipe', 'cmb' ),
				'id'    => $prefix . 'recipe_time',
				 'type' => 'duration'
			),
			array(
				'name'  => __( 'Recipe Serving', 'cmb' ),
				'desc'  => __( 'Number of serving', 'cmb' ),
				'id'    => $prefix . 'recipe_serving',
				'type'  => 'text_small',
			),
			array(
				'name'  => __( 'Recipe Video', 'cmb' ),
				'desc'  => __( 'Enter the recipe video url', 'cmb' ),
				'id'    => $prefix . 'recipe_video',
				'type'  => 'oembed',
			),

			array(
				'name'    => __( 'Ingredients', 'cmb' ),
				'desc'    => __( 'Add ingredients as a bulleted list', 'cmb' ),
				'id'      => $prefix . 'recipe_list',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),

			array(
				'name'    => __( 'Cooking Directions', 'cmb' ),
				'desc'    => __( 'Enter cooking directions as a numbered list.', 'cmb' ),
				'id'      => $prefix . 'recipe_step',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),


		)
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

