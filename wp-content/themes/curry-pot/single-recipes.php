<?php get_header(); ?>
            
            <!-- Content -->
            <div id="content">
                  <div class="png"><img class="top" src="<?php bloginfo('template_directory'); ?>/elements/images/top-curve.png" width="724" height="8" alt="" /></div>
                  <div id="inner-content">
                  
                  <div id="page">
                  
                  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                  
                        <?php
						      // Let's grab some custom fields
						      $serves = get_post_meta($post->ID, 'Serves', true);
						      $heat = get_post_meta($post->ID, 'Heat Rating', true); 
						      $cooking_time = get_post_meta($post->ID, 'Cooking Time', true); 
							  $image = get_post_meta($post->ID, 'Image', true); 
							  $ingredients = get_post_meta($post->ID, 'Ingredient', false); 
						?>
                  
                        <div class="post clearfix">
                              <h1><?php the_title(); ?></h1>
   
                              <div class="recipe-text">
                              <div class="entry">
                                    <div class="thumbnail-large">
                                          <img src="<?php bloginfo('template_directory'); ?>/lib/timthumb.php?src=<?php echo $image ?>&h=220&w=300&zc=0" alt="<?php the_title(); ?>"/>
                                    </div>
                                    
                                    <?php the_content(); ?>

                              </div>
                              </div>
                              
                              <div class="recipe-meta">
                              
                                    <div class="ingredients">
                                          <h2>Ingredients</h2>
                                          <ul>
                                                <?php foreach($ingredients as $ingredients)
												{ echo '<li>' . $ingredients . '</li>'; }
												?>
                                          </ul>
                                    </div>
                                    
                                    <div class="meta">
                                          <?php the_category(' '); ?>
                                    </div>
                                    
                                    <div class="serves serves-<?php echo $serves; ?>">Serves <?php echo $serves; ?></div>
                                    <div class="timer"><?php echo $cooking_time; ?></div>
                                    <div class="heat heat-<?php echo $heat; ?>"><?php echo $serves; ?> Chillies</div>
									
									<div style="clear:both;"></div>
									
									<!-- AddThis Button BEGIN -->
									<div class="addthis_toolbox addthis_default_style " style="margin-top: 50px;">
										<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
										<a class="addthis_button_tweet"></a>
										<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
									</div>
									<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f0f5d18570b768b"></script>
									<!-- AddThis Button END -->

                              </div>
                              
                        </div>
                        
                        <div class="comments-template">
						      <?php comments_template(); ?>
                        </div>
                  
                  <?php endwhile; ?>	  
				  
				  <?php endif; ?>
                        
                  </div>

                  </div>
                  <img class="curve-bottom" src="<?php bloginfo('template_directory'); ?>/elements/images/bottom-curve.png" width="724" height="8" alt="" />
            </div>
            <!-- / Content -->
            
            <!-- Sidebar -->
            <?php get_sidebar(); ?>
            <!-- / Sidebar -->
            
<?php get_footer(); ?>