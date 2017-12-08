	<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 
	FOOTER 
	xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  -->
	<footer>
		<!-- ooooooooooooooooo
		Footer Up
		oooooooooooooooooo -->
		<div id="zl_footer">
			<?php 
			/**
			 * Detect plugin. For use in Admin area only.
			 */
			$foo_page_id = zl_option('top_footer_content');
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if ( is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) && $foo_page_id ) {
			 	
			 	/**
			 	 * Render The Content
			 	 */
			 	$args = array(
			 		'post_type' => 'page',
			 		'page_id' => $foo_page_id
			 	);
			 	$first_foo_content = new WP_Query($args);
			 	if($first_foo_content->have_posts()):
			 		while($first_foo_content->have_posts()): $first_foo_content->the_post();
			 			echo '<div class="row">';
			 			the_content();
			 			echo '</div>';
		 			endwhile;
		 		endif;

			} else {
			 ?>
			
			<?php } ?>
		</div>
		<div class="clear"></div>


		<!-- ooooooooooooooooo
		Copyright
		oooooooooooooooooo -->
		<div class="zl_copyright">
			<div class="row">
				<div class="medium-6 column">
									Skin Shop. All Rights Reserved.
				</div>
				
				<div class="medium-6 column text-right">
					<a href="#"> <?php _e('Back to Top ', 'zatolab'); ?> <i class="fa fa-angle-up"></i></a>
				</div>
			</div>
			<div class="clear"></div>
			<?php 
			/*<div class="zl_morefooter">
				<div class="moretop"></div>
				<span><?php echo zl_option( 'lang_wantmorefooter', __('Want More Footer?') ); ?></span>
			</div>*/
			 ?>
			<div class="clear"></div>
		</div><div class="clear"></div>
	</footer>


	</div> <!-- End .zl_container -->

	<?php if( zl_option('tracker') ) echo balancetags( zl_option('tracker') ); ?>
	<?php wp_footer(); ?>
</body>
</html>
