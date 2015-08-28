<?php get_header(); ?>
<div class="main">
	<div id="contact" class="l-section section_colorfull">
		<div class="container">
			<div class="description">
                <?php $loop = new WP_Query( array( 'post_type' => 'contact', 'posts_per_page' => -1 ) ); ?>
                <?php 
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <h4 class="description_title description_title--color">
                        <?php echo the_title(); ?>
                    </h4>
                    <div class="description_text description_text--color">
                        <?php echo the_content(); ?>
                    </div>
                    <form class="l-form">
                        <?php 
                        $nav_icon = get_field_object('contact_labels');
                        $value = $nav_icon['value'];
                        $choices = $nav_icon['choices'];
                        foreach ($value as $v) :
                            if ($choices[$v] == "Name") { ?>
                                <input class="form_input" type="text" placeholder="Name (Required)">
                            <?php }
                            elseif ($choices[$v] == "E-Mail") { ?>
                                 <input class="form_input" type="text" placeholder="Email (Required)">
                            <?php }
                            elseif ($choices[$v] == "Subject") { ?>
                                <input class="form_input" type="text" placeholder="Subject">
                            <?php  }
                            elseif ($choices[$v] == "Details") { ?>
                                <textarea class="form_input form_details" type="text" placeholder="Describe your project in detail..." rows="12"></textarea>
                            <?php }
                        endforeach; ?>
                    </form>
                    <div class="contact">
                        <h3 class="contact_title">
                            <?php echo the_field('contact_title_2'); ?>
                        </h3>
                        <p class="contact_text" >
                            <?php echo the_field('contact_description_2'); ?>
                        </p>
                        <span class="contact-icon " style=" background-image: url('<?php echo get_bloginfo('template_directory'); ?>/img/location.png');">
                            <?php echo the_field('contact_location'); ?>
                        </span>
                        <span class="contact-icon " style=" background-image: url('<?php echo get_bloginfo('template_directory'); ?>/img/phone.png');"> 
                            <?php echo the_field('contact_phone'); ?>
                        </span>
                        <span class="contact-icon " style=" background-image: url('<?php echo get_bloginfo('template_directory'); ?>/img/mail.png');">
                            <?php echo the_field('contact_e-mail'); ?>
                        </span>
                    </div>
                <?php endwhile; ?>
			</div><!-- end description -->
		</div><!-- end container -->
	</div><!-- end id='contact' -->
</div><!-- end main -->
<?php get_footer(); ?>