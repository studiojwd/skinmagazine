<?php
/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class zl_tag_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function zl_tag_Widget() {
        $widget_ops = array( 'classname' => 'zl_tag_Widget', 'description' => 'Display All Tags' );
        $this->WP_Widget( 'zl_tag_Widget', '&raquo; zl Tag', $widget_ops );
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
    	$text = empty($instance['text']) ? ' ' : apply_filters('widget_title', $instance['text']);


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
		$tags = get_tags();
		$html = '<div class="tags">';
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
					
			$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>#";
			$html .= "{$tag->name}</a>";
		}
		$html .= '</div>';
		echo $html;
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

        $instance['title'] = $new_instance['title'];
    	$instance['text'] = $new_instance['text'];

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
        		'text' => null
        	));
        $title = $instance['title'];
    	$text = $instance['text'];
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
        <?php
    }
}

add_action( 'widgets_init', create_function( '', "register_widget( 'zl_tag_Widget' );" ) );