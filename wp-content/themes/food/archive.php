<?php 

      if(is_category('Blog')): 
	  
	        include(TEMPLATEPATH . '/archive-blog.php');
			
	  elseif(is_category('Recipes')): 
	        include(TEMPLATEPATH . '/archive-recipe.php');
						
	  else: 
	        include(TEMPLATEPATH . '/archive-normal.php');
	  endif;

?>