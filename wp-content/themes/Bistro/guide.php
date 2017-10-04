<?php
function theme_guide(){
add_theme_page( 'Theme guide','Theme documentation','edit_themes', 'theme-documentation', 'fabthemes_theme_guide');
}
add_action('admin_menu', 'theme_guide');

function fabthemes_theme_guide(){
		echo '
		
<div id="welcome-panel" class="about-wrap">

	<div class="wpbadge" style="float:left; margin-right:30px; "><img src="'. get_template_directory_uri() . '/screenshot.png" width="250" 
	height="200" /></div>

	<div class="welcome-panel-content">
	
	<h1>Welcome to '.wp_get_theme().' WordPress theme!</h1>
	
		<p class="about-text"> '.wp_get_theme().' is a free premium responsive WordPress theme from fabthemes.com. 
		This theme is built on <b>Bootstrap 3</b> framework. <br> This is theme for Recipe websites. This theme built with features 
		required to post your recipes, food photos, cooking videos etc. The theme is also enabled with Recipe Schema markup to configure your 
		recipe posts for better visiblity on search results. </p>
		

		<div class="changelog ">
			<h3>Theme setup</h3>
			
			<p> Upload the theme to your themes directory and activate it via your theme admin panel.  </p>
			<p> '.wp_get_theme().' theme uses custom homepage template. Create a new page named "<b>Home</b>" and use the "Homepage" 
			template for it. You can also create a new page for blog named <b>Blog</b>. Go to the 
			<b>Settings > Reading > Static Page option </b> and select "<b>Home</b>" for front page and "<b>Blog</b>" for posts page.</p>
			
			<p> <b>Slide</b>: The homepage displays a slideshow. Use the Slide post type to create slide items. </p>
			<p><iframe width="560" height="315" src="//www.youtube.com/embed/9TZx3G8WEF8" frameborder="0" allowfullscreen></iframe></p>
			
			<p> <b>Recipes</b>: Use the recipe post type to create the recipe posts. </p>
			<p><iframe width="560" height="315" src="//www.youtube.com/embed/9TZx3G8WEF8" frameborder="0" allowfullscreen></iframe></p>
			
			<p> <b>Recipes Page:</b> You can create a page that lists all your recipes. For this, go to the Pages > Create a new page titled Recipe and publish it. </p>			
		</div>

	
	
		<div class="changelog ">
		
		<h3>Theme options explained</h3>
		<p>The theme contains an options page using which you adjust various settings available on the theme. </p>
		
		<h3> General settings</h3>
		<p><b>Slide number</b> - Set the number of slides on homepage </p>
		<p><b>Header image</b> - Upload a header image for inner pages</p>
				
		
		<h3> Style customization </h3>
		<p> Use the color selector to customize the main color scheme, accent color, link color, and link hover color. </p>
		
		<h3> Banner settings </h3>
		<p> Customize your sidebar banners </p>
		
		</div>
	
				
		<div class="changelog ">
		' . file_get_contents(dirname(__FILE__) . '/FT/license-html.php') . '
		</div>
	
				


	</div>
	</div>
		
		';
		

}
