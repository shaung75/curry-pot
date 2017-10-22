<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fabthemes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<nav class="navbar navbar-default" role="navigation"> 
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display --> 
			<div class="navbar-header"> 
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
				</button> 
				<a class="navbar-brand" href="<?php bloginfo('url')?>">
					<img relWidth="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxWidth', 0)); ?>" relHeight="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxHeight', 0)); ?>" id="ft_logo" src="<?php echo get_theme_mod(FT_scope::tool()->optionsName . '_logo', ''); ?>" alt="" />
				</a> 
			</div> 
			<!-- Collect the nav links, forms, and other content for toggling --> 
			<div class="collapse navbar-collapse navbar-ex1-collapse">

			<?php /* Primary navigation */
				wp_nav_menu( array(
					'menu' => 'Main Menu',
					'depth' => 2,
					'container' => false,
					'menu_class' => 'nav navbar-nav',
					//Process nav menu using our custom nav walker
					'walker' => new wp_bootstrap_navwalker())
				);
			?>
			</div>
		</div>
	</nav>

	<div id="content" class="site-content">
		
