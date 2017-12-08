<?php 
/* Template name: Full width with wide featured image */
get_header(); ?>
		
		<?php 
			if(have_posts()): 
			while(have_posts()): the_post(); 
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb ); 
			if($img_url){
		?>
		<div class="zl_wide_img" style="background: url(<?php echo esc_attr( $img_url ); ?>) no-repeat center ; ">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php } ?>

		<!-- ooooooooooooooooo
			CONTENT and SIDEBAR
		oooooooooooooooooo -->
		<div class="row containerwrap is_fullwidth">


			<!-- ooooooooooooooooo
				CONTENT
			oooooooooooooooooo -->
			<div class="medium-12 column">
				<div class="zl_postscontainer">
					<article <?php post_class( 'zl_postdefault zl_post' ); ?> id="post-<?php the_id(); ?>">
						
						<!-- EXCERPT -->
						<div class="zl_content entry-content">
							<?php the_content( 'Continue Reading' ); ?>
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
		<?php 
		endwhile; 
		endif; ?>

<?php get_footer(); ?>