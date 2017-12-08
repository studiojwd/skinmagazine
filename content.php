<article <?php post_class( 'zl_postdefault zl_post' ); ?> id="post-<?php the_id(); ?>">
	<?php 
	$format = get_post_format();
	if( !in_array($format, array('quote','aside') )){
	 ?>
	<header>
		<!-- POST META -->
		<?php zl_post_meta(); ?>

		<!-- TITLE -->
	<?php if(is_singular()){ ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php } else { ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php } ?>
		<span class="authorby"><?php echo zl_option('lang_author', __('Author: ', 'zatolab')); ?> <span><?php the_author_posts_link();?></span></span>
	</header>
	<div class="clear"></div>

	<?php } // endif; ?>


	<!-- MEDIA -->
	<?php zl_post_media(); ?>
	
	
	<!-- EXCERPT -->
	<div class="zl_content entry-content">
		<?php the_content( ); ?>
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