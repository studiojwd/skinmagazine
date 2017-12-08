<article <?php post_class( 'zl_postdefault zl_post' ); ?> id="post-<?php the_id(); ?>">
	
	<header>
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header>
	
	
	<!-- EXCERPT -->
	<div class="zl_content entry-content">
		<?php the_content( zl_option('lang_continuereading', __('Continue Reading <i class="fa fa-long-arrow-right"></i>', 'zatolab')) ); ?>
		<div class="zl_post_paging">
			<?php 						
             $defaults = array(	
             'before'           => '<p class="post_paging">' . __( 'Pages:', 'zatolab' ),
             'after'            => '</p>',
             'link_before'      => '',	
             'link_after'       => '',
             'next_or_number'   => 'number',
             'separator'        => '&nbsp;&nbsp;',
             'pagelink'         => '%',
             'echo'             => 1	
             );
             wp_link_pages($defaults); ?>
		</div>
		<!-- oooooooooooooooooooooooooooooooooo
		Tags
		oooooooooooooooooooooooooooooooooooo-->
		<?php 
			if( is_singular() ):
			echo "<div class='zl_posttags'>";
			the_tags('<span>' . esc_html( zl_option('lang_tags', __('Tagged with: ', 'zatolab')) ) . '</span>', ' ', '<br />');
			echo "</div>";
			endif;
		 ?>
		 <div class="clear"></div>
	</div>
</article>