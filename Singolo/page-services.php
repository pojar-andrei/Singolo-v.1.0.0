<?php get_header(); ?>
<div class="main">
	<div id="services" class="l-section section_light">
		<div class="container">
			<div class="description">

				<?php
				
				  $post_type = 'service';
				  $tax = 'service_post';
				  $tax_terms = get_terms($tax);
				  if ($tax_terms) {
				    foreach ($tax_terms as $tax_term) {
				      $args=array(
				        'post_type' => $post_type,
				        "$tax" => $tax_term->slug,
				        'post_status' => 'publish',
				        'posts_per_page' => -1,
				        'orderby' => 'title',
				        'order' => 'ASC',
				        'caller_get_posts'=> 1
				      ); 
				      $my_query = null;
				      $my_query = new WP_Query($args);
					    if( $my_query->have_posts() ) { ?>
					      	<h4 class="description_title">
								<?php echo $tax_term->name; ?>

							</h4>

							<div class="description_text"> 
								<?php echo $tax_term->description; ?>
							</div>

					       	<?php 
					        while ($my_query->have_posts()) : $my_query->the_post(); ?>
					          	<div class="services_block">
									<div class="services_block_img">
										<img src="<?php the_field("service_imagine");?>">
									</div>

									<div class="services_block_info">
										<h4 class="services_block_title ">
											<?php the_title(); ?>
										</h4>

										<p class="services_block_text">
											<?php echo get_the_content(); ?>
										</p>

									</div>
								</div>
					          <?php
					        endwhile;
				      	} // END if have_posts loop
				      wp_reset_query();
				    } // END foreach $tax_terms
				  } // END if $tax_terms
				?>
				
			</div>
		</div><!-- end container class -->
	</div><!-- end l-section section_light class -->
</div><!-- end main class -->
<?php get_footer(); ?>