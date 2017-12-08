<article <?php post_class( 'zl_postgrid' ); ?> id="post-<?php the_id(); ?>">
	<?php 
	$format = get_post_format();
	if( !in_array($format, array('quote','aside') )){
	 ?>
	<header>
		<!-- POST META -->


		<!-- TITLE -->
	<?php if(is_singular()){ ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php } else { ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php } ?>
		<ul class="zl_postmeta">
			<li><i class="fa fa-calendar-o"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_time(get_option('date_format'), $post->ID); ?></a></li>
		</ul>
		<!-- <span class="authorby"><?php echo zl_option('lang_author', __('Author: ', 'zatolab')); ?> <span><?php the_author_posts_link();?></span></span> -->
	</header>
	<div class="clear"></div>

	<?php } // endif; ?>


	<!-- MEDIA -->
	<?php zl_post_media(); ?>
	
	
	<!-- EXCERPT -->
	<div class="zl_content entry-content">
		<?php the_excerpt(); ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More</a>
		<div class="clear"></div>
	</div>
</article>