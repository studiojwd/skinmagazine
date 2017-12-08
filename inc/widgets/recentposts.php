<?php
/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class zl_recent_post_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function zl_recent_post_Widget() {
        $widget_ops = array( 'classname' => 'zlrecentposts', 'description' => 'Display Most Recent Posts' );
        $this->WP_Widget( 'zl_recent_post_Widget', '&raquo; zl Posts Fetcher', $widget_ops );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        $fetch = empty($instance['fetch']) ? ' ' : apply_filters('widget_title', $instance['fetch']);
    	$order = empty($instance['order']) ? ' ' : apply_filters('widget_title', $instance['order']);


        echo $before_widget;
        echo $before_title;
        echo esc_html( $title ); // Can set this with a widget option, or omit altogether
        echo $after_title;

    //
    // Widget display logic goes here
    //
/*oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo*/
/* Here We Go, BUild the Gate to prevent headache to find out which the Output*/
/*oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo*/
?>
   
	<?php 
        global $post;
         /**
         * The WordPress Query class.
         * @link http://codex.wordpress.org/Function_Reference/WP_Query
         *
         */
        $args = array(
            'posts_per_page' => $fetch,          
            'ignore_sticky_posts' => 1,          
            'orderby' => $order,          
        );
    $recentposts = new WP_Query( $args );
    if($recentposts->have_posts()):
        $i=0;
        while($recentposts->have_posts()):
        $recentposts->the_post(); 
        /*
        eighty
        rec_post_widget_big
        */
    ?>
        <?php if($i == 0){ ?>
            <div class="recposts big">
                <a href="<?php the_permalink(); ?>" class=""> <?php 
                if(has_post_thumbnail()){
                    the_post_thumbnail( 'rec_post_widget_big' );
                } else {
                    echo '<img src="'.catch_that_image().'" alt=""/>';
                }
                 ?></a>
                <a href="<?php the_permalink(); ?>" class="recpostfirst"><?php the_title(); ?></a>
                <p><?php echo esc_html( substr(get_the_excerpt(), 0,100) ); ?>...</p>
            </div>

        <?php } else { ?>

            <div class="recposts">
                <div class="row">
                    <div class="small-4 column">
                        <a href="<?php the_permalink(); ?>">
                        <?php 
                            if(has_post_thumbnail()){
                                the_post_thumbnail( 'eighty' );
                            } else {
                                echo '<img src="http://placehold.it/80x80/ebebeb/ebebeb" alt="" />';
                            }
                        ?>
                        </a>
                    </div>
                    <div class="small-8 column">
                        <div class="recpostcats">
                            <?php the_category(', ' ); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="rpsmlink">
                            <?php the_title(); ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php 
        $i++;
        endwhile;
    endif; wp_reset_query();
    ?>

<?php    
/*oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo*/
/* </END of: Here We Go, BUild the Gate to prevent headache to find out which the Output*>
/*oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo*/


    echo $after_widget;
    }
    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;

        $instance['title'] = $new_instance['title'];
        $instance['fetch'] = $new_instance['fetch'];
    	$instance['order'] = $new_instance['order'];

        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, 
        	array( 
        		'title' => null,
        		'fetch' => null
        	));
        $title = $instance['title'];
        $fetch = $instance['fetch'];
    	$order = $instance['order'];
        // display field names here using:
        // $this->get_field_id( 'option_name' ) - the CSS ID
        // $this->get_field_name( 'option_name' ) - the HTML name
        // $instance['option_name'] - the option value
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
			Title
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fetch'); ?>">
			Fetch count
			<input type="fetch" class="widefat" id="<?php echo $this->get_field_id('fetch'); ?>" name="<?php echo $this->get_field_name('fetch'); ?>" value="<?php echo esc_attr($fetch); ?>" />
			</label>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>">
            Order By
            <select class='widefat' id="<?php echo $this->get_field_id('order'); ?>"
                name="<?php echo $this->get_field_name('order'); ?>" type="text">
                
                <option value='date'<?php echo ($order=='date')?'selected':''; ?>>
                    Date
                </option>

                <option value='title'<?php echo ($order=='title')?'selected':''; ?>>
                    Title
                </option>
                
                <option value='comment_count'<?php echo ($order=='comment_count')?'selected':''; ?>>
                    Comments
                </option>
                
                <option value='rand'<?php echo ($order=='rand')?'selected':''; ?>>
                    Random
                </option>
                
                <option value='modified'<?php echo ($order=='modified')?'selected':''; ?>>
                    Modified
                </option>
                
            </select> 
            </label>
        </p>
        
        <?php
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'zl_recent_post_Widget' );" ) );