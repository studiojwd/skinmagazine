<?php 

// Load theme text doman for translation strings
add_action('after_setup_theme', 'sinensis_setup');
function sinensis_setup(){
    load_theme_textdomain( 'zatolab', get_template_directory() . '/lang' );
}



/**
 * Define zl_option() function to retrieve theme options value
 * @since 1.0
 */
if(!function_exists('zl_option') && !function_exists('zl_option')):
    function zl_option( $name, $default = null )
    {
        $option = vp_option( "zl_option." . $name );
        if (empty($option)) {
            $option = $default;
        } 
        if(function_exists('zl_option')){
            return $option;
        }
    }
endif;



// This theme styles the visual editor to resemble the theme style.

add_editor_style( get_template_directory_uri() . '/views/css/editor-style.css' );


/**
 * Add RSS feed links to <head> for posts and comments.
 * @since 1.0
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Add Title tag to wp_head. Since WordPress 4.1
 * @since sinensis 2.0.2
 */
add_theme_support( 'title-tag' );


/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list',
) );

/*
 * Enable support for Post Formats.
 * See http://codex.wordpress.org/Post_Formats
 */
add_theme_support( 'post-formats', array(
	'image', 'video', 'audio', 'quote', 'gallery'
) );

/**
 * Enable support for Post Thumbnails, and declare two sizes.
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'featured_post_thumb', 600, 330, true ); 
add_image_size( 'post_thumb', 645, null ); 
add_image_size( 'eighty', 80, 80, true ); 
add_image_size( 'rec_post_widget_big', 400, 250, true ); 
add_image_size( 'fullwidthslider', 1170, 500, true ); 


/**
 * Catch First Image if Available
 * 
 */
if(!function_exists('catch_that_image')){
    function catch_that_image() {
        global $post, $posts;
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches[1][0];

        if(empty($first_img)) {
            $first_img = "";
        }
        return $first_img;
    }
}


/**
 * Set up the content width value based on the theme's design.
 *
 */
if ( ! isset( $content_width ) ) {
	$content_width = 650;
}

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary'   => __( 'Top Bar Menu', 'zatolab' ),
	'secondary' => __( 'Below Logo', 'zatolab' ),
) );
function zl_fallbackmenu(){ ?>
	<li><a href="#">Go to Adminpanel > Appearance > Menus to create your menu. WP 3.0++ is required</a></li>
<?php }	


/**
 * Set up Custom Query Vars
 *
 * @since sinensis 1.0
 */
function zl_query_vats($vars) {
  $vars[] = "slidertype";
  $vars[] = "blogtype";
  return $vars;
}
add_filter('query_vars', 'zl_query_vats');

/**
 * Set up the Breadcrumb
 *
 * @since sinensis 1.0
 */
function zl_breadcrumbs() {
  	
  
    /* === OPTIONS === */  
    $text['home']     = zl_option('lang_home', __('<i class="fa fa-home"></i>', 'zatolab')); // text for the 'Home' link  
    $text['category'] = zl_option('lang_archivebycategory', __('Archive by Category "%s"', 'zatolab')); // text for a category page  
    $text['search']   = zl_option('lang_searchresultsfor', __('Search Results for "%s"', 'zatolab')); // text for a search results page  
    $text['tag']      = zl_option('lang_posttagged', __('Posts Tagged "%s"', 'zatolab')); // text for a tag page  
    $text['author']   = zl_option('lang_articlespostedby', __('Articles Posted by %s', 'zatolab')); // text for an author page  
    $text['404']      = 'Error 404'; // text for the 404 page  
  
    $show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show  
    $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show  
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show  
    $show_title     = 1; // 1 - show the title for the links, 0 - don't show  
    $delimiter      = ''; // delimiter between crumbs  
    $before         = '<li class="current">'; // tag before the current crumb  
    $after          = '</li>'; // tag after the current crumb  
    /* === END OF OPTIONS === */  
  
    global $post;  
    $home_link    = home_url('/');  
    $link_before  = '<li>';  
    $link_after   = '</li>';  
    $link_attr    = ' rel="v:url" property="v:title"';  
    $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;  
    if($post){
        $parent_id    = $parent_id_2 = $post->post_parent;  
    }
    $frontpage_id = get_option('page_on_front');  
  
    if (is_home() || is_front_page()) {  
  
        if ($show_on_home == 1) echo '<ul class="breadcrumb_list"><li><i class="icon-home"></i> <a href="' . $home_link . '">' . $text['home'] . '</a></li></ul>';  
  
    } else {  
  
        echo '<div  class="zl_breadcrumbs" id="breadcumb" xmlns:v="http://rdf.data-vocabulary.org/#"><ul class="breadcrumb_list">';  
        if ($show_home_link == 1) {  
            echo '<li><i class="icon-home"></i> <a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a></li>';  
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo balancetags( $delimiter );  
        }  
  
        if ( is_category() ) {  
            $this_cat = get_category(get_query_var('cat'), false);  
            if ($this_cat->parent != 0) {  
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);  
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);  
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
                echo balancetags( $cats );  
            }  
            if ($show_current == 1) echo balancetags( $before . sprintf($text['category'], single_cat_title('', false)) . $after );  
  
        } elseif ( is_search() ) {  
            echo balancetags( $before . sprintf($text['search'], get_search_query()) . $after );  
  
        } elseif ( is_day() ) {  
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;  
            echo balancetags( $before . get_the_time('d') . $after );  
  
        } elseif ( is_month() ) {  
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;  
            echo balancetags( $before . get_the_time('F') . $after );  
  
        } elseif ( is_year() ) {  
            echo balancetags( $before . get_the_time('Y') . $after );  
  
        } elseif ( is_single() && !is_attachment() ) {  
            if ( get_post_type() != 'post' ) {  
                $post_type = get_post_type_object(get_post_type());  
                $slug = $post_type->rewrite;  
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);  
                if ($show_current == 1) echo balancetags( $delimiter . $before . get_the_title() . $after );  
            } else {  
                $cat = get_the_category(); $cat = $cat[0];  
                $cats = get_category_parents($cat, TRUE, $delimiter);  
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);  
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);  
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
                echo balancetags( $cats );  
                if ($show_current == 1) echo balancetags( $before . get_the_title() . $after );  
            }  
  
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {  
            $post_type = get_post_type_object(get_post_type());  
            echo balancetags( $before . $post_type->labels->singular_name . $after );  
  
        } elseif ( is_attachment() ) {  
            $parent = get_post($parent_id);  
            $cat = get_the_category($parent->ID); $cat = $cat[0];  
            $cats = get_category_parents($cat, TRUE, $delimiter);  
            $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);  
            $cats = str_replace('</a>', '</a>' . $link_after, $cats);  
            if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);  
            echo balancetags( $cats );  
            printf($link, get_permalink($parent), $parent->post_title);  
            if ($show_current == 1) echo balancetags( $delimiter . $before . get_the_title() . $after );  
  
        } elseif ( is_page() && !$parent_id ) {  
            if ($show_current == 1) echo balancetags( $before . get_the_title() . $after );  
  
        } elseif ( is_page() && $parent_id ) {  
            if ($parent_id != $frontpage_id) {  
                $breadcrumbs = array();  
                while ($parent_id) {  
                    $page = get_page($parent_id);  
                    if ($parent_id != $frontpage_id) {  
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));  
                    }  
                    $parent_id = $page->post_parent;  
                }  
                $breadcrumbs = array_reverse($breadcrumbs);  
                for ($i = 0; $i < count($breadcrumbs); $i++) {  
                    echo balancetags( $breadcrumbs[$i] );  
                    if ($i != count($breadcrumbs)-1) echo balancetags( $delimiter );  
                }  
            }  
            if ($show_current == 1) {  
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo balancetags( $delimiter );;  
                echo balancetags( $before . get_the_title() . $after );  
            }  
  
        } elseif ( is_tag() ) {  
            echo balancetags( $before . sprintf($text['tag'], single_tag_title('', false)) . $after );  
  
        } elseif ( is_author() ) {  
            global $author;  
            $userdata = get_userdata($author);  
            echo balancetags( $before . sprintf($text['author'], $userdata->display_name) . $after );  
  
        } elseif ( is_404() ) {  
            echo balancetags( $before . $text['404'] . $after );  
        }  
  
        if ( get_query_var('paged') ) {  
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';  
            echo __('&nbsp; &raquo; &nbsp; Page', 'zatolab') . ' ' . get_query_var('paged');  
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';  
        }  
  
        echo '</ul></div><!-- .breadcrumbs -->';  
    }  
} // end Breadcrumbs




/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since sinensis 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
/*function zatolab_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( zl_option('lang_pagednumb', __( 'Page %s', 'zatolab' )), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'zatolab_wp_title', 10, 2 );*/



/*--------------------------------------
//add the font
--------------------------------------*/
$body_font_face   = zl_option('body_font_face');
$body_font_weight = zl_option('body_font_weight');
$body_font_style  = zl_option('body_font_style');

$menu_font_face   = zl_option('menu_font_face');
$menu_font_weight = zl_option('menu_font_weight');
$menu_font_style  = zl_option('menu_font_style');

$h1_font_face   = zl_option('h1_font_face');
$h1_font_weight = zl_option('h1_font_weight');
$h1_font_style  = zl_option('h1_font_style');

VP_Site_GoogleWebFont::instance()->add($body_font_face, $body_font_weight, $body_font_style);
VP_Site_GoogleWebFont::instance()->add($menu_font_face, $menu_font_weight, $menu_font_style);
VP_Site_GoogleWebFont::instance()->add($h1_font_face, $h1_font_weight, $h1_font_style);
function zl_embed_fonts()
{
    VP_Site_GoogleWebFont::instance()->register_and_enqueue();
}




/**
 * Load CSS
 */
function zl_script() {
    $customfont = zl_option('usecustomfont');
	/* ========================================= 
	CSS STYLES
	========================================= */
	$the_dir = get_template_directory() . "/views/css";
		
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/views/css/foundation.css', '1.0.0' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/views/css/font-awesome.min.css', '1.0.0' );

    // Custom Fonts
    if ($customfont == "1") {
        VP_Site_GoogleWebFont::instance()->register_and_enqueue();
    }  else {
        $query_args = array(
            'family' => 'Open+Sans:300,400,700,800%7CMerriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        );
        wp_register_style( 'google-fonts', add_query_arg( $query_args, "https://fonts.googleapis.com/css" ), array(), null );
        wp_enqueue_style( 'google-fonts' );
    }
	
	//wp_enqueue_style( 'Droid-Serif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' );
	wp_enqueue_style( 'sinensis-plugins', get_template_directory_uri() . '/views/css/plugins.css', '1.0.0' );


	/*Theme's style.css*/
    wp_enqueue_style( 'sinensis-style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/views/css/responsive.css', '1.0.0' );
    ob_start();
    require 'customstyle.php';
    $custom_css = ob_get_clean();
    wp_add_inline_style( 'sinensis-style', $custom_css );
	/* Responsive */
	//wp_enqueue_style( 'responsive', get_template_directory_uri() . '/views/css/responsive.css', array(), '1.0.0' );

	

	
	/* ========================================= 
	JavaScript
	========================================= */

	/* Comment Reply, used in article page only */
	
	/* Include jQuery from WordPress core */ 

    /* <on the head> */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/views/js/vendor/modernizr.js', array( 'jquery' ), '20141102', false );	
    wp_enqueue_script( 'migrate', get_template_directory_uri() . '/views/js/vendor/jquery-migrate.min.js', array( 'jquery' ), '20141102', false );
    wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/views/js/smoothscroll.js', array( 'jquery' ), '20141102', false );
     /* </on the head> */

	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/views/js/plugins.js', array( 'jquery' ), '20141102', false );
	wp_enqueue_script( 'retina_js', get_template_directory_uri() . '/views/js/retina.js', '', '', true );

	if( function_exists('zl_option') AND function_exists('vp_option') AND 'grid' == zl_option('postlooptype') )
		wp_enqueue_script( 'zl-isotope', get_template_directory_uri() . '/views/js/isotope.pkgd.min.js', array( 'jquery' ), '20141205', true );
		wp_enqueue_script( 'zl-gridmode', get_template_directory_uri() . '/views/js/gridmode.js', array( 'jquery' ), '20141205', true );
    if(is_rtl()){
        wp_enqueue_script( 'sinensis', get_template_directory_uri() . '/views/js/sinensis-rtl.js', array( 'jquery' ), '20141102', true );
    } else {
        wp_enqueue_script( 'sinensis', get_template_directory_uri() . '/views/js/sinensis.js', array( 'jquery' ), '20141102', true );
    }
	

	/* jQuery Pace, if first visit load the script, if not then throws the script away */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	
	
}
add_action( 'wp_enqueue_scripts', 'zl_script' );



/*RETINA SUPPORT*/
add_filter( 'wp_generate_attachment_metadata', 'retina_support_attachment_meta', 10, 2 );
/**
 * Retina images
 *
 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
 */
function retina_support_attachment_meta( $metadata, $attachment_id ) {
    foreach ( $metadata as $key => $value ) {
        if ( is_array( $value ) ) {
            foreach ( $value as $image => $attr ) {
                if ( is_array( $attr ) )
                    retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
            }
        }
    }
 
    return $metadata;
}

/*-----------------------------------------------------------------------------------
 * Create retina-ready images
 *
 * Referenced via retina_support_attachment_meta().
-----------------------------------------------------------------------------------*/
function retina_support_create_images( $file, $width, $height, $crop = false ) {
    if ( $width || $height ) {
        $resized_file = wp_get_image_editor( $file );
        if ( ! is_wp_error( $resized_file ) ) {
            $filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
 
            $resized_file->resize( $width * 2, $height * 2, $crop );
            $resized_file->save( $filename );
 
            $info = $resized_file->get_size();
 
            return array(
                'file' => wp_basename( $filename ),
                'width' => $info['width'],
                'height' => $info['height'],
            );
        }
    }
    return false;
}



/*-----------------------------------------------------------------------------------
 * Delete retina-ready images
 *
 * This function is attached to the 'delete_attachment' filter hook.
-----------------------------------------------------------------------------------*/
add_filter( 'delete_attachment', 'delete_retina_support_images' );

function delete_retina_support_images( $attachment_id ) {
    $meta = $upload_rid = $path = '';
    $meta = wp_get_attachment_metadata( $attachment_id );
    $upload_dir = wp_upload_dir();
    if(!empty($meta['file'])){
        $path = pathinfo( $meta['file'] );
    }
    if($meta){
        foreach ( $meta as $key => $value ) {
            if ( 'sizes' === $key ) {
                foreach ( $value as $sizes => $size ) {
                    $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
                    $retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
                    if ( file_exists( $retina_filename ) )
                        unlink( $retina_filename );
                }
            }
        }
    }
}

/*-----------------------------------------------------------------------------------*/
// POST META
/*-----------------------------------------------------------------------------------*/
function zl_post_meta(){
	global $post;
	?>
	<ul class="zl_postmeta">
		<li><i class="fa fa-cloud"></i> <?php the_category(' - '); ?></li>
		<li><i class="fa fa-calendar-o"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_time(get_option('date_format'), $post->ID); ?></a></li>
	<?php if ( comments_open() ) : ?>
		<li><i class="fa fa-comments-o"></i>  <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'zatolab' ) . '</span>', __( '1 Reply', 'zatolab' ), __( '% Replies', 'zatolab' ) ); ?></li>
	<?php endif; // comments_open() ?>
		
	</ul>
	<div class="clear"></div>
	<?php
}



/*-----------------------------------------------------------------------------------*/
// Author Social Profile
/*-----------------------------------------------------------------------------------*/
function zl_add_to_author_profile( $contactmethods ) {
	
	$contactmethods['rss_url'] = 'RSS URL';
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	$contactmethods['cover_image'] = 'Cover Image';
	
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'zl_add_to_author_profile', 10, 1);



/*-----------------------------------------------------------------------------------*/
// SOCIAL ICONS
/*-----------------------------------------------------------------------------------*/
function zl_social_icons(){ ?>
    <ul class="zl_socicon">
        <?php 
            $facebook = zl_option('facebook_link');
            $twitter = zl_option('twitter_link');
            $googleplus = zl_option('googleplus_link');
            $youtube = zl_option('youtube_link');
            $pinterest = zl_option('pinterest_link');
            $dribble = zl_option('dribble_link');
            $github = zl_option('github_link');
            $linkedin = zl_option('linkedin_link');
            $rss = zl_option('rss_link');
            $tumblr = zl_option('tumblr_link');
            $vimeo_link = zl_option('vimeo_link');
            $instagram = zl_option('instagram');
            $flickr = zl_option('flickr');
        
            if($facebook){ echo '<li><a href="'.$facebook.'"><i class="fa fa-facebook"></i></a></li>';}
            if($twitter){ echo '<li><a href="'.$twitter.'"><i class="fa fa-twitter"></i></a></li>';}
            if($googleplus){ echo '<li><a href="'.$googleplus.'"><i class="fa fa-google-plus"></i></a></li>';}
            if($instagram){ echo '<li><a href="'.$instagram.'"><i class="fa fa-instagram"></i></a></li>';}
            if($youtube){ echo '<li><a href="'.$youtube.'"><i class="fa fa-youtube-play"></i></a></li>';}
            if($pinterest){ echo '<li><a href="'.$pinterest.'"><i class="fa fa-pinterest"></i></a></li>';}
            if($dribble){ echo '<li><a href="'.$dribble.'"><i class="fa fa-dribbble"></i></a></li>';}
            if($github){ echo '<li><a href="'.$github.'"><i class="fa fa-github"></i></a></li>';}
            if($linkedin){ echo '<li><a href="'.$linkedin.'"><i class="fa fa-linkedin"></i></a></li>';}
            if($tumblr){ echo '<li><a href="'.$tumblr.'"><i class="fa fa-tumblr"></i></a></li>';}
            if($vimeo_link){ echo '<li><a href="'.$vimeo_link.'"><i class="fa fa-vimeo-square"></i></a></li>';}
            if($flickr){ echo '<li><a href="'.$flickr.'"><i class="fa fa-flickr"></i></a></li>';}
        ?>
    </ul>

<?php }



/*-----------------------------------------------------------------------------------*/
// Custom Comments Layout
/*-----------------------------------------------------------------------------------*/
function zl_custom_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class('comment'); ?> id="li-comment-<?php comment_ID() ?>">
	<div class="cau">
		<div class="cauava">
			<?php echo get_avatar( $comment->comment_author_email, 60 ); ?>
		</div>
		<div class="cau_content">
			<div id="comment-<?php comment_ID(); ?>">
				<span class="zl_authorname"><?php printf(__('%s', 'zatolab'), get_comment_author_link()) ?> </span> 

				<?php 
                comment_text(); 
				if ($comment->comment_approved == '0') : ?>
					<p><em><?php echo esc_html( zl_option('lang_commoderate', __('Your comment is awaiting moderation.', 'zatolab')) ); ?></em></p>
				<?php endif; ?>
				<div class="clear"></div>
				<div class="zl_cf">
					<a href="<?php echo esc_url( get_comment_link() ); ?>" class="zl_comment_time">
                        <?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?>
                    </a>
					<?php comment_reply_link(array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div> <!-- .zl_cf -->
			</div> <!-- #comment-<?php comment_ID(); ?> -->
		</div> <!-- .cau_content -->
	</div>



<?php } //END CUSTOM COMMENT







/*-----------------------------------------------------------------------------------*/
// Pagination
/*-----------------------------------------------------------------------------------*/

function zl_pagination($pages = '', $range = 3)
{  
	$showitems = ($range * 2)+1;  

	global $paged;
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
        echo "<!-- pagination -->\n";
        echo "<ul class='zl_paging'>\n";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><a href='#' class='current'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
         echo "</ul>\n";
     }
}



/*-----------------------------------------------------------------------------------*/
// Pagination RENDER for THIS THEME ONLY
/*-----------------------------------------------------------------------------------*/
function zl_paginate($pages=''){
    global $post;
    
    if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {

     ?>
    <!-- ooooooooooooooooo
        PAGINATION
    oooooooooooooooooo -->

    <div class="clear"></div>
    <div class="zl_pagination">
        <div class="large-3 column">
            <?php previous_posts_link(__('<i class="fa fa-long-arrow-left"></i> Previous Page', 'zatolab')); ?>
            &nbsp;
        </div>
        <div class="large-6 column">
            <?php if(function_exists('zl_pagination')) zl_pagination(); ?>
        </div>
        <div class="large-3 column text-right">
            <?php next_posts_link( __('Next Page <i class="fa fa-long-arrow-right"></i>', 'zatolab') ); ?>
            &nbsp;
        </div>
    </div>
    <div class="clear"></div>
 <?php
    }
}

/*-----------------------------------------------------------------------------------*/
// Post Media
/*-----------------------------------------------------------------------------------*/
function zl_post_media(){
	global $post;
	$format = get_post_format();
	if ( false === $format || 'image' == $format ) {
		if(has_post_thumbnail()){
            if( 'image' == $format ){
                $thumbid = get_post_thumbnail_id();
                $linkto = wp_get_attachment_url( $thumbid ); 
            } else {
                $linkto = get_permalink();
            }
			echo '<div class="zl_postthumb">';
			echo '<a href="'. $linkto .'">';
			the_post_thumbnail('post_thumb');
			echo '</a>';
			echo '</div>';
		}
	}

    if( is_attachment() ){
        $thumb = get_post_thumbnail_id();
        $thispageid = get_the_ID();
        $img_url = wp_get_attachment_url(); 
        echo '<img src="'. $img_url .'" alt=""/>';
    }
}


/*-----------------------------------------------------------------------------------*/
// WordPress Register Sidebar
/*-----------------------------------------------------------------------------------*/
	
/**
 * Register three Dichan widget areas.
 *
 * @since Dichan 1.0
 *
 * @return void
 */
if(!function_exists('zatolab_widgets_init')){
    function zatolab_widgets_init() {

    	register_sidebar( array(
    		'name'          => __( 'Primary Sidebar', 'zatolab' ),
    		'id'            => 'primary-sidebar',
    		'description'   => __( 'Main sidebar that appears on the right.', 'zatolab' ),
    		'before_widget' => '<div id="sidewid-%1$s" class="zl_widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="zl_widtit">',
    		'after_title'   => '</h4>',
    	) );
    }
    add_action( 'widgets_init', 'zatolab_widgets_init' );
}



/*-----------------------------------------------------------------------------------*/
// Exclude Pages from Search
/*-----------------------------------------------------------------------------------*/
if (!function_exists('SearchFilter')) {
   function SearchFilter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }
    add_filter('pre_get_posts','SearchFilter');
}


/*-----------------------------------------------------------------------------------*/
// Social Open Graph
/*-----------------------------------------------------------------------------------*/
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
	global $post;
	if ( !is_singular()) //if it is not a post or a page
		return;
        echo '<meta property="og:title" content="' . get_the_title() . '"/>'."\n";
        echo '<meta property="og:type" content="article"/>'."\n";
        echo '<meta property="og:url" content="' . get_permalink() . '"/>'."\n";
        echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '"/>'."\n";
	if(has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>'."\n";
	}
	echo "";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

/*-----------------------------------------------------------------------------------*/
// WordPress Widget (Custom)
/*-----------------------------------------------------------------------------------*/

require 'widgets/flickr.php';
require 'widgets/instagram.php';
require 'widgets/recentcomments.php';
require 'widgets/recentposts.php';
require 'widgets/tags.php';
require 'widgets/postslide.php';
require 'widgets/about.php';


 ?>