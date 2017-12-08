<?php get_header(); ?>


	<!-- ooooooooooooooooo
		BREADCRUMBS
	oooooooooooooooooo -->
	<div class="row zlbwrap">
		<?php zl_breadcrumbs(); ?>
	</div>

	<?php get_template_part('inc/parts/single-ads-top'); ?>

	<!-- ooooooooooooooooo
	CONTENT and SIDEBAR
	oooooooooooooooooo -->
	<?php 
	ZL_GLOBAL::container_opener();
	/**
	* Output Loop Post Content
	*/
	$sidebar_index = zl_option('sidebar_index', 'right');
	if ( 'right' == $sidebar_index ){ 

		ZL_GLOBAL::postloop( $sidebar_index );
		ZL_GLOBAL::sidebar( $sidebar_index );

	} elseif ( 'left' == $sidebar_index ) {

		ZL_GLOBAL::sidebar( $sidebar_index );
		ZL_GLOBAL::postloop( $sidebar_index );

	} elseif ( 'nosidebar' == $sidebar_index ){ 

		ZL_GLOBAL::postloop();

	} // Endif $sidebar_index

	ZL_GLOBAL::postnavigator();

	ZL_GLOBAL::container_closer();

	?>
			

<?php get_footer(); ?>