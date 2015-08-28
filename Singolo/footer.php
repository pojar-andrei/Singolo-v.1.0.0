			<div class="footer">
				<div class="container">
					<div class="footer_copyRight">
						@ Copyright 2013 Ã‚Â· by PSDchat.com
					</div>
					<div class="accounts--pozition">
						<?php $loop = new WP_Query( array( 'post_type' => 'footer', 'posts_per_page' => -1 ) ); ?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div class="accounts-block_img">
								<a href="<?php the_field("icon_url"); ?>" ><img src="<?php the_field("footer_icon"); ?>" alt="imagine" /></a>
							</div>
						<?php endwhile; ?>
					</div>
				</div><!-- End container -->	
			</div><!-- End footer -->	
		<?php wp_footer(); ?>
	</body>
</html>