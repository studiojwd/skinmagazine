<article <?php post_class( 'zl_postdefault zl_post' ); ?> id="post-<?php the_id(); ?>">
	<!-- MEDIA -->
	<?php zl_post_media(); ?>
	
	
	<!-- EXCERPT -->
	<div class="zl_content entry-content loop-quote">
		<?php the_content( zl_option('lang_continuereading', __('Continue Reading <i class="fa fa-long-arrow-right"></i>', 'zatolab')) ); ?>
		<?php 
			if( is_singular() ):
			echo "<div class='zl_posttags'>";
			the_tags('<span>' . zl_option('lang_tags', __('Tagged with: ', 'zatolab')) . '</span>', ' ', '<br />');
			echo "</div>";
			endif;
		 ?>
		 <div class="clear"></div>
	</div>
</article>