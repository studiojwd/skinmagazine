<?php
/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class zl_postSlider extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function zl_postSlider() {
        $widget_ops = array( 'classname' => 'zl_postSlider', 'description' => 'Display Most Recent Posts' );
        $this->WP_Widget( 'zl_postSlider', '&raquo; zl Post Slideshow', $widget_ops );
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
    	$cat = empty($instance['fetch']) ? '' : apply_filters('widget_title', $instance['cat']);


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
            'cat' => $cat,
            'meta_query' => array(array('key' => '_thumbnail_id'))
        );
    $recentposts = new WP_Query( $args );
    if($recentposts->have_posts()):
        echo '<div class="owl-carousel zl_psw">';
        while($recentposts->have_posts()):
        $recentposts->the_post(); 
        /*
        eighty
        rec_post_widget_big
        */
    ?>
        <div class="psw_wrap">
            <a href="<?php the_permalink(); ?>" class=""> 
            <?php 
            if(has_post_thumbnail()){
                the_post_thumbnail( 'rec_post_widget_big' );
            }
             ?></a>
            <a href="<?php the_permalink(); ?>" class="psw_title"><?php the_title(); ?></a>
        </div>
    <?php 
        endwhile;
        echo '</div>';
    else:
        echo esc_html( zl_option('lang_postnotfound', __('No Post Available to Show', 'zatolab')) );
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
    	$instance['cat'] = $new_instance['cat'];

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
                'fetch' => null,
        		'cat' => null
        	));
        $title = $instance['title'];
        $fetch = $instance['fetch'];
    	$cat = $instance['cat'];
        // display field names here using:
        // $this->get_field_id( 'option_name' ) - the CSS ID
        // $this->get_field_name( 'option_name' ) - the HTML name
        // $instance['option_name'] - the option value
        ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">
			Title
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title' ) ); ?>" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('fetch') ); ?>">
			Fetch count
			<input type="fetch" class="widefat" id="<?php echo esc_attr( $this->get_field_id('fetch') ); ?>" name="<?php echo esc_attr( $this->get_field_name('fetch') ); ?>" value="<?php echo esc_attr($fetch); ?>" />
			</label>
		</p>
        <p>
            <select id="<?php echo esc_attr( $this->get_field_id('cat') ); ?>" name="<?php echo esc_attr( $this->get_field_name('cat') ); ?>" class="widefat" style="width:100%;">
                <option <?php selected( $instance['cat'], 'all' ); ?> value="<?php echo 'all'; ?>"><?php echo 'all'; ?></option>
                <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
                <option <?php selected( $instance['cat'], $term->term_id ); ?> value="<?php echo esc_attr( $term->term_id ); ?>"><?php echo esc_html( $term->name ); ?></option>
                <?php } ?>      
            </select>
        </p>
        <?php
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'zl_postSlider' );" ) );