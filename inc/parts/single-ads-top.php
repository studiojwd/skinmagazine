<?php 
$show_single_ads = zl_option('show_single_ads');
if($show_single_ads){
 ?>
 <!-- ooooooooooooooooo
	AD Top
oooooooooooooooooo -->
<div class="row adbannerwrap">
	<div class="zl_adbanner">
		<?php if(zl_option('singleadstop')) echo balanceTags( zl_option('singleadstop') ); ?>
	</div>
</div>
<?php } ?>
