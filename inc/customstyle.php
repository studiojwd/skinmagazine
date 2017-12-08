<?php 

/**
 * Define VARIABLES
*/
if(function_exists('vp_option') && function_exists('zl_option')){

	$accent_clr = zl_option('accent_clr'); 
	$container_use_shadow = zl_option('container_use_shadow'); 

	$topbar_bg = zl_option('topbar_bg'); 
	$topbar_txt_accent = zl_option('topbar_txt_accent'); 
	$topbar_txt = zl_option('topbar_txt'); 
	$show_mainbar = zl_option('show_mainbar');
	$use_border = zl_option('use_border');
	$topbar_bdr_clr = zl_option('topbar_bdr_clr');

	$mainbar_bg = zl_option('mainbar_bg');
	$mainbar_txt = zl_option('mainbar_txt');
	$mainbar_bdr = zl_option('mainbar_bdr');

	$body_bg_clr = zl_option('body_bg_clr');
	$body_bg_img = zl_option('body_bg_img');
	$fit_bg_img = zl_option('fit_bg_img');
	$body_bg_rpt = zl_option('body_bg_rpt');
	$bg_pos = zl_option('bg_pos');
	$bg_att = zl_option('bg_att');
	$use_overlay = zl_option('use_overlay');
	$overlay_color = zl_option('overlay_color');

	$custom_css = zl_option('custom_css');
}	
?>

<?php 
/* Accent Color ========================================================== */ 
if($accent_clr){
?>
/* text color */
a, 
.zl_topmenu > li:hover > a, 
.zl_topmenu > li.current-menu-item > a,
.zl_topmenu ul li:hover > a,
.zl_catmenu > li:hover > a, 
.zl_catmenu > li.current-menu-item > a,
.zl_catmenu > li.menu-item-has-children:hover:after,
.zl_catmenu > li.menu-item-has-children:hover:before,
.zl_catmenu ul li:hover > a,
.zl_content a:hover,
.rel_post a:hover, .rel_post:hover a,
.cau a.url,
.zl_widget a:hover,
.zl_widget ul li a:hover,
.zl_twitter_slide .owl-dot.active span, .zl_twitter_slide .owl-dot:hover span,
.zl_socicon li a:hover,
.zl_postmeta li a:hover,
.zl_topmenu > li.menu-item-has-children:hover:after,
.zl_topmenu ul li.current-menu-item > a,
.zl_topmenu > li.current-menu-ancestor > a,
.zl_topmenu > li.current-menu-ancestor:after,
.zl_catmenu > li.current-page-ancestor > a,
.zl_catmenu > li.current-menu-ancestor:before,
.zl_catmenu ul li.current-menu-item > a,
.zl_pagination .large-3 > a:hover,
.zl_srctrigger:hover,
.zl_topmenu ul li.menu-item-has-children:hover:after
{
	color: <?php echo esc_attr( $accent_clr ); ?>;
}

/* Background */
.zl_catmenu > li > a:before, .zl_catmenu li > a:after,
.zl_posttags a,
.zl_posttags a:before,
.author_social li a:hover,
#comments input[type="submit"],
.zl_content input[type="submit"],
.cn, .cn:after,
.zl_paging li a.current,
.subscribe input[type="submit"], .subscribe button,
.zl_morefooter,
.zl_morefooter:before,
.zl_morefooter:after,
.moretop:before,
.moretop:after,
.zl_twitter_slide .owl-dots .owl-dot.active span, 
.zl_twitter_slide .owl-dots .owl-dot:hover span,
.zl_post.sticky:after,
.zl_widget input[type="submit"]
{
	background: <?php echo esc_attr( $accent_clr ); ?>;
}

.zl_twitter_slide .owl-dot span:before,
.zl_content a:hover,
.zl_paging li a.current
{
	border-color: <?php echo esc_attr( $accent_clr ); ?>;
}
<?php } ?>

<?php 
/* Container Styling ========================================================== */ 
if($container_use_shadow){
	$shadow_size = zl_option('shadow_size');
?>
.zl_container{
	-webkit-box-shadow: 0 0 <?php echo esc_attr($shadow_size); ?>px 0 rgba(0,0,0,.1);
	box-shadow: 0 0 <?php echo esc_attr($shadow_size); ?>px 0 rgba(0,0,0,.1);
}
<?php } ?>


<?php 
/* BODY ========================================================== */ 
?>
body{
	<?php if($body_bg_clr){ ?>
	background-color: <?php echo esc_attr($body_bg_clr) .";\n";} ?>
	<?php if($body_bg_img){ ?>
	background-image: url(<?php echo esc_attr($body_bg_img) .") ;\n";} ?>
	<?php if($bg_pos){ ?>
	background-position: <?php echo esc_attr($bg_pos) .";\n"; } ?>
	<?php if($body_bg_rpt){ ?>
	background-repeat: <?php echo esc_attr($body_bg_rpt) .";\n"; } ?>
	<?php if($bg_att){ ?>
	background-attachment: <?php echo esc_attr($bg_att) .";\n"; } ?>
	<?php if($fit_bg_img){ ?>
	background-size: 110% auto;
	<?php } ?>
}
<?php 
if( 1 == $use_overlay){
 ?>

body:before{
	content:"";
	position: fixed;
	z-index: -1;
	background: <?php echo esc_attr($overlay_color); ?>;
	width: 100%;
	height:100%;
	left:0;
	top:0;
}

<?php } 

$hex = vp_option('zl_options.colorscheme');;
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
 ?>
/* body:before{
	background: rgba(<?php echo esc_attr( $r.','.$g.','.$b.', .8'); ?>);
} */
<?php 
/* TOPBAR ========================================================== */
if($topbar_bg){ 
?>
.zl_topbar,
.zl_topmenu li:hover > ul
{
	background: <?php echo esc_attr( $topbar_bg ); ?>;
	border-bottom: none;
	<?php 
	if( $use_border && $topbar_bdr_clr ){
	 ?>
	border-bottom: 1px solid <?php echo esc_attr( $topbar_bdr_clr ); ?>
	<?php } ?>
}
<?php } ?>

<?php 
if( $use_border && $topbar_bdr_clr ){ ?>

.zl_topbar{
	border-bottom: 1px solid <?php echo esc_attr( $topbar_bdr_clr ); ?>
}
<?php } ?>


<?php 
/* TOPBAR TEXT ========================================================== */
if($topbar_txt){ 
?>
.zl_topmenu > li > a, .zl_socicon li a,
.zl_topmenu ul li a,
.zl_topmenu > li
{
	color: <?php echo esc_attr( $topbar_txt ); ?>;
}


.zl_topmenu > li.current-menu-item > a,
.zl_topmenu > li:hover > a,
.zl_topmenu > li.menu-item-has-children:hover:after,
.zl_socicon li a:hover,
.zl_socicon > li > a:hover,
.zl_topmenu ul li.menu-item-has-children:hover:after
{
	color: <?php echo esc_attr( $topbar_txt_accent ); ?>;
}
.zl_topmenu ul li{
	border-color: rgba(34, 34, 34,.75);
}
<?php } ?>


<?php 
/* CATEGORY MENU ========================================================== */
if($mainbar_bg){ ?>
.zl_catmenu_bar{
	background: <?php echo esc_attr( $mainbar_bg ); ?>;
	border-color: <?php echo esc_attr( $mainbar_bdr ); ?>;
}
<?php } ?>


<?php if($mainbar_txt){ ?>
.zl_catmenu > li > a, .zl_catmenu_bar{
	color: <?php echo esc_attr( $mainbar_txt ); ?>;
}
.zl_srctrigger, .zl_catmenu_bar .m_src_tr{
	color: <?php echo esc_attr( $mainbar_txt ); ?>;
}
<?php } ?>





<?php 
/* Typography Settings ========================================================== */
	$usecustomfont = zl_option('usecustomfont');
	if ($usecustomfont == "1") {
?>

/* Typography */
<?php if(zl_option('body_font_face')){ ?>
body{
	font-family:<?php echo vp_option('zl_option.body_font_face');?>!important;
	font-weight: <?php echo vp_option('zl_option.body_font_weight');?>;
	font-size:<?php echo vp_option('zl_option.body_font_size');?>px!important;
	line-height:<?php echo vp_option('zl_option.body_font_line_height');?>px!important;
}
.zl_copyright{
	font-family:<?php echo vp_option('zl_option.h1_font_face');?>!important;
}
.zl_content p{
	font-size:<?php echo vp_option('zl_option.body_font_size');?>px!important;
	line-height:<?php echo vp_option('zl_option.body_font_line_height');?>px!important;
}
<?php } ?>

h1, h2, h3, h4, h5, h6,
h2.entry-title, h1.entry-title, h3.entry-title, .entry-title, #the_title
{
	font-family:<?php echo vp_option('zl_option.h1_font_face');?>!important;
	font-weight: <?php echo vp_option('zl_option.h1_font_weight');?>!important;
	font-style: <?php echo vp_option('zl_option.h1_font_style');?>;
}
h2.entry-title, h3.entry-title, h1.entry-title{
	font-size:<?php echo vp_option('zl_option.post_tit_size');?>px!important;
	line-height: <?php echo vp_option('zl_option.post_tit_line_size');?>px;
}

/* Menu */
.zl_catmenu > li,
.zl_topmenu > li
{
	font-family: <?php echo vp_option('zl_option.menu_font_face');?>;
	font-weight: <?php echo vp_option('zl_option.menu_font_weight');?>;
	font-style: <?php echo vp_option('zl_option.menu_font_style');?>;
}


.zl_content h1{
	font-size: <?php echo vp_option('zl_option.h1_font_size_b');?>px;
	line-height: <?php echo vp_option('zl_option.h1_font_line_height_b');?>px;
}
.zl_content h2{
	font-size: <?php echo vp_option('zl_option.h2_font_size_b');?>px;
	line-height: <?php echo vp_option('zl_option.h2_font_line_height');?>px;
}
.zl_content h3{
	font-size: <?php echo vp_option('zl_option.h3_font_size');?>px;
	line-height: <?php echo vp_option('zl_option.h3_font_line_height');?>px;
}
.zl_content h4{
	font-size: <?php echo vp_option('zl_option.h4_font_size');?>px;
	line-height: <?php echo vp_option('zl_option.h4_font_line_height');?>px;
}
.zl_content h5{
	font-size: <?php echo vp_option('zl_option.h5_font_size');?>px;
	line-height: <?php echo vp_option('zl_option.h5_font_line_height');?>px;
}
.zl_content h6{
	font-size: <?php echo vp_option('zl_option.h6_font_size');?>px;
	line-height: <?php echo vp_option('zl_option.h6_font_line_height');?>px;
}

<?php } ?>




<?php echo $custom_css; ?>