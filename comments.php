<?php
	/**
	 * The template for displaying Comments.
	 *
	 * The area of the page that contains comments and the comment form.
	 *
	 * @package WordPress
	 */
	
	/*
	 * If the current post is protected by a password and the visitor has not yet
	 * entered the password we will return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
	?>
<div class="clear"></div>


<!-- COMMENTS -->
<div class="zl_comment_container">
	<div class="row">
		<div class="large-12 columns">
			<div id="comments">
				<?php if ( have_comments() ) : ?>
				<h2 class="feedbacklabel"><?php _e('Feedback', 'zatolab'); ?></h2> <span class="cn"><?php comments_number( '0', '1', '%' ); ?></span>
				




				<div class="comments-area" id="comments">
					<ul id="comment-list">
						<?php wp_list_comments('style=ul&type=comment&callback=zl_custom_comment'); ?>
					</ul>
					<!-- .comment-list -->
				</div>




				<?php
				// Are there comments to navigate through?
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				?>
				<nav class="navigation comment-navigation" role="navigation">
					<h1 class="screen-reader-text section-heading"><?php echo zl_option('lang_commentnavigation',_e( 'Comment navigation', 'zatolab' )); ?></h1>
					<div class="nav-previous">&larr; <?php previous_comments_link( zl_option('lang_oldercomments',__( 'Older Comments', 'zatolab' )) ); ?></div>
					<div class="nav-next"><?php next_comments_link( zl_option('lang_newercomments',__( 'Newer Comments', 'zatolab' )) ); ?>  &rarr;</div>
				</nav>
				<!-- .comment-navigation -->
				<?php endif; // Check for comment navigation ?>


				
				<?php if ( ! comments_open() && get_comments_number() ) : ?>
					<p class="no-comments"><?php zl_option('lang_commentsclosed',__( 'Comments are closed.', 'zatolab' )); ?></p>
				<?php endif; // ! comments_open() && get_comments_number() ) : ?>
				<?php endif; // have_comments() ?>



			<?php if ( 'open' == $post->comment_status ) : ?>
				<div id="respond">
				<!-- SUBMIT DA COMMENTO -->
				<h1 class="feedbacklabel"><?php comment_form_title(); ?></h1>
				<?php cancel_comment_reply_link(); ?>

				

				<?php 
				if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>
					<p><?php echo zl_option('lang_mustbe', __('You must be ', 'zatolab')); ?><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php echo zl_option('lang_login', __('logged in', 'zatolab')); ?></a> <?php echo zl_option('lang_topostcom', __('to post a comment.', 'zatolab')); ?></p>

				<?php else : ?>



					<?php 
					// Passing theme check :p
					if(zl_option('comment_layout') == 'default'){
						comment_form(); 
					} else { ?>
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
						<!-- csb =  comment submit box -->
						<div class="csb">
							<?php if ( $user_ID ) : ?>
								<?php echo zl_option('lang_logged_in_as', __('Logged in as','zatolab')); ?> 
								<a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo esc_attr( $user_identity ); ?></a>. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Log out of this account">Log out &raquo;</a> <br>
							<?php else : ?>

								
							<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
							 NAME 
							 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
							<input type="text" name="author" id="author" value="<?php echo esc_attr( $comment_author );; ?>" placeholder="<?php echo esc_attr( zl_option('lang_name', __('Name ','zatolab')) );; if ( $req ) echo "(required)"; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />



							<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
							 Email 
							 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
							<input type="text" name="email" id="email" value="<?php echo esc_attr( $comment_author_email ); ?>" placeholder="<?php echo esc_attr( zl_option('lang_email', __('Email','zatolab')) ); ?> (<?php if ( $req ) echo "required, "; ?>never shared)" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
							

							<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
							 Website URL 
							 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
							<input type="text" name="url" id="url" value="<?php echo esc_attr( $comment_author_url ); ?>" placeholder="<?php echo esc_attr( zl_option('lang_website', __('Website','zatolab')) ); ?>" size="22" tabindex="3" />
							<?php endif;  ?>




							<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
							 COMMENT INPUT 
							 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
							<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4" placeholder="<?php echo esc_attr( zl_option('lang_comment', __('Comment', 'zatolab')) ); ?>"></textarea>



						</div>
						<input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo esc_attr( zl_option('lang_submitcom', __('Submit Comment', 'zatolab')) );?>" />
						<?php do_action( 'comment_form', $post->ID ); comment_id_fields(); ?>
					</form>
				
					<?php } ?>

				</div>
				<?php endif; // get_option( 'comment_registration' ) && !$user_ID )  ?>


				<div class="clear"></div>
			<?php endif; // If comments are open: delete this and the sky will fall on your head ?>
			<?php // if ( have_comments() ) ?>
				
			</div>
		</div>
	</div>
</div>