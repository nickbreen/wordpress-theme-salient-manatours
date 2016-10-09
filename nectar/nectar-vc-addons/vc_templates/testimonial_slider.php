<?php 

extract(shortcode_atts(array("autorotate"=>'', "disable_height_animation"=>''), $atts));

$height_animation_class = null;
if($disable_height_animation == 'true') $height_animation_class = 'disable-height-animation';

echo '<div class="col span_12 testimonial_slider '.$height_animation_class.'" data-autorotate="'.$autorotate.'"><div class="slides">'.do_shortcode($content).'</div></div>';

?>