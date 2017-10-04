<?php
/**
 * Plugin Name: Popular Recipes for Curry-Pot
 * Description: Shows popular recipes
 * Version: 1.0
 * Author: Shaun Gill
 * Author URI: http://www.curry-pot.com
 */

add_action( 'widgets_init', 'cp_popular_recipes' );


function cp_popular_recipes() {
	register_widget( 'cp_popular_recipes' );
}

class cp_popular_recipes extends WP_Widget {

	function cp_popular_recipes() {
		$widget_ops = array( 'classname' => 'cp_popular_recipes', 'description' => __('Displays popular recipes', 'cp_popular_recipes') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'cp_popular_recipes' );
		
		$this->WP_Widget( 'cp_popular_recipes', __('Curry-Pot: Popular Recipes', 'cp_popular_recipes'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;
		$args = array(
			'post_type' => 'recipe',
			'meta_key' => 'pvc_views',
			'orderby' => 'pvc_views',
			'order' => 'DESC',
			'posts_per_page' => $instance['post_number'],
		);

		echo $before_widget;

		//Output the widget here...
		if ( $title )
		{
			echo $before_title . $title . $after_title;
		}
		// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			echo '<ul class="popular-recipes">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo '<li class="row">';
				echo '<div class="col-xs-3"><a href="'.get_the_permalink().'" title="'.get_the_title().'">';
				the_post_thumbnail('thumbnail');
				echo '</a></div>';
				echo '<div class="col-xs-9">';
				echo '<p style="line-height: 45px; margin: 0;"><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></p>';
				echo '</div>';
				echo '</li>';
			}
			echo '</ul>';
		}
		wp_reset_postdata();
		
				
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title']			= strip_tags( $new_instance['title'] );
		$instance['post_number']	= strip_tags( $new_instance['post_number'] );

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('', 'cp_popular_recipes'), 'post_number' => __('', 'cp_popular_recipes') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'cp_popular_recipes'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e('Number of Posts:', 'cp_popular_recipes'); ?></label>
			<input id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" value="<?php echo $instance['post_number']; ?>" style="width:100%;" />
		</p>

		

	<?php
	}
}

?>