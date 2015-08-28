<?php 

	function jal_install() {

		$table_name = 'wp_contact_db';
		$sql = "CREATE TABLE". $table_name ."(
			id int(10) NOT NULL AUTO_INCREMENT,
			name tinytext NOT NULL,
			mail varchar(55) NOT NULL,
			subject varchar(50) NOT NULL,
			description varchar(500) NOT NULL,
			PRIMARY KEY (id)
		)";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		
		dbDelta( $sql );

	}

	function jal_install_data() {
		global $wpdb;
		
		$welcome_name = 'Test';
		$welcome_mail = 'test@sula.com';
		$welcome_subiect = 'Test Subiect';
		$welcome_description = 'Congratulations, you just completed the installation!';
		
		$table_name = $wpdb->prefix . 'contact_db';
		
		$wpdb->insert( 
			$table_name, 
			array(  
				'name' 			=> $welcome_name,
				'mail' 			=> $welcome_mail,
				'subject' 		=> $welcome_subiect, 
				'description' 	=> $welcome_description, 
			) 
		);
	}
	add_action('after_switch_theme', 'jal_install');
	add_action('after_switch_theme', 'jal_install_data');
	//register_activation_hook( __FILE__, 'jal_install' );
	//register_activation_hook( __FILE__, 'jal_install_data' );
?>