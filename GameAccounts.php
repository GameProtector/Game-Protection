<?php
	/*
Plugin Name:  GPs Game Accounts
Plugin URI: http://notavailable.com
Description: Dieses Plugin läst Game Protect nach Gameaccounts durchsuchen
Version: 1.0
Author: GetType
Author URI: http://gettype.com
License: private
*/
	// Add menu item for draft posts
	function add_admin_menu_item_gameaccounts() {
		add_menu_page( "Gameaccounts", "Gameaccounts", "manage_options", "gameaccounts", 'plugin_info_GameAccounts', '', 1 );
		add_submenu_page( "gameaccounts", "List GameAccounts", "List Gameaccounts", "manage_options", "listgameaccounts", 'list_gameaccounts');
	}
	add_action('admin_menu', 'add_admin_menu_item_gameaccounts');
	register_activation_hook( __FILE__, 'jal_install_gameaccounts' );
	add_shortcode('Show_GameAccounts', 'GetUserGameAccounts');
	
	function GetUserGameAccounts()
	{
		
	}
	function jal_install_gameaccounts() {
	}
	
	function plugin_info_GameAccounts()
	{
		echo "Plugin was coded for Seeker!";
	}
	
	function list_gameaccounts()
	{
		include dirname(__FILE__) . '/includes/ListGameAccounts.php';
	}
?>