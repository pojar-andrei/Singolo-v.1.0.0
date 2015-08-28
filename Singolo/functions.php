<?php

	//Header Nav Menu
	register_nav_menus(array(
			'primary' => __('Header Menu'),
		));

	require_once('functions/create_db.php');

	require_once ('functions/post_type_slider.php');

	require_once ('functions/post_type_service.php');

	require_once ('functions/post_type_gallery.php');

	require_once ('functions/post_type_about.php');

	require_once ('functions/post_type_contact.php');

	require_once ('functions/post_type_footer.php');

