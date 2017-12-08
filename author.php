<?php get_header(); ?>

		

		<!-- ooooooooooooooooo
			BREADCRUMBS
		oooooooooooooooooo -->
		<div class="row zlbwrap">
			<?php zl_breadcrumbs(); ?>
		</div>
		
 
		<?php if ( have_posts() ) : ?>
		<!-- ooooooooooooooooo
			Query Variable Title
		oooooooooooooooooo -->
		<div class="row  zlqtwrap">

			<div class="zl_queryvar_text">
				<?php echo esc_html( zl_option('lang_byauthor', __('All Posts by', 'zatolab')) ); ?>
				<br>
				<h1 class="zl_qtext">
					<?php
						/*
						 * Queue the first post, that way we know what author
						 * we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop properly
						 * with a call to rewind_posts().
						 */
						the_post();

						printf( get_the_author() );
					?>
				</h1>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
				<?php endif; ?>
			</div>
		</div>



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
		
		endif;
		ZL_GLOBAL::container_closer(); 

		?>

<?php get_footer(); ?>