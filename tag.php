<?php get_header(); ?>

	<!-- ooooooooooooooooo
		BREADCRUMBS
	oooooooooooooooooo -->
	<div class="row zlbwrap">
		<?php zl_breadcrumbs(); ?>
	</div>


	<!-- ooooooooooooooooo
		Query Variable Title
	oooooooooooooooooo -->
	<div class="row  zlqtwrap">
		<div class="zl_queryvar_text">
			<?php echo esc_html( zl_option('lang_searchresultfor', __('Posts Tagged for', 'zatolab')) ); ?>
			<br>
			<h1 class="zl_qtext"><?php printf( __( '%s', 'zatolab' ), single_tag_title( '', false ) ); ?></h1>
		</div>
	</div>
	

	<!-- ooooooooooooooooo
	CONTENT and SIDEBAR
	oooooooooooooooooo -->
	<?php 
	ZL_GLOBAL::container_opener();

	/**
	* Output Loop Post Content
	*
	* Located on: inc/classes.php 
	* @see function postloop(); sidebar();
	*/
	$sidebar_index = zl_option('sidebar_index', 'right');
	if ( 'right' == $sidebar_index ){ 

		ZL_GLOBAL::postloop($sidebar_index);
		ZL_GLOBAL::sidebar($sidebar_index);

	} elseif ( 'left' == $sidebar_index ) {

		ZL_GLOBAL::sidebar($sidebar_index);
		ZL_GLOBAL::postloop($sidebar_index);

	} elseif ( 'nosidebar' == $sidebar_index ){ 

		ZL_GLOBAL::postloop();

	} else {

		ZL_GLOBAL::postloop($sidebar_index);
		ZL_GLOBAL::sidebar($sidebar_index);

	} // Endif $sidebar_index


	/**
	* Output Pagination
	*/
	if(function_exists('zl_paginate')) zl_paginate(); 
	

	ZL_GLOBAL::container_closer(); 


	?>

<?php get_footer(); ?>