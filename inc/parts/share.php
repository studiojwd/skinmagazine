<?php 
$show_share = zl_option('show_share');
if($show_share){
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb ); 
 ?>
<div class="links">
	<strong><i class="fa fa-share-square-o"></i> <?php echo zl_option('lang_share', __('Share', 'zatolab')); ?></strong>
	<a href="#" data-type="twitter" data-url="<?php the_permalink(); ?>" data-description="<?php echo substr(get_the_title(), 0,140); ?>" data-via="SkinShop" class="prettySocial fa fa-twitter"></a>

	<a href="#" data-type="facebook" data-url="<?php the_permalink(); ?>" data-title="<?php the_permalink(); ?>" data-description="<?php echo get_the_excerpt(); ?>" data-media="<?php echo esc_attr($img_url); ?>" class="prettySocial fa fa-facebook"></a>

	<a href="#" data-type="googleplus" data-url="<?php the_permalink(); ?>" data-description="<?php echo get_the_excerpt(); ?>" class="prettySocial fa fa-google-plus"></a>
	
	<a href="#" data-type="pinterest" data-url="<?php the_permalink(); ?>" data-description="<?php echo get_the_excerpt(); ?>" data-media="<?php echo esc_attr($img_url); ?>" class="prettySocial fa fa-pinterest"></a>

	<a href="#" data-type="linkedin" data-url="<?php the_permalink(); ?>" data-title="<?php the_permalink(); ?>" data-description="<?php echo get_the_excerpt(); ?>" data-via="SkinShop" data-media="<?php echo esc_attr($img_url); ?>" class="prettySocial fa fa-linkedin"></a>
</div>
<?php } ?>