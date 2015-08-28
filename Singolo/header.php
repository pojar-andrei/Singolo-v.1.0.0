<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/style-responsive.css">
		<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/style-responsive-js.css">
		<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/main.js"></script>
		<?php wp_head(); ?>
	</head>
	
<body <?php body_class(); ?>>
	
	<div class="header">
		<div class="background_main background_dark">
			<div class="container">
				<div class="logo">
					<a class="logo_text" href="<?php echo home_url(); ?>">
						SINGOLO
					</a>
					<p class="asterix logo logo_text">*</p>
					
				</div>
				<div class="menu nav_text">
					Menu
				</div>
				<nav class="nav">

					<?php 
						
						$header_menu = array(
								'theme_location' => 'primary',
							);
					?>

					<?php wp_nav_menu( $header_menu ); ?>
	            </nav>
			</div>
		</div>
		<div class="background_main background_dark-lighter"></div>
	</div>
	

		