<?php 
$featured_cats = zl_option('feat_cat','');
$featurednumber = zl_option('featurednumber');
if ($featured_cats) {
	$featured_cats = implode(',', $featured_cats);
} 

$args = array(
	'post_type' => 'post',
	'posts_per_page' => $featurednumber,
	'paged' => 1,
	'cat' => $featured_cats,
	'ignore_sticky_posts' => 1,
	'meta_query' => array(array('key' => '_thumbnail_id')) 
);
$autoslide = zl_option('autoslide');
if( $autoslide == 1 ){
	$slideauto = 'true';
} else {
	$slideauto = 'false';
}
$featured = new WP_Query($args);
	if( $featured->have_posts() ):
	?>
	<div class="slideLoader">
		<?php get_template_part('inc/parts/cssloader'); ?>
		<div class="owl-carousel" id="featuredslider" data-auto="<?php echo $slideauto; ?>">
			
			<?php while($featured->have_posts()): $featured->the_post(); ?>
			<div <?php post_class('featwrap'); ?>>
				<a href="<?php the_permalink(); ?>" class="inv_link">&nbsp;</a>
				<div class="featdesc text-center">
					<?php the_category(', '); ?>
					<div class="clear"></div>
					<h4>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h4>
					<!-- EXCERPT of THE POST -->
					<div class="zl_fe">
						<p><?php echo esc_html( substr(get_the_excerpt(), 0,100) ); ?>...</p>
					</div>
				</div>
				<?php 
					$image_size = 'featured_post_thumb';
					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $image_size );
					$image_url = $image_url[0];
				 ?>
				<img src="<?php echo esc_url( $image_url ); ?>" alt=""/>
			</div>
		  	<?php endwhile; ?>
		</div>
	</div>
<?php 
	endif; wp_reset_query(); 
 ?>