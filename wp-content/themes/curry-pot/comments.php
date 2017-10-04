<?php 

      // Do not delete these lines
	  if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
	  
      if (!empty($post->post_password)) 
	  { 
	        // if there's a password
			if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) 
			{  
			      // and it doesn't match the cookie ?>
                  <h2><?php _e('Password Protected'); ?></h2>
                  <p><?php _e('Enter the password to view comments.'); ?></p>
				  <?php return;
			}
      }

	  /* This variable is for alternating comment background */
	  $oddcomment = 'alt';

      // If Post has comments
      if ($comments) : ?>
      <h2 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h2>

      <ol class="commentlist">
            <?php foreach ($comments as $comment) : ?>
            
                  <?php // Track backs ?>
                  <?php $comment_type = get_comment_type(); ?>
				  
				  <?php if($comment_type == 'pingback'): ?>
                        <li class="item" id="comment-<?php comment_ID() ?>">
                  
                        <div class="comment-box clearfix">
                              <?php comment_text() ?>
                        </div>
                        
                        <?php if ($comment->comment_author_email == "keithdonegan@gmail.com"): ?>
                              
                        <?php else: ?>
                              
                        <?php endif; ?>
                        <div class="commentmetadata">
                              <?php comment_author_link(); ?>, 
							  <?php _e('on'); ?> <?php comment_date('F jS, Y') ?>
							  
							  <?php if ($comment->comment_approved == '0') : ?>
                                    <em><?php _e('Your comment is awaiting moderation.'); ?></em>
							  <?php endif; ?>
                        </div>
                  </li>
                  <?php else: ?>
                        <li class="<?php if ($comment->comment_author_email == "keithdonegan@gmail.com") echo 'author'; else echo $oddcomment; ?> item" id="comment-<?php comment_ID() ?>">
                  
                        <div class="comment-box clearfix">
                              <div class="avatar">
                                    <a href=" <?php comment_author_url(); ?>  "><?php echo get_avatar( $comment, $size = '50', '' ); ?></a>
                              </div>
                              <div class="comment_text">
                                    <?php comment_text() ?>
                              </div>
                        </div>
                        
                        <?php if ($comment->comment_author_email == ""): ?>
                              
                        <?php else: ?>
                              
                        <?php endif; ?>
                        <div class="commentmetadata">
                              <?php comment_author_link(); ?>, 
							  <?php _e('on'); ?> <?php comment_date('F jS, Y') ?>
							  
							  <?php if ($comment->comment_approved == '0') : ?>
                                    <em><?php _e('Your comment is awaiting moderation.'); ?></em>
							  <?php endif; ?>
                        </div>
                  </li>
                  <?php endif; ?>
                  
                  
				  
				  <?php /* Changes every other comment to a different class */
				        if ('alt' == $oddcomment) 
						      $oddcomment = '';
				        else $oddcomment = 'alt';
				  ?>
            <?php endforeach; /* end for each comment */ ?>
      </ol>

<?php else : 

      // This is displayed if there are no comments so far ?>

      <?php if ('open' == $post->comment_status) : ?>
	        <!-- If comments are open, but there are no comments. -->
	  <?php else : // comments are closed ?>

	        <!-- If comments are closed. -->
            <p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
    
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

      <h2 id="respond">Leave a Reply</h2>
	  <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
	  <?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
                  <p class="clearfix logged">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
            <?php else : ?>
                  
                  <label>Your Name (Required)</label>
                  <p class="clearfix">
                        <input type="text" name="author" id="author" size="40" tabindex="1" />
                  </p>
                  
                  <label>Your Email Address (Required)</label>
                  <p class="clearfix">
                        <input type="text" name="email" id="email" size="40" tabindex="2" />
                  </p>
                  
                  <label>Your Website</label>
                  <p class="clearfix">
                        <input type="text" name="url" id="url" size="40" tabindex="3" />
                  </p>
            <?php endif; ?>
            
            <!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags&#58;'); ?> <?php echo allowed_tags(); ?></small></p>-->
            
            <label>Your Comment (Required)</label>
            <p class="clearfix message">
                  <textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea>
            </p>
            
            <p class="clearfix button">
                  <input name="submit" type="submit" id="submit" tabindex="5" value="" />
                  <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
            </p>
			
			<?php do_action('comment_form', $post->ID); ?>

            </form>
      <?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
