<?php 

      if(in_category('Recipes')): 
	        include(TEMPLATEPATH . '/single-recipes.php');
	  else: 
	        include(TEMPLATEPATH . '/single-normal.php');
	  endif;
	  
?>