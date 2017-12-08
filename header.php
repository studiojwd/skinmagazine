<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php 
	/** 
	* Outputs a favicon if defined
	* This action is documented in sinensis/inc/classes.php
	*/
	ZL_GLOBAL::favicons(); ?>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 
	SEARCH FORM 
	xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  -->
	<div class="zl_searchscreen">
		<div class="zlsrc_closer"></div>
		<div class="zl_srctable">
			<div class="zl_srctable-cell">
				<div class="zl_src_form">
					<div class="searchlabel">
						<?php echo zl_option('lang_lookingforsomething', __('Looking for Something?', 'zatolab')); ?>
					</div>
					<form action="<?php echo esc_attr( home_url() ); ?>">
						<input type="text" name="s" id="s" placeholder="<?php echo esc_attr( __('Just Type and Press Enter...', 'zatolab') ); ?>"/>
					</form>
				</div>
			</div>
		</div>
	</div>
	



	<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 
	HEADER 
	xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  -->
	<header>
		<?php 
		$showtopbar = zl_option('showtopbar');
		if( 1 == $showtopbar ):
		 ?>
		<!-- ooooooooooooooooo
		TOPBAR
		oooooooooooooooooo -->
		<div class="zl_topbar">
			<div class="row desktoponly">
				<div class="medium-8 column">
					<ul class="zl_topmenu">
						<?php wp_nav_menu( array( 'container'=> false, 'items_wrap' => '%3$s', 'theme_location' => 'primary', 'fallback_cb'=> 'zl_fallbackmenu') ); ?>
					</ul>
				</div>
				<div class="medium-4 column">
					<?php zl_social_icons(); ?>
				</div>
			</div>
			<div class="clear"></div>

			<!-- MOBILE TOPBAR -->
			<div class="mobileonly zl_m-topbar">
				<div class="row">
					<div class="small-2 columns">
						<div class="zl_tbmt">
							<i class="fa fa-navicon"></i>
						</div>
					</div>
					<div class="small-10 columns">
						<?php zl_social_icons(); ?>
					</div>
				</div>
				<div class="clear"></div>
				<!-- TOPBAR MENU MOBILE -->
				<ul class="m_zl_topmenu">
					<?php wp_nav_menu( array( 'container'=> false, 'items_wrap' => '%3$s', 'theme_location' => 'primary', 'fallback_cb'=> 'zl_fallbackmenu') ); ?>
				</ul>
			</div>
		</div>   <!-- End .zl_topbar -->
		
		
	
		<div class="clear"></div>
		<?php endif; ?>


		<!-- ooooooooooooooooo
			BRANDING
		oooooooooooooooooo -->
		<div class="zl_branding">
			<div class="row">
				<div class="large-12 columns">
					<a href="<?php echo home_url(); ?>">
						<?php 
						$logo = zl_option('logo', get_template_directory_uri().'/views/img/logo.png')
						?>
						<img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr( bloginfo('name') ); ?>"/>
					</a>
				</div>
			</div>
		</div>
	</header>

	



	<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 
	CONTAINER 
	xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  -->
	<div class="zl_container <?php echo esc_attr( zl_option('container_box') ); ?>">
		<?php 
		$show_mainbar = zl_option('show_mainbar');
		if( 1 == $show_mainbar){
		 ?>
		<!-- ooooooooooooooooo
			CATEGORY MENU
		oooooooooooooooooo -->
		<div class="row catmenucontainer">
			<div class="zl_catmenu_bar">
				<div class="desktoponly">
					<div class="small-11 column">
						<ul class="zl_catmenu">                  
							<?php wp_nav_menu( array( 'container'=> false, 'items_wrap' => '%3$s', 'theme_location' => 'secondary', 'fallback_cb'=> 'zl_fallbackmenu') ); ?>
						</ul>
					</div>
					<div class="small-1 column text-right">
						<div class="zl_srctrigger">
							<i class="fa fa-search"></i>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="mobileonly">
					<div class="zl_m_nav">
						<i class="fa fa-ellipsis-v"></i> <?php echo zl_option('lang_navigation', __('Navigation', 'zatolab')); ?>
					</div>
					<div class="m_src_tr">
						<i class="fa fa-search"></i>
					</div>
					<div class="clear"></div>
					<ul class="m_cat_menu">
						<?php wp_nav_menu( array( 'container'=> false, 'items_wrap' => '%3$s', 'theme_location' => 'secondary', 'fallback_cb'=> 'zl_fallbackmenu') ); ?>
					</ul>
				</div>
			</div> <!-- END .zl_catmenu_bar -->
		</div>
		<div class="clear"></div>
		<?php } ?>



