<?php
	header("Content-type: text/css;");
	
	if( file_exists('../../../../wp-load.php') ) :
		include '../../../../wp-load.php';
	else:
		include '../../../../../wp-load.php';
	endif;
?>

<?php
	// Styles	
	$primary 	= ft_of_get_option('fabthemes_primary_color','#769A38');
	$secondary	= ft_of_get_option('fabthemes_secondary_color','');
	$link 		= ft_of_get_option('fabthemes_link_color','');
	$hover 		= ft_of_get_option('fabthemes_hover_color','');
	
?>

.main-navigation ul > li a:hover ,.main-navigation ul ul {
	background: <?php echo $primary ?>;
}

.home-section .section-title span,.recipe .ingredients h3,
.recipe .ingredients ul li i, .recipe .steps h3, .recipe .video h3 {
	color: <?php echo $primary ?>
}

.main-navigation, #footer-widgets{
	background: <?php echo $secondary ?>;
}
/* draw any selected text yellow on red background */
::-moz-selection { color: #fff;  background: <?php echo $primary ?>; }
::selection      { color: #fff;  background: <?php echo $primary ?>; } 
/* Links */

a, .hentry .entry-header .entry-meta span {
	color: <?php echo $link ?>;
}

a:visited {
	color: <?php echo $link ?>;
}

a:hover,
a:focus,
a:active {
	color:<?php echo $hover ?>;
	text-decoration: none;
}


