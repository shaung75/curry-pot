<?php get_header(); ?>
            
            <!-- Content -->
            <div id="content">
                  <div class="png"><img class="top" src="<?php bloginfo('template_directory'); ?>/elements/images/top-curve.png" width="724" height="8" alt="" /></div>
                  <div id="inner-content">
                  
                  <?php $temp_query = $wp_query; ?>
                  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
				  <?php query_posts("category_name=Indian Curry Recipes&paged=$paged"); ?>

                  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                  
                        <?php
						      // Let's grab some custom fields
						      $serves = get_post_meta($post->ID, 'Serves', true); 
						      $cooking_time = get_post_meta($post->ID, 'Cooking Time', true); 
						      $heat = get_post_meta($post->ID, 'Heat Rating', true);
							  $image = get_post_meta($post->ID, 'Image', true); 
						?>
                        
				        <div class="post border clearfix">
                        
                              <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                              
                              <div class="author">
                                    Written on <?php the_time('F jS, Y'); ?> by <?php the_author(); ?>
                              </div>
                              <div class="thumbnail-large">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/lib/timthumb.php?src=<?php echo $image ?>&h=220&w=300&zc=0" alt="<?php the_title(); ?>"/></a>
                              </div>
                              <div class="text">
                                    
                                    <?php the_excerpt_rereloaded('40','','<strong><em>','div'); ?>
                                    
                                    <div class="meta">
                                          <?php the_category(' '); ?>
                                    </div>
                                    
                                    <div class="serves serves-<?php echo $serves; ?>">Serves <?php echo $serves; ?></div>
                                    <div class="timer"><?php echo $cooking_time; ?></div>
				    <div class="heat heat-<?php echo $heat; ?>"><?php echo $heat; ?> Chillies</div>
                              </div>
                        </div>
                        
				  <?php endwhile; ?>	
                  
                  <div class="pagination clearfix">
                        <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
				  </div>  
				  
				  <?php endif; ?>
                        
                  </div>
                  <img class="curve-bottom" src="<?php bloginfo('template_directory'); ?>/elements/images/bottom-curve.png" width="724" height="8" alt="" />
            </div>
            <!-- / Content -->
            
            <!-- Sidebar -->
            <?php get_sidebar(); ?>
            <!-- / Sidebar -->
            
<?php get_footer(); ?>