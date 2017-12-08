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

		<div class="row zlqtwrap">
			<div class="zl_queryvar_text">
				<?php
					if ( is_day() ) :
						printf( zl_option('lang_dailyarch', __( 'Daily Archives', 'zatolab' )), '<span>'.get_the_date().'</span>' );
					elseif ( is_month() ) :
						printf( zl_option('lang_monthlyarch', __( 'Monthly Archives', 'zatolab' )), '<span>'.get_the_date( _x( 'F Y', 'monthly archives date format', 'zatolab' ) ).'</span>' );
					elseif ( is_year() ) :
						printf( zl_option('lang_yearlyarch', __( 'Yearly Archives', 'zatolab' )), '<span>'.get_the_date( _x( 'Y', 'yearly archives date format', 'zatolab' ) ).'</span>' );
					else :
						_e( 'Archives', 'zatolab' );
					endif;
				?>
				<br>
				<h1 class="zl_qtext">
					<?php
						if ( is_day() ) :
							printf( '%s', '<span>'.get_the_date().'</span>' );
						elseif ( is_month() ) :
							printf( '%s', '<span>'.get_the_date( _x( 'F Y', 'monthly archives date format', 'zatolab' ) ).'</span>' );
						elseif ( is_year() ) :
							printf( '%s', '<span>'.get_the_date( _x( 'Y', 'yearly archives date format', 'zatolab' ) ).'</span>' );
						else :
							_e( 'Archives', 'zatolab' );
						endif;
					?>
				</h1>
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
		

		ZL_GLOBAL::container_closer(); 


		?>

<?php get_footer(); ?>