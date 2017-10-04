<div id="sidebar">
<?php
	if(in_category('Blog')): 
?>
                  <div class="png"><img class="top" src="<?php bloginfo('template_directory'); ?>/elements/images/sidebar-top.png" width="182" height="10" alt="" /></div>
                  <div class="sidebar-inner">
                        <div class="box">
                              <h2>Blog Categories</h2>
                              <ul>
                                    <?php $cat_name = get_cat_ID('Blog') ?>
                                    <?php wp_list_categories('title_li=&orderby=name&child_of=' . $cat_name); ?>
                              </ul>
                        </div>
                  </div>
                  <div class="png"><img class="top bottom" src="<?php bloginfo('template_directory'); ?>/elements/images/sidebar-bottom.png" width="182" height="10" alt="" /></div>
<?php
	endif;
?>
                  <div class="png"><img class="top" src="<?php bloginfo('template_directory'); ?>/elements/images/sidebar-top.png" width="182" height="10" alt="" /></div>
                  <div class="sidebar-inner">
                        <div class="box">
                              <h2>Popular Recipes</h2>
                              <ul>
                                    <?php popular_posts(); ?> 
                              </ul>
                        </div>
                  </div>
                  <div class="png"><img class="top bottom" src="<?php bloginfo('template_directory'); ?>/elements/images/sidebar-bottom.png" width="182" height="10" alt="" /></div>
                  
                  <div class="png"><img class="top" src="<?php bloginfo('template_directory'); ?>/elements/images/sidebar-top.png" width="182" height="10" alt="" /></div>
                  <div class="sidebar-inner">
                        <div class="box">
                              <h2>Indian Curry Recipes</h2>
                              <ul>
                                    <?php $cat_name = get_cat_ID('Indian Curry Recipes') ?>
                                    <?php wp_list_categories('title_li=&orderby=name&child_of=' . $cat_name); ?> 
                              </ul>
                        </div>
                  </div>
                  <div class="png"><img class="top bottom" src="<?php bloginfo('template_directory'); ?>/elements/images/sidebar-bottom.png" width="182" height="10" alt="" /></div>
                  
                  <div id="rss-pane">
                        <div class="feedburner">
                              <h2>Subscribe</h2>
                              <a id="rss-icon" href="<?php bloginfo('home'); ?>/feed/">Subscribe via RSS</a>
                              <p>Click on the icon to add our RSS Feed to your favourite reader and stay up to date with Time for Food!</p>
                        </div>
                        <div class="feedburner">
                              <p class="margin">Want updates by email? Enter your email address below.</p>
                              <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=CurryPot-IndianCurryRecipes', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
	<input id="feed-email" type="text" name="email"/>
	<input type="hidden" value="CurryPot-IndianCurryRecipes" name="uri"/>
	<input type="hidden" name="loc" value="en_US"/>
	<input id="feed-submit" type="submit" value="" />
</form>
                        </div>
                  </div>
            </div>