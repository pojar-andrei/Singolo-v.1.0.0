<?php get_header(); ?>
<div class="main">
	<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/underscore.js"></script>
	<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/gallery_data.js"></script>
	<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/gallery_filter.js"></script>	
	<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/gallery_slider.js"></script>
	<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/gallery.js"></script>
	<div id="portfolio" class="l-section section_dark">
		<div class="container">
			<div class="description">
				<script> window.galleryData = []; </script>
				<?php
				$menus = array();
				$post_type = 'gallery_imagine';
				$tax = 'gallery';
				$tax_terms = get_terms($tax);
				if ($tax_terms) :
				    foreach ($tax_terms as $tax_term) :
				      	$args=array(
				        	'post_type' 		=> $post_type,
				        	"$tax" 				=> $tax_term->slug,
				        	'post_status' 		=> 'publish',
				        	'posts_per_page'	=> -1,
				        	'orderby' 			=> 'title',
				        	'order' 			=> 'ASC',
				        	'caller_get_posts'	=> 1
				      	); 
				      	$my_query = null;
				      	$my_query = new WP_Query($args);
					    if( $my_query->have_posts() ) : ?>
					      	<h4 class="description_title">
								<?php echo $tax_term->name; ?>
							</h4>
							<div class="description_text"> 
								<?php echo $tax_term->description; ?>
							</div>
					       	<?php 
					       	while ($my_query->have_posts()) : 
					       		$my_query->the_post();
			        			$imagine_criterias = get_field_object("imagine_criterias"); 
			        			$img_criterias = $imagine_criterias['value'];
			        			$img_criteria = explode(" ",$img_criterias);
			        			foreach($img_criteria as $crit) :
			        				if (!(in_array($crit, $menus))) :
										array_push($menus, $crit);
									endif;
			        			endforeach;?>
				        		<script>
				        			window.galleryData.push({url:'<?php the_field("gallery_imagine"); ?>',type:'<?php the_field("imagine_criterias"); ?>'})
				        		</script>	
		          			<?php 
		          			endwhile;
	      				endif;?>
						<div class="gallery">
			   				<div class="gallery_nav"> 
			   					<?php
		      					foreach($menus as $menu) : ?>
						    		<a class="gallery_nav_text gallery_nav_text--active" href="" data-dir="<?php echo $menu ?>">
										<?php echo ucfirst($menu); ?>
									</a>
								<?php 
								endforeach; ?>
							</div><!-- End gallery_nav -->
							<?php  wp_reset_query();
					endforeach; // End foreach $tax_terms
				endif; // End if $tax_terms ?>
							<div class="gallery_data">
												
							</div>
							<div class="gallery_slider">
							    <div class="gallery_arrow gallery_arrow_left">
							      <img src="<?php echo get_bloginfo('template_directory'); ?>/img/prev_arrow.png" data-arrow="prev">
							    </div>
							    <div class = "gallery_zoom">
							     	<div class="gallery_close">
										<img src="<?php echo get_bloginfo('template_directory'); ?>/img/close.png">
									</div>
							    </div>
							    <div class="gallery_arrow gallery_arrow_right">
							      <img src="<?php echo get_bloginfo('template_directory'); ?>/img/next_arrow.png" data-arrow="next">
							    </div>
							</div>
						</div> <!-- End gallery -->
			</div><!-- End description -->
		</div><!-- End container -->
	</div><!-- End id='portfolio' -->
</div><!-- End main -->

<?php get_footer(); ?>