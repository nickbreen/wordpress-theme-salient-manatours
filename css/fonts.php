<?php 

$options = get_option('salient');
$external_dynamic = (!empty($options['external-dynamic-css']) && $options['external-dynamic-css'] == 1) ? 'on' : 'off';

function nectar_typography() {
	
	global $options;
	global $external_dynamic;
	
	if($external_dynamic != 'on') { ob_start(); }

	$body = $options['body_font'];
	$navigation = $options['navigation_font'];
	$navigation_dropdown = $options['navigation_dropdown_font'];
	$home_slider_caption = $options['home_slider_caption_font'];
	$sidebar_carousel_footer_header = $options['sidebar_footer_h_font'];
	$team_member_names = $options['team_member_h_font'];
	
	if($external_dynamic != 'on') { echo '<style type="text/css">'; }

	/*-------------------------------------------------------------------------*/
	/*	Body Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['body_font_style']);
	
	( intval( substr($options['body_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['body_font_size'],0,-2)) * 1.8 .'px' : $line_height = null ;  ?>
	
	<?php echo 'body, .toggle h3 a, body .ui-widget, table, .bar_graph li span strong, #search-results .result .title span, .woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3, body .nectar-love span, body .nectar-social .nectar-love .nectar-love-count, body .carousel-heading h2 
	{'; ?>
		<?php if($options['body_font'] != '-') {
			$font_family = (1 === preg_match('~[0-9]~', $options['body_font'])) ? '"'. $options['body_font'] .'"' : $options['body_font'];
		}
			  if($options['body_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['body_font_transform'] != '-') echo 'text-transform: ' . $options['body_font_transform'] .';'; 
			  if($options['body_font_spacing'] != '-') echo 'letter-spacing: ' . $options['body_font_spacing'] .';'; 
		      if($options['body_font_size'] != '-') echo 'font-size:' . $options['body_font_size'] .';'; ?>
		
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>

		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; 
	
     if($options['body_font'] != '-') {
	   echo '.bold, strong, b { font-family: ' . $font_family .'; font-weight: bold; } ';
	 }
	
	 echo '.nectar-fancy-ul ul li .icon-default-style[class^="icon-"] {'; 
		if(!empty($line_height)) echo 'line-height:' . $line_height .'!important;';
	 echo '}'; ?>
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Navigation Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['navigation_font_style']);
	
	( intval( substr($options['navigation_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['navigation_font_size'],0,-2)) *1.4 .'px' : $line_height = null ;  ?>
	
	<?php echo 'header#top nav > ul > li > a
	{'; ?>	
		<?php if($options['navigation_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['navigation_font'])) ? '"'. $options['navigation_font'] .'"' : $options['navigation_font'];
		}
			  if($options['navigation_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['navigation_font_transform'] != '-') echo 'text-transform: ' . $options['navigation_font_transform'] .';'; 
			  if($options['navigation_font_spacing'] != '-') echo 'letter-spacing: ' . $options['navigation_font_spacing'] .';'; 
		      if($options['navigation_font_size'] != '-') echo 'font-size:' . $options['navigation_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; 
	
		//make search font match main nav font
		//if($options['navigation_font'] != '-') echo '#search-outer #search input[type="text"] { font-family: ' . $font_family .'; }';
	?>
	
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Navigation Dropdown Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['navigation_dropdown_font_style']);
	( intval( substr($options['navigation_dropdown_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['navigation_dropdown_font_size'],0,-2)) + 10 .'px' : $line_height = null ;  ?>
	
	<?php echo 'header#top .sf-menu li ul li a, #header-secondary-outer nav > ul > li > a, #header-secondary-outer ul ul li a, #header-outer .widget_shopping_cart .cart_list a
	{';?>	
		<?php if($options['navigation_dropdown_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['navigation_dropdown_font'])) ? '"'. $options['navigation_dropdown_font'] .'"' : $options['navigation_dropdown_font'];
		}
			  if($options['navigation_dropdown_font'] != '-') echo 'font-family: ' . $font_family .';';
			  if($options['navigation_dropdown_font_transform'] != '-') echo 'text-transform: ' . $options['navigation_dropdown_font_transform'] .';'; 
			  if($options['navigation_dropdown_font_spacing'] != '-') echo 'letter-spacing: ' . $options['navigation_dropdown_font_spacing'] .';'; 
		      if($options['navigation_dropdown_font_size'] != '-') echo 'font-size:' . $options['navigation_dropdown_font_size'] .';'; ?>
			
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	<?php echo '@media only screen 
	and (min-width : 1px) and (max-width : 1000px) 
	{
	  header#top .sf-menu a {
	  	font-family: '. $options['navigation_dropdown_font'] .'!important;
	  	font-size: 14px!important;
	  }
	}'; ?>
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Page Heading Font - h1
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['h1_font_style']);
	
	( intval( substr($options['h1_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['h1_font_size'],0,-2)) +6 .'px' : $line_height = null ;  ?>
	
	<?php echo '#page-header-bg h1, body h1, body .row .col.section-title h1
	{'; ?>	
		<?php if($options['h1_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['h1_font'])) ? '"'. $options['h1_font'] .'"' : $options['h1_font'];
		}
			  if($options['h1_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['h1_font_transform'] != '-') echo 'text-transform: ' . $options['h1_font_transform'] .';'; 
			  if($options['h1_font_spacing'] != '-') echo 'letter-spacing: ' . $options['h1_font_spacing'] .';'; 
		      if($options['h1_font_size'] != '-') echo 'font-size:' . $options['h1_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	@media only screen and (min-width: 690px) and (max-width: 1300px) {
		#page-header-bg .span_6 h1, body .row .col.section-title h1, h1 {
			font-size: <?php if(!empty($options['h1_font_size']) && $options['h1_font_size'] != '-') echo $options['h1_font_size']*0.85 . 'px!important' ?>;
			line-height: <?php if(!empty($options['h1_font_size']) && $options['h1_font_size'] != '-') echo ($options['h1_font_size']*0.85) +4 . 'px!important' ?>;
		}
	}
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Page Heading Font - h2
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['h2_font_style']);
	
	( intval( substr($options['h2_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['h2_font_size'],0,-2)) + intval(substr($options['h2_font_size'],0,-2))*0.65 .'px' : $line_height = null ;  ?>
	
	<?php echo '#page-header-bg h2, body h2, article.post .post-header h2, article.post.quote .post-content h2, article.post.link .post-content h2, article.post.format-status .post-content h2,
	#call-to-action span
	{'; ?>	
		<?php if($options['h2_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['h2_font'])) ? '"'. $options['h2_font'] .'"' : $options['h2_font'];
		}
			  if($options['h2_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['h2_font_transform'] != '-') echo 'text-transform: ' . $options['h2_font_transform'] .';'; 
			  if($options['h2_font_spacing'] != '-') echo 'letter-spacing: ' . $options['h2_font_spacing'] .';'; 
		      if($options['h2_font_size'] != '-') echo 'font-size:' . $options['h2_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Page Heading Font - h3
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['h3_font_style']);
	
	( intval( substr($options['h3_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['h3_font_size'],0,-2)) +8 .'px' : $line_height = null ;  ?>
	
	<?php echo 'body h3, .row .col h3, .toggle h3 a, .ascend #respond h3, .ascend h3#comments
	{'; ?>	
		<?php if($options['h3_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['h3_font'])) ? '"'. $options['h3_font'] .'"' : $options['h3_font'];
		}
			  if($options['h3_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['h3_font_transform'] != '-') echo 'text-transform: ' . $options['h3_font_transform'] .';'; 
			  if($options['h3_font_spacing'] != '-') echo 'letter-spacing: ' . $options['h3_font_spacing'] .';'; 
		      if($options['h3_font_size'] != '-') echo 'font-size:' . $options['h3_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	@media only screen and (min-width: 1000px) {
		.ascend .comments-section .comment-wrap.full-width-section > h3 {
			font-size: <?php if(!empty($options['h3_font_size']) && $options['h3_font_size'] != '-') echo $options['h3_font_size']*1.7 . 'px!important' ?>;
			line-height: <?php if(!empty($options['h3_font_size']) && $options['h3_font_size'] != '-') echo ($options['h3_font_size']*1.7) +8 . 'px!important' ?>;
		}
	}
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Page Heading Font - h4
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['h4_font_style']);
	
	( intval( substr($options['h4_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['h4_font_size'],0,-2)) +10 .'px' : $line_height = null ;  ?>
	
	<?php echo 'body h4, .row .col h4, .portfolio-items .work-meta h4, #respond h3, h3#comments
	{'; ?>	
		<?php if($options['h4_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['h4_font'])) ? '"'. $options['h4_font'] .'"' : $options['h4_font'];
		}
			  if($options['h4_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['h4_font_transform'] != '-') echo 'text-transform: ' . $options['h4_font_transform'] .';'; 
			  if($options['h4_font_spacing'] != '-') echo 'letter-spacing: ' . $options['h4_font_spacing'] .';'; 
		      if($options['h4_font_size'] != '-') echo 'font-size:' . $options['h4_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Page Heading Font - h5
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['h5_font_style']);
	
	( intval( substr($options['h5_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['h5_font_size'],0,-2)) +10 .'px' : $line_height = null ;  ?>
	
	<?php echo 'body h5, .row .col h5
	{'; ?>	
		<?php if($options['h5_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['h5_font'])) ? '"'. $options['h5_font'] .'"' : $options['h5_font'];
		}
			  if($options['h5_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['h5_font_transform'] != '-') echo 'text-transform: ' . $options['h5_font_transform'] .';'; 
			  if($options['h5_font_spacing'] != '-') echo 'letter-spacing: ' . $options['h5_font_spacing'] .';'; 
		      if($options['h5_font_size'] != '-') echo 'font-size:' . $options['h5_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	


	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Italic Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['i_font_style']);
	
	( intval( substr($options['i_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['i_font_size'],0,-2)) +10 .'px' : $line_height = null ;  ?>
	
	<?php echo 'body i, body em
	{'; ?>	
		<?php if($options['i_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['i_font'])) ? '"'. $options['i_font'] .'"' : $options['i_font'];
		}
			  if($options['i_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['i_font_transform'] != '-') echo 'text-transform: ' . $options['i_font_transform'] .';'; 
			  if($options['i_font_spacing'] != '-') echo 'letter-spacing: ' . $options['i_font_spacing'] .';'; 
		      if($options['i_font_size'] != '-') echo 'font-size:' . $options['i_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>


	
	<?php 

	/*-------------------------------------------------------------------------*/
	/*	Page Header Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['page_heading_font_style']);
	
	( intval( substr($options['page_heading_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['page_heading_font_size'],0,-2)) +10 .'px' : $line_height = null ;  ?>
	
	<?php echo 'body #page-header-bg h1, html body .row .col.section-title h1
	{'; ?>	
		<?php if($options['page_heading_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['page_heading_font'])) ? '"'. $options['page_heading_font'] .'"' : $options['page_heading_font'];
		}
			  if($options['page_heading_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['page_heading_font_transform'] != '-') echo 'text-transform: ' . $options['page_heading_font_transform'] .';'; 
			  if($options['page_heading_font_spacing'] != '-') echo 'letter-spacing: ' . $options['page_heading_font_spacing'] .';'; 
			  if($options['page_heading_font_size'] != '-') echo 'font-size:' . $options['page_heading_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>


	<?php
	/*-------------------------------------------------------------------------*/
	/*	Page Header Subtitle Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['page_heading_subtitle_font_style']);
	
	( intval( substr($options['page_heading_subtitle_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['page_heading_subtitle_font_size'],0,-2)) +10 .'px' : $line_height = null ;  ?>
	
	<?php echo 'body #page-header-bg .subheader,  body .row .col.section-title > span
	{'; ?>	
		<?php if($options['page_heading_subtitle_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['page_heading_subtitle_font'])) ? '"'. $options['page_heading_subtitle_font'] .'"' : $options['page_heading_subtitle_font'];
		}
			  if($options['page_heading_subtitle_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['page_heading_subtitle_font_transform'] != '-') echo 'text-transform: ' . $options['page_heading_subtitle_font_transform'] .';'; 
			  if($options['page_heading_subtitle_font_spacing'] != '-') echo 'letter-spacing: ' . $options['page_heading_subtitle_font_spacing'] .';'; 
			  if($options['page_heading_subtitle_font_size'] != '-') echo 'font-size:' . $options['page_heading_subtitle_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Nectar Slider Heading Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['nectar_slider_heading_font_style']);
	( intval( substr($options['nectar_slider_heading_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['nectar_slider_heading_font_size'],0,-2)) + 19 .'px!important' : $line_height = null ;  ?>
	
	<?php echo '.swiper-slide .content h2
	{'; ?>
		<?php if($options['nectar_slider_heading_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['nectar_slider_heading_font'])) ? '"'. $options['nectar_slider_heading_font'] .'"' : $options['nectar_slider_heading_font'];	
	     }  
			  if($options['nectar_slider_heading_font'] != '-') echo 'font-family: ' . $font_family .';';
			  if($options['nectar_slider_heading_font_transform'] != '-') echo 'text-transform: ' . $options['nectar_slider_heading_font_transform'] .';';  
			  if($options['nectar_slider_heading_font_spacing'] != '-') echo 'letter-spacing: ' . $options['nectar_slider_heading_font_spacing'] .';'; 
			  if($options['nectar_slider_heading_font_size'] != '-') echo 'font-size:' . $options['nectar_slider_heading_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Nectar/Home Slider Caption 
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['home_slider_caption_font_style']);
	( intval( substr($options['home_slider_caption_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['home_slider_caption_font_size'],0,-2)) + 19 .'px!important' : $line_height = null ;  ?>
	
	<?php echo '#featured article .post-title h2 span, .swiper-slide .content p, #portfolio-filters-inline #current-category, body .vc_text_separator div
	{'; ?>	
		<?php if($options['home_slider_caption_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['home_slider_caption_font'])) ? '"'. $options['home_slider_caption_font'] .'"' : $options['home_slider_caption_font'];	
		}  
			  if($options['home_slider_caption_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['home_slider_caption_font_transform'] != '-') echo 'text-transform: ' . $options['home_slider_caption_font_transform'] .';';  
			  if($options['home_slider_caption_font_spacing'] != '-') echo 'letter-spacing: ' . $options['home_slider_caption_font_spacing'] .';';  
		      if($options['home_slider_caption_font_size'] != '-') echo 'font-size:' . $options['home_slider_caption_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	<?php 
		  echo '#portfolio-filters-inline ul { line-height: '.$line_height.'; }';
		  echo '.swiper-slide .content p.transparent-bg span { '; $nectar_slider_line_height_2 = intval(substr($options["home_slider_caption_font_size"],0,-2)) + 25; ?>
	     <?php if(!empty($line_height)) echo 'line-height:' . $nectar_slider_line_height_2 .'px;'; ?>
	<?php echo '}'; ?>






	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Testimonial Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['testimonial_font_style']);
	( intval( substr($options['testimonial_font_size'],0,-2) ) > 8 ) ? $line_height =  intval(substr($options['testimonial_font_size'],0,-2)) + 19 .'px!important' : $line_height = null ;  ?>
	
	<?php echo '.testimonial_slider blockquote, .testimonial_slider blockquote span, blockquote
	{'; ?>	
		<?php if($options['testimonial_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['testimonial_font'])) ? '"'. $options['testimonial_font'] .'"' : $options['testimonial_font'];	
		}  
			  if($options['testimonial_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['testimonial_font_transform'] != '-') echo 'text-transform: ' . $options['testimonial_font_transform'] .';';  
			  if($options['testimonial_font_spacing'] != '-') echo 'letter-spacing: ' . $options['testimonial_font_spacing'] .';';  
		      if($options['testimonial_font_size'] != '-') echo 'font-size:' . $options['testimonial_font_size'] .';'; ?>
	
		<?php if(!empty($line_height)) echo 'line-height:' . $line_height .';'; ?>
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  }
		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	
	

	
	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Sidear, Carousel & Nectar Button Header Font
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['sidebar_footer_h_font_style']);
	$line_height =  substr($options['sidebar_footer_h_font_size'],0,-2); ?>
	
	<?php echo '#footer-outer .widget h4, #sidebar h4, #call-to-action .container a, .uppercase, .nectar-button, body .widget_calendar table th, body #footer-outer #footer-widgets .col .widget_calendar table th, .swiper-slide .button a,
	header#top nav > ul > li.megamenu > ul > li > a, .carousel-heading h2, body .gform_wrapper .top_label .gfield_label, body .vc_pie_chart .wpb_pie_chart_heading, #infscr-loading div, #page-header-bg .author-section a, .ascend input[type="submit"], .ascend button[type="submit"],
	.widget h4
	{'; ?>	
		<?php if($options['sidebar_footer_h_font'] != '-') {
			   $font_family = (1 === preg_match('~[0-9]~', $options['sidebar_footer_h_font'])) ? '"'. $options['sidebar_footer_h_font'] .'"' : $options['sidebar_footer_h_font'];
		}
			  if($options['sidebar_footer_h_font'] != '-') echo 'font-family: ' . $font_family .';';
			  if($options['sidebar_footer_h_font_transform'] != '-') echo 'text-transform: ' . $options['sidebar_footer_h_font_transform'] .'!important;';  
			  if($options['sidebar_footer_h_font_spacing'] != '-') echo 'letter-spacing: ' . $options['sidebar_footer_h_font_spacing'] .';';  
		      if($options['sidebar_footer_h_font_size'] != '-') echo 'font-size:' . $options['sidebar_footer_h_font_size'] .';'; ?>
				
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  } 
			
			else {
			  	echo 'font-weight: normal;';
			}  ?>

		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
	<?php echo '}'; ?>
	
	

	
	<?php 
	/*-------------------------------------------------------------------------*/
	/*	Team member names & heading subtitles
	/*-------------------------------------------------------------------------*/
	$styles = explode('-', $options['team_member_h_font_style']);
	$line_height =  substr($options['team_member_h_font_size'],0,-2); ?>
	
	<?php echo '.team-member h4, .row .col.section-title p, .row .col.section-title span, #page-header-bg .subheader, .nectar-milestone .subject, .testimonial_slider blockquote span
	{'; ?>	
	<?php if($options['team_member_h_font'] != '-') {
			  $font_family = (1 === preg_match('~[0-9]~', $options['team_member_h_font'])) ? '"'. $options['team_member_h_font'] .'"' : $options['team_member_h_font'];
	}  		
			  if($options['team_member_h_font'] != '-') echo 'font-family: ' . $font_family .';'; 
			  if($options['team_member_h_font_transform'] != '-') echo 'text-transform: ' . $options['team_member_h_font_transform'] .';';  
			  if($options['team_member_h_font_spacing'] != '-') echo 'letter-spacing: ' . $options['team_member_h_font_spacing'] .';';  
		      if($options['team_member_h_font_size'] != '-') echo 'font-size:' . $options['team_member_h_font_size'] .';'; ?>
			
		<?php if(!empty($styles[0]) && strpos($styles[0],'italic') === false) { echo 'font-weight:' .  $styles[0] .';'; }
			  else if(!empty($styles[0]) && strpos($styles[0],'0italic') == true) {
			  	  $the_weight = explode("i",$styles[0]);
			  	  echo 'font-weight:' .  $the_weight[0] .';'; 
			  	  echo 'font-style: italic';
			  }
			  else if(!empty($styles[0])) {
			  	  if(strpos($styles[0],'italic') !== false) {
			  	    echo 'font-weight: 400;'; 
			  	    echo 'font-style: italic';
			  	 }
			  } 

		?>
		<?php if(!empty($styles[1])) echo 'font-style:' . $styles[1]; ?>
			
	<?php echo '}'; ?>
	
	
	<?php echo 'article.post .post-meta .month 
	{
		line-height:'. $line_height + -6 . 'px!important;
	}'; 
	

	if($external_dynamic != 'on') {

		echo '</style>';
		
		
		$dynamic_css = ob_get_contents();
		ob_end_clean();
		
		echo nectar_quick_minify($dynamic_css);	

	}
	
}

if($external_dynamic != 'on') {
	add_action('wp_head', 'nectar_typography'); 
} else { 
	nectar_typography();
}

?>