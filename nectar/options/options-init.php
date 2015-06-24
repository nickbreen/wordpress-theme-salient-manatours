<?php

/*
 *
 * Require the framework class before doing anything else, so we can use the defined URLs and directories.
 * If you are running on Windows you may have URL problems which can be fixed by defining the framework url first.
 *
 */
//define('Redux_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('Redux_Options')){
    require_once(dirname(__FILE__) . '/defaults.php');
}

/*
 *
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', NECTAR_THEME_NAME),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', NECTAR_THEME_NAME),
		'icon' => 'paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
//add_filter('redux-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by a theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
    //$args['dev_mode'] = false;
    
    return $args;
}
//add_filter('redux-opts-args-twenty_eleven', 'change_framework_args');


/*
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be over ridden if needed.
 *
 */
function setup_framework_options(){
    $args = array();

    // Setting dev mode to true allows you to view the class settings/info in the panel.
    // Default: true
    $args['dev_mode'] = false;

	// Set the icon for the dev mode tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['dev_mode_icon'] = 'info-sign';

	// Set the class for the dev mode tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	$args['dev_mode_icon_class'] = 'icon-large';

    // If you want to use Google Webfonts, you MUST define the api key.
    //$args['google_api_key'] = 'xxxx';

    // Define the starting tab for the option panel.
    // Default: '0';
    //$args['last_tab'] = '0';

    // Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
    // If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
    // If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
    // Default: 'standard'
    //$args['admin_stylesheet'] = 'standard';

    // Add HTML before the form.
    $args['intro_text'] = '';

    // Add content after the form.
    $args['footer_text'] = '';

    // Set footer/credit line.
    //$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', NECTAR_THEME_NAME);

    // Setup custom links in the footer for share icons
    /*$args['share_icons']['twitter'] = array(
        'link' => 'https://twitter.com/ThemeNectar',
        'title' => 'Follow ThemeNectar on Twitter!', 
        'img' => Redux_OPTIONS_URL . 'img/social/Twitter.png'
    );*/
    $args['share_icons']['facebook'] = array(
        'link' => 'http://www.facebook.com/pages/ThemeNectar/488077244574702',
        'title' => 'Like ThemeNectar on Facebook!', 
        'img' => Redux_OPTIONS_URL . 'img/social/Facebook.png'
    );

    // Enable the import/export feature.
    // Default: true
    $args['show_import_export'] = true;

	// Set the icon for the import/export tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: refresh
	//$args['import_icon'] = 'refresh';

	// Set the class for the import/export tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	$args['import_icon_class'] = 'icon-large';

    // Set a custom option name. Don't forget to replace spaces with underscores!
    $args['opt_name'] = 'salient';

    // Set a custom menu icon.
    //$args['menu_icon'] = '';

    // Set a custom title for the options page.
    // Default: Options
    $args['menu_title'] = __('Salient', NECTAR_THEME_NAME);

    // Set a custom page title for the options page.
    // Default: Options
    $args['page_title'] = __('Salient', NECTAR_THEME_NAME);

    // Set a custom page slug for options page (wp-admin/themes.php?page=***).
    // Default: redux_options
    $args['page_slug'] = 'redux_options';

    // Set a custom page capability.
    // Default: manage_options
    //$args['page_cap'] = 'manage_options';

    // Set the menu type. Set to  "menu" for a top level menu, or "submenu" to add below an existing item.
    // Default: menu
    //$args['page_type'] = 'submenu';

    // Set the parent menu.
    // Default: themes.php
    // A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    //$args['page_parent'] = 'options_general.php';

    // Set a custom page location. This allows you to place your menu where you want in the menu order.
    // Must be unique or it will override other items!
    // Default: null
    $args['page_position'] = 54;

    // Set a custom page icon class (used to override the page icon next to heading)
    //$args['page_icon'] = 'icon-themes';

	// Set the icon type. Set to "iconfont" for Font Awesome, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	//$args['icon_type'] = 'image';

    // Disable the panel sections showing as submenu items.
    // Default: true
    //$args['allow_sub_menu'] = false;
        
    // Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
    $args['help_tabs'][] = array(
        'id' => 'redux-opts-1',
        'title' => __('Theme Information 1', NECTAR_THEME_NAME),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', NECTAR_THEME_NAME)
    );


    // Set the help sidebar for the options page.                                        
    $args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', NECTAR_THEME_NAME);

    $sections = array();
	

    $sections[] = array(
		'icon' => 'edit',
		'icon_class' => 'icon-large',
        'title' => __('General Settings', NECTAR_THEME_NAME),
        'desc' => __('<p class="description">Welcome to the Salient options panel! You can switch between option groups by using the left-hand tabs.</p>', NECTAR_THEME_NAME),
        'fields' => array(
            array(
                'id' => 'theme-skin', 
                'type' => 'select', 
                'title' => __('Theme Skin', NECTAR_THEME_NAME),
                'sub_desc' => 'This will alter the overall styling of various theme elements',
                'options' => array(
                    "original" => "Original",
                    "ascend" => "Ascend"
                )
            ),
            array(
                'id' => 'favicon',
                'type' => 'upload',
                'title' => __('Favicon Upload', NECTAR_THEME_NAME), 
                'sub_desc' => __('Upload a 16px x 16px .png or .gif image that will be your favicon.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            array(
                'id' => 'back-to-top',
                'type' => 'checkbox',
                'title' => __('Back To Top Button', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle whether or not to enable a back to top button on your pages.', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '1' 
            ),
            array(
                'id' => 'smooth-scrolling',
                'type' => 'checkbox',
                'title' => __('Styled Scrollbar / Smooth Scrolling', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle whether or not to enable the styled scrollbar & smooth scrolling.', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
            ),
            array(
                'id' => 'one-page-scrolling',
                'type' => 'checkbox',
                'title' => __('One Page Scroll Support (Animated Anchor Links)', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle whether or not to enable one page scroll support', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '1' 
            ),
            
			array(
                'id' => 'responsive',
                'type' => 'checkbox_hide_below',
                'title' => __('Enable Responsive Design', NECTAR_THEME_NAME), 
                'sub_desc' => __('This adjusts the layout of your website depending on the screen size/device.', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '1',
                'switch' => true,
                'std' => '1' 
            ),
            array(
                'id' => 'ext_responsive',
                'type' => 'checkbox',
                'title' => __('Extended Responsive Design', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will enhance the way the theme responds when viewing on screens larger than 1000px & increase the max width.', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '1' 
            ),
            array(
                'id' => 'disable-vc',
                'type' => 'checkbox',
                'title' => __('Disable Salient Visual Composer', NECTAR_THEME_NAME), 
                'sub_desc' => __('This gives you the option to remove the built in Salient version of Visual Composer in case you wanted to use the raw plugin instead.', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),  
            array(
                'id' => 'default-lightbox',
                'type' => 'checkbox',
                'title' => __('Auto Lightbox Image Links', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will allow all image links to open in a lightbox - including the images links within standard WordPress galleries.', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
            ),
            array(
                'id' => 'external-dynamic-css',
                'type' => 'checkbox',
                'title' => __('Move Dynamic/Custom CSS Into External Stylesheet?', NECTAR_THEME_NAME), 
                'sub_desc' => __('This gives you the option move all the dynamic css that lives in the head by default into its own file for aesthetic & caching purposes. <b>Note:</b> your server will need the ability/permission to write to the static file (dynamic-combined.css) using file_put_contents', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),
			array(
                'id' => 'google-analytics',
                'type' => 'textarea',
                'title' => __('Google Analytics', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter in your google analytics tracking code here. <br/> Remember to include the <strong>entire script from google</strong>, if you just enter your tracking ID it won\'t work.', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME)
            ),
             array(
				'id'=>'custom-css',
				'type' => 'ace_editor',
				'title' => __('Custom CSS Code', NECTAR_THEME_NAME), 
				'subtitle' => __('If you have any custom CSS you would like added to the site, please enter it here.', NECTAR_THEME_NAME),
				'mode' => 'css',
	            'theme' => 'monokai',
				'desc' => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
	            'default' => "#header{\nmargin: 0 auto;\n}"
			)
        )
    );
	
	
	$sections[] = array(
		'icon' => 'tint',
		'icon_class' => 'icon-large',
        'title' => __('Accent Color', NECTAR_THEME_NAME),
        'desc' => __('All accent color related options are listed here.', NECTAR_THEME_NAME),
        'fields' => array(
           array(
                'id' => 'accent-color',
                'type' => 'color',
                'title' => __('Accent Color', NECTAR_THEME_NAME), 
                'sub_desc' => __('Change this color to alter the accent color globally for your site. If you\'re stuck, try one of the six pre-picked colors that are guaranteed to look awesome!', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => '#27CCC0'
            ),
            array(
                'id' => 'extra-color-1',
                'type' => 'color',
                'title' => __('Extra Color #1', NECTAR_THEME_NAME), 
                'sub_desc' => __('Applicable theme elements will have the option to choose this as a color <br/> (i.e. buttons, icons etc..)', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => '#f6653c'
            ),
            array(
                'id' => 'extra-color-2',
                'type' => 'color',
                'title' => __('Extra Color #2', NECTAR_THEME_NAME), 
                'sub_desc' => __('Applicable theme elements will have the option to choose this as a color <br/> (i.e. buttons, icons etc..)', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => '#2AC4EA'
            ),
			array(
                'id' => 'extra-color-3',
                'type' => 'color',
                'title' => __('Extra Color #3', NECTAR_THEME_NAME), 
                'sub_desc' => __('Applicable theme elements will have the option to choose this as a color <br/> (i.e. buttons, icons etc..)', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => '#333333'
            ),
			
        )
    );
	
	
	
	$sections[] = array(
		'icon' => 'edit',
		'icon_class' => 'icon-large',
        'title' => __('Boxed Layout', NECTAR_THEME_NAME),
        'desc' => __('All boxed layout related options are listed here.', NECTAR_THEME_NAME),
        'fields' => array(
            array(
                'id' => 'boxed_layout',
                'type' => 'checkbox_hide_below',
                'title' => __('Enable Boxed Layout?', NECTAR_THEME_NAME), 
                'sub_desc' => __('', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'next_to_hide' => '6',
                'std' => '0' 
            ),
            array(
                'id' => 'background-color',
                'type' => 'color',
                'title' => __('Background Color', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would rather simply use a solid color for your background, select one here.', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => '#f1f1f1'
            ),    
            array(
                'id' => 'background_image',
                'type' => 'upload',
                'title' => __('Background Image', NECTAR_THEME_NAME), 
                'sub_desc' => __('Upload your background here', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            array(
                'id' => 'background-repeat', 
                'type' => 'select', 
                'title' => __('Background Repeat', NECTAR_THEME_NAME),
                'sub_desc' => __('Do you want your background to repeat? (Turn on when using patterns)', NECTAR_THEME_NAME), 
                'options' => array(
                	"no-repeat" => "No-Repeat",
		  			"repeat" => "Repeat"
				)
			),
			array(
                'id' => 'background-position', 
                'type' => 'select', 
                'title' => __('Background Position', NECTAR_THEME_NAME),
                'sub_desc' => __('How would you like your background image to be aligned?', NECTAR_THEME_NAME),
                'options' => array(
                	"left top" => "Left Top",
			  		 "left center" => "Left Center",
			  		 "left bottom" => "Left Bottom",
			  		 "center top" => "Center Top",
			  		 "center center" => "Center Center",
			  		 "center bottom" => "Center Bottom",
			  		 "right top" => "Right Top",
			  		 "right center" => "Right Center",
			  		 "right bottom" => "Right Bottom"
				)
			),
			array(
                'id' => 'background-attachment', 
                'type' => 'select', 
                'title' => __('Background Attachment', NECTAR_THEME_NAME),
                'sub_desc' => __('Would you prefer your background to scroll with your site or be fixed and not move', NECTAR_THEME_NAME),
                'options' => array(
                	"scroll" => "Scroll",
		  		 	"fixed" => "Fixed"
				)
			),
			array(
                'id' => 'background-cover',
                'type' => 'checkbox',
                'title' => __('Auto resize background image to fit window?', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will ensure your background image always fits no matter what size screen the user has. (Don\'t use with patterns)', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),
        )
    );
	
	global $typography_mixed_fonts;
	global $font_sizes;
	global $font_styles; 
	$font_transforms = array(	
		"-" => "Transform",
		"uppercase" => "Uppercase",	
	    "lowercase" => "Lowercase",
	    "capitalize" => "Capitalize"
	);
	$font_spacing = array(	
		"-" => "Spacing",
        "0px" => "0px",
		"0.5px" => "+0.5px",
		"1px" => "+1px",
		"1.5px" => "+1.5px",
		"2px" => "+2px",	
		"2.5px" => "+2.5px",
		"3px" => "+3px",	
		"-0.5px" => "-0.5px",
	    "-1px" => "-1px",	
	    "-1.5px" => "-1.5px",
	    "-2px" => "-2px",
	    "-2.5px" => "-2.5px",
	    "-3px" => "-3px",
	);
	$font_subsets = array(	
		"subset" => "Subset",	
	    "latin" => "Latin",
	    "latin-ext" => "Latin Ext",
	    "cyrillic" => "Cyrillic",
	    "cyrillic-ext" => "Cyrillic Ext",
	    "greek" => "Greek",
	    "greek-ext" => "Greek Ext",
	    "vietnamese" => "Vietnamese"
	);
	
	$sections[] = array(
		'icon' => 'font',
		'icon_class' => 'icon-large',
        'title' => __('Typography ', NECTAR_THEME_NAME),
        'desc' => __('See previews of all these fonts at <a target="_blank" href="http://www.google.com/fonts/">Google Web Fonts</a>', NECTAR_THEME_NAME),
        'fields' => array( 
        	
			array(
                'id' => 'extended-theme-font',
                'type' => 'checkbox',
                'title' => __('Load Ext. Characters in Default Font', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),
			
			array(
                'id' => 'use-custom-fonts',
                'type' => 'checkbox_hide_all',
                'title' => __('Use Custom Fonts?', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => 'true',
                'std' => '0' 
            ),
            
        
		    array(
                'id' => 'body_font', 
                'type' => 'select', 
                'title' => __('Body', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'body_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'body_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'body_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'body_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),
			
			array(
                'id' => 'body_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),


			
			
			 array(
                'id' => 'navigation_font', 
                'type' => 'select', 
                'title' => __('Navigation', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'navigation_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'navigation_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'navigation_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'navigation_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),
			
			array(
                'id' => 'navigation_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),
			
			
			
			array(
                'id' => 'navigation_dropdown_font', 
                'type' => 'select', 
                'title' => __('Navigation Dropdown', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'navigation_dropdown_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'navigation_dropdown_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'navigation_dropdown_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'navigation_dropdown_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),
			
			array(
                'id' => 'navigation_dropdown_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),
			
			
			
			
			
			array(
                'id' => 'nectar_slider_heading_font', 
                'type' => 'select', 
                'title' => __('Nectar Slider Heading', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'nectar_slider_heading_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'nectar_slider_heading_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'nectar_slider_heading_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'nectar_slider_heading_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),
			
			array(
                'id' => 'nectar_slider_heading_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),
			
			
			array(
                'id' => 'home_slider_caption_font', 
                'type' => 'select', 
                'title' => __('Nectar/Home Slider Captions', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'home_slider_caption_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'home_slider_caption_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'home_slider_caption_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'home_slider_caption_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),
			
			
			array(
                'id' => 'home_slider_caption_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),
			
			



            array(
                'id' => 'testimonial_font', 
                'type' => 'select', 
                'title' => __('Testimonial Slider / Blockquote', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
            ),
            
            array(
                'id' => 'testimonial_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
            ),
            
            array(
                'id' => 'testimonial_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
            ),
            
            array(
                'id' => 'testimonial_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
            ),
            
            array(
                'id' => 'testimonial_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
            ),
            
            
            array(
                'id' => 'testimonial_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
            ),



			

			array(
                'id' => 'sidebar_footer_h_font', 
                'type' => 'select', 
                'title' => __('Sidebar, Carousel, Button & Footer Headers', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'sidebar_footer_h_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'sidebar_footer_h_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'sidebar_footer_h_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'sidebar_footer_h_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),
			
			array(
                'id' => 'sidebar_footer_h_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),



             array(
                'id' => 'page_heading_font', 
                'type' => 'select', 
                'title' => __('Page Heading', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
            ),
            
            array(
                'id' => 'page_heading_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
            ),
            
            array(
                'id' => 'page_heading_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
            ),
            
            array(
                'id' => 'page_heading_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
            ),
            
            array(
                'id' => 'page_heading_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
            ),

            array(
                'id' => 'page_heading_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
            ),



            array(
                'id' => 'page_heading_subtitle_font', 
                'type' => 'select', 
                'title' => __('Page Heading Subtitle', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
            ),
            
            array(
                'id' => 'page_heading_subtitle_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
            ),
            
            array(
                'id' => 'page_heading_subtitle_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
            ),
            
            array(
                'id' => 'page_heading_subtitle_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
            ),
            
            array(
                'id' => 'page_heading_subtitle_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
            ),

            array(
                'id' => 'page_heading_subtitle_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
            ),


			
			
			array(
                'id' => 'team_member_h_font', 
                'type' => 'select', 
                'title' => __('Sub-headers & Team Member Names', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'team_member_h_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'team_member_h_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'team_member_h_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'team_member_h_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),
			
			array(
                'id' => 'team_member_h_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),
			
			
			
			
			array(
                'id' => 'h1_font', 
                'type' => 'select', 
                'title' => __('Heading 1', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'h1_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'h1_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'h1_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'h1_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),

			array(
                'id' => 'h1_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),
			
			
			
			
			array(
                'id' => 'h2_font', 
                'type' => 'select', 
                'title' => __('Heading 2', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'h2_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'h2_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'h2_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'h2_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),

			array(
                'id' => 'h2_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),
			
			
			
			
			array(
                'id' => 'h3_font', 
                'type' => 'select', 
                'title' => __('Heading 3', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'h3_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'h3_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'h3_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'h3_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),
			
			array(
                'id' => 'h3_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),
			
			
			
			
			array(
                'id' => 'h4_font', 
                'type' => 'select', 
                'title' => __('Heading 4', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'h4_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'h4_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'h4_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'h4_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),

			array(
                'id' => 'h4_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),
			
			
			
			array(
                'id' => 'h5_font', 
                'type' => 'select', 
                'title' => __('Heading 5', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
			),
			
			array(
                'id' => 'h5_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
			),
			
			array(
                'id' => 'h5_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
			),
			
			array(
                'id' => 'h5_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
			),
			
			array(
                'id' => 'h5_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
			),

			array(
                'id' => 'h5_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
			),



            array(
                'id' => 'i_font', 
                'type' => 'select', 
                'title' => __('Italic ', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $typography_mixed_fonts
            ),
            
            array(
                'id' => 'i_font_size', 
                'type' => 'select', 
                'title' => __('Font Size', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_sizes
            ),
            
            array(
                'id' => 'i_font_style', 
                'type' => 'select', 
                'title' => __('Font Style', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_styles
            ),
            
            array(
                'id' => 'i_font_transform', 
                'type' => 'select', 
                'title' => __('Font Transform', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_transforms
            ),
            
            array(
                'id' => 'i_font_spacing', 
                'type' => 'select', 
                'title' => __('Font Spacing', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_spacing
            ),

            array(
                'id' => 'i_font_subset', 
                'type' => 'select', 
                'title' => __('Font Subset', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => $font_subsets
            )



           

                                       
        )
    );
	

	

	
	 
	$sections[] = array(
		'icon' => 'file-alt', 
		'icon_class' => 'icon-large', 
        'title' => __('Header', NECTAR_THEME_NAME),
        'desc' => __('All header related options are listed here.', NECTAR_THEME_NAME),
        'fields' => array( 

            array(
                'id' => 'header_format',
                'type' => 'radio_img',
                'title' => __('Header Layout', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please select the layout you desire', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'options' => array(
                                'default' => array('title' => 'Default Layout', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/default-header.png'),
                                'centered-menu' => array('title' => 'Centered Menu', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/centered-menu.png'),
                                'centered-menu-under-logo' => array('title' => 'Centered Menu Alt', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/centered-menu-under-logo.png')
                            ),
                'std' => 'default'
            ),  

			array(
                'id' => 'use-logo',
                'type' => 'checkbox_hide_below',
                'title' => __('Use Image for Logo?', NECTAR_THEME_NAME), 
                'sub_desc' => __('If left unchecked, plain text will be used instead (generated from site name).', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3'
            ),
            array(
                'id' => 'logo',
                'type' => 'upload', 
                'title' => __('Logo Upload', NECTAR_THEME_NAME), 
                'sub_desc' => __('Upload your logo here and enter the height of it below', NECTAR_THEME_NAME),
                'desc' => ''  
            ),
            array(
                'id' => 'retina-logo',
                'type' => 'upload', 
                'title' => __('Retina Logo Upload', NECTAR_THEME_NAME), 
                'sub_desc' => __('Upload at exactly 2x the size of your standard logo. Supplying this will keep your logo crisp on screens with a higher pixel density.', NECTAR_THEME_NAME),
                'desc' => ''  
            ),
            array(
                'id' => 'logo-height', 
                'type' => 'text', 
                'title' => __('Logo Height', NECTAR_THEME_NAME),
                'sub_desc' => __('Don\'t include "px" in the string. e.g. 30', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
			),
			array(
                'id' => 'header-padding', 
                'type' => 'text', 
                'title' => __('Header Padding', NECTAR_THEME_NAME),
                'sub_desc' => __('Don\'t include "px" in the string. e.g. 28', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
			),
			
			array(
                'id' => 'transparent-header',
                'type' => 'checkbox_hide_below',
                'title' => __('Use Transparent Header When Applicable?', NECTAR_THEME_NAME), 
                'sub_desc' => __('If activated this will cause your header to be completely transparent before the user scrolls. Valid instances where this will get used include using a Page Header or using a Full width/screen Nectar Slider at the top of a page.', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '7'
            ),
            
			array(
                'id' => 'header-starting-logo',
                'type' => 'upload', 
                'title' => __('Header Starting Logo Upload', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will be used when the header is transparent before the user scrolls. (Will be swapped for the regualr logo upon scrolling)', NECTAR_THEME_NAME),
                'desc' => ''  
            ),
            array(
                'id' => 'header-starting-retina-logo',
                'type' => 'upload', 
                'title' => __('Header Starting Retina Logo Upload', NECTAR_THEME_NAME), 
                'sub_desc' => __('Retina version of the header starting logo.', NECTAR_THEME_NAME),
                'desc' => ''  
            ),

            array(
                'id' => 'header-starting-logo-dark',
                'type' => 'upload', 
                'title' => __('Header Starting Dark Logo Upload', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will be used when on a Nectar Slide set to use the dark text color and the header is transparent before the user scrolls. (If nothing is uploaded, the default logo will be used)', NECTAR_THEME_NAME),
                'desc' => ''  
            ),
            array(
                'id' => 'header-starting-retina-logo-dark',
                'type' => 'upload', 
                'title' => __('Header Starting Dark Retina Logo Upload', NECTAR_THEME_NAME), 
                'sub_desc' => __('Retina version of the header starting dark logo.  (If nothing is uploaded, the default logo will be used)', NECTAR_THEME_NAME),
                'desc' => ''  
            ),
            
			array(
                'id' => 'header-starting-color',
                'type' => 'color',
                'title' => __('Header Starting Text Color', NECTAR_THEME_NAME),
                'sub_desc' => __('Please select the color you desire for your header text before the user scrolls', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '#ffffff'
            ),
            array(
                'id' => 'header-inherit-row-color',
                'type' => 'checkbox',
                'title' => __('Header Inherit Row Color', NECTAR_THEME_NAME), 
                'sub_desc' => __('Turning this on will allow your header to take on the background & text colors of the row that it passes. (Ideal for one page sites) <br/> <br/>  See <a href="https://www.youtube.com/user/ThemeNectar">tutorial</a> for full example and details', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
            ),
            array(
                'id' => 'header-remove-border',
                'type' => 'checkbox',
                'title' => __('Remove Border On Transparent Header', NECTAR_THEME_NAME), 
                'sub_desc' => __('Turning this on will remove the border that normally appears with the transparent header', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),
			
			array(
                'id' => 'header-resize-on-scroll',
                'type' => 'checkbox_hide_below',
                'title' => __('Header Resize On Scroll', NECTAR_THEME_NAME), 
                'sub_desc' => __('Do you want the header to shrink a little when you scroll?', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '1' 
            ),
            array(
                'id' => 'header-resize-on-scroll-shrink-num', 
                'type' => 'text', 
                'title' => __('Header Logo Shrink Number (in px)', NECTAR_THEME_NAME),
                'sub_desc' => __('Don\'t include "px" in the string. e.g. 6', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            
			array(
                'id' => 'header-fullwidth',
                'type' => 'checkbox',
                'title' => __('Full Width Header', NECTAR_THEME_NAME), 
                'sub_desc' => __('Do you want the header to span the full width of the page?', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
            ),

            array(
                'id' => 'header-slide-out-widget-area',
                'type' => 'checkbox',
                'title' => __('Slide Out Widget Area', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will add a header link that reveals a side widget area', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
            ),
            

            array(
                'id' => 'header-disable-search',
                'type' => 'checkbox',
                'title' => __('Remove Header search', NECTAR_THEME_NAME), 
                'sub_desc' => __('Active to remove the search functionality from your header', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),

			 array(
                'id' => 'header-disable-ajax-search',
                'type' => 'checkbox',
                'title' => __('Disable AJAX from search', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will turn off the autocomplete suggestions from appearing when typing in the search box.', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),
            
            array(
			    'id' => 'header-color', 
			    'type' => 'select', 
			    'title' => __('Header Color Scheme', NECTAR_THEME_NAME),
			    'sub_desc' => __('Please select your header color scheme here.', NECTAR_THEME_NAME),
			    'desc' => '',
			    'class' => 'five-columns',
			    'options' => array(
			  		'light' => __('Light', NECTAR_THEME_NAME), 
			    	'dark' => __('Dark', NECTAR_THEME_NAME),
			    	'custom' => __('Custom', NECTAR_THEME_NAME)
				),
			    'std' => 'light'
		    ),
		    
			array(
                'id' => 'header-background-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Header Background', NECTAR_THEME_NAME),
                'desc' => '',
                'class' => 'five-columns',
                'std' => '#ffffff'
            ),
            
			array(
                'id' => 'header-font-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Header Font', NECTAR_THEME_NAME), 
                'class' => 'five-columns',
                'desc' => '',
                'std' => '#888888'
            ),
            
			array(
                'id' => 'header-font-hover-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Header Font Hover', NECTAR_THEME_NAME),
                'class' => 'five-columns',
                'desc' => '',
                'std' => '#27CCC0'
            ),
            
			array(
                'id' => 'header-dropdown-background-color',
                'type' => 'color',
                'title' => '', 
                'class' => 'five-columns',
                'sub_desc' => __('Dropdown Background', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => '#1F1F1F'
            ),
            
			array(
                'id' => 'header-dropdown-background-hover-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Dropdown Background Hover', NECTAR_THEME_NAME), 
                'class' => 'five-columns',
                'desc' => '',
                'std' => '#313233'
            ),
            
			array(
                'id' => 'header-dropdown-font-color',
                'type' => 'color',
                'title' => '',
                'sub_desc' => __('Dropdown Font', NECTAR_THEME_NAME), 
                'class' => 'five-columns',
                'desc' => '',
                'std' => '#CCCCCC'
            ),
            
			array(
                'id' => 'header-dropdown-font-hover-color',
                'type' => 'color',
                'title' => '',
                'sub_desc' => __('Dropdown Font Hover', NECTAR_THEME_NAME), 
                'desc' => '',
                'class' => 'five-columns',
                'std' => '#27CCC0'
            ),
            
			array(
                'id' => 'secondary-header-background-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('2nd Header Background', NECTAR_THEME_NAME), 
                'desc' => '',
                'class' => 'five-columns',
                'std' => '#F8F8F8'
            ),
            
			array(
                'id' => 'secondary-header-font-color',
                'type' => 'color',
                'title' => '',
                'sub_desc' => __('2nd Header Font', NECTAR_THEME_NAME), 
                'class' => 'five-columns',
                'desc' => '',
                'std' => '#666666'
            ),
          	
			array(
                'id' => 'secondary-header-font-hover-color',
                'type' => 'color',
                'title' => '',
                'sub_desc' => __('2nd Header Font Hover', NECTAR_THEME_NAME), 
                'class' => 'five-columns',
                'desc' => '',
                'std' => '#222222'
            ),

             array(
                'id' => 'header-slide-out-widget-area-background-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Slide Out Widget Background', NECTAR_THEME_NAME),
                'desc' => '',
                'class' => 'five-columns',
                'std' => '#27CCC0'
            ),
            
             array(
                'id' => 'header-slide-out-widget-area-header-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Slide Out Widget Headers', NECTAR_THEME_NAME), 
                'class' => 'five-columns',
                'desc' => '',
                'std' => '#ffffff'
            ),

            array(
                'id' => 'header-slide-out-widget-area-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Slide Out Widget Text', NECTAR_THEME_NAME), 
                'class' => 'five-columns',
                'desc' => '',
                'std' => '#eefbfa'
            ),
            
            array(
                'id' => 'header-slide-out-widget-area-hover-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Slide Out Widget Link Hover', NECTAR_THEME_NAME),
                'class' => 'five-columns',
                'desc' => '',
                'std' => '#ffffff'
            ),
            
			     
            array(
			    'id' => 'header_layout', 
			    'type' => 'select', 
			    'title' => __('Header Layout', NECTAR_THEME_NAME),
			    'sub_desc' => __('Please select your header layout here.', NECTAR_THEME_NAME),
			    'desc' => '',
			    'options' => array(
			  		'standard' => __('Standard Header', NECTAR_THEME_NAME), 
			    	'header_with_secondary' => __('Header With Secondary Navigation', NECTAR_THEME_NAME),
				),
			    'std' => 'standard'
		    ),
		    array(
                'id' => 'enable_social_in_header',
                'type' => 'checkbox_hide_below',
                'title' => __('Enable Social Icons?', NECTAR_THEME_NAME), 
                'sub_desc' => __('Do you want the secondary nav to display social icons?', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'next_to_hide' => '14',
                'std' => '0' 
            ),  
			 array(
                'id' => 'use-facebook-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Facebook Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-twitter-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Twitter Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-google-plus-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Google+ Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-vimeo-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Vimeo Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-dribbble-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Dribbble Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-pinterest-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Pinterest Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-youtube-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Youtube Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-tumblr-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Tumblr Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-linkedin-icon-header',
                'type' => 'checkbox',
                'title' => __('Use LinkedIn Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-rss-icon-header',
                'type' => 'checkbox',
                'title' => __('Use RSS Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-behance-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Behance Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-instagram-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Instagram Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-flickr-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Flickr Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-spotify-icon-header',
                'type' => 'checkbox',
                'title' => __('Use Spotify Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-github-icon-header',
                'type' => 'checkbox',
                'title' => __('Use GitHub Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-stackexchange-icon-header',
                'type' => 'checkbox',
                'title' => __('Use StackExchange Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-soundcloud-icon-header',
                'type' => 'checkbox',
                'title' => __('Use SoundCloud Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
             array(
                'id' => 'use-vk-icon-header',
                'type' => 'checkbox',
                'title' => __('Use VK Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            )
             
        )
    );
	
	
	 $sections[] = array(
		'icon' => 'file-alt',
		'icon_class' => 'icon-large',
        'title' => __('Footer', NECTAR_THEME_NAME),
        'desc' => __('All footer related options are listed here.', NECTAR_THEME_NAME),
        'fields' => array(
       		 array(
                'id' => 'enable-main-footer-area',
                'type' => 'checkbox_hide_below',
                'title' => __('Main Footer Area', NECTAR_THEME_NAME), 
                'sub_desc' => __('Do you want use the main footer that contains all the widgets areas?', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '1',
                'switch' => true,
                'std' => '1' 
            ), 
 			
			array(
				'id' => 'footer_columns',
				'type' => 'radio_img',
				'title' => __('Footer Columns', NECTAR_THEME_NAME), 
				'sub_desc' => __('Please select the number of columns you would like for your footer.', NECTAR_THEME_NAME),
				'desc' => __('', NECTAR_THEME_NAME),
				'options' => array(
								'2' => array('title' => '2 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/2col.png'),
								'3' => array('title' => '3 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/3col.png'),
								'4' => array('title' => '4 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/4col.png')
							),
				'std' => '4'
			),	
			
			array(
                'id' => 'footer-custom-color',
                'type' => 'checkbox_hide_below',
                'title' => __('Custom Footer Color Scheme', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '1',
                'switch' => 'true',
                'std' => '0' 
            ),
            
			array(
                'id' => 'footer-background-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Footer Background Color', NECTAR_THEME_NAME),
                'desc' => '',
                'class' => 'five-columns always-visible',
                'std' => '#313233'
            ),
            
			array(
                'id' => 'footer-font-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('Footer Font Color', NECTAR_THEME_NAME), 
                'class' => 'five-columns always-visible',
                'desc' => '',
                'std' => '#CCCCCC'
            ),
            
			array(
                'id' => 'footer-secondary-font-color',
                'type' => 'color',
                'title' => '', 
                'sub_desc' => __('2nd Footer Font Color', NECTAR_THEME_NAME),
                'class' => 'five-columns always-visible',
                'desc' => '',
                'std' => '#777777'
            ),
            
			array(
                'id' => 'footer-copyright-background-color',
                'type' => 'color',
                'title' => '', 
                'class' => 'five-columns always-visible',
                'sub_desc' => __('Copyright Background Color', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => '#1F1F1F'
            ),
            
			array(
                'id' => 'footer-copyright-font-color',
                'type' => 'color',
                'title' => '', 
                'class' => 'five-columns always-visible',
                'sub_desc' => __('Footer Copyright Font Color', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => '#777777'
            ),
			
			

             array(
                'id' => 'disable-copyright-footer-area',
                'type' => 'checkbox',
                'title' => __('Disable Footer Copyright Area', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will hide the copyright bar in your footer', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '' 
            ),  

			array(
                'id' => 'footer-copyright-text',
                'type' => 'text',
                'title' => __('Footer Copyright Section Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the copyright section text. e.g. All Rights Reserved, Salient Inc.', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME)
            ),
            
			 array(
                'id' => 'disable-auto-copyright',
                'type' => 'checkbox',
                'title' => __('Disable Automatic Copyright', NECTAR_THEME_NAME), 
                'sub_desc' => __('By default, your copyright section will say "© {YEAR} {SITENAME}" before the additional text you add above in the Footer Copyright Section Text input - This option allows you to remove that.', NECTAR_THEME_NAME), 
                'desc' => ''
            ),
            
			
            array(
                'id' => 'use-facebook-icon',
                'type' => 'checkbox',
                'title' => __('Use Facebook Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-twitter-icon',
                'type' => 'checkbox',
                'title' => __('Use Twitter Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-google-plus-icon',
                'type' => 'checkbox',
                'title' => __('Use Google+ Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-vimeo-icon',
                'type' => 'checkbox',
                'title' => __('Use Vimeo Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-dribbble-icon',
                'type' => 'checkbox',
                'title' => __('Use Dribbble Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-pinterest-icon',
                'type' => 'checkbox',
                'title' => __('Use Pinterest Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-youtube-icon',
                'type' => 'checkbox',
                'title' => __('Use Youtube Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-tumblr-icon',
                'type' => 'checkbox',
                'title' => __('Use Tumblr Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-linkedin-icon',
                'type' => 'checkbox',
                'title' => __('Use LinkedIn Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-rss-icon',
                'type' => 'checkbox',
                'title' => __('Use RSS Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-behance-icon',
                'type' => 'checkbox',
                'title' => __('Use Behance Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-instagram-icon',
                'type' => 'checkbox',
                'title' => __('Use Instagram Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-flickr-icon',
                'type' => 'checkbox',
                'title' => __('Use Flickr Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-spotify-icon',
                'type' => 'checkbox',
                'title' => __('Use Spotify Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-github-icon',
                'type' => 'checkbox',
                'title' => __('Use GitHub Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
			array(
                'id' => 'use-stackexchange-icon',
                'type' => 'checkbox',
                'title' => __('Use StackExchange Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-soundcloud-icon',
                'type' => 'checkbox',
                'title' => __('Use SoundCloud Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            ),
            array(
                'id' => 'use-vk-icon',
                'type' => 'checkbox',
                'title' => __('Use VK Icon', NECTAR_THEME_NAME), 
                'sub_desc' => '',
                'desc' => ''
            )
        )
    );
	
	
	
	
    
    $sections[] = array(
        'icon' => 'retweet',
        'icon_class' => 'icon-large',
        'title' => __('Page Transitions', NECTAR_THEME_NAME),
        'desc' => __('All page transition options are listed here.', NECTAR_THEME_NAME),
        'fields' => array(
        
             array(
                'id' => 'ajax-page-loading',
                'type' => 'checkbox',
                'title' => __('Animated Page Transitions', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will enable an animation between loading your pages.', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
            ),

             array(
                'id' => 'transition-method', 
                'type' => 'select', 
                'title' => __('Animated Transition Method', NECTAR_THEME_NAME),
                'sub_desc' => __('<strong> AJAX </strong> will result in a smoother seamless transition, but won\'t work by default for pages that use plugins which rely on Javascript. <br/><br/>  <strong>Standard</strong> will simulate the effect of AJAX loading and allow for the use of any plugins to function regularly.', NECTAR_THEME_NAME),
                'options' => array(
                    "ajax" => "AJAX",
                    "standard" => "Standard"
                ),
                'std' => 'ajax'
            ),

             array(
                'id' => 'loading-image',
                'type' => 'upload',
                'title' => __('Custom Loading Image', NECTAR_THEME_NAME), 
                'sub_desc' => __('Upload a .png or .gif image that will be used in all applicable areas on your site as the loading image. ', NECTAR_THEME_NAME),
                'desc' => ''
            ),
             array(
                'id' => 'loading-image-animation', 
                'type' => 'select', 
                'title' => __('Loading Image CSS Animation', NECTAR_THEME_NAME),
                'sub_desc' => __('This will add a css based animation onto your defined image', NECTAR_THEME_NAME),
                'options' => array(
                    "none" => "Default",
                    "spin" => "Smooth Spin"
                ),
                'std' => 'none'
            )
        
 
        )
    );
    


	
	
	 $sections[] = array(
		'icon' => 'bell-alt',
		'icon_class' => 'icon-large',
        'title' => __('Call To Action', NECTAR_THEME_NAME),
        'desc' => __('All call to action options are listed here.', NECTAR_THEME_NAME),
        'fields' => array(
        
       		 array(
                'id' => 'cta-text', 
                'type' => 'text', 
                'title' => __('Call to Action Text', NECTAR_THEME_NAME),
                'sub_desc' => __('Add the text that you would like to appear in the global call to action section.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'cta-btn', 
                'type' => 'text', 
                'title' => __('Call to Action Button Text', NECTAR_THEME_NAME),
                'sub_desc' => __('If you would like a button to be the link in the global call to action section, please enter the text for it here.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'cta-btn-link',  
                'type' => 'text', 
                'title' => __('Call to Action Button Link URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter the URL for the call to action section here.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
				'id' => 'exclude_cta_pages',
				'type' => 'pages_multi_select',
				'title' => __('Pages to Exclude the Call to Action Section', NECTAR_THEME_NAME),
				'sub_desc' => __('Select any pages you wish to exclude the Call to Action section from. You can select multiple pages.', NECTAR_THEME_NAME),
				'args' => array(
					'sort_order' => 'ASC'
				),
				'desc' => ''
			),
			
			array(
                'id' => 'cta-background-color',
                'type' => 'color',
                'title' => __('Call to Action Background Color', NECTAR_THEME_NAME), 
                'sub_desc' => '', 
                'desc' => '',
                'std' => '#ECEBE9'
            ),
            
			array(
                'id' => 'cta-text-color',
                'type' => 'color',
                'title' => __('Call to Action Font Color', NECTAR_THEME_NAME), 
                'sub_desc' => '', 
                'desc' => '',
                'std' => '#4B4F52'
            ),
            
			array(
			    'id' => 'cta-btn-color', 
			    'type' => 'select', 
			    'title' => __('Call to Action Button Color', NECTAR_THEME_NAME),
			    'sub_desc' => '',
			    'desc' => '',
			    'options' => array(
			  		'accent-color' => __('Accent Color', NECTAR_THEME_NAME), 
			    	'extra-color-1' => __('Extra Color 1', NECTAR_THEME_NAME),
			    	'extra-color-2' => __('Extra Color 2', NECTAR_THEME_NAME),
			    	'extra-color-3' => __('Extra Color 3', NECTAR_THEME_NAME),
			    	'see-through' => __('See Through', NECTAR_THEME_NAME)
				),
			    'std' => 'accent-color'
		    )
		
 
        )
    );
	
	

	
	$sections[] = array(
		'icon' => 'folder-open-alt',
		'icon_class' => 'icon-large',
        'title' => __('Portfolio', NECTAR_THEME_NAME),
        'desc' => __('All portfolio related options are listed here.', NECTAR_THEME_NAME),
        'fields' => array( 
			   
			array(
				'id' => 'main_portfolio_layout',
				'type' => 'radio_img',
				'title' => __('Main Layout', NECTAR_THEME_NAME), 
				'sub_desc' => __('Please select the number of columns you would like for your portfolio.', NECTAR_THEME_NAME),
				'desc' => __('', NECTAR_THEME_NAME),
				'options' => array(
								'3' => array('title' => '3 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/3col.png'),
								'4' => array('title' => '4 Columns', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/4col.png'),
								'fullwidth' => array('title' => 'Full Width', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/fullwidth.png')
							),
				'std' => '3'
			),	
			array(
				'id' => 'main_portfolio_project_style',
				'type' => 'radio',
				'title' => __('Project Style', NECTAR_THEME_NAME), 
				'sub_desc' => __('Please select the style you would like your projects to display in on your portfolio pages.', NECTAR_THEME_NAME),
				'desc' => __('', NECTAR_THEME_NAME),
				'options' => array(
								'1' => __('Meta below thumb w/ links on hover', NECTAR_THEME_NAME),
								'2' => __('Meta on hover + entire thumb link', NECTAR_THEME_NAME),
								'3' => __("Title overlaid w/ zoom effect on hover", NECTAR_THEME_NAME),
		   					    '4' => __("Meta from bottom on hover + entire thumb link", NECTAR_THEME_NAME)
							),
				'std' => '1'
			),
			array(
                'id' => 'portfolio_use_masonry', 
                'type' => 'checkbox',
                'title' => __('Masonry Style?', NECTAR_THEME_NAME),
                'sub_desc' => __('This will allow your portfolio items to display in a masonry layout as opposed to a fixed grid. You can define your masonry sizes in each project. <br/><br/> If using the full width layout, will only be active with the alternative project style.', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
			), 	
			 array(
                'id' => 'portfolio_inline_filters',
                'type' => 'checkbox',
                'title' => __('Display Filters Horizontally?', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will allow your filters to display horizontally instead of in a dropdown.', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
            ),
			array(
                'id' => 'portfolio_sidebar_follow', 
                'type' => 'checkbox',
                'title' => __('Portfolio Sidebar Follow on Scroll', NECTAR_THEME_NAME),
                'sub_desc' => __('When supplying extra content, a sidebar enabled page can get quite tall and feel empty on the right side. Enable this option to have your sidebar follow you down the page.', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
			), 
			array(
                'id' => 'portfolio_social',
                'type' => 'checkbox_hide_below',
                'title' => __('Social Media Sharing Buttons', NECTAR_THEME_NAME), 
                'sub_desc' => __('Activate this to enable social sharing buttons on your portfolio items.', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '5',
                'switch' => true,
                'std' => '1' 
            ),	
             array(
                'id' => 'portfolio-facebook-sharing',
                'type' => 'checkbox',
                'title' => __('Facebook', NECTAR_THEME_NAME), 
                'sub_desc' => __('Share it.', NECTAR_THEME_NAME),
                'std' => '1',
                'desc' => '',
            ),
            array(
                'id' => 'portfolio-twitter-sharing',
                'type' => 'checkbox',
                'title' => __('Twitter', NECTAR_THEME_NAME), 
                'sub_desc' => __('Tweet it.', NECTAR_THEME_NAME),
                'std' => '1', 
                'desc' => '',
            ),
             array(
                'id' => 'portfolio-google-plus-sharing',
                'type' => 'checkbox',
                'title' => __('Google+', NECTAR_THEME_NAME), 
                'sub_desc' => __('Share it.', NECTAR_THEME_NAME),
                'std' => '0',
                'desc' => '',
            ),
            array(
                'id' => 'portfolio-pinterest-sharing',
                'type' => 'checkbox',
                'title' => __('Pinterest', NECTAR_THEME_NAME), 
                'sub_desc' => __('Pin it.', NECTAR_THEME_NAME),
                'std' => '1',
                'desc' => '',
            ),
            array(
                'id' => 'portfolio-linkedin-sharing',
                'type' => 'checkbox',
                'title' => __('LinkedIn', NECTAR_THEME_NAME), 
                'sub_desc' => __('Share it.', NECTAR_THEME_NAME),
                'std' => '0',
                'desc' => '',
            ),
            
			array(
                'id' => 'portfolio_date',
                'type' => 'checkbox',
                'title' => __('Display Dates on Projects?', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle whether or not to show the date on your projects.', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '1' 
            ),														
			array(
                'id' => 'portfolio_pagination', 
                'type' => 'checkbox_hide_below',
                'title' => __('Portfolio Pagination', NECTAR_THEME_NAME),
                'sub_desc' => __('Would you like your portfolio items to be paginated?', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0',
                'next_to_hide' => '3'
			),
			 array(
                'id' => 'portfolio_pagination_type',
                'type' => 'select', 
			    'title' => __('Pagination Type', NECTAR_THEME_NAME),
			    'sub_desc' => __('Please select your pagination type here.', NECTAR_THEME_NAME),
			    'desc' => '',
			    'options' => array(
			  		'default' => __('Default', NECTAR_THEME_NAME), 
			    	'infinite_scroll' => __('Infinite Scroll', NECTAR_THEME_NAME)
				),
			    'std' => 'default'
            ),
			array(
                'id' => 'portfolio_extra_pagination',
                'type' => 'checkbox',
                'title' => __('Display Pagination Numbers', NECTAR_THEME_NAME), 
                'sub_desc' => __('Do you want the page numbers to be visible in your portfolio pagination?', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
            ),
			array(
                'id' => 'portfolio_pagination_number', 
                'type' => 'text', 
                'title' => __('Items Per page', NECTAR_THEME_NAME),
                'sub_desc' => __('How many of your portfolio items would you like to display per page?', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
			),  
             array(
                'id' => 'portfolio_rewrite_slug', 
                'type' => 'text', 
                'title' => __('Custom Slug', NECTAR_THEME_NAME),
                'sub_desc' => __('If you want your portfolio post type to have a custom slug in the url, please enter it here. <br/><br/> <b>You will still have to refresh your permalinks after saving this!</b> <br/>This is done by going to Settings > Permalinks and clicking save.', NECTAR_THEME_NAME),
                'desc' => ''
			), 
			array(
                'id' => 'carousel-title', 
                'type' => 'text', 
                'title' => __('Custom Recent Projects Title', NECTAR_THEME_NAME),
                'sub_desc' => __('This is be used anywhere you place the recent work shortcode and on the "Recent Work" home layout. e.g. Recent Work', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'carousel-link', 
                'type' => 'text', 
                'title' => __('Custom Recent Projects Link Text', NECTAR_THEME_NAME),
                'sub_desc' => __('This is be used anywhere you place the recent work shortcode and on the "Recent Work" home layout. e.g. View All Work', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'portfolio-sortable-text', 
                'type' => 'text', 
                'title' => __('Custom Portfolio Page Sortable Text', NECTAR_THEME_NAME),
                'sub_desc' => __('e.g. Sort Portfolio', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'main-portfolio-link', 
                'type' => 'text', 
                'title' => __('Main Portfolio Page URL', NECTAR_THEME_NAME),
                'sub_desc' => __('This will be used to link back to your main portfolio from the more details page and for the recent projects link. i.e. The portfolio page that you are displaying all project categories on.', NECTAR_THEME_NAME),
                'desc' => ''
			)
                                       
        )
    );
	
	
	$sections[] = array(
		'icon' => 'pencil',
		'icon_class' => 'icon-large',
        'title' => __('Blog', NECTAR_THEME_NAME),
        'desc' => __('All blog related options are listed here.', NECTAR_THEME_NAME),
        'fields' => array(  
        
			array(
			    'id' => 'blog_type', 
			    'type' => 'select', 
			    'title' => __('Blog Type', NECTAR_THEME_NAME),
			    'sub_desc' => __('Please select your blog format here.', NECTAR_THEME_NAME),
			    'desc' => '',
			    'options' => array(
			  		'std-blog-sidebar' => __('Standard Blog W/ Sidebar', NECTAR_THEME_NAME), 
			    	'std-blog-fullwidth' => __('Standard Blog No Sidebar', NECTAR_THEME_NAME),
			    	'masonry-blog-sidebar' => __('Masonry Blog W/ Sidebar', NECTAR_THEME_NAME),
			    	'masonry-blog-fullwidth' => __('Masonry Blog No Sidebar', NECTAR_THEME_NAME),
			    	'masonry-blog-full-screen-width' => __('Masonry Blog Fullwidth', NECTAR_THEME_NAME)
				),
			    'std' => 'std-blog-sidebar'
		    ), 
			array( 
                'id' => 'author_bio',
                'type' => 'checkbox',
                'title' => __('Author\'s Bio', NECTAR_THEME_NAME), 
                'sub_desc' => __('Display the author\'s bio at the bottom of posts?', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'std' => '0' 
            ),
            array(
                'id' => 'blog_auto_excerpt',
                'type' => 'checkbox_hide_below',
                'title' => __('Automatic Post Excerpts', NECTAR_THEME_NAME), 
                'sub_desc' => __('Using this will create automatic excerpts for your posts, placing a read more button after.', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '1',
                'switch' => true,
                'std' => '0' 
            ),	
             array(
                'id' => 'blog_excerpt_length', 
                'type' => 'text', 
                'title' => __('Excerpt Length', NECTAR_THEME_NAME),
                'sub_desc' => __('How many words would you like to display for your post excerpts? The default is 30.', NECTAR_THEME_NAME),
                'desc' => ''
			),
           array(
                'id' => 'blog_next_post_link',
                'type' => 'checkbox',
                'title' => __('Next Post Link On Single Post Page', NECTAR_THEME_NAME), 
                'sub_desc' => __('Using this will add a link at the bottom of every post page that leads to the next post.', NECTAR_THEME_NAME),
                'desc' => '',
                'switch' => true,
                'std' => '0' 
            ), 
            array(
                'id' => 'blog_header_type', 
                'type' => 'select', 
                'title' => __('Blog Header Type', NECTAR_THEME_NAME),
                'sub_desc' => __('Please select your blog header format here.', NECTAR_THEME_NAME),
                'desc' => '',
                'options' => array(
                    'default' => __('Variable height & meta overlaid', NECTAR_THEME_NAME), 
                    'fullscreen' => __('Fullscreen with meta under', NECTAR_THEME_NAME)
                ),
                'std' => 'default'
            ), 
             array(
                'id' => 'blog_hide_sidebar',
                'type' => 'checkbox',
                'title' => __('Hide Sidebar on Single Post', NECTAR_THEME_NAME), 
                'sub_desc' => __('Using this will remove the sidebar from appearing on your single post page.', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),  
            array(
                'id' => 'blog_hide_featured_image',
                'type' => 'checkbox',
                'title' => __('Hide Featured Image on Single Post', NECTAR_THEME_NAME), 
                'sub_desc' => __('Using this will remove the featured image from appearing in the top of your single post page.', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),  
			array(
                'id' => 'blog_social',
                'type' => 'checkbox_hide_below',
                'title' => __('Social Media Sharing Buttons', NECTAR_THEME_NAME), 
                'sub_desc' => __('Activate this to enable social sharing buttons on your blog posts.', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '5',
                'switch' => true,
                'std' => '1' 
            ),	
             array(
                'id' => 'blog-facebook-sharing',
                'type' => 'checkbox',
                'title' => __('Facebook', NECTAR_THEME_NAME), 
                'sub_desc' =>  __('Share it.', NECTAR_THEME_NAME),
                'std' => '1',
                'desc' => '',
            ),
            array(
                'id' => 'blog-twitter-sharing',
                'type' => 'checkbox',
                'title' => __('Twitter', NECTAR_THEME_NAME), 
                'sub_desc' =>  __('Tweet it.', NECTAR_THEME_NAME),
                'std' => '1', 
                'desc' => '',
            ),
            array(
                'id' => 'blog-google-plus-sharing',
                'type' => 'checkbox',
                'title' => __('Google+', NECTAR_THEME_NAME), 
                'sub_desc' =>  __('Share it.', NECTAR_THEME_NAME),
                'std' => '0',
                'desc' => '',
            ),
            array(
                'id' => 'blog-pinterest-sharing',
                'type' => 'checkbox',
                'title' => __('Pinterest', NECTAR_THEME_NAME), 
                'sub_desc' =>  __('Pin it.', NECTAR_THEME_NAME),
                'std' => '1',
                'desc' => '',
            ),
            array(
                'id' => 'blog-linkedin-sharing',
                'type' => 'checkbox',
                'title' => __('LinkedIn', NECTAR_THEME_NAME), 
                'sub_desc' =>  __('Share it.', NECTAR_THEME_NAME),
                'std' => '0',
                'desc' => '',
            ),
            
			array(
                'id' => 'display_tags',
                'type' => 'checkbox',
                'title' => __('Display Tags', NECTAR_THEME_NAME), 
                'sub_desc' => __('Display tags at the bottom of posts?', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'switch' => true,
                'std' => '0' 
            ),
            
			array(
                'id' => 'display_full_date',
                'type' => 'checkbox',
                'title' => __('Display Full Date', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will add the year to the date post meta on all blog pages.', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'switch' => true,
                'std' => '0' 
            ),
            array(
                'id' => 'blog_pagination_type',
                'type' => 'select', 
			    'title' => __('Pagination Type', NECTAR_THEME_NAME),
			    'sub_desc' => __('Please select your pagination type here.', NECTAR_THEME_NAME),
			    'desc' => '',
			    'options' => array(
			  		'default' => __('Default', NECTAR_THEME_NAME), 
			    	'infinite_scroll' => __('Infinite Scroll', NECTAR_THEME_NAME)
				),
			    'std' => 'default'
            ),
            array(
                'id' => 'extra_pagination',
                'type' => 'checkbox',
                'title' => __('Display Pagination Numbers', NECTAR_THEME_NAME), 
                'sub_desc' => __('Do you want the page numbers to be visible in your pagination? (will only activate if using default pagination type)', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'switch' => true,
                'std' => '0' 
            ),
            array(
                'id' => 'recent-posts-title', 
                'type' => 'text', 
                'title' => __('Custom Recent Posts Title', NECTAR_THEME_NAME),
                'sub_desc' => __('This is be used anywhere you place the recent posts shortcode and on the "Recent Posts" home layout. e.g. Recent Posts', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'recent-posts-link', 
                'type' => 'text', 
                'title' => __('Custom Recent Posts Link Text', NECTAR_THEME_NAME),
                'sub_desc' => __('This is be used anywhere you place the recent posts shortcode and on the "Recent Posts" home layout. e.g. View All Posts', NECTAR_THEME_NAME),
                'desc' => ''
			),
                                       
        )
    );
	
	

	
	$sections[] = array(
		'icon' => 'map-marker',
		'icon_class' => 'icon-large',
        'title' => __('Contact', NECTAR_THEME_NAME),
        'desc' => __('To convert an address into latitude & longitude please use <a href="http://www.latlong.net/convert-address-to-lat-long.html">this converter.</a>', NECTAR_THEME_NAME),
        'fields' => array( 	
       		 array(
                'id' => 'zoom-level',
                'type' => 'text',
                'title' => __('Default Map Zoom Level', NECTAR_THEME_NAME), 
                'sub_desc' => __('Value should be between 1-18, 1 being the entire earth and 18 being right at street level.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'enable-map-zoom',
                'type' => 'checkbox',
                'title' => __('Enable Map Zoom In/Out', NECTAR_THEME_NAME), 
                'sub_desc' => __('Do you want users to be able to zoom in/out on the map?', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '0' 
            ),
            array(
                'id' => 'center-lat',
                'type' => 'text',
                'title' => __('Map Center Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for the maps center point.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'center-lng',
                'type' => 'text',
                'title' => __('Map Center Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for the maps center point.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'use-marker-img',
                'type' => 'checkbox_hide_below',
                'title' => __('Use Image for Markers', NECTAR_THEME_NAME), 
                'sub_desc' => __('Do you want a custom image to be used for the map markers?', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'std' => '0' 
            ),
            array(
                'id' => 'marker-img',
                'type' => 'upload',
                'title' => __('Marker Icon Upload', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please upload an image that will be used for all the markers on your map.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            array(
                'id' => 'enable-map-animation',
                'type' => 'checkbox',
                'title' => __('Enable Marker Animation', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will cause your markers to do a quick bounce as they load in.', NECTAR_THEME_NAME),
                'desc' => '',
                'std' => '1' 
            ),
            array(
                'id' => 'map-point-1',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #1', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #1', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude1',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your first location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude1',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your first location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info1',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your first location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
            array(
                'id' => 'map-point-2',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #2', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #2', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude2',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your second location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude2',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your second location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info2',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your second location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
			array(
                'id' => 'map-point-3',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #3', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #3', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude3',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your third location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude3',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your third location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info3',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your third location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
			array(
                'id' => 'map-point-4',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #4', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #4', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude4',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your fourth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude4',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your fourth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info4',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your fourth location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
			
			array(
                'id' => 'map-point-5',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #5', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #5', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude5',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your fifth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude5',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your fifth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info5',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your fifth location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
			array(
                'id' => 'map-point-6',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #6', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #6', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude6',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your sixth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude6',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your sixth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info6',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your sixth location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
			
			array(
                'id' => 'map-point-7',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #7', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #7', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude7',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your seventh location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude7',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your seventh location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info7',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your seventh location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
			
			array(
                'id' => 'map-point-8',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #8', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #8', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude8',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your eighth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude8',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your eighth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info8',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your eighth location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
			
			array(
                'id' => 'map-point-9',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #9', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #9', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude9',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your ninth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude9',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your ninth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info9',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your ninth location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
			array(
                'id' => 'map-point-10',
                'type' => 'checkbox_hide_below',
                'title' => __('Location #10', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle location #10', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'switch' => true,
                'std' => '0' 
            ),
       		 array(
                'id' => 'latitude10',
                'type' => 'text',
                'title' => __('Latitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the latitude for your tenth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
             array(
                'id' => 'longitude10',
                'type' => 'text',
                'title' => __('Longitude', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter the longitude for your tenth location.', NECTAR_THEME_NAME),
                'desc' => '',
                'validate' => 'numeric'
            ),
            array(
                'id' => 'map-info10',
                'type' => 'textarea',
                'title' => __('Map Infowindow Text', NECTAR_THEME_NAME), 
                'sub_desc' => __('If you would like to display any text in an info window for your tenth location, please enter it here.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            
			
			array(
                'id' => 'add-remove-locations',
                'type' => 'add_remove',
                'title' => __('Show More or Less Locations', NECTAR_THEME_NAME), 
                'desc' => '',
                'grouping' => 'map-point'
            ),
            
			array(
                'id' => 'map-greyscale',
                'type' => 'checkbox_hide_below',
                'title' => __('Greyscale Color', NECTAR_THEME_NAME), 
                'sub_desc' => __('Toggle a greyscale color scheme (will also unlock a custom color option)', NECTAR_THEME_NAME),
                'desc' => '',
                'next_to_hide' => '3',
                'std' => '0' 
            ),
			array(
                'id' => 'map-color',
                'type' => 'color',
                'title' => __('Map Extra Color', NECTAR_THEME_NAME), 
                'sub_desc' =>  __('Use this to define a main color that will be used in combination with the greyscale option for your map', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => ''
            ),
            array(
                'id' => 'map-ultra-flat',
                'type' => 'checkbox',
                'title' => __('Ultra Flat Map', NECTAR_THEME_NAME), 
                'sub_desc' =>  __('This removes street/landmark text & some extra details for a clean look', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => ''
            ),
            array(
                'id' => 'map-dark-color-scheme',
                'type' => 'checkbox',
                'title' => __('Dark Color Scheme', NECTAR_THEME_NAME), 
                'sub_desc' =>  __('Enable this option for a dark colored map (This will override the extra color choice) ', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => ''
            )
			
        )
    );
	
	
	
	$sections[] = array(
		'icon' => 'home',
		'icon_class' => 'icon-large',
        'title' => __('Home Slider', NECTAR_THEME_NAME),
        'desc' => __('All home page related options are listed here.', NECTAR_THEME_NAME),
        'fields' => array( 
            array(
                'id' => 'slider-caption-animation',
                'type' => 'checkbox',
                'title' => __('Slider Caption Animations', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will add transition animations to your captions.', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'switch' => true,
                'std' => '1' 
            ),
            array(
                'id' => 'slider-background-cover',
                'type' => 'checkbox',
                'title' => __('Slider Image Resize', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will automatically resize your slide images to fit the users screen size by using the background-size cover css property.', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'switch' => true,
                'std' => '1' 
            ),
			array(
                'id' => 'slider-autoplay',
                'type' => 'checkbox',
                'title' => __('Autoplay Slider?', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will cause the automatic advance of slides until the user begins interaction.', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'switch' => true,
                'std' => '1' 
            ),
            array(
                'id' => 'slider-advance-speed', 
                'type' => 'text', 
                'title' => __('Slider Advance Speed', NECTAR_THEME_NAME),
                'sub_desc' => __('This is how long it takes before automatically switching to the next slide.', NECTAR_THEME_NAME),
                'desc' => __('enter in milliseconds (default is 5500)', NECTAR_THEME_NAME), 
                'validate' => 'numeric'
			),
			 array(
                'id' => 'slider-animation-speed', 
                'type' => 'text', 
                'title' => __('Slider Animation Speed', NECTAR_THEME_NAME),
                'sub_desc' => __('This is how long it takes to animate when switching between slides.', NECTAR_THEME_NAME),
                'desc' => __('enter in milliseconds (default is 800)', NECTAR_THEME_NAME), 
                'validate' => 'numeric'
			),
			array(
                'id' => 'slider-height',
                'type' => 'text', 
                'title' => __('Slider Height', NECTAR_THEME_NAME), 
                'sub_desc' => __('Please enter your desired height for the home slider. <br/> The safe minimum height is 400. <br/> The theme demo uses 650.', NECTAR_THEME_NAME),
                'desc' => __('Don\'t include "px" in the string. e.g. 650', NECTAR_THEME_NAME), 
                'validate' => 'numeric'
            ),
             array(
                'id' => 'slider-bg-color',
                'type' => 'color',
                'title' => __('Slider Background Color', NECTAR_THEME_NAME), 
                'sub_desc' => __('This color will only be seen if your slides aren\'t wide enough to accomidate large resolutions. ', NECTAR_THEME_NAME), 
                'desc' => '',
                'std' => '#000000'
            ),                   
        )
    );
	
	
	
	
	$sections[] = array(
		'icon' => 'file-alt',
		'icon_class' => 'icon-large',
        'title' => __('Social Media', NECTAR_THEME_NAME),
        'desc' => __('Enter in your social media locations here and then activate which ones you would like to display in your footer options & header options tabs. <br/><br/> <strong>Remember to include the "http://" in all URLs!</strong>', NECTAR_THEME_NAME),
        'fields' => array(
       		 array(
                'id' => 'sharing_btn_accent_color',
                'type' => 'checkbox',
                'title' => __('Sharing Button Accent Color?', NECTAR_THEME_NAME), 
                'sub_desc' => __('This will allow your sharing buttons (the ones in posts/projects & social shortcode) to use the accent color rather than the actual branding color.', NECTAR_THEME_NAME),
                'desc' => __('', NECTAR_THEME_NAME),
                'switch' => true,
                'std' => '1' 
            ),
            array(
                'id' => 'facebook-url', 
                'type' => 'text', 
                'title' => __('Facebook URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Facebook URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'twitter-url', 
                'type' => 'text', 
                'title' => __('Twitter URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Twitter URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'google-plus-url', 
                'type' => 'text', 
                'title' => __('Google+ URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Google+ URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'vimeo-url', 
                'type' => 'text', 
                'title' => __('Vimeo URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Vimeo URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'dribbble-url', 
                'type' => 'text', 
                'title' => __('Dribbble URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Dribbble URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'pinterest-url', 
                'type' => 'text', 
                'title' => __('Pinterest URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Pinterest URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'youtube-url', 
                'type' => 'text', 
                'title' => __('Youtube URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Youtube URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'tumblr-url', 
                'type' => 'text', 
                'title' => __('Tumblr URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Tumblr URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'linkedin-url', 
                'type' => 'text', 
                'title' => __('LinkedIn URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your LinkedIn URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'rss-url', 
                'type' => 'text', 
                'title' => __('RSS URL', NECTAR_THEME_NAME),
                'sub_desc' => __('If you have an external RSS feed such as Feedburner, please enter it here. Will use built in Wordpress feed if left blank.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'behance-url', 
                'type' => 'text', 
                'title' => __('Behance URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Behance URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'flickr-url', 
                'type' => 'text', 
                'title' => __('Flickr URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Flickr URL.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
            array(
                'id' => 'spotify-url', 
                'type' => 'text', 
                'title' => __('Spotify URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Spotify URL.', NECTAR_THEME_NAME),
                'desc' => ''
            ),
			array(
                'id' => 'instagram-url', 
                'type' => 'text', 
                'title' => __('Instagram URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your Instagram URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'github-url', 
                'type' => 'text', 
                'title' => __('GitHub URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your GitHub URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'stackexchange-url', 
                'type' => 'text', 
                'title' => __('StackExchange URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your StackExchange URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
			array(
                'id' => 'soundcloud-url', 
                'type' => 'text', 
                'title' => __('SoundCloud URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your SoundCloud URL.', NECTAR_THEME_NAME),
                'desc' => ''
			),
            array(
                'id' => 'vk-url', 
                'type' => 'text', 
                'title' => __('VK URL', NECTAR_THEME_NAME),
                'sub_desc' => __('Please enter in your VK URL.', NECTAR_THEME_NAME),
                'desc' => ''
            )
        )
    );
	



    
	global $woocommerce; 
	if ($woocommerce) {
		 
			$sections[] = array(
				'icon' => 'shopping-cart',
				'icon_class' => 'icon-large',
		        'title' => __('WooCommerce', NECTAR_THEME_NAME),
		        'desc' => __('All WooCommerce related options are listed here.', NECTAR_THEME_NAME),
		        'fields' => array(  
			        array(
		                'id' => 'enable-cart',
		                'type' => 'checkbox',
		                'title' => __('Enable WooCommerce Cart In Nav', NECTAR_THEME_NAME), 
		                'sub_desc' => __('This will add a cart item to your main navigation.', NECTAR_THEME_NAME),
		                'switch' => true,
		                'desc' => '',
		                'std' => '1' 
		            ),
		            array(
						'id' => 'main_shop_layout',
						'type' => 'radio_img',
						'title' => __('Main Shop Layout', NECTAR_THEME_NAME), 
						'sub_desc' => __('Please select layout you would like to use on your main shop page.', NECTAR_THEME_NAME),
						'desc' => __('', NECTAR_THEME_NAME),
						'options' => array(
										'no-sidebar' => array('title' => 'No Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/no-sidebar.png'),
										'right-sidebar' => array('title' => 'Right Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/right-sidebar.png'),
										'left-sidebar' => array('title' => 'Left Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/left-sidebar.png')
									),
						'std' => 'no-sidebar'
					),	
					array(
						'id' => 'single_product_layout',
						'type' => 'radio_img',
						'title' => __('Single Product Layout', NECTAR_THEME_NAME), 
						'sub_desc' => __('Please select layout you would like to use on your single product page.', NECTAR_THEME_NAME),
						'desc' => __('', NECTAR_THEME_NAME),
						'options' => array(
										'no-sidebar' => array('title' => 'No Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/no-sidebar.png'),
										'right-sidebar' => array('title' => 'Right Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/right-sidebar.png'),
										'left-sidebar' => array('title' => 'Left Sidebar', 'img' => NECTAR_FRAMEWORK_DIRECTORY.'options/img/left-sidebar.png')
									),
						'std' => 'no-sidebar'
					),	  
					array(
		                'id' => 'woo_social',
		                'type' => 'checkbox_hide_below',
		                'title' => __('Social Media Sharing Buttons', NECTAR_THEME_NAME), 
		                'sub_desc' => __('Activate this to enable social sharing buttons on your product page.', NECTAR_THEME_NAME),
		                'desc' => '',
		                'next_to_hide' => '5',
		                'switch' => true,
		                'std' => '1' 
		            ),
		            array(
		                'id' => 'woo-facebook-sharing',
		                'type' => 'checkbox',
		                'title' => __('Facebook', NECTAR_THEME_NAME), 
		                'sub_desc' =>  __('Share it.', NECTAR_THEME_NAME),
		                'std' => '1',
		                'desc' => '',
		            ),
		            array(
		                'id' => 'woo-twitter-sharing',
		                'type' => 'checkbox',
		                'title' => __('Twitter', NECTAR_THEME_NAME), 
		                'sub_desc' =>  __('Tweet it.', NECTAR_THEME_NAME),
		                'std' => '1', 
		                'desc' => '',
		            ),
		             array(
                        'id' => 'woo-google-plus-sharing',
                        'type' => 'checkbox',
                        'title' => __('Google+', NECTAR_THEME_NAME), 
                        'sub_desc' =>  __('Share it.', NECTAR_THEME_NAME),
                        'std' => '1',
                        'desc' => '',
                    ),
                    array(
                        'id' => 'woo-pinterest-sharing',
                        'type' => 'checkbox',
                        'title' => __('Pinterest', NECTAR_THEME_NAME), 
                        'sub_desc' =>  __('Pin it.', NECTAR_THEME_NAME),
                        'std' => '1',
                        'desc' => '',
                    ),
                    array(
                        'id' => 'woo-linkedin-sharing',
                        'type' => 'checkbox',
                        'title' => __('LinkedIn', NECTAR_THEME_NAME), 
                        'sub_desc' =>  __('Share it.', NECTAR_THEME_NAME),
                        'std' => '0',
                        'desc' => '',
                    )               
		        )
		    );
			
	}
	
    $tabs = array();

    if (function_exists('wp_get_theme')){
        $theme_data = wp_get_theme();
        $item_uri = $theme_data->get('ThemeURI');
        $description = $theme_data->get('Description');
        $author = $theme_data->get('Author');
        $author_uri = $theme_data->get('AuthorURI');
        $version = $theme_data->get('Version');
        $tags = $theme_data->get('Tags');
    }else{
        $theme_data = wp_get_theme(trailingslashit(get_stylesheet_directory()) . 'style.css');
        $item_uri = $theme_data['URI'];
        $description = $theme_data['Description'];
        $author = $theme_data['Author'];
        $author_uri = $theme_data['AuthorURI'];
        $version = $theme_data['Version'];
        $tags = $theme_data['Tags'];
     }
    
    $item_info = '<div class="redux-opts-section-desc">';
    $item_info .= '<p class="redux-opts-item-data description item-uri">' . __('<strong>Theme URL:</strong> ', NECTAR_THEME_NAME) . '<a href="' . $item_uri . '" target="_blank">' . $item_uri . '</a></p>';
    $item_info .= '<p class="redux-opts-item-data description item-author">' . __('<strong>Author:</strong> ', NECTAR_THEME_NAME) . ($author_uri ? '<a href="' . $author_uri . '" target="_blank">' . $author . '</a>' : $author) . '</p>';
    $item_info .= '<p class="redux-opts-item-data description item-version">' . __('<strong>Version:</strong> ', NECTAR_THEME_NAME) . $version . '</p>';
    $item_info .= '<p class="redux-opts-item-data description item-tags"><div class="redux-opts-heading"><h3>' . __('Documentation: ', NECTAR_THEME_NAME) . '</h3></div>';
	$item_info .= '<p>'.__('**Please note that the following embedded documentation is displayed in a lower quality than the one included with your purchase.', NECTAR_THEME_NAME).'</p>';
	$item_info .= '<iframe src="http://docs.google.com/gview?url=themenectar.com/docs/salient.pdf&embedded=true" style="width:100%; height:600px;" frameborder="0"></iframe>';
    $item_info .= '</div>';

    $tabs['item_info'] = array(
		'icon' => 'info-sign',
		'icon_class' => 'icon-large',
        'title' => __('Theme Information', NECTAR_THEME_NAME),
        'content' => $item_info
    );
    
    if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
        $tabs['docs'] = array(
			'icon' => 'book',
			'icon_class' => 'icon-large',
            'title' => __('Documentation', NECTAR_THEME_NAME),
            'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
        );
    }

    global $Redux_Options;
    $Redux_Options = new Redux_Options($sections, $args, $tabs);

}
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation
    
    if(something) {
        $value = $value;
    } elseif(somthing else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */
    
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}
