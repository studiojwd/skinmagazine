<?php 
	$show_related = zl_option('show_related');
	if( 1 == $show_related ):
 ?>

<!-- widget related post -->
<?php
/*$show_related = zl_option('show_related');
if( 1 == $show_related){*/
$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);

if ($tags) {
$tag_ids = array();
foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
$args = array(
	'tag__in' => $tag_ids,
	'post_status' => 'publish',
	'post__not_in' => array($post->ID),
	'posts_per_page'=> 6, // Number of related posts to display.
	'ignore_sticky_posts'=> 1,
	'orderby'=> 'rand',
	'meta_query' => array(array('key' => '_thumbnail_id')) 
);

$related = new wp_query( $args );
/* echo "<pre>";
print_r($tag_ids);
echo "</pre><div class='clear'></div>"; */
if( $related->have_posts() ) {
?>
<!-- RELATED ARTICLES -->
<div class="zl_relposts_wrapper">
	<div class="row">
		<div class="large-12 columns">
			<h1 class="feedbacklabel"><?php _e('Related Entries', 'zatolab'); ?></h1>
			<div class="clear"></div>
			<div class="row">
				<?php 
				$i = 1;
				while($related->have_posts()): $related->the_post(); ?>
				<div class="rel_post medium-4 columns">
					<div class="small-12 columns">
						<a href="<?php the_permalink(); ?>">
							<?php if(has_post_thumbnail()){
								the_post_thumbnail( 'medium' ); 
							} else {
								echo '<img src="http://placehold.it/300x300/000000/000000" alt="" />';
							}?>
						</a>
					</div>
					<div class="small-12 columns">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						<div class="relpost_date">
							<time><?php echo get_the_time(get_option('date_format'), $post->ID); ?></time>
						</div>
					</div>
				</div>
				<?php if ( 0 == $i%3 ) {
			        echo '<div class="clear"></div>';
			    } ?>
				<?php 
				$i++;
				endwhile; ?>
			</div>
		</div>
	</div>
</div>

<?php
}
wp_reset_query();
}

endif; // $show_related
?>	