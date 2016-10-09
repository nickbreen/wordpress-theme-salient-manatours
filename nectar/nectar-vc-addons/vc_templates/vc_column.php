<?php
$output = $el_class = $width = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'width' => '1/1',
    "boxed" => 'false', 
    "centered_text" => 'false', 
    'enable_animation' => '',
    'animation' => '', 
    'column_padding' => 'no-extra-padding',
    'column_padding_position'=> 'all',
    'delay' => '0',
    'background_color' => '',
    'background_color_hover' => '',
    'background_color_opacity' => '',
    'background_image' => '',
    'column_link' => '',
    'font_color' => ''
), $atts));

//var init
$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);
$box_border = null;
$parsed_animation = null;	
$style = 'style="';

$el_class .= ' wpb_column column_container col';
if($boxed == 'true' && empty($background_image) && empty($background_color))  { $el_class .= ' boxed'; $box_border = '<span class="bottom-line"></span>'; }
if($centered_text == 'true') $el_class .= ' centered-text';


//style related
if(!empty($background_color)) {
	if($background_color_opacity != '1'){
		$rgba_color = vc_hex2rgb($background_color);
		$style .= ' background-color: rgba('.$rgba_color[0].','.$rgba_color[1].','.$rgba_color[2].','.$background_color_opacity.'); ';	
	} else {
		$style .= ' background-color: '.$background_color.'; ';	
	} 
}
if(!empty($background_image)) {
	
	$bg_image_src = wp_get_attachment_image_src($background_image, 'full');
	$style .= ' background-image: url(\''.$bg_image_src[0].'\'); ';
}
if(!empty($font_color)) $style .= ' color: '.$font_color.';';
(empty($background_color) && empty($background_image) && empty($font_color)) ? $style = null : $style .= '"';

$using_bg = (!empty($background_image) || !empty($background_color)) ? 'data-using-bg="true"': null;

$el_class .= ' '. $column_padding;


if(!empty($animation) && $animation != 'none' && $enable_animation == 'true') {
	 $el_class .= ' has-animation';
	
	 $parsed_animation = str_replace(" ","-",$animation);
	 $delay = intval($delay);
}

$column_link_html = (!empty($column_link)) ? '<a class="column-link" href="'.$column_link.'"></a>' : null;

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class, $this->settings['base']);
$output .= "\n\t".'<div '.$style.' class="'.$css_class.'" '.$using_bg.' data-padding-pos="'. $column_padding_position .'" data-hover-bg="'.$background_color_hover.'" data-animation="'.strtolower($parsed_animation).'" data-delay="'.$delay.'">' . $column_link_html;
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper'); 
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

echo $output;