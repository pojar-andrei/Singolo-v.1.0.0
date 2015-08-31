<?php get_header();?>
	<div class="l-section section_dark">
		<div class="container">
			<div class="description" style="vertical-align: top;">
				<h5 class="description_title" style="   display: block;
    													text-align: center;"> 
    				<?php the_title(); ?>
    			</h5>
				<div><img src="<?php the_field("gallery_imagine");?>"></div>
				<h3 class="description_text"><?php echo $post->post_content; ?> </h3>
				<a href="http://localhost/Singolo/portofolio/" style="text-decoration: none;">
					<h4 class="description_title"> 
    				<-Go Back
    				</h4>
    			</a>
			</div>
		</div>
	</div>
<?php get_footer(); ?>