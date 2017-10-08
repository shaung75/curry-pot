<?php
/**
 * The shop sidebar
 */

?>
<div class="col-md-4">
	<div id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'shop' ); ?>
		<?php get_template_part( 'sponsors' ); ?>
	</div><!-- #secondary -->
</div>