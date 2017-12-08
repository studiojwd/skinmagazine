<?php 
$featured_cats = zl_option('feat_cat','');
if ($featured_cats) {
	$featured_cats = implode(',', $featured_cats);
} 

$args = array(
	'post_type' => 'post',
	'posts_per_page' => 6,
	'paged' => 1,
	'cat' => $featured_cats,
	'ignore_sticky_posts' => 1,
	'meta_query' => array(array('key' => '_thumbnail_id')) 
);
$autoslide = zl_option('autoslide');
$featured = new WP_Query($args);
	if( $featured->have_posts() ):
	?>
	<div class="slideLoader">
		<?php get_template_part('inc/parts/cssloader'); ?>
		<div class="owl-carousel" id="featuredsliderfull" data-auto="<?php echo $autoslide; ?>">
			
			<?php while($featured->have_posts()): $featured->the_post(); ?>
			<div <?php post_class('featwrap'); ?>>
				<div class="fws_intro text-center">
					<div class="fws_table">
						<div class="fws_cell">
							<?php the_category(', '); ?>
							<div class="clear"></div>
							<h4 class="fws_intro_title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h4>
							<div class="clear"></div>
							<a href="<?php the_permalink(); ?>" class="fws_readmore"><?php echo __('Read More', 'zatolab'); ?></a>
						</div>
					</div>
				</div>
				<?php 
					$image_size = 'fullwidthslider';
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