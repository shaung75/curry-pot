<?php get_header(); ?>
            
            <!-- Content -->
            <div id="content">
                  <div class="png"><img class="top" src="<?php bloginfo('template_directory'); ?>/elements/images/top-curve.png" width="724" height="8" alt="" /></div>
                  <div id="inner-content">
                  
                  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                        
				        <div id="page" class="blog">
                  
                              <div class="post border clearfix">
                                    <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                                    
                                    <div class="meta-non">
                                          Written on <?php the_time('F jS, Y'); ?> by <?php the_author(); ?>. Filed under <?php the_category(', '); ?>
                                    </div>

                                    <div class="entry">
                                          <?php the_excerpt_rereloaded('60','','<strong><em>','div'); ?>
                                    </div>
                              </div>
                        
                        </div>
                        
				  <?php endwhile; ?>
                  
                  <div class="pagination clearfix">
                        <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  

				  </div> 
                  
                  <?php else : ?>
                  
                        <div class="post">
                              <h1>No Results Found</h1>
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