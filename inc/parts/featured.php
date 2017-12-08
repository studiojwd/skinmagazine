<?php 
	$slider_quevar = get_query_var('slidertype');
	$featuredtype = zl_option('featuredtype');
	if( 'default' == $featuredtype or "default" == $slider_quevar ){
		get_template_part( 'inc/parts/featured-two-col' );
	} elseif( 'wideslider' == $featuredtype or "wide" == $slider_quevar ){
		get_template_part( 'inc/parts/featured-full' );
	}

 ?>
