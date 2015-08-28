<?php get_header(); ?>
<div class="main">
	<div id="about" class="l-section section_light">
		<div class="container">
			<div class="description">
				<?php
			  	$post_type = 'worker';
			  	$tax = 'group';
			  	$tax_terms = get_terms($tax);
			  	if ($tax_terms) :
				    foreach ($tax_terms as $tax_term) :
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
					    if( $my_query->have_posts() ) : ?>
					      	<h4 class="description_title">
								<?php echo $tax_term->name; ?>
							</h4>
							<div class="description_text"> 
								<?php echo $tax_term->description; ?>
							</div>
					       	<?php 
					        while ($my_query->have_posts()) : $my_query->the_post(); ?>
					          	<div class="accounts-block">
									<div><img src="<?php the_field("user_icon");?>"></div>
									<h4 class="accounts-block_title">
										<?php the_title(); ?>
									</h4>
									<p class="accounts-block_text">
										<?php echo get_the_content(); ?>
									</p>
									<div>
										<?php 
										$nav_icon = get_field_object('navigation_icons');
										$value = $nav_icon['value'];
										$choices = $nav_icon['choices'];
										foreach ($value as $v) :
											if ($choices[$v] == "Facebook") { ?>
												<div class="accounts-block_img">
													<a href="<?php the_field("facebook_url");?>" ><img src="http://localhost/Singolo/wp-content/uploads/2015/08/facebook1.png"></a>
												</div>
											<?php }
											elseif ($choices[$v] == "Twitter") { ?>
												<div class="accounts-block_img">
													<a href="<?php the_field("twitter_url");?>" ><img src="http://localhost/Singolo/wp-content/uploads/2015/08/twitter1.png"></a>
												</div>
											<?php }
											elseif ($choices[$v] == "Google++") { ?>
												<div class="accounts-block_img">
													<a href="<?php the_field("google_url");?>" ><img src="http://localhost/Singolo/wp-content/uploads/2015/08/google-1.png"></a>
												</div>
											<?php }
											elseif ($choices[$v] == "Linkedin") { ?>
												<div class="accounts-block_img">
													<a href="<?php the_field("linkedin_url");?>" ><img src="http://localhost/Singolo/wp-content/uploads/2015/08/linkedin1.png"></a>
												</div>
											<?php }
										endforeach;?>
									</div>
								</div><!-- End accounts-block -->
					  		<?php 
					  		endwhile;
				      	endif; // End if have_posts loop
				      	wp_reset_query();
				    endforeach; // END foreach $tax_terms
			  	endif; // END if $tax_terms ?>
			</div><!-- end description -->
		</div><!-- end container -->
	</div><!-- end id='about' -->
</div><!-- end main class -->
<?php get_footer(); ?>