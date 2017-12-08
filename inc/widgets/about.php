<?php
/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class zl_aboutme_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function zl_aboutme_Widget() {
        $widget_ops = array( 'classname' => 'zl_aboutme_Widget', 'description' => 'About Me Widget' );
        $this->WP_Widget( 'zl_aboutme_Widget', '&raquo; zl About Me', $widget_ops );
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
        $description = apply_filters( 'widget_textarea', empty( $instance['description'] ) ? '' : $instance['description'], $instance );
        $image = empty($instance['image']) ? '' : apply_filters('widget_title', $instance['image']);


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
    if($image)
        echo '<img src="'. esc_attr( $image ) .'" alt=""/>';
    
    if($description)
        echo wpautop( $description );
    ?>
<?php

echo $after_widget;
}
/*oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo*/
/* </END of: Here We Go, BUild the Gate to prevent headache to find out which the Output*>
/*oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo*/
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

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['image'] = strip_tags($new_instance['image']);
        if ( current_user_can('unfiltered_html') )
            $instance['description'] =  $new_instance['description'];
        else
            $instance['description'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['description']) ) );
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
                'image' => null,
                'description' => null,
        	));
        $title = $instance['title'];
        $image = $instance['image'];
        $description = $instance['description'];
        
        ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">
			Title
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('image') ); ?>">
            Image URL
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo esc_attr( $this->get_field_name('image') ); ?>" value="<?php echo esc_attr($image); ?>" />
            </label>
        </p>
		<p>
          <label for="<?php echo esc_attr( $this->get_field_id('description') ); ?>"><?php _e('Description:', 'wp_widget_plugin'); ?></label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr( $this->get_field_id('description') ); ?>" name="<?php echo esc_attr( $this->get_field_name('description') ); ?>"><?php echo esc_textarea( $description ); ?></textarea>
        </p>
        
        <?php
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'zl_aboutme_Widget' );" ) );