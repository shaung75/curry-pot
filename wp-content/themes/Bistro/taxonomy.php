<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package fabthemes
 */

get_header(); ?>
<div class="container"> <div class="row"> 
<div class="col-md-8">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="row">
		<?php if ( have_posts() ) : ?>
			<div class="col-md-12">
				<header class="pages-header">
					<h1 class="page-title">
						<?php

							if ( is_tax( 'cuisine' ) ) :
								$term =	$wp_query->queried_object;
								echo "$term->name Cuisine";

							elseif ( is_tax( 'type' ) ) :
								$term =	$wp_query->queried_object;
								echo "$term->name ";

							endif;
						?>
					</h1>
				</header><!-- .page-header -->
			</div>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<div class="col-sm-6">
				<div class="grid-box">
					<div class="grid-pic">
						<div class="gp-overlay">
							<?php 
							$thumb = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $thumb,'full' ); 
							?>
							<span class="light"> <a rel="prettyPhoto[pp_gal]"  href='<?php echo $img_url?>'> <i class="fa fa-arrows-alt"></i> </a> </span>
							<span class="hyper"> <a href="<?php the_permalink(); ?>"> <i class="fa fa-cutlery"></i> </a> </span>
						</div>
						<?php 
							$thumb = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
							$image = aq_resize( $img_url, 720, 480, true,true,true ); //resize & crop the image
							?>
						<?php if($image) : ?>
								 <a href="<?php the_permalink(); ?>"> <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
						<?php endif; ?>
					</div>
					<div class="grid-entry">
						<h2> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h2>
						<div class="grid-meta">
							<span> <?php echo get_the_term_list( $post->ID, 'type', 'Type: ', ', ' ); ?> </span>
							<span> <?php echo get_the_term_list( $post->ID, 'cuisine', 'Cuisine: ', ', ' ); ?></span>
						</div>

					</div>
				</div>	
			</div>

			<?php endwhile; ?>

			<div class="clear"></div>
			<div class="col-sm-12">
				<?php kriesi_pagination(); ?>
			</div>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div>
		</main><!-- #main -->
	</section><!-- #primary -->
</div>
<?php get_sidebar(); ?>
</div> </div>
<?php get_footer(); ?>
