<?php 

      if(is_category('Blog')): 
	  
	        include(TEMPLATEPATH . '/archive-blog.php');
			
	  elseif(in_category('Indian Curry Recipes')): 
	        include(TEMPLATEPATH . '/archive-recipe.php');
						
	  else: 
	        include(TEMPLATEPATH . '/archive-normal.php');
	  endif;

?>