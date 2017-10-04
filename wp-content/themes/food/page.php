<?php get_header(); ?>
            
            <!-- Content -->
            <div id="content">
                  <div class="png"><img class="top" src="<?php bloginfo('template_directory'); ?>/elements/images/top-curve.png" width="724" height="8" alt="" /></div>
                  <div id="inner-content">
                  
                  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                        
				        <div id="page">
                  
                        <div class="post clearfix">
                              <h1><?php the_title(); ?></h1>
   
                              <div class="entry">
                                    <?php the_content(); ?>
                              </div>
                        </div>
                        
                  </div>
                        
				  <?php endwhile; ?>	  
				  
				  <?php endif; ?>
                        
                  </div>
                  <img class="curve-bottom" src="<?php bloginfo('template_directory'); ?>/elements/images/bottom-curve.png" width="724" height="8" alt="" />
            </div>
            <!-- / Content -->
            
            <!-- Sidebar -->
            <?php get_sidebar(); ?>
            <!-- / Sidebar -->
            
<?php get_footer(); ?>