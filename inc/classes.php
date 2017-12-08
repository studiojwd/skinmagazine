<?php 
/**
* Global Class for Front End Rendering
*
* 
* @package WordPress
* @since 2.0.0
* @author Azhari Subroto <juarathemes@gmail.com>
* @access public
*/	
if(!class_exists('ZL_GLOBAL')){
	CLASS ZL_GLOBAL{

		/**
		* FAVICONS SET
		* @since sinensis 2.0
		*/
		public function favicons(){
			
			if(zl_option('favicon_144')){ ?>
			<!-- For third-generation iPad with high-resolution Retina display: -->
			<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo zl_option('favicon_144'); ?>">
			<?php } ?>

			<?php if(zl_option('favicon_114')){ ?>
			<!-- For iPhone with high-resolution Retina display: -->
			<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo zl_option('favicon_114'); ?>">
			<?php } ?>

			<?php if(zl_option('favicon_72')){ ?>
			<!-- For first- and second-generation iPad: -->
			<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo zl_option('favicon_72'); ?>">
			<?php } ?>	

			<?php if(zl_option('favicon_57')){ ?>
			<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
			<link rel="apple-touch-icon-precomposed" href="<?php echo zl_option('favicon_57'); ?>">
			<?php } ?>	

			<?php if(zl_option('favicon')){ ?>
			<link rel="shortcut icon" href="<?php echo zl_option('favicon'); ?>" type="image/x-icon" />
			<?php } 
		}


		/**
		* Featured Slider Type Renderer
		* @since sinensis 2.0
		*/
		public function zl_slider(){
			if( function_exists('zl_option') && function_exists('vp_option') ){
				$show_featured = zl_option('show_featured');
			}
			if( 1 == $show_featured ){
				get_template_part('inc/parts/featured');
			}
		}


		/**
		* RENDER Container Opener
		* @since sinensis 2.0
		*/
		public function container_opener(){
			if ( function_exists('zl_option') && function_exists('vp_option') ){

				$sidebar_index = zl_option('sidebar_index', 'right');

				if( 'nosidebar' == $sidebar_index ){
					$full = ' is_fullwidth';
				} else {
					$full = '';
				}
			}
		?>
			<div class="row containerwrap<?php echo esc_attr($full); ?>">
		<?php
		}


		/**
		* RENDER Container Closer
		* @since sinensis 2.0
		*/
		public function container_closer(){ ?>
			</div> <!-- END .row -->
			<div class="clear"></div>
		<?php 	
		}


		/**
		* Render Post Loop
		* @since sinensis 2.0
		* @var $sidebar_index, $c_position
		*/
		public function postloop($sidebar_index){

			/**
			 * Post Loop Style.
			 * Choose grid or default (Full width)
			 */
			$loopvar = get_query_var('blogtype');
			$looptype = zl_option('postlooptype');
			if( 'grid' == $looptype ){
				if( 'default' == $loopvar ){
					$postlooptype = 'default';
				} else {
					$postlooptype = 'grid';
				}
			} else {
				if( 'grid' == $loopvar ){
					$postlooptype = 'grid';
				} else {
					$postlooptype = 'default';
				}
			}

			if( 'right' == $sidebar_index ){
				$c_position = 'medium-8 kiri ';
			} elseif( 'left' == $sidebar_index ){
				$c_position = 'medium-8 kanan ';
			} elseif( 'nosidebar' == $sidebar_index ) {
				$c_position = 'large-12 ';
			} else {
				$c_position = 'medium-12 ';
			}
			?>

			<!-- ooooooooooooooooo
				CONTENT
			oooooooooooooooooo -->

			<?php if( !is_single() AND !is_page() ): ?>
			<div class="<?php echo esc_attr( $c_position ); ?>column <?php echo esc_attr( $postlooptype.'mode' ); ?>">
				<div class="<?php echo esc_attr( $postlooptype ); ?> zl_postscontainer">
					<?php 
					if( is_404() ){
						get_template_part('content', '404');
					} else {
						if(have_posts()): 
						while(have_posts()): the_post();
							if ( 'grid' == $postlooptype) {
								get_template_part('content', 'grid');
							} else {
								get_template_part('content', get_post_format());
							}
						endwhile;
						endif;
					}
					?>
				</div> <!-- END .zl_postscontainer -->
			</div>

			<?php elseif( is_single() or is_page() ): ?>
			<!-- ooooooooooooooooo
				CONTENT
			oooooooooooooooooo -->
			<div class="<?php echo esc_attr( $c_position ); ?>column">
				<div class="zl_postscontainer">

					<?php 
					if(have_posts()): 
					while(have_posts()): the_post();
						get_template_part('content', get_post_format());
					endwhile;
					endif; 
					?>
					
				</div> <!-- END .zl_postscontainer --><div class="clear"></div>

				<?php 
				if( is_single() ){
					get_template_part('inc/parts/share');
					get_template_part('inc/parts/authorinfo');
					get_template_part('inc/parts/related');
				}
				 ?>
				<?php 
					if ( comments_open() || get_comments_number() ) {
						//get_template_part('inc/parts/comments');
						comments_template();
					}
				?>
			</div>
			
			<?php
			endif;
		}


		/**
		* Render Sidebar
		* @since sinensis 2.0
		*/
		public function sidebar($sidebar_index){
			if( 'right' == $sidebar_index ){
				$s_position = 'medium-4 kanan ';
			} elseif( 'left' == $sidebar_index ){
				$s_position = 'medium-4 kiri ';
			} elseif( 'nosidebar' == $sidebar_index ){
				$s_position = 'medium-4 kanan ';
			} else {
				$s_position = 'large-12';
			} 
			?>

			<!-- ooooooooooooooooo
				SIDEBAR
			oooooooooooooooooo -->
			<div id="zl_sidebar" class="<?php echo esc_attr( $s_position ); ?> column">
				<?php get_sidebar(); ?>
			</div>
			
			<?php
		}


		/**
		* Render POST NAVIGATOR
		* @since sinensis 2.0
		* @var 
		*/
		public function postnavigator(){
			global $post;
			$prev = get_adjacent_post(false, '', true);
			$next = get_adjacent_post(false, '', false);
			if (!empty($prev)) {
				$prevID = $prev->ID;
			}
			if (!empty($next)) {
				$newerID = $next->ID;
			}
			?>
	
			<!-- ooooooooooooooooo
				POST NAVIGATOR
			oooooooooooooooooo -->
			<div class="clear"></div>
			<div class="zl_pagination">
				<div class="large-6 column">
					<?php 
						if($prev) {
							$url = get_permalink($prev->ID); 
							echo '<a href="' . $url . '"><i class="fa fa-long-arrow-left"></i> '. __('Previous Post', 'zatolab') .'</a>
							<br>';
							echo '<a href="' . $url . '" class="datitledleft" title="'.get_the_title($prev->ID).'" id="zl_older_post">'.get_the_title($prev->ID).'</a>';
						}
					?>
					&nbsp;
				</div>
				
				<div class="large-6 column text-right">
					&nbsp;
					<?php 
						if($next){
							$url = get_permalink($next->ID);        
							echo '<a href="' . $url . '">'.__('Next Post', 'zatolab').' <i class="fa fa-long-arrow-right"></i> </a>
							<br>';
							echo '<a href="' . $url . '" class="datitledright" title="'.get_the_title($next->ID).'" id="zl_newer_post">'.get_the_title($next->ID).'</a>';
						}
					?>
				</div>
			</div>
			<div class="clear"></div>
			<?php
		}
	}
}

 ?>
