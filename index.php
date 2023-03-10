<?php
/**
 * Plugin Name: #App Version Plugin
 * Plugin URI: https://haysky.com/
 * Description: This plugin code is generated by Haysky Code Generator.
 * Version: 1.0.0
 * Author: Haysky
 * Author URI: https://haysky.com/
 * License: GPLv2 or later
  */
// $wpdb->show_errors(); $wpdb->print_error();
error_reporting(E_ERROR | E_PARSE);

add_action('admin_menu' , function(){
    add_menu_page('App Options','App Options','manage_options', 'app_options_admin', 'app_options_ulk', 'dashicons-admin-users','2');
});

function app_options_ulk(){ include 'settings.php'; }

function rest_api_app_version( WP_REST_Request $request ) {
    global $wpdb;
    if($request["field"]=='app_version'){
        $result["app_version"] = get_option('app_version');
    }
    echo json_encode($result,JSON_PRETTY_PRINT);
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'app_api/v1', '/app', array(
        'methods' => 'GET',
        'callback' => 'rest_api_app_version'));
});