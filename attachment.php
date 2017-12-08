<?php 
get_header(); 
?>

		<?php get_template_part('inc/parts/single-ads-top'); ?>

		<!-- ooooooooooooooooo
		CONTENT and SIDEBAR
		oooooooooooooooooo -->
		<?php ZL_GLOBAL::container_opener();

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
		
		
		ZL_GLOBAL::postnavigator();
		
		ZL_GLOBAL::container_closer(); 


		?>

<?php get_footer(); ?>