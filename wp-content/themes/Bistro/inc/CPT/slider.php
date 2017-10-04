<?php

// Register Custom Post type

$slides = new CPT('slide', array(
    'supports' => array('title','thumbnail')
));


// define the columns to appear on the admin edit screen
$slides->columns(array(
    'cb' => '<input type="checkbox" />',
    'icon' => __('Icon'),
    'title' => __('Title'),
    'date' => __('Date')
));

// Set post type Dashicon

$slides->menu_icon("dashicons-slides");
    
// Get slide items

function get_slide_items($count){
	global $post;
	 $args = array(
        'posts_per_page' => $count,  // Limit to 5 posts
        'post_type' => 'slide',  // Query for the default Post type
    );

	$loop = new WP_Query( $args );
	echo "<div class='hslides'>";
	echo "<ul class='slides-container'>";
	while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<li>
		
		<?php 
		$thumb = get_post_thumbnail_id();
		$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
		$image = aq_resize( $img_url, 1920, 1080, true,true,true ); //resize & crop the image
		?>
		<?php if($image) : ?>
			<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
		<?php endif; ?>

  	</li>

    <?php endwhile;
    echo "</ul> </div>";
    wp_reset_postdata();
}

// Slides Shortcode

function slide_shortcode( $atts ) {

	$count = 3 ;

	if( function_exists( 'get_slide_items' ) ) {

			// Attributes
			extract( shortcode_atts(
				array(
					'count' => $count,
				), $atts )
			);

		    if( $count != NULL ) {
		    return get_slide_items($count);
			}
		}
	}
add_shortcode( 'slide', 'slide_shortcode' );