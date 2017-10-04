<?php
/**
 * @package fabthemes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
		$thumb = get_post_thumbnail_id();
		$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
		$image = aq_resize( $img_url, 768, 540, true,true,true ); //resize & crop the image
	?>
	<?php if($image) : ?>
			<img itemprop="image" class="post-thumb" src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
	<?php endif; ?>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>



		<meta itemprop="url" content="<?php the_permalink(); ?>">

		<div class="entry-meta">
			<meta itemprop="datePublished" content="<?php the_time('Y-m-d'); ?>" /> 
			<meta itemprop="author" content="<?php the_author(); ?>" /> 

			<span itemprop="recipeCategory"> <?php echo get_the_term_list( $post->ID, 'type', '<b>Type:</b> ', ', ' ); ?> </span>
			<span itemprop="recipeCuisine"> <?php echo get_the_term_list( $post->ID, 'cuisine', '<b>Cuisine:</b> ', ', ' ); ?></span>
			<?php $duration = get_post_meta( $post->ID, '_cmb_recipe_time', true ); 
				  $duration = wp_parse_args( $duration, array(
				        'hours'    => '',
				        'minutes'  => '',
				    ));
			?> 
			<span itemprop="totalTime" content="PT<?php if( $duration['hours'] ){ echo ( $duration['hours'] ); echo _e('H','fabthemes');}if( $duration['minutes'] ){ echo ( $duration['minutes'] ); echo _e('M','fabthemes');}?>"> <?php 
					echo _e('<b>Time required:</b> ','fabthemes'); 
					if( $duration['hours'] ){ echo ( $duration['hours'] ); echo _e('h ','fabthemes');} 
					if( $duration['minutes'] ){ echo ( $duration['minutes'] ); echo _e('m','fabthemes');} 
					
					?> 
			</span>
			<span> <?php echo _e('<b>Serving:</b> ','fabthemes');  echo get_post_meta( $post->ID, '_cmb_recipe_serving', true ); ?></span>	
			<span> 	<a href="javascript:window.print()"><i class="fa fa-print"></i>  Print</a></span>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div itemprop="description"> 
			<?php the_content(); ?>
		</div>

		<?php $ingredients =  get_post_meta( $post->ID, '_cmb_recipe_list', true ); ?>

		<?php 
		if ($ingredients) {
			echo '<div class="ingredients" itemprop ="ingredients">';
			echo '<h3> Ingredients </h3>';
			echo $ingredients;
			echo '</div>';
		}
		?>

		<?php $steps =  get_post_meta( $post->ID, '_cmb_recipe_step', true ); ?>

		<?php 
		if ($steps) {
			echo '<div class="steps" itemprop ="recipeInstructions">';
			echo '<h3> Directions </h3>';
			echo $steps;
			echo '</div>';
		}
		?>

		<?php $video =  get_post_meta( $post->ID, '_cmb_recipe_video', true ); ?>

		<?php 
		if ($video) {
			echo '<div class="video">';
			echo '<h3> Recipe Video </h3>';
			echo wp_oembed_get($video);
			echo '</div>';
		}
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fabthemes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
