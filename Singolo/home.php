<?php get_header();?>
<div class="main">
	<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/slider.js"></script>
	<div class="section_slider">
		<div class="slider slider_background">
			<div class="container">
				<div class="slider_arrow slider_arrow_left" >
					<a href="#">	
						<img src="<?php echo get_bloginfo('template_directory'); ?>/img/prev_arrow.png" alt="Prev Arrow" data-dir="prev">
					</a>
				</div>
				<div class="slider_arrow slider_arrow_right" >
					<a href="#">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/img/next_arrow.png" alt="Next Arrow" data-dir="next">
					</a>
				</div>
				<div class="slider_content">
					<ul class="slider_list">
						<?php $loop = new WP_Query( array( 'post_type' => 'slide', 'posts_per_page' => -1 ) ); ?>
						<?php while ( $loop->have_posts() ) : $loop->the_post();?>
							<li class="slider_item">
								<img src="<?php the_field("slider_set_imagine"); ?>" alt="imagine" />
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div><!-- End conteiner -->
		</div><!-- End slider -->
	</div><!-- End section_slider -->
</div><!-- End main -->
<?php get_footer();?>