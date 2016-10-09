<?php get_header(); ?>

<?php nectar_page_header(get_option('page_for_posts')); ?>

<div class="container-wrap">
		
	<div class="container main-content">
		
		<?php if(!is_home()) { ?>
			<div class="row">
				<div class="col span_12 section-title blog-title">
					<h1>
						<?php if(is_author()){

							printf( __( 'All posts by %s', NECTAR_THEME_NAME ), get_the_author() );

						} else if(is_category()) {

							printf( __( 'Category Archives: %s', NECTAR_THEME_NAME ), single_cat_title( '', false ) );

						} else if(is_date()){

							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', NECTAR_THEME_NAME ), get_the_date() );

							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', NECTAR_THEME_NAME ), get_the_date( _x( 'F Y', 'monthly archives date format', NECTAR_THEME_NAME ) ) );

							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', NECTAR_THEME_NAME ), get_the_date( _x( 'Y', 'yearly archives date format', NECTAR_THEME_NAME ) ) );

							else :
								_e( 'Archives', NECTAR_THEME_NAME );

							endif;
						} else {
							wp_title("",true); 
						} ?>
					</h1>
				</div>
			</div>
		<?php } ?>
		
		<div class="row">
			
			<?php $options = get_option('salient'); 
			
			$blog_type = $options['blog_type'];
			if($blog_type == null) $blog_type = 'std-blog-sidebar';
			
			$masonry_class = null;
			$infinite_scroll_class = null;
			
			//enqueue masonry script if selected
			if($blog_type == 'masonry-blog-sidebar' || $blog_type == 'masonry-blog-fullwidth' || $blog_type == 'masonry-blog-full-screen-width') {
				$masonry_class = 'masonry';
			}
			
			if($blog_type == 'masonry-blog-full-screen-width') {
				$masonry_class = 'masonry full-width-content';
			}
			
			if(!empty($options['blog_pagination_type']) && $options['blog_pagination_type'] == 'infinite_scroll'){
				$infinite_scroll_class = ' infinite_scroll';
			}
			
			if($blog_type == 'std-blog-sidebar' || $blog_type == 'masonry-blog-sidebar'){
				echo '<div id="post-area" class="col span_9 '.$masonry_class. $infinite_scroll_class.'"> <div class="posts-container">';
			} else {
				echo '<div id="post-area" class="col span_12 col_last '.$masonry_class. $infinite_scroll_class.'"> <div class="posts-container">';
			}
	
				if(have_posts()) : while(have_posts()) : the_post(); ?>
					
					<?php 
		
					if ( floatval(get_bloginfo('version')) < "3.6" ) {
						//old post formats before they got built into the core
						 get_template_part( 'includes/post-templates-pre-3-6/entry', get_post_format() ); 
					} else {
						//WP 3.6+ post formats
						 get_template_part( 'includes/post-templates/entry', get_post_format() ); 
					} ?>
	
				<?php endwhile; endif; ?>
				
				</div><!--/posts container-->
				
			<?php nectar_pagination(); ?>
				
			</div><!--/span_9-->
			
			<?php  if($blog_type == 'std-blog-sidebar' || $blog_type == 'masonry-blog-sidebar') { ?>
				<div id="sidebar" class="col span_3 col_last">
					<?php get_sidebar(); ?>
				</div><!--/span_3-->
			<?php } ?>
			
		</div><!--/row-->
		
	</div><!--/container-->

</div><!--/container-wrap-->
	
<?php get_footer(); ?>