<?php
	/*
Plugin Name: GPs Affiliate System
Plugin URI: http://notavailable.com
Description: Dieses Plugin erweitert Wordpress um ein Affilliatesystem
Version: 1.0
Author: GetType
Author URI: http://gettype.com
License: private
*/
	// Add menu item for draft posts
	function add_admin_menu_item() {
		add_menu_page( "Affiliates", "Affiliates", "manage_options", "affiliates", 'plugin_info', '', 1 );
		add_submenu_page( "affiliates", "List affilliates", "List Affilliates", "manage_options", "listaffiliates", 'list_affilliates');
		add_submenu_page( "affiliates", "Add affilliate", "Add Affilliates", "manage_options", "AddAffiliates",  'add_affilliate');
	}
	add_action('admin_menu', 'add_admin_menu_item');
	register_activation_hook( __FILE__, 'jal_install' );
	add_shortcode('Show_Affiliates', 'GetUserAffiliates');
	include(__DIR__ . "\includes\ListAffiliatesForUsers.php");
	
	function GetUserAffiliates()
	{
		return GetAffiliates();
	}
	
	function jal_install() {
		global $wpdb;
		global $jal_db_version;

		$table_name = 'aFFILIATES';
		
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE `affiliates` (
		 `ID` int(11) NOT NULL AUTO_INCREMENT,
		 `Image` text NOT NULL,
		 `Rakeback` text NOT NULL,
		 `DetailsID` int(11) NOT NULL,
		 `Register_ID` int(11) NOT NULL,
		 `US` bit(1) NOT NULL,
		 `Companyname` text NOT NULL,
		 PRIMARY KEY (`ID`)
		) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1";
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
		$sql2 = "CREATE TABLE `affiliate_tablevalues` (
		 `ID` int(11) NOT NULL AUTO_INCREMENT,
		 `Key` text NOT NULL,
		 `Value` text NOT NULL,
		 `AffiliateID` int(11) NOT NULL,
		 PRIMARY KEY (`ID`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		dbDelta( $sql2 );
		
		$sql3 = "	CREATE TABLE `affiliate_tablevalues` (
		 `ID` int(11) NOT NULL AUTO_INCREMENT,
		 `Key` text NOT NULL,
		 `Value` text NOT NULL,
		 `AffiliateID` int(11) NOT NULL,
		 PRIMARY KEY (`ID`)
		) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8";
		dbDelta( $sql3 );

		add_option( 'jal_db_version', $jal_db_version );
	}
	
	function plugin_info()
	{
		echo "Plugin was coded for Seeker!";
	}
	
	function list_affilliates()
	{
		include dirname(__FILE__) . '/includes/ListAffiliates.php';
	}
	
	function add_affilliate()
	{
		include dirname(__FILE__) . '/includes/AddAffiliates.php';
	}
?>