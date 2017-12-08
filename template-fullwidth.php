<?php 
/* Template name: Full Width */
get_header(); ?>

		<!-- ooooooooooooooooo
			BREADCRUMBS
		oooooooooooooooooo -->
		<div class="row zlbwrap">
			<?php zl_breadcrumbs(); ?>
		</div>

		<!-- ooooooooooooooooo
			CONTENT and SIDEBAR
		oooooooooooooooooo -->
		<div class="row containerwrap is_fullwidth">


			<!-- ooooooooooooooooo
				CONTENT
			oooooooooooooooooo -->
			<div class="medium-12 column">
				<div class="zl_postscontainer">
					<?php 
					if(have_posts()): 
					while(have_posts()): the_post();
						get_template_part('content', 'page');
					endwhile;
					endif; 
					?>
					
				</div> <!-- END .zl_postscontainer --><div class="clear"></div>
				


				<?php 
					if ( comments_open() || get_comments_number() ) {
						//get_template_part('inc/parts/comments');
						comments_template();
					}
				?>
			</div>
			

			
			
		</div> <!-- END .row -->
		<div class="clear"></div>

<?php get_footer(); ?>