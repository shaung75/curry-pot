<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fabthemes
 */
?>

	</div><!-- #content -->

	<div id="footer-widgets" class="clearfix">
		<div class="container"> <div class="row"> 
			<?php dynamic_sidebar( 'footerbar' ); ?>
		</div></div>
	</div>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container"> <div class="row"> 
			<div class="col-md-12">
				<div class="site-info">
				Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">Curry Pot</a><br>
				
				</div><!-- .site-info -->
			</div>
		</div></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
	jQuery(".inhead").backstretch("<?php echo ft_of_get_option('fabthemes_header',''); ?>");
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22615428-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
