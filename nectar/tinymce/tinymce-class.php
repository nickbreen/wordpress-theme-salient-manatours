<?php


#-----------------------------------------------------------------
# Enqueue scripts
#-----------------------------------------------------------------

function enqueue_generator_scripts(){

	wp_enqueue_style('tinymce',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/tinymce.css'); 
	wp_enqueue_style('chosen',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/chosen/chosen.css'); 
	wp_enqueue_style('simple-slider',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/simple_slider/simple-slider.css'); 
	wp_enqueue_style('simple-slider-volume',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/simple_slider/simple-slider-volume.css'); 
	
	wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome.min.css'); 
	wp_enqueue_style('steadysets', get_template_directory_uri() . '/css/steadysets.css');
	wp_enqueue_style('linecon', get_template_directory_uri() . '/css/linecon.css');
		 
	wp_enqueue_script('chosen',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/js/chosen/chosen.jquery.min.js','jquery','1.0 ', TRUE);
	wp_enqueue_script('simple-slider',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/js/simple_slider/simple-slider.min.js','jquery','1.0 ', TRUE);
	
	wp_enqueue_style('magnific',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/css/magnific-popup.css'); 
	wp_enqueue_script('magnific',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/js/magnific-popup.js','jquery','0.9.7 ', TRUE);
	
	wp_enqueue_script('nectar-shortcode-generator-popup',get_template_directory_uri() . '/nectar/tinymce/shortcode_generator/js/popup.js','jquery','0.9.7 ', TRUE);
	wp_enqueue_script('nectar-shortcode-generator',get_template_directory_uri() . '/nectar/tinymce/nectar-shortcode-generator.js','jquery','0.9.7 ', TRUE);
	
}

add_action('admin_enqueue_scripts','enqueue_generator_scripts');



 
add_action('admin_footer','content_display');


function content_display(){
		
//Shortcodes Definitions
#-----------------------------------------------------------------
# Columns
#-----------------------------------------------------------------

//Half
$nectar_shortcodes['header_1'] = array( 
	'type'=>'heading', 
	'title'=>__('Columns', NECTAR_THEME_NAME)
);

$nectar_shortcodes['one_half'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Half (1/2)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
			     "fade-in" => "Fade In",
		  		 "fade-in-from-left" => "Fade In From Left",
		  		 "fade-in-right" => "Fade In From Right",
		  		 "fade-in-from-bottom" => "Fade In From Bottom",
		  		 "grow-in" => "Grow In"
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);


//Thirds
$nectar_shortcodes['one_third'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Third Column (1/3)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => __("None",NECTAR_THEME_NAME),
			     "fade-in" => __("Fade In",NECTAR_THEME_NAME),
		  		 "fade-in-from-left" => __("Fade In From Left",NECTAR_THEME_NAME),
		  		 "fade-in-right" => __("Fade In From Right",NECTAR_THEME_NAME),
		  		 "fade-in-from-bottom" => __("Fade In From Bottom",NECTAR_THEME_NAME),
		  		 "grow-in" => __("Grow In",NECTAR_THEME_NAME)
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);

$nectar_shortcodes['two_thirds'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Two Thirds Column (2/3)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => __("None",NECTAR_THEME_NAME),
			     "fade-in" => __("Fade In",NECTAR_THEME_NAME),
		  		 "fade-in-from-left" => __("Fade In From Left",NECTAR_THEME_NAME),
		  		 "fade-in-right" => __("Fade In From Right",NECTAR_THEME_NAME),
		  		 "fade-in-from-bottom" => __("Fade In From Bottom",NECTAR_THEME_NAME),
		  		 "grow-in" => __("Grow In",NECTAR_THEME_NAME)
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);


//Fourths
$nectar_shortcodes['one_fourth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Fourth Column (1/4)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			    "none" => __("None",NECTAR_THEME_NAME),
			     "fade-in" => __("Fade In",NECTAR_THEME_NAME),
		  		 "fade-in-from-left" => __("Fade In From Left",NECTAR_THEME_NAME),
		  		 "fade-in-right" => __("Fade In From Right",NECTAR_THEME_NAME),
		  		 "fade-in-from-bottom" => __("Fade In From Bottom",NECTAR_THEME_NAME),
		  		 "grow-in" => __("Grow In",NECTAR_THEME_NAME)
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);

$nectar_shortcodes['three_fourths'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Three Fourths Column (3/4)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			    "none" => __("None",NECTAR_THEME_NAME),
			     "fade-in" => __("Fade In",NECTAR_THEME_NAME),
		  		 "fade-in-from-left" => __("Fade In From Left",NECTAR_THEME_NAME),
		  		 "fade-in-right" => __("Fade In From Right",NECTAR_THEME_NAME),
		  		 "fade-in-from-bottom" => __("Fade In From Bottom",NECTAR_THEME_NAME),
		  		 "grow-in" => __("Grow In",NECTAR_THEME_NAME)
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);


//Sixths
$nectar_shortcodes['one_sixth'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Sixth Column (1/6)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			    "none" => __("None",NECTAR_THEME_NAME),
			     "fade-in" => __("Fade In",NECTAR_THEME_NAME),
		  		 "fade-in-from-left" => __("Fade In From Left",NECTAR_THEME_NAME),
		  		 "fade-in-right" => __("Fade In From Right",NECTAR_THEME_NAME),
		  		 "fade-in-from-bottom" => __("Fade In From Bottom",NECTAR_THEME_NAME),
		  		 "grow-in" => __("Grow In",NECTAR_THEME_NAME)
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);

$nectar_shortcodes['five_sixths'] = array( 
	'type'=>'checkbox', 
	'title'=>__('Five Sixths Column (5/6)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'last'=>array( 'type'=>'custom', 'title'=>__('Last Column',NECTAR_THEME_NAME), 'desc' => __('Check this for the last column in a row. i.e. when the columns add up to 1.', NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => __("None",NECTAR_THEME_NAME),
			     "fade-in" => __("Fade In",NECTAR_THEME_NAME),
		  		 "fade-in-from-left" => __("Fade In From Left",NECTAR_THEME_NAME),
		  		 "fade-in-right" => __("Fade In From Right",NECTAR_THEME_NAME),
		  		 "fade-in-from-bottom" => __("Fade In From Bottom",NECTAR_THEME_NAME),
		  		 "grow-in" => __("Grow In",NECTAR_THEME_NAME)
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);

$nectar_shortcodes['one_whole'] = array( 
	'type'=>'checkbox', 
	'title'=>__('One Whole Column (1/1)', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'boxed'=>array('type'=>'custom', 'title'=>__('Boxed Column',NECTAR_THEME_NAME)),
		'centered_text'=>array('type'=>'custom', 'title'=>__('Centered Text',NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'half_width' => 'true',
			'title'  => __('Animation',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => __("None",NECTAR_THEME_NAME),
			     "fade-in" => __("Fade In",NECTAR_THEME_NAME),
		  		 "fade-in-from-left" => __("Fade In From Left",NECTAR_THEME_NAME),
		  		 "fade-in-right" => __("Fade In From Right",NECTAR_THEME_NAME),
		  		 "fade-in-from-bottom" => __("Fade In From Bottom",NECTAR_THEME_NAME),
		  		 "grow-in" => __("Grow In",NECTAR_THEME_NAME)
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'second_half_width' => 'true',
			'title'=>__('Animation Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		)
	)
);


#-----------------------------------------------------------------
# Elements 
#-----------------------------------------------------------------

$nectar_shortcodes['header_6'] = array( 
	'type'=>'heading', 
	'title'=>__('Elements', NECTAR_THEME_NAME )
); 

//nectar Slider
$slider_locations = get_terms('slider-locations');
$locations = array();

foreach ($slider_locations as $location) {
	$locations[$location->slug] = $location->name;
}

if (empty($locations)) {
	$location_desc = 
      '<div class="alert">' .
	 __('You currently don\'t have any Slider Locations setup. Please create some and add assign slides to them before using this!',NECTAR_THEME_NAME). 
	'<br/><br/>
	<a href="' . admin_url('edit.php?post_type=nectar_slider') . '">'. __('Link to Nectar Slider', NECTAR_THEME_NAME) . '</a>
	</div>';
} else { $location_desc = ''; }

$nectar_shortcodes['nectar_slider'] = array( 
	'type'=>'regular', 
	'title'=>__('Nectar Slider', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'location'=>array(
			'type'=>'select', 
			'desc' => $location_desc,
			'title'  => __('Select Slider',NECTAR_THEME_NAME),
			'values' => $locations
		),
		
		'slider_height'=>array(
			'type'=>'text', 
			'title'=>__('Slider Height', NECTAR_THEME_NAME),
			'desc' => __('Don\'nt include "px" in your string. e.g. 650', NECTAR_THEME_NAME),
		),
		
		'flexible_slider_height'=>array('type'=>'checkbox',  'desc' => 'Would you like the height of your slider to constantly scale in porportion to the screen size?', 'title'=>__('Flexible Slider Height', NECTAR_THEME_NAME)),
		'full_width'=>array('type'=>'checkbox',  'desc' => 'Would you like this slider to display the full width of the page?', 'title'=>__('Display Full Width?', NECTAR_THEME_NAME)),
		'arrow_navigation'=>array('type'=>'checkbox',  'desc' => 'Would you like this slider to display arrows on the right and left sides?', 'title'=>__('Display Arrow Navigation', NECTAR_THEME_NAME)),
		'bullet_navigation'=>array('type'=>'checkbox',  'desc' => 'Would you like this slider to display bullets on the bottom?', 'title'=>__('Display Bullet Navigation', NECTAR_THEME_NAME)),
		'desktop_swipe'=>array('type'=>'checkbox',  'desc' => 'Would you like this slider to have swipe interaction on desktop?', 'title'=>__('Enable Swipe on Desktop?', NECTAR_THEME_NAME)),
		'parallax'=>array('type'=>'checkbox',  'desc' => 'will only activate if the slider is the <b>top level element</b> in the page', 'title'=>__('Parallax Slider?', NECTAR_THEME_NAME)),
		'loop'=>array('type'=>'checkbox',  'desc' => 'Would you like your slider to loop infinitely?', 'title'=>__('Loop Slider?', NECTAR_THEME_NAME)),
		'fullscreen'=>array('type'=>'checkbox',  'desc' => 'This will only become active when used in combination with the full width option', 'title'=>__('Fullscreen Slider?', NECTAR_THEME_NAME)),
		'slider_transition'=>array(
			'type'=>'select', 
			'desc' => 'Please select your slider transition here',
			'title'  => __('Slider Transition',NECTAR_THEME_NAME),
			'values' => array(
				'slide' => 'slide',
				'fade' => 'fade'
			)
		),
		'autorotate'=>array('type'=>'text',  'desc' => 'If you would like this slider to autorotate, enter the rotation speed in <b>miliseconds</b> here. i.e 5000', 'title'=>__('Autorotate?', NECTAR_THEME_NAME))
	)
);

 
//Full Width Section
$nectar_shortcodes['full_width_section'] = array( 
	'type'=>'custom', 
	'title'=>__('Full Width Section', NECTAR_THEME_NAME ), 
	'attr'=>array( 
	    'color' =>array('type'=>'custom', 'title'  => __('Background Color',NECTAR_THEME_NAME)),
		'image'=>array('type'=>'custom', 'title'  => __('Background Image',NECTAR_THEME_NAME)),
		'bg_pos'=>array(
			'type'=>'select', 
			'title'  => __('Background Position',NECTAR_THEME_NAME),
			'values' => array(
			     "left top" => __("Left Top",NECTAR_THEME_NAME),
		  		 "left center" => __("Left Center",NECTAR_THEME_NAME),
		  		 "left bottom" => __("Left Bottom",NECTAR_THEME_NAME),
		  		 "center top" => __("Center Top",NECTAR_THEME_NAME),
		  		 "center center" => __("Center Center",NECTAR_THEME_NAME),
		  		 "center bottom" => __("Center Bottom",NECTAR_THEME_NAME),
		  		 "right top" => __("Right Top",NECTAR_THEME_NAME),
		  		 "right center" => __("Right Center",NECTAR_THEME_NAME),
		  		 "right bottom" => __("Right Bottom",NECTAR_THEME_NAME)
			)
		),
		'bg_repeat'=>array(
			'type'=>'select', 
			'title'  => __('Background Repeat',NECTAR_THEME_NAME),
			'values' => array(
			    "no-repeat" => __("No-Repeat",NECTAR_THEME_NAME),
		  		 "repeat" => __("Repeat",NECTAR_THEME_NAME)
			)
		),
		'parallax_bg'=>array('type'=>'checkbox', 'title'=>__('Parallax Background', NECTAR_THEME_NAME)),
		'text_color'=>array(
			'type'=>'select', 
			'title'  => __('Text Color',NECTAR_THEME_NAME),
			'values' => array(
		  		 "light_text" => __("Light",NECTAR_THEME_NAME),
		  		 "dark_text" => __("Dark",NECTAR_THEME_NAME)
			)
		),
		
		'top_padding'=>array(
			'type'=>'text', 
			'title'=>__('Top Padding', NECTAR_THEME_NAME),
			'desc' => __('Don\'nt include "px" in your string. e.g. 40', NECTAR_THEME_NAME),
		),
		'bottom_padding'=>array(
			'type'=>'text', 
			'title'=>__('Bottom Padding', NECTAR_THEME_NAME),
			'desc' => __('Don\'nt include "px" in your string. e.g. 40', NECTAR_THEME_NAME),
		),
		
	)
);


//Image with Animation
$nectar_shortcodes['image_with_animation'] = array( 
	'type'=>'custom', 
	'title'=>__('Image With Animation', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'image'=>array('type'=>'custom', 'title'  => __('Image',NECTAR_THEME_NAME)),
		'animation'=>array(
			'type'=>'select', 
			'title'  => __('Image Animation',NECTAR_THEME_NAME),
			'values' => array(
			    "fade-in" => __("Fade In",NECTAR_THEME_NAME),
		  		 "fade-in-from-left" => __("Fade In From Left",NECTAR_THEME_NAME),
		  		 "fade-in-right" => __("Fade In From Right",NECTAR_THEME_NAME),
		  		 "fade-in-from-bottom" => __("Fade In From Bottom",NECTAR_THEME_NAME),
		  		 "grow-in" => __("Grow In",NECTAR_THEME_NAME)
			)
		),
		'delay'=>array(
			'type'=>'text', 
			'title'=>__('Delay', NECTAR_THEME_NAME),
			'desc' => __('Enter delay (in milliseconds) if needed e.g. 150. This parameter comes in handy when creating the animate in "one by one" effect in horizontal columns. ', NECTAR_THEME_NAME),
		),
	)
);

//Heading
$nectar_shortcodes['heading'] = array( 
	'type'=>'simple', 
	'title'=>__('Centered Heading', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'subtitle'=>array('type'=>'text', 'title'=>__('Subtitle', NECTAR_THEME_NAME)) 
	)
);

//Divider
$nectar_shortcodes['divider'] = array( 
	'type'=>'regular', 
	'title'=>__('Divider', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'line_type'=>array(
			'type'=>'select', 
			'title'  => __('Display Line?',NECTAR_THEME_NAME),
			'values' => array(
			     "no-line" => __("No Line",NECTAR_THEME_NAME),
		  		 "full-width" => __("Full Width Line",NECTAR_THEME_NAME),
		  		 "small" => __("Small Line",NECTAR_THEME_NAME)
			)
		),
		'custom_height'=>array(
			'type'=>'text', 
			'desc' => 'If you would like to control the specifc number of pixels your divider is, enter it here. <b>Don\'t enter "px", just the numnber e.g. "20"</b>', 
			'title'=>__('Custom Dividing Height', NECTAR_THEME_NAME)
		)
	)
);

//Milestone 
$nectar_shortcodes['milestone'] = array( 
	'type'=>'regular', 
	'title'=>__('Milestone', NECTAR_THEME_NAME), 
	'attr'=>array( 
		'number'=>array('type'=>'text', 'desc' => 'The number/count of your milestone e.g. "13"', 'title'=>__('Milestone Number', NECTAR_THEME_NAME)),
		'subject'=>array('type'=>'text', 'desc' => 'The subject of your milestones e.g. "Projects Completed"', 'title'=>__('Milestone Subject', NECTAR_THEME_NAME)),
		'symbol'=>array('type'=>'text', 'desc' => 'An optional symbol to place next to the number counted to. e.g. "%" or "+"', 'title'=>__('Milestone Symbol', NECTAR_THEME_NAME)),
		'symbol_position'=>array(
			'type'=>'select', 
			'title'  => __('Milestone Symbol Position',NECTAR_THEME_NAME),
			'values' => array(
			    "after" => "after",
		 		"before" => "before",
			)
		),
		'color'=>array(
			'type'=>'select', 
			'title'  => __('Color',NECTAR_THEME_NAME),
			'values' => array(
			     "default" => "Default",
			     "accent-color" => __("Accent-Color",NECTAR_THEME_NAME),
		  		 "extra-color-1" => __("Extra-Color-1",NECTAR_THEME_NAME),
		  		 "extra-color-2" => __("Extra-Color-2",NECTAR_THEME_NAME),
		  		 "extra-color-3" => __("Extra-Color-3",NECTAR_THEME_NAME)
			)
		)
	)
);



//Icon
$fa_icons =  array(
			      'fa-glass' => 'fa-glass',
				  'fa-music' => 'fa-music',
				  'fa-search' => 'fa-search',
				  'fa-envelope-o' => 'fa-envelope-o',
				  'fa-heart' => 'fa-heart',
				  'fa-star' => 'fa-star',
				  'fa-star-o' => 'fa-star-o',
				  'fa-user' => 'fa-user',
				  'fa-film' => 'fa-film',
				  'fa-th-large' => 'fa-th-large',
				  'fa-th' => 'fa-th',
				  'fa-th-list' => 'fa-th-list',
				  'fa-check' => 'fa-check',
				  'fa-times' => 'fa-times',
				  'fa-search-plus' => 'fa-search-plus',
				  'fa-search-minus' => 'fa-search-minus',
				  'fa-power-off' => 'fa-power-off',
				  'fa-signal' => 'fa-signal',
				  'fa-cog' => 'fa-cog',
				  'fa-trash-o' => 'fa-trash-o',
				  'fa-home' => 'fa-home',
				  'fa-file-o' => 'fa-file-o',
				  'fa-clock-o' => 'fa-clock-o',
				  'fa-road' => 'fa-road',
				  'fa-download' => 'fa-download',
				  'fa-arrow-circle-o-down' => 'fa-arrow-circle-o-down',
				  'fa-arrow-circle-o-up' => 'fa-arrow-circle-o-up',
				  'fa-inbox' => 'fa-inbox',
				  'fa-play-circle-o' => 'fa-play-circle-o',
				  'fa-repeat' => 'fa-repeat',
				  'fa-refresh' => 'fa-refresh',
				  'fa-list-alt' => 'fa-list-alt',
				  'fa-lock' => 'fa-lock',
				  'fa-flag' => 'fa-flag',
				  'fa-headphones' => 'fa-headphones',
				  'fa-volume-off' => 'fa-volume-off',
				  'fa-volume-down' => 'fa-volume-down',
				  'fa-volume-up' => 'fa-volume-up',
				  'fa-qrcode' => 'fa-qrcode',
				  'fa-barcode' => 'fa-barcode',
				  'fa-tag' => 'fa-tag',
				  'fa-tags' => 'fa-tags',
				  'fa-book' => 'fa-book',
				  'fa-bookmark' => 'fa-bookmark',
				  'fa-print' => 'fa-print',
				  'fa-camera' => 'fa-camera',
				  'fa-font' => 'fa-font',
				  'fa-bold' => 'fa-bold',
				  'fa-italic' => 'fa-italic',
				  'fa-text-height' => 'fa-text-height',
				  'fa-text-width' => 'fa-text-width',
				  'fa-align-left' => 'fa-align-left',
				  'fa-align-center' => 'fa-align-center',
				  'fa-align-right' => 'fa-align-right',
				  'fa-align-justify' => 'fa-align-justify',
				  'fa-list' => 'fa-list',
				  'fa-outdent' => 'fa-outdent',
				  'fa-indent' => 'fa-indent',
				  'fa-video-camera' => 'fa-video-camera',
				  'fa-picture-o' => 'fa-picture-o',
				  'fa-pencil' => 'fa-pencil',
				  'fa-map-marker' => 'fa-map-marker',
				  'fa-adjust' => 'fa-adjust',
				  'fa-tint' => 'fa-tint',
				  'fa-pencil-square-o' => 'fa-pencil-square-o',
				  'fa-share-square-o' => 'fa-share-square-o',
				  'fa-check-square-o' => 'fa-check-square-o',
				  'fa-arrows' => 'fa-arrows',
				  'fa-step-backward' => 'fa-step-backward',
				  'fa-fast-backward' => 'fa-fast-backward',
				  'fa-backward' => 'fa-backward',
				  'fa-play' => 'fa-play',
				  'fa-pause' => 'fa-pause',
				  'fa-stop' => 'fa-stop',
				  'fa-forward' => 'fa-forward',
				  'fa-fast-forward' => 'fa-fast-forward',
				  'fa-step-forward' => 'fa-step-forward',
				  'fa-eject' => 'fa-eject',
				  'fa-chevron-left' => 'fa-chevron-left',
				  'fa-chevron-right' => 'fa-chevron-right',
				  'fa-plus-circle' => 'fa-plus-circle',
				  'fa-minus-circle' => 'fa-minus-circle',
				  'fa-times-circle' => 'fa-times-circle',
				  'fa-check-circle' => 'fa-check-circle',
				  'fa-question-circle' => 'fa-question-circle',
				  'fa-info-circle' => 'fa-info-circle',
				  'fa-crosshairs' => 'fa-crosshairs',
				  'fa-times-circle-o' => 'fa-times-circle-o',
				  'fa-check-circle-o' => 'fa-check-circle-o',
				  'fa-ban' => 'fa-ban',
				  'fa-arrow-left' => 'fa-arrow-left',
				  'fa-arrow-right' => 'fa-arrow-right',
				  'fa-arrow-up' => 'fa-arrow-up',
				  'fa-arrow-down' => 'fa-arrow-down',
				  'fa-share' => 'fa-share',
				  'fa-expand' => 'fa-expand',
				  'fa-compress' => 'fa-compress',
				  'fa-plus' => 'fa-plus',
				  'fa-minus' => 'fa-minus',
				  'fa-asterisk' => 'fa-asterisk',
				  'fa-exclamation-circle' => 'fa-exclamation-circle',
				  'fa-gift' => 'fa-gift',
				  'fa-leaf' => 'fa-leaf',
				  'fa-fire' => 'fa-fire',
				  'fa-eye' => 'fa-eye',
				  'fa-eye-slash' => 'fa-eye-slash',
				  'fa-exclamation-triangle' => 'fa-exclamation-triangle',
				  'fa-plane' => 'fa-plane',
				  'fa-calendar' => 'fa-calendar',
				  'fa-random' => 'fa-random',
				  'fa-comment' => 'fa-comment',
				  'fa-magnet' => 'fa-magnet',
				  'fa-chevron-up' => 'fa-chevron-up',
				  'fa-chevron-down' => 'fa-chevron-down',
				  'fa-retweet' => 'fa-retweet',
				  'fa-shopping-cart' => 'fa-shopping-cart',
				  'fa-folder' => 'fa-folder',
				  'fa-folder-open' => 'fa-folder-open',
				  'fa-arrows-v' => 'fa-arrows-v',
				  'fa-arrows-h' => 'fa-arrows-h',
				  'fa-bar-chart-o' => 'fa-bar-chart-o',
				  'fa-twitter-square' => 'fa-twitter-square',
				  'fa-facebook-square' => 'fa-facebook-square',
				  'fa-camera-retro' => 'fa-camera-retro',
				  'fa-key' => 'fa-key',
				  'fa-cogs' => 'fa-cogs',
				  'fa-comments' => 'fa-comments',
				  'fa-thumbs-o-up' => 'fa-thumbs-o-up',
				  'fa-thumbs-o-down' => 'fa-thumbs-o-down',
				  'fa-star-half' => 'fa-star-half',
				  'fa-heart-o' => 'fa-heart-o',
				  'fa-sign-out' => 'fa-sign-out',
				  'fa-linkedin-square' => 'fa-linkedin-square',
				  'fa-thumb-tack' => 'fa-thumb-tack',
				  'fa-external-link' => 'fa-external-link',
				  'fa-sign-in' => 'fa-sign-in',
				  'fa-trophy' => 'fa-trophy',
				  'fa-github-square' => 'fa-github-square',
				  'fa-upload' => 'fa-upload',
				  'fa-lemon-o' => 'fa-lemon-o',
				  'fa-phone' => 'fa-phone',
				  'fa-square-o' => 'fa-square-o',
				  'fa-bookmark-o' => 'fa-bookmark-o',
				  'fa-phone-square' => 'fa-phone-square',
				  'fa-twitter' => 'fa-twitter',
				  'fa-facebook' => 'fa-facebook',
				  'fa-github' => 'fa-github',
				  'fa-unlock' => 'fa-unlock',
				  'fa-credit-card' => 'fa-credit-card',
				  'fa-rss' => 'fa-rss',
				  'fa-hdd-o' => 'fa-hdd-o',
				  'fa-bullhorn' => 'fa-bullhorn',
				  'fa-bell' => 'fa-bell',
				  'fa-certificate' => 'fa-certificate',
				  'fa-hand-o-right' => 'fa-hand-o-right',
				  'fa-hand-o-left' => 'fa-hand-o-left',
				  'fa-hand-o-up' => 'fa-hand-o-up',
				  'fa-hand-o-down' => 'fa-hand-o-down',
				  'fa-arrow-circle-left' => 'fa-arrow-circle-left',
				  'fa-arrow-circle-right' => 'fa-arrow-circle-right',
				  'fa-arrow-circle-up' => 'fa-arrow-circle-up',
				  'fa-arrow-circle-down' => 'fa-arrow-circle-down',
				  'fa-globe' => 'fa-globe',
				  'fa-wrench' => 'fa-wrench',
				  'fa-tasks' => 'fa-tasks',
				  'fa-filter' => 'fa-filter',
				  'fa-briefcase' => 'fa-briefcase',
				  'fa-arrows-alt' => 'fa-arrows-alt',
				  'fa-users' => 'fa-users',
				  'fa-link' => 'fa-link',
				  'fa-cloud' => 'fa-cloud',
				  'fa-flask' => 'fa-flask',
				  'fa-scissors' => 'fa-scissors',
				  'fa-files-o' => 'fa-files-o',
				  'fa-paperclip' => 'fa-paperclip',
				  'fa-floppy-o' => 'fa-floppy-o',
				  'fa-square' => 'fa-square',
				  'fa-bars' => 'fa-bars',
				  'fa-list-ul' => 'fa-list-ul',
				  'fa-list-ol' => 'fa-list-ol',
				  'fa-strikethrough' => 'fa-strikethrough',
				  'fa-underline' => 'fa-underline',
				  'fa-table' => 'fa-table',
				  'fa-magic' => 'fa-magic',
				  'fa-truck' => 'fa-truck',
				  'fa-pinterest' => 'fa-pinterest',
				  'fa-pinterest-square' => 'fa-pinterest-square',
				  'fa-google-plus-square' => 'fa-google-plus-square',
				  'fa-google-plus' => 'fa-google-plus',
				  'fa-money' => 'fa-money',
				  'fa-caret-down' => 'fa-caret-down',
				  'fa-caret-up' => 'fa-caret-up',
				  'fa-caret-left' => 'fa-caret-left',
				  'fa-caret-right' => 'fa-caret-right',
				  'fa-columns' => 'fa-columns',
				  'fa-sort' => 'fa-sort',
				  'fa-sort-desc' => 'fa-sort-desc',
				  'fa-sort-asc' => 'fa-sort-asc',
				  'fa-envelope' => 'fa-envelope',
				  'fa-linkedin' => 'fa-linkedin',
				  'fa-undo' => 'fa-undo',
				  'fa-gavel' => 'fa-gavel',
				  'fa-tachometer' => 'fa-tachometer',
				  'fa-comment-o' => 'fa-comment-o',
				  'fa-comments-o' => 'fa-comments-o',
				  'fa-bolt' => 'fa-bolt',
				  'fa-sitemap' => 'fa-sitemap',
				  'fa-umbrella' => 'fa-umbrella',
				  'fa-clipboard' => 'fa-clipboard',
				  'fa-lightbulb-o' => 'fa-lightbulb-o',
				  'fa-exchange' => 'fa-exchange',
				  'fa-cloud-download' => 'fa-cloud-download',
				  'fa-cloud-upload' => 'fa-cloud-upload',
				  'fa-user-md' => 'fa-user-md',
				  'fa-stethoscope' => 'fa-stethoscope',
				  'fa-suitcase' => 'fa-suitcase',
				  'fa-bell-o' => 'fa-bell-o',
				  'fa-coffee' => 'fa-coffee',
				  'fa-cutlery' => 'fa-cutlery',
				  'fa-file-text-o' => 'fa-file-text-o',
				  'fa-building-o' => 'fa-building-o',
				  'fa-hospital-o' => 'fa-hospital-o',
				  'fa-ambulance' => 'fa-ambulance',
				  'fa-medkit' => 'fa-medkit',
				  'fa-fighter-jet' => 'fa-fighter-jet',
				  'fa-beer' => 'fa-beer',
				  'fa-h-square' => 'fa-h-square',
				  'fa-plus-square' => 'fa-plus-square',
				  'fa-angle-double-left' => 'fa-angle-double-left',
				  'fa-angle-double-right' => 'fa-angle-double-right',
				  'fa-angle-double-up' => 'fa-angle-double-up',
				  'fa-angle-double-down' => 'fa-angle-double-down',
				  'fa-angle-left' => 'fa-angle-left',
				  'fa-angle-right' => 'fa-angle-right',
				  'fa-angle-up' => 'fa-angle-up',
				  'fa-angle-down' => 'fa-angle-down',
				  'fa-desktop' => 'fa-desktop',
				  'fa-laptop' => 'fa-laptop',
				  'fa-tablet' => 'fa-tablet',
				  'fa-mobile' => 'fa-mobile',
				  'fa-circle-o' => 'fa-circle-o',
				  'fa-quote-left' => 'fa-quote-left',
				  'fa-quote-right' => 'fa-quote-right',
				  'fa-spinner' => 'fa-spinner',
				  'fa-circle' => 'fa-circle',
				  'fa-reply' => 'fa-reply',
				  'fa-github-alt' => 'fa-github-alt',
				  'fa-folder-o' => 'fa-folder-o',
				  'fa-folder-open-o' => 'fa-folder-open-o',
				  'fa-smile-o' => 'fa-smile-o',
				  'fa-frown-o' => 'fa-frown-o',
				  'fa-meh-o' => 'fa-meh-o',
				  'fa-gamepad' => 'fa-gamepad',
				  'fa-keyboard-o' => 'fa-keyboard-o',
				  'fa-flag-o' => 'fa-flag-o',
				  'fa-flag-checkered' => 'fa-flag-checkered',
				  'fa-terminal' => 'fa-terminal',
				  'fa-code' => 'fa-code',
				  'fa-reply-all' => 'fa-reply-all',
				  'fa-star-half-o' => 'fa-star-half-o',
				  'fa-location-arrow' => 'fa-location-arrow',
				  'fa-crop' => 'fa-crop',
				  'fa-code-fork' => 'fa-code-fork',
				  'fa-chain-broken' => 'fa-chain-broken',
				  'fa-question' => 'fa-question',
				  'fa-info' => 'fa-info',
				  'fa-exclamation' => 'fa-exclamation',
				  'fa-superscript' => 'fa-superscript',
				  'fa-subscript' => 'fa-subscript',
				  'fa-eraser' => 'fa-eraser',
				  'fa-puzzle-piece' => 'fa-puzzle-piece',
				  'fa-microphone' => 'fa-microphone',
				  'fa-microphone-slash' => 'fa-microphone-slash',
				  'fa-shield' => 'fa-shield',
				  'fa-calendar-o' => 'fa-calendar-o',
				  'fa-fire-extinguisher' => 'fa-fire-extinguisher',
				  'fa-rocket' => 'fa-rocket',
				  'fa-maxcdn' => 'fa-maxcdn',
				  'fa-chevron-circle-left' => 'fa-chevron-circle-left',
				  'fa-chevron-circle-right' => 'fa-chevron-circle-right',
				  'fa-chevron-circle-up' => 'fa-chevron-circle-up',
				  'fa-chevron-circle-down' => 'fa-chevron-circle-down',
				  'fa-html5' => 'fa-html5',
				  'fa-css3' => 'fa-css3',
				  'fa-anchor' => 'fa-anchor',
				  'fa-unlock-alt' => 'fa-unlock-alt',
				  'fa-bullseye' => 'fa-bullseye',
				  'fa-ellipsis-h' => 'fa-ellipsis-h',
				  'fa-ellipsis-v' => 'fa-ellipsis-v',
				  'fa-rss-square' => 'fa-rss-square',
				  'fa-play-circle' => 'fa-play-circle',
				  'fa-ticket' => 'fa-ticket',
				  'fa-minus-square' => 'fa-minus-square',
				  'fa-minus-square-o' => 'fa-minus-square-o',
				  'fa-level-up' => 'fa-level-up',
				  'fa-level-down' => 'fa-level-down',
				  'fa-check-square' => 'fa-check-square',
				  'fa-pencil-square' => 'fa-pencil-square',
				  'fa-external-link-square' => 'fa-external-link-square',
				  'fa-share-square' => 'fa-share-square',
				  'fa-compass' => 'fa-compass',
				  'fa-caret-square-o-down' => 'fa-caret-square-o-down',
				  'fa-caret-square-o-up' => 'fa-caret-square-o-up',
				  'fa-caret-square-o-right' => 'fa-caret-square-o-right',
				  'fa-eur' => 'fa-eur',
				  'fa-gbp' => 'fa-gbp',
				  'fa-usd' => 'fa-usd',
				  'fa-inr' => 'fa-inr',
				  'fa-jpy' => 'fa-jpy',
				  'fa-rub' => 'fa-rub',
				  'fa-krw' => 'fa-krw',
				  'fa-btc' => 'fa-btc',
				  'fa-file' => 'fa-file',
				  'fa-file-text' => 'fa-file-text',
				  'fa-sort-alpha-asc' => 'fa-sort-alpha-asc',
				  'fa-sort-alpha-desc' => 'fa-sort-alpha-desc',
				  'fa-sort-amount-asc' => 'fa-sort-amount-asc',
				  'fa-sort-amount-desc' => 'fa-sort-amount-desc',
				  'fa-sort-numeric-asc' => 'fa-sort-numeric-asc',
				  'fa-sort-numeric-desc' => 'fa-sort-numeric-desc',
				  'fa-thumbs-up' => 'fa-thumbs-up',
				  'fa-thumbs-down' => 'fa-thumbs-down',
				  'fa-youtube-square' => 'fa-youtube-square',
				  'fa-youtube' => 'fa-youtube',
				  'fa-xing' => 'fa-xing',
				  'fa-xing-square' => 'fa-xing-square',
				  'fa-youtube-play' => 'fa-youtube-play',
				  'fa-dropbox' => 'fa-dropbox',
				  'fa-stack-overflow' => 'fa-stack-overflow',
				  'fa-instagram' => 'fa-instagram',
				  'fa-flickr' => 'fa-flickr',
				  'fa-adn' => 'fa-adn',
				  'fa-bitbucket' => 'fa-bitbucket',
				  'fa-bitbucket-square' => 'fa-bitbucket-square',
				  'fa-tumblr' => 'fa-tumblr',
				  'fa-tumblr-square' => 'fa-tumblr-square',
				  'fa-long-arrow-down' => 'fa-long-arrow-down',
				  'fa-long-arrow-up' => 'fa-long-arrow-up',
				  'fa-long-arrow-left' => 'fa-long-arrow-left',
				  'fa-long-arrow-right' => 'fa-long-arrow-right',
				  'fa-apple' => 'fa-apple',
				  'fa-windows' => 'fa-windows',
				  'fa-android' => 'fa-android',
				  'fa-linux' => 'fa-linux',
				  'fa-dribbble' => 'fa-dribbble',
				  'fa-skype' => 'fa-skype',
				  'fa-foursquare' => 'fa-foursquare',
				  'fa-trello' => 'fa-trello',
				  'fa-female' => 'fa-female',
				  'fa-male' => 'fa-male',
				  'fa-gittip' => 'fa-gittip',
				  'fa-sun-o' => 'fa-sun-o',
				  'fa-moon-o' => 'fa-moon-o',
				  'fa-archive' => 'fa-archive',
				  'fa-bug' => 'fa-bug',
				  'fa-vk' => 'fa-vk',
				  'fa-weibo' => 'fa-weibo',
				  'fa-renren' => 'fa-renren',
				  'fa-pagelines' => 'fa-pagelines',
				  'fa-stack-exchange' => 'fa-stack-exchange',
				  'fa-arrow-circle-o-right' => 'fa-arrow-circle-o-right',
				  'fa-arrow-circle-o-left' => 'fa-arrow-circle-o-left',
				  'fa-caret-square-o-left' => 'fa-caret-square-o-left',
				  'fa-dot-circle-o' => 'fa-dot-circle-o',
				  'fa-wheelchair' => 'fa-wheelchair',
				  'fa-vimeo-square' => 'fa-vimeo-square',
				  'fa-try' => 'fa-try',
				  'fa-plus-square-o' => 'fa-plus-square-o',
				  'fa-space-shuttle' => 'fa-space-shuttle',
				  'fa-slack' => 'fa-slack',
				  'fa-envelope-square' => 'fa-envelope-square',
				  'fa-wordpress' => 'fa-wordpress',
				  'fa-openid' => 'fa-openid',
				  'fa-university' => 'fa-university',
				  'fa-graduation-cap' => 'fa-graduation-cap',
				  'fa-yahoo' => 'fa-yahoo',
				  'fa-google' => 'fa-google',
				  'fa-reddit' => 'fa-reddit',
				  'fa-reddit-square' => 'fa-reddit-square',
				  'fa-stumbleupon-circle' => 'fa-stumbleupon-circle',
				  'fa-stumbleupon' => 'fa-stumbleupon',
				  'fa-delicious' => 'fa-delicious',
				  'fa-digg' => 'fa-digg',
				  'fa-pied-piper' => 'fa-pied-piper',
				  'fa-pied-piper-alt' => 'fa-pied-piper-alt',
				  'fa-drupal' => 'fa-drupal',
				  'fa-joomla' => 'fa-joomla',
				  'fa-language' => 'fa-language',
				  'fa-fax' => 'fa-fax',
				  'fa-building' => 'fa-building',
				  'fa-child' => 'fa-child',
				  'fa-paw' => 'fa-paw',
				  'fa-spoon' => 'fa-spoon',
				  'fa-cube' => 'fa-cube',
				  'fa-cubes' => 'fa-cubes',
				  'fa-behance' => 'fa-behance',
				  'fa-behance-square' => 'fa-behance-square',
				  'fa-steam' => 'fa-steam',
				  'fa-steam-square' => 'fa-steam-square',
				  'fa-recycle' => 'fa-recycle',
				  'fa-car' => 'fa-car',
				  'fa-taxi' => 'fa-taxi',
				  'fa-tree' => 'fa-tree',
				  'fa-spotify' => 'fa-spotify',
				  'fa-deviantart' => 'fa-deviantart',
				  'fa-soundcloud' => 'fa-soundcloud',
				  'fa-database' => 'fa-database',
				  'fa-file-pdf-o' => 'fa-file-pdf-o',
				  'fa-file-word-o' => 'fa-file-word-o',
				  'fa-file-excel-o' => 'fa-file-excel-o',
				  'fa-file-powerpoint-o' => 'fa-file-powerpoint-o',
				  'fa-file-image-o' => 'fa-file-image-o',
				  'fa-file-archive-o' => 'fa-file-archive-o',
				  'fa-file-audio-o' => 'fa-file-audio-o',
				  'fa-file-video-o' => 'fa-file-video-o',
				  'fa-file-code-o' => 'fa-file-code-o',
				  'fa-vine' => 'fa-vine',
				  'fa-codepen' => 'fa-codepen',
				  'fa-jsfiddle' => 'fa-jsfiddle',
				  'fa-life-ring' => 'fa-life-ring',
				  'fa-circle-o-notch' => 'fa-circle-o-notch',
				  'fa-rebel' => 'fa-rebel',
				  'fa-empire' => 'fa-empire',
				  'fa-git-square' => 'fa-git-square',
				  'fa-git' => 'fa-git',
				  'fa-hacker-news' => 'fa-hacker-news',
				  'fa-tencent-weibo' => 'fa-tencent-weibo',
				  'fa-qq' => 'fa-qq',
				  'fa-weixin' => 'fa-weixin',
				  'fa-paper-plane' => 'fa-paper-plane',
				  'fa-paper-plane-o' => 'fa-paper-plane-o',
				  'fa-history' => 'fa-history',
				  'fa-circle-thin' => 'fa-circle-thin',
				  'fa-header' => 'fa-header',
				  'fa-paragraph' => 'fa-paragraph',
				  'fa-sliders' => 'fa-sliders',
				  'fa-share-alt' => 'fa-share-alt',
				  'fa-share-alt-square' => 'fa-share-alt-square',
				  'fa-bomb' => 'fa-bomb',
			);
			
		$steadysets_icons = array(
			'type'=>'icons', 
			'title'=>'Steadysets', 
			'values'=> array(
				  'steadysets-icon-type' => 'steadysets-icon-type',
				  'steadysets-icon-box' => 'steadysets-icon-box',
				  'steadysets-icon-archive' => 'steadysets-icon-archive',
				  'steadysets-icon-envelope' => 'steadysets-icon-envelope',
				  'steadysets-icon-email' => 'steadysets-icon-email',
				  'steadysets-icon-files' => 'steadysets-icon-files',
				  'steadysets-icon-uniE606' => 'steadysets-icon-uniE606',
				  'steadysets-icon-connection-empty' => 'steadysets-icon-connection-empty',
				  'steadysets-icon-connection-25' => 'steadysets-icon-connection-25',
				  'steadysets-icon-connection-50' => 'steadysets-icon-connection-50',
				  'steadysets-icon-connection-75' => 'steadysets-icon-connection-75',
				  'steadysets-icon-connection-full' => 'steadysets-icon-connection-full',
				  'steadysets-icon-microphone' => 'steadysets-icon-microphone',
				  'steadysets-icon-microphone-off' => 'steadysets-icon-microphone-off',
				  'steadysets-icon-book' => 'steadysets-icon-book',
				  'steadysets-icon-cloud' => 'steadysets-icon-cloud',
				  'steadysets-icon-book2' => 'steadysets-icon-book2',
				  'steadysets-icon-star' => 'steadysets-icon-star',
				  'steadysets-icon-phone-portrait' => 'steadysets-icon-phone-portrait',
				  'steadysets-icon-phone-landscape' => 'steadysets-icon-phone-landscape',
				  'steadysets-icon-tablet' => 'steadysets-icon-tablet',
				  'steadysets-icon-tablet-landscape' => 'steadysets-icon-tablet-landscape',
				  'steadysets-icon-laptop' => 'steadysets-icon-laptop',
				  'steadysets-icon-uniE617' => 'steadysets-icon-uniE617',
				  'steadysets-icon-barbell' => 'steadysets-icon-barbell',
				  'steadysets-icon-stopwatch' => 'steadysets-icon-stopwatch',
				  'steadysets-icon-atom' => 'steadysets-icon-atom',
				  'steadysets-icon-syringe' => 'steadysets-icon-syringe',
				  'steadysets-icon-pencil' => 'steadysets-icon-pencil',
				  'steadysets-icon-chart' => 'steadysets-icon-chart',
				  'steadysets-icon-bars' => 'steadysets-icon-bars',
				  'steadysets-icon-cube' => 'steadysets-icon-cube',
				  'steadysets-icon-image' => 'steadysets-icon-image',
				  'steadysets-icon-crop' => 'steadysets-icon-crop',
				  'steadysets-icon-graph' => 'steadysets-icon-graph',
				  'steadysets-icon-select' => 'steadysets-icon-select',
				  'steadysets-icon-bucket' => 'steadysets-icon-bucket',
				  'steadysets-icon-mug' => 'steadysets-icon-mug',
				  'steadysets-icon-clipboard' => 'steadysets-icon-clipboard',
				  'steadysets-icon-lab' => 'steadysets-icon-lab',
				  'steadysets-icon-bones' => 'steadysets-icon-bones',
				  'steadysets-icon-pill' => 'steadysets-icon-pill',
				  'steadysets-icon-bolt' => 'steadysets-icon-bolt',
				  'steadysets-icon-health' => 'steadysets-icon-health',
				  'steadysets-icon-map-marker' => 'steadysets-icon-map-marker',
				  'steadysets-icon-stack' => 'steadysets-icon-stack',
				  'steadysets-icon-newspaper' => 'steadysets-icon-newspaper',
				  'steadysets-icon-uniE62F' => 'steadysets-icon-uniE62F',
				  'steadysets-icon-coffee' => 'steadysets-icon-coffee',
				  'steadysets-icon-bill' => 'steadysets-icon-bill',
				  'steadysets-icon-sun' => 'steadysets-icon-sun',
				  'steadysets-icon-vcard' => 'steadysets-icon-vcard',
				  'steadysets-icon-shorts' => 'steadysets-icon-shorts',
				  'steadysets-icon-drink' => 'steadysets-icon-drink',
				  'steadysets-icon-diamond' => 'steadysets-icon-diamond',
				  'steadysets-icon-bag' => 'steadysets-icon-bag',
				  'steadysets-icon-calculator' => 'steadysets-icon-calculator',
				  'steadysets-icon-credit-cards' => 'steadysets-icon-credit-cards',
				  'steadysets-icon-microwave-oven' => 'steadysets-icon-microwave-oven',
				  'steadysets-icon-camera' => 'steadysets-icon-camera',
				  'steadysets-icon-share' => 'steadysets-icon-share',
				  'steadysets-icon-bullhorn' => 'steadysets-icon-bullhorn',
				  'steadysets-icon-user' => 'steadysets-icon-user',
				  'steadysets-icon-users' => 'steadysets-icon-users',
				  'steadysets-icon-user2' => 'steadysets-icon-user2',
				  'steadysets-icon-users2' => 'steadysets-icon-users2',
				  'steadysets-icon-unlocked' => 'steadysets-icon-unlocked',
				  'steadysets-icon-unlocked2' => 'steadysets-icon-unlocked2',
				  'steadysets-icon-lock' => 'steadysets-icon-lock',
				  'steadysets-icon-forbidden' => 'steadysets-icon-forbidden',
				  'steadysets-icon-switch' => 'steadysets-icon-switch',
				  'steadysets-icon-meter' => 'steadysets-icon-meter',
				  'steadysets-icon-flag' => 'steadysets-icon-flag',
				  'steadysets-icon-home' => 'steadysets-icon-home',
				  'steadysets-icon-printer' => 'steadysets-icon-printer',
				  'steadysets-icon-clock' => 'steadysets-icon-clock',
				  'steadysets-icon-calendar' => 'steadysets-icon-calendar',
				  'steadysets-icon-comment' => 'steadysets-icon-comment',
				  'steadysets-icon-chat-3' => 'steadysets-icon-chat-3',
				  'steadysets-icon-chat-2' => 'steadysets-icon-chat-2',
				  'steadysets-icon-chat-1' => 'steadysets-icon-chat-1',
				  'steadysets-icon-chat' => 'steadysets-icon-chat',
				  'steadysets-icon-zoom-out' => 'steadysets-icon-zoom-out',
				  'steadysets-icon-zoom-in' => 'steadysets-icon-zoom-in',
				  'steadysets-icon-search' => 'steadysets-icon-search',
				  'steadysets-icon-trashcan' => 'steadysets-icon-trashcan',
				  'steadysets-icon-tag' => 'steadysets-icon-tag',
				  'steadysets-icon-download' => 'steadysets-icon-download',
				  'steadysets-icon-paperclip' => 'steadysets-icon-paperclip',
				  'steadysets-icon-checkbox' => 'steadysets-icon-checkbox',
				  'steadysets-icon-checkbox-checked' => 'steadysets-icon-checkbox-checked',
				  'steadysets-icon-checkmark' => 'steadysets-icon-checkmark',
				  'steadysets-icon-refresh' => 'steadysets-icon-refresh',
				  'steadysets-icon-reload' => 'steadysets-icon-reload',
				  'steadysets-icon-arrow-right' => 'steadysets-icon-arrow-right',
				  'steadysets-icon-arrow-down' => 'steadysets-icon-arrow-down',
				  'steadysets-icon-arrow-up' => 'steadysets-icon-arrow-up',
				  'steadysets-icon-arrow-left' => 'steadysets-icon-arrow-left',
				  'steadysets-icon-settings' => 'steadysets-icon-settings',
				  'steadysets-icon-battery-full' => 'steadysets-icon-battery-full',
				  'steadysets-icon-battery-75' => 'steadysets-icon-battery-75',
				  'steadysets-icon-battery-50' => 'steadysets-icon-battery-50',
				  'steadysets-icon-battery-25' => 'steadysets-icon-battery-25',
				  'steadysets-icon-battery-empty' => 'steadysets-icon-battery-empty',
				  'steadysets-icon-battery-charging' => 'steadysets-icon-battery-charging',
				  'steadysets-icon-uniE669' => 'steadysets-icon-uniE669',
				  'steadysets-icon-grid' => 'steadysets-icon-grid',
				  'steadysets-icon-list' => 'steadysets-icon-list',
				  'steadysets-icon-wifi-low' => 'steadysets-icon-wifi-low',
				  'steadysets-icon-folder-check' => 'steadysets-icon-folder-check',
				  'steadysets-icon-folder-settings' => 'steadysets-icon-folder-settings',
				  'steadysets-icon-folder-add' => 'steadysets-icon-folder-add',
				  'steadysets-icon-folder' => 'steadysets-icon-folder',
				  'steadysets-icon-window' => 'steadysets-icon-window',
				  'steadysets-icon-windows' => 'steadysets-icon-windows',
				  'steadysets-icon-browser' => 'steadysets-icon-browser',
				  'steadysets-icon-file-broken' => 'steadysets-icon-file-broken',
				  'steadysets-icon-align-justify' => 'steadysets-icon-align-justify',
				  'steadysets-icon-align-center' => 'steadysets-icon-align-center',
				  'steadysets-icon-align-right' => 'steadysets-icon-align-right',
				  'steadysets-icon-align-left' => 'steadysets-icon-align-left',
				  'steadysets-icon-file' => 'steadysets-icon-file',
				  'steadysets-icon-file-add' => 'steadysets-icon-file-add',
				  'steadysets-icon-file-settings' => 'steadysets-icon-file-settings',
				  'steadysets-icon-mute' => 'steadysets-icon-mute',
				  'steadysets-icon-heart' => 'steadysets-icon-heart',
				  'steadysets-icon-enter' => 'steadysets-icon-enter',
				  'steadysets-icon-volume-decrease' => 'steadysets-icon-volume-decrease',
				  'steadysets-icon-wifi-mid' => 'steadysets-icon-wifi-mid',
				  'steadysets-icon-volume' => 'steadysets-icon-volume',
				  'steadysets-icon-bookmark' => 'steadysets-icon-bookmark',
				  'steadysets-icon-screen' => 'steadysets-icon-screen',
				  'steadysets-icon-map' => 'steadysets-icon-map',
				  'steadysets-icon-measure' => 'steadysets-icon-measure',
				  'steadysets-icon-eyedropper' => 'steadysets-icon-eyedropper',
				  'steadysets-icon-support' => 'steadysets-icon-support',
				  'steadysets-icon-phone' => 'steadysets-icon-phone',
				  'steadysets-icon-email2' => 'steadysets-icon-email2',
				  'steadysets-icon-volume-increase' => 'steadysets-icon-volume-increase',
				  'steadysets-icon-wifi-full' => 'steadysets-icon-wifi-full'
			)
		);	

$linecons = array(
			'type'=>'icons', 
			'title'=>'Linecons', 
			'values'=> array(
				  'linecon-icon-heart' => 'linecon-icon-heart',
				  'linecon-icon-cloud' => 'linecon-icon-cloud',
				  'linecon-icon-star' => 'linecon-icon-star',
				  'linecon-icon-tv' => 'linecon-icon-tv',
				  'linecon-icon-sound' => 'linecon-icon-sound',
				  'linecon-icon-video' => 'linecon-icon-video',
				  'linecon-icon-trash' => 'linecon-icon-trash',
				  'linecon-icon-user' => 'linecon-icon-user',
				  'linecon-icon-key' => 'linecon-icon-key',
				  'linecon-icon-search' => 'linecon-icon-search',
				  'linecon-icon-eye' => 'linecon-icon-eye',
				  'linecon-icon-bubble' => 'linecon-icon-bubble',
				  'linecon-icon-stack' => 'linecon-icon-stack',
				  'linecon-icon-cup' => 'linecon-icon-cup',
				  'linecon-icon-phone' => 'linecon-icon-phone',
				  'linecon-icon-news' => 'linecon-icon-news',
				  'linecon-icon-mail' => 'linecon-icon-mail',
				  'linecon-icon-like' => 'linecon-icon-like',
				  'linecon-icon-photo' => 'linecon-icon-photo',
				  'linecon-icon-note' => 'linecon-icon-note',
				  'linecon-icon-food' => 'linecon-icon-food',
				  'linecon-icon-t-shirt' => 'linecon-icon-t-shirt',
				  'linecon-icon-fire' => 'linecon-icon-fire',
				  'linecon-icon-clip' => 'linecon-icon-clip',
				  'linecon-icon-shop' => 'linecon-icon-shop',
				  'linecon-icon-calendar' => 'linecon-icon-calendar',
				  'linecon-icon-wallet' => 'linecon-icon-wallet',
				  'linecon-icon-vynil' => 'linecon-icon-vynil',
				  'linecon-icon-truck' => 'linecon-icon-truck',
				  'linecon-icon-world' => 'linecon-icon-world',
				  'linecon-icon-clock' => 'linecon-icon-clock',
				  'linecon-icon-paperplane' => 'linecon-icon-paperplane',
				  'linecon-icon-params' => 'linecon-icon-params',
				  'linecon-icon-banknote' => 'linecon-icon-banknote',
				  'linecon-icon-data' => 'linecon-icon-data',
				  'linecon-icon-music' => 'linecon-icon-music',
				  'linecon-icon-megaphone' => 'linecon-icon-megaphone',
				  'linecon-icon-study' => 'linecon-icon-study',
				  'linecon-icon-lab' => 'linecon-icon-lab',
				  'linecon-icon-location' => 'linecon-icon-location',
				  'linecon-icon-display' => 'linecon-icon-display',
				  'linecon-icon-diamond' => 'linecon-icon-diamond',
				  'linecon-icon-pen' => 'linecon-icon-pen',
				  'linecon-icon-bulb' => 'linecon-icon-bulb',
				  'linecon-icon-lock' => 'linecon-icon-lock',
				  'linecon-icon-tag' => 'linecon-icon-tag',
				  'linecon-icon-camera' => 'linecon-icon-camera',
				  'linecon-icon-settings' => 'linecon-icon-settings'
			)
		);
		
$nectar_shortcodes['icon'] = array( 
	'type'=>'regular', 
	'title'=>__('Icon', NECTAR_THEME_NAME), 
	'attr'=>array(
		'size'=>array(
			'type'=>'radio', 
			'title'=>__('Icon Style', NECTAR_THEME_NAME), 
			'desc' => __('Tiny is recommended to be used inline with regular text. <br/> Small is recommended to be used inline right before heading text. <br> Regular can be used in a variety of places. <br> Large is recommended to be used at the top of columns.', NECTAR_THEME_NAME),
			'opt'=>array(
				'tiny'=>__('Tiny',NECTAR_THEME_NAME),
				'small'=>__('Small Circle',NECTAR_THEME_NAME),
				'regular'=>__('Regular',NECTAR_THEME_NAME),
				'large'=>__('Large Circle',NECTAR_THEME_NAME),
				'large-2'=>__('Large Circle Alt',NECTAR_THEME_NAME),
			)
		),
		'color'=>array(
			'type'=>'select', 
			'title'  => __('Color',NECTAR_THEME_NAME),
			'values' => array(
			     "accent-color" => __("Accent-Color",NECTAR_THEME_NAME),
		  		 "extra-color-1" => __("Extra-Color-1",NECTAR_THEME_NAME),
		  		 "extra-color-2" => __("Extra-Color-2",NECTAR_THEME_NAME),
		  		 "extra-color-3" => __("Extra-Color-3",NECTAR_THEME_NAME)
			)
		),
		'icons' => array(
			'type'=>'icons', 
			'title'=>'Icon', 
			'values'=> $fa_icons
		),
		'steadysets' => $steadysets_icons,
		'linecons' => $linecons
		
	) 
);


//Button
$nectar_shortcodes['button'] = array( 
	'type'=>'radios', 
	'title'=>__('Button', NECTAR_THEME_NAME), 
	'attr'=>array(
		'size'=>array(
			'type'=>'radio', 
			'title'=>__('Size', NECTAR_THEME_NAME), 
			'opt'=>array(
				'small'=> __('Small', NECTAR_THEME_NAME), 
				'medium'=> __('Medium', NECTAR_THEME_NAME), 
				'large'=> __('Large', NECTAR_THEME_NAME)
			)
		),
		'url'=>array(
			'type'=>'text', 
			'title'=>'Link URL'
		),
		'text'=>array(
			'type'=>'text', 
			'title'=>__('Text', NECTAR_THEME_NAME)
		),
		'open_new_tab'=>array('type'=>'checkbox', 'title'=>__('Open Link In New Tab?',NECTAR_THEME_NAME)),
		'color'=>array(
			'type'=>'regular-select', 
			'title'  => __('Style',NECTAR_THEME_NAME),
			'values' => array(
			     "accent-color" => __("Regular + Accent-Color", NECTAR_THEME_NAME), 
		  		 "extra-color-1" => __("Regular + Extra-Color-1", NECTAR_THEME_NAME), 
		  		 "extra-color-2" => __("Regular + Extra-Color-2", NECTAR_THEME_NAME), 
		  		 "extra-color-3" => __("Regular + Extra-Color-3", NECTAR_THEME_NAME), 
		  		 "see-through" => __("See-Through", NECTAR_THEME_NAME), 
		  		 "see-through-2" => __("See-Through + Solid On Hover", NECTAR_THEME_NAME)
			)
		),
		'color_override' =>array('type'=>'custom', 'title'  => __('Button Color Override',NECTAR_THEME_NAME)),
		'hover_color_override' =>array('type'=>'custom', 'title'  => __('Button Hover Color Override',NECTAR_THEME_NAME)),
		'hover_text_color_override'=>array(
			'type'=>'regular-select', 
			'title'  => __('Hover Text Color',NECTAR_THEME_NAME),
			'values' => array(
			     "#fff" => "Light",
		  		 "#000" => "Dark",
			)
		),
		'icons' => array(
			'type'=>'button-icons', 
			'title'=>'Icon', 
			'values'=> $fa_icons
		),
		'steadysets' => $steadysets_icons,
		'linecons' => $linecons
	) 
);


//Toggle
$nectar_shortcodes['toggles'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Toggle Panels', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'toggles'=>array('type'=>'custom')
	)
);

//Tabbed Sections
$nectar_shortcodes['tabbed_section'] = array( 
	'type'=>'dynamic',  
	'title'=>__('Tabbed Section', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'tabs'=>array('type'=>'custom')
	)
);
 

//Testimonial Slider
$nectar_shortcodes['testimonial_slider'] = array( 
	'type'=>'dynamic',  
	'title'=>__('Testimonial Slider', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'testimonials'=>array('type'=>'custom')
	)
);


//Bar Graph
$nectar_shortcodes['bar_graph'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Bar Graph', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'bar_graph'=>array('type'=>'custom')
	)
);

//Clients
$nectar_shortcodes['clients'] = array( 
	'type'=>'dynamic', 
	'title'=>__('Clients', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'clients'=>array('type'=>'custom', 'title'  => __('Image',NECTAR_THEME_NAME))
	)
);
 

//Pricing Table
$nectar_shortcodes['pricing_table'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Pricing Table', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'columns'=>array(
			'type'=>'radio', 
			'title'=>__('Columns', NECTAR_THEME_NAME), 
			'desc' => __('How many columns would you like?', NECTAR_THEME_NAME),
			'opt'=>array(
				'2'=>'Two',
				'3'=>'Three',
				'4'=>'Four',
				'5'=>'Five'
			)
		)
	)
);

//Team Member
$nectar_shortcodes['team_member'] = array( 
	'type'=>'regular', 
	'title'=>__('Team Member', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'image'=>array('type'=>'custom', 'title'  => __('Image',NECTAR_THEME_NAME)),
		'name'=>array('type'=>'text', 'title'=>__('Name', NECTAR_THEME_NAME)),
		'job_position'=>array('type'=>'text', 'title'=>__('Job Position', NECTAR_THEME_NAME)),
		'description'=>array('type'=>'textarea', 'title'=> __('Description', NECTAR_THEME_NAME)),
		'social'=>array('type'=>'textarea', 'title'=>__('Social Media', NECTAR_THEME_NAME), 'desc' => __('Enter any social media links with a comma separated list. e.g. Facebook,http://facebook.com, Twitter,http://twitter.com', NECTAR_THEME_NAME)),  
		'link_element'=>array(
			'type'=>'regular-select', 
			'title'  => __('Team Member Link Type',NECTAR_THEME_NAME),
			'values' => array(
			     "none" => "None",
		  		 "image" => "Image",
		  		 "name" => "Name",
		  		 "both" => "Both"
			)
		),
		'link_url'=>array('type'=>'text', 'title'=>__('Team Memeber Link URL', NECTAR_THEME_NAME),'desc' => __('Will only be used if Link Type is not set to "None".',NECTAR_THEME_NAME)),
		'color'=>array(
			'type'=>'select', 
			'title'  => __('Link Color',NECTAR_THEME_NAME),
			'values' => array(
			     "accent-color" => __("Accent-Color",NECTAR_THEME_NAME),
		  		 "extra-color-1" => __("Extra-Color-1",NECTAR_THEME_NAME),
		  		 "extra-color-2" => __("Extra-Color-2",NECTAR_THEME_NAME),
		  		 "extra-color-3" => __("Extra-Color-3",NECTAR_THEME_NAME)
			)
		)
	)
);

//Carousel
$nectar_shortcodes['carousel'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Carousel', NECTAR_THEME_NAME ), 
	'attr'=>array(
		'carousel_title'=>array(
			'type'=>'text', 
			'title'=> __('Carousel Title', NECTAR_THEME_NAME)
		),
		'scroll_speed'=>array(
			'type'=>'text', 
			'title'=> __('Scroll Speed', NECTAR_THEME_NAME),
			'desc' => __('Enter in milliseconds (default is 700)', NECTAR_THEME_NAME),
		),
		'autorotate'=>array(
			'type'=>'checkbox', 
			'title'=> __('Autorotate', NECTAR_THEME_NAME),
			'desc' => __('Would you like the carousel the transition automatically?', NECTAR_THEME_NAME),
		),
		'easing'=>array(
			'type'=>'select', 
			'title'=> __('Easing', NECTAR_THEME_NAME), 
			'values'=>array(
				'linear'=>'linear',
				'swing'=>'swing',
				'easeInQuad'=>'easeInQuad',
				'easeOutQuad' => 'easeOutQuad',
				'easeInOutQuad'=>'easeInOutQuad',
				'easeInCubic'=>'easeInCubic',
				'easeOutCubic'=>'easeOutCubic',
				'easeInOutCubic'=>'easeInOutCubic',
				'easeInQuart'=>'easeInQuart',
				'easeOutQuart'=>'easeOutQuart',
				'easeInOutQuart'=>'easeInOutQuart',
				'easeInQuint'=>'easeInQuint',
				'easeOutQuint'=>'easeOutQuint',
				'easeInOutQuint'=>'easeInOutQuint',
				'easeInExpo'=>'easeInExpo',
				'easeOutExpo'=>'easeOutExpo',
				'easeInOutExpo'=>'easeInOutExpo',
				'easeInSine'=>'easeInSine',
				'easeOutSine'=>'easeOutSine',
				'easeInOutSine'=>'easeInOutSine',
				'easeInCirc'=>'easeInCirc',
				'easeOutCirc'=>'easeOutCirc',
				'easeInOutCirc'=>'easeInOutCirc',
				'easeInElastic'=>'easeInElastic',
				'easeOutElastic'=>'easeOutElastic',
				'easeInOutElastic'=>'easeInOutElastic',
				'easeInBack'=>'easeInBack',
				'easeOutBack'=>'easeOutBack',
				'easeInOutBack'=>'easeInOutBack',
				'easeInBounce'=>'easeInBounce',
				'easeOutBounce'=>'easeOutBounce',
				'easeInOutBounce'=>'easeInOutBounce',
			),
			'desc' => '<a href="http://jqueryui.com/resources/demos/effect/easing.html" target="_blank">'. __("Click here",NECTAR_THEME_NAME) .'</a> ' . __("to see examples of these.", NECTAR_THEME_NAME)
		),
	)
);


$nectar_shortcodes['social_buttons'] = array( 
	'type'=>'regular', 
	'title'=>__('Social Buttons', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'full_width_icons'=>array(
			'type'=>'checkbox', 
			'title'=>__('Display full width?', NECTAR_THEME_NAME),
			'desc' => __('This will make your social icons expand to fit edge to edge in whatever space they\'re placed.', NECTAR_THEME_NAME)
		),
		'hide_share_count'=>array(
			'type'=>'checkbox', 
			'title'=>__('Hide Share Count?', NECTAR_THEME_NAME),
			'desc' => __('This will remove your share counts from displaying to the user', NECTAR_THEME_NAME)
		),

		'nectar_love'=>array(
			'type'=>'checkbox', 
			'title'=>__('Nectar Love', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		),
		'facebook'=>array(
			'type'=>'checkbox', 
			'title'=>__('Facebook', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		),
		'twitter'=>array(
			'type'=>'checkbox', 
			'title'=>__('Twitter', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		),
		'pinterest'=>array(
			'type'=>'checkbox', 
			'title'=>__('Pinterest', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		),
		'google_plus'=>array(
			'type'=>'checkbox', 
			'title'=>__('Google+', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		),
		'linkedin'=>array(
			'type'=>'checkbox', 
			'title'=>__('LinkedIn', NECTAR_THEME_NAME),
			'desc' => __('Check to enable', NECTAR_THEME_NAME)
		)
	)
);
	 
//Video
$nectar_shortcodes['video'] = array(  
	'type'=>'regular', 
	'title'=>__('Video', NECTAR_THEME_NAME ),  
	'attr'=>array( 
	    'mp4'=>array('type'=>'text', 'title'=>__('MP4 File URL', NECTAR_THEME_NAME), 'desc' => __('Only supply the formats you desire, this shortcode is just a shortcut to place the <a href="https://codex.wordpress.org/Video_Shortcode" target="_blank">default WordPress video player</a>.')),
	    'webm'=>array('type'=>'text', 'title'=>__('WEBM File URL', NECTAR_THEME_NAME)),
		'ogv'=>array('type'=>'text', 'title'=>__('OGV FILE URL', NECTAR_THEME_NAME)),
		'poster'=>array('type'=>'custom', 'title'  => __('Preview Image',NECTAR_THEME_NAME), 'desc' => __('The preview image should be the same dimensions as your video.'),NECTAR_THEME_NAME)
	)
);

//Audio
$nectar_shortcodes['audio'] = array( 
	'type'=>'regular', 
	'title'=>__('Audio', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'mp3'=>array('type'=>'text', 'title'=>__('MP3 File URL', NECTAR_THEME_NAME)),
		'ogg'=>array('type'=>'text', 'title'=>__('OGA File URL', NECTAR_THEME_NAME))
	)
);


#-----------------------------------------------------------------
# Recent Posts/Projects 
#-----------------------------------------------------------------


$nectar_shortcodes['header_7'] = array( 
	'type'=>'heading', 
	'title'=>__('Portfolio/Blog', NECTAR_THEME_NAME )
);



//Portfolio
$portfolio_types = get_terms('project-type');

$types_options = array("all" => "All");

foreach ($portfolio_types as $type) {
	$types_options[$type->slug] = $type->name;
}


$nectar_shortcodes['nectar_portfolio'] = array( 
	'type'=>'regular', 
	'title'=>__('Portfolio', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'layout'=>array(
			'type'=>'radio', 
			'title'=>__('Layout', NECTAR_THEME_NAME), 
			'opt'=>array(
				'3'=>'3 Columns',
				'4'=>'4 Columns',
				'fullwidth'=>'Fullwidth'
			)
		),
		'constrain_max_cols'=>array(
			'type'=>'checkbox', 
			'title'=>__('Constrain Max Columns to 4?', NECTAR_THEME_NAME),
			'desc' => __("This will change the max columns to 4 (default is 5 for fullwidth). Activating this will make it easier to create a grid with no empty spaces at the end of the list on all screen sizes.", NECTAR_THEME_NAME)
		),
		'category' => array(
			'type' => 'multi-select',
			'title' => __('Portfolio Categories',NECTAR_THEME_NAME),
			'desc' => __('Please select the categories you would like to display for your portfolio. <br/>You can select multiple categories too (ctrl + click on PC and command + click on Mac).',NECTAR_THEME_NAME),
			'values' => $types_options
		),
		'starting_category' => array(
			'type' => 'regular-select',
			'title' => __('Starting Category',NECTAR_THEME_NAME),
			'desc' => __('Please select the category you would like you\'re portfolio to start filtered on',NECTAR_THEME_NAME),
			'values' => $types_options
		),
		'project_style' => array(
			'type' => 'regular-select',
			'title' => __('Project Style',NECTAR_THEME_NAME),
			'desc' => __('Please select the style you would like your projects to display in.',NECTAR_THEME_NAME),
			'values' => array(
			   '1' => __('Meta below thumb w/ links on hover',NECTAR_THEME_NAME),
			   '2' => __('Meta on hover + entire thumb link',NECTAR_THEME_NAME),
			   '3' => __('Title overlaid w/ zoom effect on hover',NECTAR_THEME_NAME),
			   '4' => __('Meta from bottom on hover + entire thumb link',NECTAR_THEME_NAME)
			)
		),
		
		'masonry_style'=>array(
			'type'=>'checkbox', 
			'title'=>__('Masonry Style', NECTAR_THEME_NAME),
			'desc' => __('This will allow your portfolio items to display in a masonry layout as opposed to a fixed grid. You can define your masonry sizes in each project. <br/> <br/>If using the full width layout, will only be active with the alternative project style.', NECTAR_THEME_NAME)
		),
		
		'enable_sortable'=>array(
			'type'=>'checkbox', 
			'title'=>__('Enable Sortable', NECTAR_THEME_NAME),
			'desc' => __('Checking this box will allow your portfolio to display sortable filters', NECTAR_THEME_NAME)
		),

		'horizontal_filters'=>array(
			'type'=>'checkbox', 
			'title'=>__('Horizontal Filters', NECTAR_THEME_NAME),
			'desc' => __('This will allow your filters to display horizontally instead of in a dropdown. (Only used if you enable sortable above.)', NECTAR_THEME_NAME)
		),
		'enable_pagination'=>array(
			'type'=>'checkbox', 
			'title'=>__('Enable Pagination', NECTAR_THEME_NAME),
			'desc' => __('Would you like to enable pagination for this portfolio?', NECTAR_THEME_NAME)
		),
		'pagination_type'=>array(
			'type'=>'regular-select', 
			'title'=>__('Pagination Type', NECTAR_THEME_NAME), 
			'values'=>array(
				'default' => __('Default', NECTAR_THEME_NAME), 
			    'infinite_scroll' => __('Infinite Scroll', NECTAR_THEME_NAME)
			)
		),
		'projects_per_page'=>array(
			'type'=>'text', 
			'title'=>__('Projects Per Page', NECTAR_THEME_NAME),
			'desc' => __('How many projects would you like to display per page? <br/> If pagination is not enabled, will simply show this number of projects <br/> Enter as a number example "20"', NECTAR_THEME_NAME)
		),
		'lightbox_only'=>array( 
			'type'=>'checkbox', 
			'title'=>__('Lightbox Only?', NECTAR_THEME_NAME), 
			'desc' => __('This will remove the single project page from being accessible thus rendering your portfolio into only a gallery.', NECTAR_THEME_NAME)
		)
	)
);





$nectar_shortcodes['recent_projects'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Recent Projects', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'full_width'=>array(
			'type'=>'checkbox', 
			'title'=>__('Full Width Carousel?', NECTAR_THEME_NAME),
			'desc' => __('This will make your carousel extend the full width of the page. Won\'t work in a column shortcode!', NECTAR_THEME_NAME)
		),
		'heading'=>array(
			'type'=>'text', 
			'title'=>__('Heading Text', NECTAR_THEME_NAME),
			'desc' => __('Enter any text you would like for the heading of your carousel', NECTAR_THEME_NAME)
		),
		'page_link_text'=>array(
			'type'=>'text', 
			'title'=>__('Page Link Text', NECTAR_THEME_NAME),
			'desc' => __('This will be the text that is in a link leading users to your desired page <br/> (will be omitted for full width carousels and an icon will be used instead)', NECTAR_THEME_NAME)
		),
		'page_link_url'=>array(
			'type'=>'text', 
			'title'=>__('Page Link URL', NECTAR_THEME_NAME),
			'desc' => __('Enter portfolio page URL you would like to link to. <br/> Remember to include "http://"!', NECTAR_THEME_NAME)
		),
		
		'hide_controls'=>array(
			'type'=>'checkbox', 
			'title'=>__('Hide Carousel Controls?', NECTAR_THEME_NAME),
			'desc' => __('Checking this box will remove the controls from your carousel', NECTAR_THEME_NAME)
		),
		
		'number_to_display'=>array(
			'type'=>'text', 
			'title'=>__('Number of Projects To Show', NECTAR_THEME_NAME),
			'desc' => __('Enter as a number example "6"', NECTAR_THEME_NAME)
		),
		'category' => array(
			'type' => 'multi-select',
			'title' => __('Category To Display From',NECTAR_THEME_NAME),
			'values' => $types_options
		),
		'project_style' => array(
			'type' => 'regular-select',
			'title' => __('Project Style',NECTAR_THEME_NAME),
			'desc' => __('Please select the style you would like your projects to display in.',NECTAR_THEME_NAME),
			'values' => array(
			   '1' => __('Meta below thumb w/ links on hover',NECTAR_THEME_NAME),
			   '2' => __('Meta on hover + entire thumb link',NECTAR_THEME_NAME),
			   '3' => __('Title overlaid w/ zoom effect on hover',NECTAR_THEME_NAME),
			   '4' => __('Meta from bottom on hover + entire thumb link',NECTAR_THEME_NAME)
			)
		),
		'lightbox_only'=>array( 
			'type'=>'checkbox', 
			'title'=>__('Lightbox Only?', NECTAR_THEME_NAME), 
			'desc' => __('This will remove the single project page from being accessible thus rendering your portfolio into only a gallery.', NECTAR_THEME_NAME)
		)
	)
);




//Blog
$blog_types = get_categories();

$blog_options = array("all" => "All");

foreach ($blog_types as $type) {
	$blog_options[$type->slug] = $type->name;
}


$nectar_shortcodes['nectar_blog'] = array( 
	'type'=>'regular', 
	'title'=>__('Blog', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'layout'=>array(
			'type'=>'regular-select', 
			'title'=>__('Layout', NECTAR_THEME_NAME), 
			'values'=>array(
				'std-blog-sidebar' => __('Standard Blog W/ Sidebar', NECTAR_THEME_NAME), 
			    'std-blog-fullwidth' => __('Standard Blog No Sidebar', NECTAR_THEME_NAME),
			    'masonry-blog-sidebar' => __('Masonry Blog W/ Sidebar', NECTAR_THEME_NAME),
			    'masonry-blog-fullwidth' => __('Masonry Blog No Sidebar', NECTAR_THEME_NAME),
			    'masonry-blog-full-screen-width' => __('Masonry Blog Fullwidth', NECTAR_THEME_NAME)
			)
		),
		'category' => array(
			'type' => 'multi-select',
			'title' => __('Blog Categories', NECTAR_THEME_NAME),
			'desc' => __('Please select the categories you would like to display for your blog. <br/>You can select multiple categories too (ctrl + click on PC and command + click on Mac).', NECTAR_THEME_NAME),
			'values' => $blog_options
		),
		'enable_pagination'=>array(
			'type'=>'checkbox', 
			'title'=>__('Enable Pagination', NECTAR_THEME_NAME),
			'desc' => __('Would you like to enable pagination?', NECTAR_THEME_NAME)
		),
		'pagination_type'=>array(
			'type'=>'regular-select', 
			'title'=>__('Pagination Type', NECTAR_THEME_NAME), 
			'values'=>array(
				'default' => __('Default', NECTAR_THEME_NAME), 
			    'infinite_scroll' => __('Infinite Scroll', NECTAR_THEME_NAME)
			)
		),
		'posts_per_page'=>array(
			'type'=>'text', 
			'title'=>__('Posts Per Page', NECTAR_THEME_NAME),
			'desc' => __('How many posts would you like to display per page? <br/> If pagination is not enabled, will simply show this number of posts <br/>  Enter as a number example "10"', NECTAR_THEME_NAME)
		)
	)
);




$nectar_shortcodes['recent_posts'] = array( 
	'type'=>'direct_to_editor', 
	'title'=>__('Recent Posts', NECTAR_THEME_NAME ), 
	'attr'=>array( 
		'title_labels'=>array(
			'type'=>'checkbox', 
			'title'=>__('Enable Title Labels?', NECTAR_THEME_NAME),
			'desc' => __('These labels are defined by you in the "Blog Options" tab of your theme options panel.', NECTAR_THEME_NAME)
		),
		'category' => array(
			'type' => 'multi-select',
			'title' => __('Category To Display From', NECTAR_THEME_NAME),
			'values' => $blog_options
		)
	)
);
	
	


		//Shortcode html
		$html_options = null;
		
		$shortcode_html = '
		
		<div id="nectar-sc-heading">
		
		<div id="nectar-sc-generator" class="mfp-hide mfp-with-anim">
		    					
			<div class="shortcode-content">
				<div id="nectar-sc-header">
					<div class="label"><strong>'.__('Nectar Shortcodes', NECTAR_THEME_NAME).'</strong></div>			
					<div class="content"><select id="nectar-shortcodes" data-placeholder="' . __("Choose a shortcode", NECTAR_THEME_NAME) .'">
				    <option></option>';
					
					foreach( $nectar_shortcodes as $shortcode => $options ){
						
						if(strpos($shortcode,'header') !== false) {
							$shortcode_html .= '<optgroup label="'.$options['title'].'">';
						}
						else {
							$shortcode_html .= '<option value="'.$shortcode.'">'.$options['title'].'</option>';
							$html_options .= '<div class="shortcode-options" id="options-'.$shortcode.'" data-name="'.$shortcode.'" data-type="'.$options['type'].'">';
							
							if( !empty($options['attr']) ){
								 foreach( $options['attr'] as $name => $attr_option ){
									$html_options .= nectar_option_element( $name, $attr_option, $options['type'], $shortcode );
								 }
							}
			
							$html_options .= '</div>'; 
						}
						
					} 
			
			$shortcode_html .= '</select></div></div>'; 	
		
	
		 echo $shortcode_html . $html_options; ?>
			
			<div id="shortcode-content">
				
				<div class="label"><label id="option-label" for="shortcode-content"><?php echo __( 'Content: ', NECTAR_THEME_NAME ); ?> </label></div>
				<div class="content"><textarea id="shortcode_content"></textarea></div>
			
			    <div class="hr"></div>
			    
			</div>
		
			<code class="shortcode_storage"><span id="shortcode-storage-o" style=""></span><span id="shortcode-storage-d"></span><span id="shortcode-storage-c" style=""></span></code>
			<a class="btn" id="add-shortcode"><?php echo __( 'Add Shortcode', NECTAR_THEME_NAME ); ?></a>
			
		</div>

	</div>	
		
	<?php 
}



//Option Element Function
	
function nectar_option_element( $name, $attr_option, $type, $shortcode ){
	
	$option_element = null;
	
	(isset($attr_option['desc']) && !empty($attr_option['desc'])) ? $desc = '<p class="description">'.$attr_option['desc'].'</p>' : $desc = '';
	
	if(isset($attr_option['half_width']) && $attr_option['half_width'] == 'true') $option_element .= '<div class="column-wrap"> <div class="half_width">';
	if(isset($attr_option['second_half_width']) && $attr_option['second_half_width'] == 'true') $option_element .= '<div class="second_half_width">';
		
	switch( $attr_option['type'] ){
		
	case 'radio':
	    
		$option_element .= '<div class="label"><strong>'.$attr_option['title'].': </strong></div><div class="content">';
	    foreach( $attr_option['opt'] as $val => $title ){
	    
		(isset($attr_option['def']) && !empty($attr_option['def'])) ? $def = $attr_option['def'] : $def = '';
		
		 $option_element .= '
			<label for="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'">'.$title.'</label>
		    <input class="attr" type="radio" data-attrname="'.$name.'" name="'.$shortcode.'-'.$name.'" value="'.$val.'" id="shortcode-option-'.$shortcode.'-'.$name.'-'.$val.'"'. ( $val == $def ? ' checked="checked"':'').'>';
	    }
		
		$option_element .= $desc . '</div>';
		
	    break;
		
	case 'checkbox':
		
		$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div>    <div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />'. $desc. '</div> ';
		
		break;	
	
	case 'select':

		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<option value="'.$value.'">'.$value.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';

		break;
	
	case 'regular-select':
		
		if($attr_option['title'] == 'Starting Category') { $option_element .= '<div class="starting_category">'; }
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select id="'.$name.'">';
			$values = $attr_option['values'];
			foreach( $values as $k => $v ){
		    	$option_element .= '<option value="'.$k.'">'.$v.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		if($attr_option['title'] == 'Starting Category') { $option_element .= '</div>'; }
		
		break;
	
	case 'multi-select':
		
		$option_element .= '
		<div class="label"><label for="'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		
		<div class="content"><select multiple="multiple" id="'.$name.'">';
			$values = $attr_option['values'];
			foreach( $values as $k => $v ){
		    	$option_element .= '<option value="'.$k.'">'.$v.'</option>';
			}
		$option_element .= '</select>' . $desc . '</div>';
		
		break;
		
	case 'icons':
		if($attr_option['title'] == 'Icon') {
			$first_select = '<div class="label"><label><strong>Font Set: </strong></label></div> <div class="content"><select name="icon-set-select" class="skip-processing"> <option value="icon">Font Awesome</option> <option value="steadysets">Steadysets</option>  <option value="linecons">Linecons</option>  </select></div> <div class="clear no-line"></div>';
		} else {
			$first_select = null;
		}
		
		$parsed_title = str_replace(" ","-",$attr_option['title']);
		 
		$option_element .= $first_select.'
		
		<div class="icon-option '.strtolower($parsed_title).'">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<i class="'.$value.'"></i>';
			}
		$option_element .= $desc . '</div>';
		
		break;
	
	case 'button-icons':
		if($attr_option['title'] == 'Icon') {
			$first_select = '<div class="label"><label><strong>Font Set: </strong></label></div> <div class="content"><select name="icon-set-select" class="skip-processing"> <option value="none">None</option> <option value="default-arrow">Default Arrow</option> <option value="icon">Font Awesome</option> <option value="steadysets">Steadysets</option>  <option value="linecons">Linecons</option>  </select></div> <div class="clear no-line"></div>';
		} else {
			$first_select = null;
		}
		
		$parsed_title = str_replace(" ","-",$attr_option['title']);
		 
		$option_element .= $first_select.'
		
		<div class="icon-option '.strtolower($parsed_title).'">';
			$values = $attr_option['values'];
			foreach( $values as $value ){
		    	$option_element .= '<i class="'.$value.'"></i>';
			}
		$option_element .= $desc . '</div>';
		
		break;	
		
	case 'custom':
 
		if( $name == 'tabs' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Title: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Tab Content: </strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Tab', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Tab', NECTAR_THEME_NAME ).'</a>';
			
		}

		if( $name == 'toggles' ){
			$option_element .= '
			
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
			
				<div class="label"><label><strong>Turn into accordion?</strong>:</label></div>
				<div class="content">
					<input id="shortcode-option-carousel" class="accordion" type="checkbox" name="accordion">
				</div>
				<div class="clear"></div>

				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Title: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Tab Content: </strong></label></div>
					<div class="content"><textarea class="shortcode-dynamic-item-text" type="text" name="" /></textarea></div>
					<div class="label"><label><strong>Color: </strong></label></div>
					<div class="content">
						<select class="dynamic-select" id="color">
							<option value="Accent-Color">Accent-Color</option>
							<option value="Extra-Color-1">Extra-Color-1</option>
							<option value="Extra-Color-2">Extra-Color-2</option>
							<option value="Extra-Color-3">Extra-Color-3</option>
						</select>
					</div>
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Toggle', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Toggle', NECTAR_THEME_NAME ).'</a>';
			
		}  
		
		elseif( $name == 'bar_graph' ){
			$option_element .= '
			<div class="shortcode-dynamic-items" id="options-item" data-name="item">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Title: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Bar Percent: </strong></label></div>
					<div class="content dd-percent"><input class="shortcode-dynamic-item-input percent" data-slider="true"  data-slider-range="1,100" data-slider-step="1" type="text" name=""  value="" /></div><div class="clear no-border"></div>
					<div class="label"><label><strong>Color: </strong></label></div>
					<div class="content">
						<select class="dynamic-select" id="color">
							<option value="Accent-Color">Accent-Color</option>
							<option value="Extra-Color-1">Extra-Color-1</option>
							<option value="Extra-Color-2">Extra-Color-2</option>
							<option value="Extra-Color-3">Extra-Color-3</option>
						</select>
					</div>
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Bar', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Bar', NECTAR_THEME_NAME ).'</a>';
			
		} 
		
		elseif( $name == 'testimonials' ){
			$option_element .= '
			
			<div class="label"><label for="shortcode-option-autorotate"><strong>Autorotate?: </strong></label></div>
			<div class="content"><input class="attr" type="text" data-attrname="autorotate" value="" />If you would like this to autorotate, enter the rotation speed in <b>miliseconds</b> here. i.e 5000</div>
			
			<div class="clear"></div>
			
			<div class="label"><label for="shortcode-option-autorotate"><strong>Disable height animation?: </strong></label></div>
			<div class="content"><input type="checkbox" class="disable_height_animation" value="" />Your testimonial slider will animate the height of itself to match the height of the testimonial being shown - this will remove that and simply set the height equal to the tallest testimonial to allow your content below to remain stagnant instead of moving up/down.</div>
			
			<div class="clear"></div>
			
			<div class="shortcode-dynamic-items testimonials" id="options-item" data-name="testimonial">
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Name: </strong></label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					<div class="label"><label><strong>Quote: </strong></label></div>
					<div class="content"><textarea class="quote" name="quote"></textarea></div>
				</div>
			</div>

			<a href="#" class="btn blue remove-list-item">'.__('Remove Testimonial', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Testimonial', NECTAR_THEME_NAME ).'</a>';
			
		} 
		
		elseif( $name == 'image' ){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="image_url" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', NECTAR_THEME_NAME) . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', NECTAR_THEME_NAME) . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}

		elseif( $name == 'poster' ){
			$option_element .= '
				<div class="shortcode-dynamic-item" id="options-item" data-name="image-upload">
					<div class="label"><label><strong> '.$attr_option['title'].' </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="poster" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', NECTAR_THEME_NAME) . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', NECTAR_THEME_NAME) . '</a>';
					
					if(!empty($desc)) $option_element .= $desc;
					
					$option_element .='
					</div>
				</div>';
		}

		elseif( $name == 'color'){
			
			if(get_bloginfo('version') >= '3.5') {
	           $option_element .= '
	           <div class="label"><label><strong>Background Color: </strong></label></div>
			   <div class="content"><input type="text" value="" class="popup-colorpicker" style="width: 70px;" data-default-color=""/></div>';
	        } else {
	           $option_element .='You\'re using an outdated version of WordPress. Please update to use this feature.';
	        }	
				
		}

		elseif( $name == 'color_override'){
			
			if(get_bloginfo('version') >= '3.5') {
	           $option_element .= '
	           <div class="label"><label><strong>Color Override:</strong></label></div>
			   <div class="content"><input type="text" value="" class="popup-colorpicker" style="width: 70px;" data-default-color=""/></div>';
	        } else {
	           $option_element .='You\'re using an outdated version of WordPress. Please update to use this feature.';
	        }	
				
		}
		
		elseif( $name == 'hover_color_override'){
			
			if(get_bloginfo('version') >= '3.5') {
	           $option_element .= '
	           <div class="label"><label><strong>Hover BG Color:</strong></label></div>
			   <div class="content"><input type="text" value="" class="popup-colorpicker" style="width: 70px;" data-default-color=""/></div>';
	        } else {
	           $option_element .='You\'re using an outdated version of WordPress. Please update to use this feature.';
	        }	
				
		}
		
		elseif( $name == 'clients' ){
			$option_element .= '
			<div class="shortcode-dynamic-items clients" id="options-item" data-name="item">
			    
				<div class="label"><label><strong>Columns</strong>:</label></div>
				<div class="content">
					<label for="shortcode-option-button-2-col" class="inline">Two</label>
					<input id="shortcode-option-button-2-col" class="attr" type="radio" value="2" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-3-col" class="inline">Three</label>
					<input id="shortcode-option-button-3-col" class="attr" type="radio" value="3" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-4-col" class="inline">Four</label>
					<input id="shortcode-option-button-4-col" class="attr" type="radio" value="4" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-5-col" class="inline">Five</label>
					<input id="shortcode-option-button-5-col" class="attr" type="radio" value="5" name="client_columns[]" data-attrname="columns">
					<label for="shortcode-option-button-6-col" class="inline">Six</label>
					<input id="shortcode-option-button-6-col" class="attr" type="radio" value="6" name="client_columns[]" data-attrname="columns">
				</div>
				
				<div class="clear"></div>
				
				<div class="label"><label><strong>Fade In One by One?</strong>:</label></div>
				<div class="content">
					<input id="shortcode-option-carousel" class="fade_in_animation" type="checkbox" name="fade_in_animation">
				</div>
				
				<div class="clear"></div>
				
				<div class="label"><label><strong>Turn Into Carousel?</strong>:</label></div>
				<div class="content">
					<input id="shortcode-option-carousel" class="carousel" type="checkbox" name="carousel">
				</div>
				
				<div class="clear"></div>
				
				<div class="shortcode-dynamic-item">
					<div class="label"><label><strong>Client Image: </strong></label></div>
					<div class="content">
					
					 <input type="hidden" id="options-item"  />
			         <img class="redux-opts-screenshot" id="redux-opts-screenshot-" src="" />
			         <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-upload button-secondary" rel-id="">' . __('Upload', NECTAR_THEME_NAME) . '</a>
			         <a href="javascript:void(0);" class="redux-opts-upload-remove" style="display: none;">' . __('Remove Upload', NECTAR_THEME_NAME) . '</a>
					
					</div>
					<div class="clear"></div>
					<div class="label"><label><strong>Client URL</strong> (optional):</label></div>
					<div class="content"><input class="shortcode-dynamic-item-input" type="text" name="" value="" /></div>
					
				</div>
			</div>
			<a href="#" class="btn blue remove-list-item">'.__('Remove Client', NECTAR_THEME_NAME ). '</a> <a href="#" class="btn blue add-list-item">'.__('Add Client', NECTAR_THEME_NAME ).'</a>';
			
		} 
		
		elseif( $type == 'checkbox' ){
			$option_element .= '<div class="label"><label for="' . $name . '"><strong>' . $attr_option['title'] . ': </strong></label></div>    <div class="content"> <input type="checkbox" class="' . $name . '" id="' . $name . '" />' . $desc . '</div> ';
		} 
	
		
		break;
		
	case 'textarea':
		$option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><textarea data-attrname="'.$name.'"></textarea> ' . $desc . '</div>';
		break;
			
	case 'text':
	default:
	    $option_element .= '
		<div class="label"><label for="shortcode-option-'.$name.'"><strong>'.$attr_option['title'].': </strong></label></div>
		<div class="content"><input class="attr" type="text" data-attrname="'.$name.'" value="" />' . $desc . '</div>';
	    break;
    }
	
	$option_element .= '<div class="clear"></div>';
    
	if(isset($attr_option['half_width']) && $attr_option['half_width'] == 'true' || isset($attr_option['second_half_width']) && $attr_option['second_half_width'] == 'true') $option_element .= '</div>';
	if(isset($attr_option['second_half_width']) && $attr_option['second_half_width'] == 'true') $option_element .= '<div class="clear no-line"></div> </div>';
	
    return $option_element;
}



?>