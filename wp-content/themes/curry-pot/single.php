<?php 

      if(in_category('Indian Curry Recipes')): 
	        include(TEMPLATEPATH . '/single-recipes.php');
	  else: 
	        include(TEMPLATEPATH . '/single-normal.php');
	  endif;
	  
?>