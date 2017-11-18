<?php 
/*
Plugin Name: Vietmcn+
Plugin URI: 
Description: Tập hợp các add-on mở rộng dành cho Wordpress
Author URI: https://vietmcn.com/tags/wordpress
Version: 1.0
Text Domain: vietmcn-plugins
License: GPL v3
*/
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if ( ! defined( 'VIETMCN_FILE' ) ) {
	define( 'VIETMCN_FILE', __FILE__ );
}

// Load the Vietmcn Plugins
require_once dirname( VIETMCN_FILE ) . '/vietmcn-main.php';