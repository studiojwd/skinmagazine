<?php
$imgdir = get_template_directory_uri() . '/views/img/';
$thelogo = $imgdir.'logo.png'; //Change here
return array(
	'title' => __('Theme Options', 'zatolab'),
	'logo' => $thelogo,
	'menus' => array(
		array(
			'title' => __('General Settings', 'zatolab'),
			'name' => 'pagelayouts',
			'icon' => 'font-awesome:fa-gear',
			'menus' => array(
				array(
					'title' => __('Branding', 'zatolab'),
					'name' => 'basic',
					'icon' => 'font-awesome:fa-wrench',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Logo', 'zatolab'),
							'name' => 'logo',
							'fields' => array(
								array(
									'type' => 'upload',
									'name' => 'logo',
									'label' => __('Logo on Header', 'zatolab'),
									'description' => __('Upload your logo here.', 'zatolab'),
									'default' => '',
								),
								array(
									'type' => 'upload',
									'name' => 'logo_retina',
									'label' => __('Retina Logo', 'zatolab'),
									'description' => __('Please upload the twice-sized of the original logo above, and add "@2x" at the end of logo file name (yourlogoname@2x.png)', 'zatolab'),
									'default' => '',
								),
							),
						),
						array(
							'type' => 'section',
							'title' => __('Favicon', 'zatolab'),
							'name' => 'favicon',
							'icon' => 'font-awesome:fa-gear',
							'fields' => array(
								//Favicon 144
								array(
									'type' => 'upload',
									'name' => 'favicon_144',
									'label' => __('144px Favicon', 'zatolab'),
									'description' => __('Upload your favicon for third-generation iPad with high-resolution Retina display (144x144 px)', 'zatolab'),
									'default' => '',
								),
								//Favicon 114
								array(
									'type' => 'upload',
									'name' => 'favicon_114',
									'label' => __('114px Favicon', 'zatolab'),
									'description' => __('Upload your favicon for iPhone with high-resolution Retina display (114x114 px)', 'zatolab'),
									'default' => '',
								),
								//Favicon 72
								array(
									'type' => 'upload',
									'name' => 'favicon_72',
									'label' => __('72px Favicon', 'zatolab'),
									'description' => __('Upload your favicon For first- and second-generation iPad (72x72 px)', 'zatolab'),
									'default' => '',
								),
								//Favicon 57
								array(
									'type' => 'upload',
									'name' => 'favicon_57',
									'label' => __('57px Favicon', 'zatolab'),
									'description' => __('Upload your favicon For non-Retina iPhone, iPod Touch, and Android 2.1+ devices (57x57 px)', 'zatolab'),
									'default' => '',
								),
								array(
									'type' => 'upload',
									'name' => 'favicon',
									'label' => __('Default Favicon', 'zatolab'),
									'description' => __('Upload your favicon For Default Browser', 'zatolab'),
									'default' => '',
								),		
							),
						),
					),
				),
				array(
					'title' => __('Advanced Settings', 'zatolab'),
					'name' => 'advanced',
					'icon' => 'font-awesome:fa-wrench',
					'controls' => array(
						array(
							'type' => 'section',
							'title' => __('Container Box', 'zatolab'),
							'fields' => array(
								array(
									'type' => 'radiobutton',
									'name' => 'container_box',
									'label' => __('Container Width', 'zatolab'),
									'items' => array(
										array(
											'value' => 'boxed',
											'label' => __('Boxed', 'zatolab'),
										),
										array(
											'value' => 'widemode',
											'label' => __('Full Width', 'zatolab'),
										),
									),
									'default' => 'boxed',
								),
								array(
									'type' => 'toggle',
									'name' => 'container_use_shadow',
									'label' => __('Container Box Drop Shadow', 'zatolab'),
									'description' => __('Drop shadow for the box container that wrapping 2nd Menu, slider, post content, sidebar.', 'zatolab'),
									'default' => '0',
								),
								array(
									'type' => 'textbox',
									'name' => 'shadow_size',
									'label' => 'Shadow Size',
									'description' => 'Put number only, the size is in pixel',
									'dependency' => array(
										'field' => 'container_use_shadow',
										'function' => 'vp_dep_boolean',
									),
									'validation' => 'numeric',
								),
							),
						),
						/* SIDEBAR POSITION xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
						array(
							'type' => 'section',
							'title' => __('Sidebar Configuration', 'zatolab'),
							'name' => 'sidebar_index',
							'fields' => array(
								array(
									'type' => 'radioimage',
									'name' => 'sidebar_index',
									'label' => __('Sidebar Position', 'zatolab'),
									'description' => __('Choose the sidebar position, this configuration will affect to all pages (home, blogroll, archive, category, tag, search, author)', 'zatolab'),
									'items' => array(
										array(
											'value' => 'right',
											'label' => __('Right Sidebar', 'zatolab'),
											'img' => $imgdir.'/sidebar/right.png',
										),
										array(
											'value' => 'left',
											'label' => __('Left Sidebar', 'zatolab'),
											'img' => $imgdir.'/sidebar/left.png',
										),
										array(
											'value' => 'nosidebar',
											'label' => __('No Sidebar / Full Width', 'zatolab'),
											'img' => $imgdir.'/sidebar/nosidebar.png',
										),
									),
									'default' => 'right',
								),
							),
						),
						


						/* POST LOOP MODE xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
						array(
							'type' => 'section',
							'title' => __('Blogroll Type', 'zatolab'),
							'fields' => array(
								array(
									'type'        => 'radiobutton',
									'name'        => 'postlooptype',
									'label'       => __('Blogroll Layout Mode', 'zatolab'),
									'description' => __('The Type of Blogroll Layout.', 'zatolab'),
									'items'       => array(
										array(
											'value' => 'default',
											'label' => 'Default',
										),
										array(
											'value' => 'grid',
											'label' => 'Grid',
										),
									),
									'default' => 'default',
								),
							),
						),


						/* FEATURED CONTENT xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
						array(
							'type' => 'section',
							'title' => __('Featured Posts Slider', 'zatolab'),
							'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'show_featured',
									'label' => __('Show featured content?', 'zatolab'),
									'default' => '0',
								),
								array(
									'type' => 'toggle',
									'name' => 'autoslide',
									'label' => __('Auto Slide', 'zatolab'),
									'default' => '0',
								),
								array(
									'type'        => 'select',
									'name'        => 'featuredtype',
									'label'       => 'Featured Content Type',
									'description' => 'Select Your Favorite Featured Content Type',
									'items'       => array(
										array(
											'value' => 'default',
											'label' => __('Default (2 Columns Box Carousel)', 'zatolab'),
										),
										array(
											'value' => 'wideslider',
											'label' => __(' Full Width Slider ', 'zatolab'),
										),
										
									),
								),
								array(
									'type' => 'multiselect',
									'name' => 'feat_cat',
									'label' => __('Choose Categorie(s)', 'zatolab'),
									'description' => __('The posts will show up within the choosen categories', 'zatolab'),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'vp_get_categories',
											),
										),
									),
								),
								array(
									'type' => 'textbox',
									'name' => 'featurednumber',
									'label' => __('Post Number', 'zatolab'),
									'description' => __('The Number of Posts that should be displayed', 'zatolab'),
								),
							),
						),

						/* ARTICLE FEATURES xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
						array(
							'type' => 'section',
							'title' => __('Article Features', 'zatolab'),
							'name' => 'single_elements',
							'fields' => array(
								array(
									'type' => 'toggle',
									'name' => 'show_share',
									'label' => __('Share Buttons', 'zatolab'),
									'default' => '1',
								),
								array(
									'type' => 'toggle',
									'name' => 'show_authorinfo',
									'label' => __('Author Info', 'zatolab'),
									'default' => '1',
								),
								array(
									'type' => 'toggle',
									'name' => 'show_related',
									'label' => __('Related Articles Box', 'zatolab'),
									'default' => '1',
								),
								/*
								array(
									'type' => 'toggle',
									'name' => 'show_singledate',
									'label' => __('Show Date', 'zatolab'),
									'default' => '1',
								),
								array(
									'type' => 'toggle',
									'name' => 'show_singlemeta',
									'label' => __('Show Meta', 'zatolab'),
									'default' => '1',
								),
								array(
									'type' => 'toggle',
									'name' => 'show_singlebreadcrumb',
									'label' => __('Show Breadcrumb', 'zatolab'),
									'default' => '1',
								),*/
							),
						),
						
						
					),
				),
			),
		),
		
		/* oooooooooooooooooooooooooooooooooooooooo
		index carousel
		ooooooooooooooooooooooooooooooooooooooooo*/
		array(
			'title' => __('404 Page', 'zatolab'),
			'name' => '404settings',
			'icon' => 'font-awesome:fa-question-circle',
			'controls' => array(
				array(
					'type' => 'textbox',
					'name' => 'notfoundtitle',
					'label' => __('Not Found Title', 'zatolab'),
					'description' => __('Not Found Title, leave blank to use default text', 'zatolab'),
				),
				array(
					'type' => 'section',
					'title' => __('Message 404', 'zatolab'),
					'name' => 'notfoundah',
					'fields' => array(
						array(
							'type'                       => 'wpeditor',
							'label'                      => __('Content', 'zatolab'),
							'name'                       => 'notfoundcontent',
							'use_external_plugins'       => 1,
							'disabled_externals_plugins' => 'vp_sc_button, sgtroces2',
							'disabled_internals_plugins' => '',
						),
					),
				),
			),
		),
		
		/* oooooooooooooooooooooooooooooooooooooooo
		STYLING
		ooooooooooooooooooooooooooooooooooooooooo*/
		array(
			'title' => __('Design & Styling', 'zatolab'),
			'name' => 'styling',
			'icon' => 'font-awesome:fa-paint-brush',
			'controls' => array(
				
				
				array(
					'type' => 'section',
					'title' => __('Body Styling', 'zatolab'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'body_bg_clr',
							'label' => 'Body Background Color',
						),
						
						array(
							'type' => 'toggle',
							'name' => 'use_overlay',
							'label' => __('Use Background overlay?', 'zatolab'),
							'description' => __('The layer that overlay the body background element', 'zatolab'),
							'default' => '0',
						),
						array(
							'type' => 'color',
							'name' => 'overlay_color',
							'label' => 'Overlay Color',
							'format' => 'rgba',
							'dependency' => array(
								'field' => 'use_overlay',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'upload',
							'name' => 'body_bg_img',
							'label' => __('Body Background Image', 'zatolab'),
							'description' => __('Upload your image here for body backgrond.', 'zatolab'),
						),
						array(
							'type' => 'toggle',
							'name' => 'fit_bg_img',
							'label' => __('Stretch Background Image', 'zatolab'),
							'default' => '0',
						),
						array(
							'type'        => 'select',
							'name'        => 'body_bg_rpt',
							'label'       => 'Body Background Repeat',
							'description' => 'Select and sort your choices',
							'items'       => array(
								array(
									'value' => 'repeat-x',
									'label' => __('Horizontal Repeat', 'zatolab'),
								),
								array(
									'value' => 'repeat-y',
									'label' => __('Vertical Repeat', 'zatolab'),
								),
								array(
									'value' => 'repeat',
									'label' => __('Horizontal & Vertical Repeat', 'zatolab'),
								),
								array(
									'value' => 'no-repeat',
									'label' => __('No Repeat', 'zatolab'),
								),
							),
						),
						array(
							'type' => 'select',
							'name' => 'bg_pos',
							'label' => __('Background Position', 'zatolab'),
							'items' => array(
								array(
									'value' => 'top left',
									'label' => __('top left', 'zatolab'),
								),
								array(
									'value' => 'top center',
									'label' => __('top center', 'zatolab'),
								),
								array(
									'value' => 'top right',
									'label' => __('top right', 'zatolab'),
								),
								array(
									'value' => 'center left',
									'label' => __('center left', 'zatolab'),
								),
								array(
									'value' => 'center center',
									'label' => __('center center', 'zatolab'),
								),
								array(
									'value' => 'center right',
									'label' => __('center right', 'zatolab'),
								),
								array(
									'value' => 'bottom left',
									'label' => __('bottom left', 'zatolab'),
								),
								array(
									'value' => 'bottom center',
									'label' => __('bottom center', 'zatolab'),
								),
								array(
									'value' => 'bottom right',
									'label' => __('bottom right', 'zatolab'),
								),
								
							),
						),
						array(
							'type' => 'select',
							'name' => 'bg_att',
							'label' => __('Background Attachment', 'zatolab'),
							'items' => array(
								array(
									'value' => 'fixed',
									'label' => __('Fixed', 'zatolab'),
								),
								array(
									'value' => 'scroll',
									'label' => __('Scroll', 'zatolab'),
								),
							),
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Accent Color', 'zatolab'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'accent_clr',
							'label' => 'Accent Color',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('Top Bar Styling', 'zatolab'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'showtopbar',
							'label' => __('Show Top Bar?', 'zatolab'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'use_border',
							'label' => __('Use Border (stroke)', 'zatolab'),
							'default' => '0',
						),
						array(
							'type' => 'color',
							'name' => 'topbar_bdr_clr',
							'label' => __('Border Color', 'zatolab'),
							'format' => 'rgba',
							'dependency' => array(
								'field' => 'use_border',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'color',
							'name' => 'topbar_bg',
							'label' => __('Background Color', 'zatolab'),
							'description' => __('The background color for top bar', 'zatolab'),
							'format' => 'rgba',
						),
						array(
							'type' => 'color',
							'name' => 'topbar_txt',
							'label' => __('Text Color Default', 'zatolab'),
							'description' => __('The text color for top bar', 'zatolab'),
							'format' => 'hex',
						),
						array(
							'type' => 'color',
							'name' => 'topbar_txt_accent',
							'label' => __('Text Color (Accent)', 'zatolab'),
							'description' => __('Will affect to hover and active state links', 'zatolab'),
							'format' => 'hex',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('2nd Menu Bar (Below Logo)', 'zatolab'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'show_mainbar',
							'label' => __('Show The Bar?', 'zatolab'),
							'default' => '1',
						),
						array(
							'type' => 'color',
							'name' => 'mainbar_bg',
							'label' => __('Background Color', 'zatolab'),
							'description' => __('The background color', 'zatolab'),
							'format' => 'rgba',
						),
						array(
							'type' => 'color',
							'name' => 'mainbar_txt',
							'label' => __('Text Color', 'zatolab'),
							'description' => __('The text color', 'zatolab'),
							'format' => 'hex',
						),
						array(
							'type' => 'color',
							'name' => 'mainbar_bdr',
							'label' => __('Border Color', 'zatolab'),
							'description' => __('The border bottom color', 'zatolab'),
							'format' => 'rgba',
						),
					),
				),
			),
		),
		
		
		
		/* oooooooooooooooooooooooooooooooooooooooo
		ADS Settings
		ooooooooooooooooooooooooooooooooooooooooo*/
		array(
			'title' => __('Advertising', 'zatolab'),
			'name' => 'ads',
			'icon' => 'font-awesome:fa-paper-plane',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Top Banner Ads', 'zatolab'),
					'description' => __('Social Media Links That will appear in top right of the container', 'zatolab'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'show_single_ads',
							'label' => __('Enable Ads on article posts', 'zatolab'),
							'description' => __('on top, will be displayed at the below of the breadcrumbs', 'zatolab'),
						),
						array(
							'type' => 'codeeditor',
							'name' => 'singleadstop',
							'label' => __('Ads Script', 'zatolab'),
							'description' => __('Put the code such as google adsense here.', 'zatolab'),
							'theme' => 'github',
							'mode' => 'html',
						),
					),
				),
			),
		),
		
		/* oooooooooooooooooooooooooooooooooooooooo
		SOCIAL ICON
		ooooooooooooooooooooooooooooooooooooooooo*/
		array(
			'title' => __('Social Media', 'zatolab'),
			'name' => 'social',
			'icon' => 'font-awesome:fa-facebook',
			'controls' => array(
				
				array(
					'type' => 'section',
					'title' => __('Social Media Links', 'zatolab'),
					'name' => 'social',
					'description' => __('Social Media Links That will appear in top right of the container', 'zatolab'),
					'fields' => array(
						
						array(
							'type' => 'textbox',
							'name' => 'facebook_link',
							'label' => __('Facebook URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
						),
						array(
							'type' => 'textbox',
							'name' => 'twitter_link',
							'label' => __('Twitter URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						array(
							'type' => 'textbox',
							'name' => 'googleplus_link',
							'label' => __('Google+ URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						array(
							'type' => 'textbox',
							'name' => 'youtube_link',
							'label' => __('Youtube URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						array(
							'type' => 'textbox',
							'name' => 'pinterest_link',
							'label' => __('Pinterest URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						array(
							'type' => 'textbox',
							'name' => 'dribble_link',
							'label' => __('Dribbble URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						array(
							'type' => 'textbox',
							'name' => 'instagram',
							'label' => __('Instagram', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						array(
							'type' => 'textbox',
							'name' => 'flickr',
							'label' => __('Flickr URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						
						array(
							'type' => 'textbox',
							'name' => 'github_link',
							'label' => __('github URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						array(
							'type' => 'textbox',
							'name' => 'linkedin_link',
							'label' => __('linkedin URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						
						array(
							'type' => 'textbox',
							'name' => 'tumblr_link',
							'label' => __('tumblr URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						array(
							'type' => 'textbox',
							'name' => 'vimeo_link',
							'label' => __('vimeo URL', 'zatolab'),
							'description' => __('Put the link here', 'zatolab'),
							
						),
						
					),
				),
			),
		),
		
		array(
			'title' => __('Typography', 'zatolab'),
			'name' => 'typography',
			'icon' => 'font-awesome:fa-font',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Use Custom Font', 'zatolab'),
					'name' => 'custom_font',
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'usecustomfont',
							'label' => __('Use Custom Font', 'zatolab'),
							'description' => __('Use custom font from google webfonts or not?', 'zatolab'),
						),
					),
				),
				array(
					'type' => 'notebox',
					'name' => 'nb_1',
					'label' => __('<strong>Line-height Help!</strong>', 'zatolab'),
					'description' => __('Are you confuse how to set the ratio of the line-height and font-size? Just use this tool to make your life easier: <a href="http://www.pearsonified.com/typography/">Golden Ratio Typography Calculator</a>. Just remember that you need to fill the content width with <strong>640</strong>', 'zatolab'),
					'status' => 'normal',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
				),
				array(
					'type' => 'section',
					'title' => __('Body Font', 'zatolab'),
					'name' => 'body_font',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						
						array(
							'type' => 'select',
							'name' => 'body_font_face',
							'label' => __('Font Face', 'zatolab'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							
						),
						array(
							'type' => 'radiobutton',
							'name' => 'body_font_weight',
							'label' => __('Font Weight', 'zatolab'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'body_font_face',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'body_font_style',
							'label' => __('Font Style', 'zatolab'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'body_font_face',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'{{first}}',
							),
						),
						
						array(
							'type'    => 'slider',
							'name'    => 'body_font_size',
							'label'   => __('Font Size (px)', 'zatolab'),
							
							'max'     => '100',
							'default' => '16',
						),
						array(
							'type'    => 'slider',
							'name'    => 'body_font_line_height',
							'label'   => __('Line Height (px)', 'zatolab'),
							'min'     => '0',
							'max'     => '100',
							'default' => '',
							'step'    => '0.1',
						),
					),
				),//END BODY FONT
				
				array(
					'type' => 'section',
					'title' => __('menu Font', 'zatolab'),
					'name' => 'menu_font',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						
						array(
							'type' => 'select',
							'name' => 'menu_font_face',
							'label' => __('Font Face', 'zatolab'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							
						),
						array(
							'type' => 'radiobutton',
							'name' => 'menu_font_weight',
							'label' => __('Font Weight', 'zatolab'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'menu_font_face',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'menu_font_style',
							'label' => __('Font Style', 'zatolab'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'menu_font_face',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'{{first}}',
							),
						),
						
					),
				),//END menu FONT

				array(
					'type' => 'section',
					'title' => __('Heading Font', 'zatolab'),
					'description' => 'This font will affect to H1 to H6 font family',
					'name' => 'h1_font',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						
						array(
							'type' => 'select',
							'name' => 'h1_font_face',
							'label' => __('Heading Font Face', 'zatolab'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
							
						),

						array(
							'type' => 'radiobutton',
							'name' => 'h1_font_weight',
							'label' => __('Font Weight', 'zatolab'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h1_font_face',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'h1_font_style',
							'label' => __('Font Style', 'zatolab'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'h1_font_face',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'{{first}}',
							),
						),

					),
				),//Heading Font
				
				array(
					'type' => 'section',
					'title' => __('Post Title Size', 'zatolab'),
					'name' => 'post_title',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						
						array(
							'type'    => 'slider',
							'name'    => 'post_tit_size',
							'label'   => __('Font Size (px)', 'zatolab'),
							
							'max'     => '100',
						),
						array(
							'type'    => 'slider',
							'name'    => 'post_tit_line_size',
							'label'   => __('Line Height (px)', 'zatolab'),
							'min'     => '0',
							'max'     => '100',
							'step'    => '0.1',
						),
					),
				),
				array(
					'type' => 'section',
					'title' => __('H1 Font Size', 'zatolab'),
					'name' => 'h1_font_s',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						
						array(
							'type'    => 'slider',
							'name'    => 'h1_font_size_b',
							'label'   => __('Font Size (px)', 'zatolab'),
							
							'max'     => '100',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h1_font_line_height_b',
							'label'   => __('Line Height (px)', 'zatolab'),
							'min'     => '0',
							'max'     => '100',
							'step'    => '0.1',
						),
					),
				),// H1
				array(
					'type' => 'section',
					'title' => __('H2 Font Size', 'zatolab'),
					'name' => 'h2_font',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						
						array(
							'type'    => 'slider',
							'name'    => 'h2_font_size',
							'label'   => __('Font Size (px)', 'zatolab'),
							
							'max'     => '100',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h2_font_line_height',
							'label'   => __('Line Height (px)', 'zatolab'),
							'min'     => '0',
							'max'     => '100',
							'step'    => '0.1',
						),
					),
				),// H2
				
				array(
					'type' => 'section',
					'title' => __('H3 Fonts', 'zatolab'),
					'name' => 'h3_font',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						array(
							'type'    => 'slider',
							'name'    => 'h3_font_size',
							'label'   => __('Font Size (px)', 'zatolab'),
							
							'max'     => '100',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h3_font_line_height',
							'label'   => __('Line Height (px)', 'zatolab'),
							'min'     => '0',
							'max'     => '100',
							'step'    => '0.1',
						),
					),
				),//h3
				array(
					'type' => 'section',
					'title' => __('H4 Fonts', 'zatolab'),
					'name' => 'h4_font',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						
						array(
							'type'    => 'slider',
							'name'    => 'h4_font_size',
							'label'   => __('Font Size (px)', 'zatolab'),
							
							'max'     => '100',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h4_font_line_height',
							'label'   => __('Line Height (px)', 'zatolab'),
							'min'     => '0',
							'max'     => '100',
							'step'    => '0.1',
						),
					),
				),//h4
				array(
					'type' => 'section',
					'title' => __('H5 Fonts', 'zatolab'),
					'name' => 'h5_font',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						array(
							'type'    => 'slider',
							'name'    => 'h5_font_size',
							'label'   => __('Font Size (px)', 'zatolab'),
							
							'max'     => '100',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h5_font_line_height',
							'label'   => __('Line Height (px)', 'zatolab'),
							'min'     => '0',
							'max'     => '100',
							'step'    => '0.1',
						),
					),
				),//h5
				array(
					'type' => 'section',
					'title' => __('H6 Fonts', 'zatolab'),
					'name' => 'h6_font',
					'dependency' => array(
						'field' => 'usecustomfont',
						'function' => 'vp_dep_boolean',
					),
					'fields' => array(
						
						array(
							'type'    => 'slider',
							'name'    => 'h6_font_size',
							'label'   => __('Font Size (px)', 'zatolab'),
							
							'max'     => '100',
						),
						array(
							'type'    => 'slider',
							'name'    => 'h6_font_line_height',
							'label'   => __('Line Height (px)', 'zatolab'),
							'min'     => '0',
							'max'     => '100',
							'step'    => '0.1',
						),
					),
				),//h6

				

			
				
			),
		),//END Typography
		
		
		/* oooooooooooooooooooooooooooooooooooooooo
		CUSTOM CODE
		ooooooooooooooooooooooooooooooooooooooooo*/
		array(
			'title' => __('Custom Codes', 'zatolab'),
			'name' => 'custom_codes',
			'icon' => 'font-awesome:fa-code',
			'controls' => array(
				array(
					'type' => 'codeeditor',
					'name' => 'custom_css',
					'label' => __('Custom CSS', 'zatolab'),
					'description' => __('Write your custom css here.', 'zatolab'),
					'theme' => 'github',
					'mode' => 'css',
				),/*
				array(
					'type' => 'codeeditor',
					'name' => 'customscript',
					'label' => __('Custom Javascript', 'zatolab'),
					'description' => __('Put the javascript code. DO NOT include script tag', 'zatolab'),
					'theme' => 'github',
					'mode' => 'javascript',
				),*/
				array(
					'type' => 'codeeditor',
					'name' => 'tracker',
					'label' => __('Tracker Script', 'zatolab'),
					'description' => __('Put the tracker code such as google analythic here', 'zatolab'),
					'theme' => 'github',
					'mode' => 'html',
				),
			),
		),
		
		
		
		/* oooooooooooooooooooooooooooooooooooooooo
		FOOTER
		ooooooooooooooooooooooooooooooooooooooooo*/
		array(
			'title' => __('Footer', 'zatolab'),
			'name' => 'footer',
			'icon' => 'font-awesome:fa-gear',
			'controls' => array(

				/* Footer xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
				array(
					'type' => 'section',
					'title' => __('Footer', 'zatolab'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'copyright_text',
							'label' => __('Copyright Text', 'zatolab'),
						),
					),
				),
				array(
					'type' => 'notebox',
					'name' => 'asdasd',
					'label' => __('This configuration needs Siteorigin Page Builder', 'zatolab'),
					'description' => __('You can download the required plugin from <a href="https://wordpress.org/plugins/siteorigin-panels/">Here</a>', 'zatolab'),
					'status' => 'info',
				),
				array(
					'type' => 'select',
					'name' => 'top_footer_content',
					'label' => __('First Footer Content', 'zatolab'),
					'description' => __('Select the page that the content was created with Siteorigin Page Builder, the content of the choosen page will be displayed in this footer', 'zatolab'),
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'vp_get_pages',
							),
						),
					),
				),
			),
		),

		/* oooooooooooooooooooooooooooooooooooooooo
		Translate
		ooooooooooooooooooooooooooooooooooooooooo*/
		/*array(
			'title' => __('Translate', 'zatolab'),
			'name' => 'translation',
			'icon' => 'font-awesome:fa-globe',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Translate Strings', 'zatolab'),
					'name' => 'translates',
					'description' => __('Translate all Default Theme Text Strings', 'zatolab'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'lang_menu',
							'label' => 'Menu',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_search',
							'label' => 'Search',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_closesearch',
							'label' => 'Close Search',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_sharewhatsnew',
							'label' => 'Share what\'s new...',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_title',
							'label' => 'Title:',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_content',
							'label' => 'Content:',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_createpost',
							'label' => 'Create Post',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_cancel',
							'label' => 'Cancel',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_otherpostby',
							'label' => 'Other posts by',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_feedbacks',
							'label' => 'Feedbacks',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_followme',
							'label' => 'Follow Me',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_related',
							'label' => 'Related Articles',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_readmore',
							'label' => 'Read More',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_port_prev',
							'label' => 'Previous Project',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_port_next',
							'label' => 'Next Project',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_close',
							'label' => 'Close',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_projectinfo',
							'label' => 'Project Info',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_portlink',
							'label' => 'Launch Project',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_allowedfiles',
							'label' => 'Allowed Files',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_sharenew',
							'label' => 'Share What\'s new',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_postitle',
							'label' => 'Post Title',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_gallerytype',
							'label' => 'Gallery Type',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_gallerytype',
							'label' => 'Gallery Type',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_slide',
							'label' => 'Slide',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_photogrid',
							'label' => 'Grid Gallery',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_justified',
							'label' => 'Justified Gallery',
						),

						array(
							'type' => 'textbox',
							'name' => 'lang_dropimage',
							'label' => 'Drop Image Here',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_or',
							'label' => 'or',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_uploadfiles',
							'label' => 'Upload Files',
						),

						array(
							'type' => 'textbox',
							'name' => 'lang_removeimage',
							'label' => 'Remove Featured Images',
						),

						array(
							'type' => 'textbox',
							'name' => 'lang_home',
							'label' => 'Home',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_archivebycategory',
							'label' => 'Archive by Category "%s"',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_searchresultsfor',
							'label' => 'Search Results for "%s"',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_posttagged',
							'label' => 'Posts Tagged "%s"',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_articlespostedby',
							'label' => 'Articles Posted by %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_commoderate',
							'label' => 'Your comment is awaiting moderation.',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_reply',
							'label' => 'Reply to',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_on',
							'label' => 'on',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_anonymous',
							'label' => 'Anonymous',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_loading',
							'label' => 'Loading',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_pickimage',
							'label' => 'Pick Gallery Images',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_addimage',
							'label' => 'Add Images',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_pagednumb',
							'label' => 'Page %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_cat',
							'label' => 'Category:',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_categories',
							'label' => 'Categories',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_post_thumb',
							'label' => 'Featured Image',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_albums',
							'label' => 'Albums',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_photos',
							'label' => 'Photos',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_arch',
							'label' => 'Archive for',
						),

						array(
							'type' => 'textbox',
							'name' => 'lang_dailyarch',
							'label' => 'Daily Archives: %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_monthlyarch',
							'label' => 'Monthly Archives: %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_yearlyarch',
							'label' => 'Yearly Archives: %s',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_comments',
							'label' => 'Comments',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_views',
							'label' => 'Views',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_title2',
							'label' => 'Title',
							'description' => 'It\'s for an option in post sorter (frontend)',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_shortby',
							'label' => 'Sort by:',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_go',
							'label' => 'Go',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_date',
							'label' => 'Date',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_view',
							'label' => 'View: ',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_respond',
							'label' => 'Respond ',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_onerespond',
							'label' => 'One Response ',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_responses',
							'label' => 'Responses ',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_commentnavigation',
							'label' => 'Comment Navigation',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_oldercomments',
							'label' => 'Older Comments',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_newercomments',
							'label' => 'Newer Comments',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_commentsclosed',
							'label' => 'Comments are closed',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_logged_in_as',
							'label' => 'Logged in as',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_name',
							'label' => 'Name',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_email',
							'label' => 'Email',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_website',
							'label' => 'Website',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_submitcom',
							'label' => 'Submit Comment',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_mustbe',
							'label' => 'You must be ',
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_login',
							'label' => 'logged in'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_topostcom',
							'label' => 'to post a comment.'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_postauthor',
							'label' => 'Written by'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_in',
							'label' => 'In'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_share',
							'label' => 'Share'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_tags',
							'label' => 'Tagged with: '
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_more',
							'label' => 'Continue Reading'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_notfound_des',
							'label' => 'The page that you\'re looking for is not found. Please check if the url is the right one'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_prev_alb',
							'label' => 'Older Album'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_next_alb',
							'label' => 'Newer Album'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_uploaded',
							'label' => 'Uploaded on'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_prev_post',
							'label' => 'Older post'
						),
						array(
							'type' => 'textbox',
							'name' => 'lang_next_post',
							'label' => 'Newer post'
						),
					),
				),
			),
		),*/
		
	)
);

/**
 *EOF
 */