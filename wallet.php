<?php
/*
Plugin Name: wllet
Plugin URI: https://wp-mahdi.com/wordpress
Description: 
Author: hosseini
Version: 1.0.0
Author URI: https://wp-mahdi.com/wordpress
*/

    defined("ABSPATH") || exit("no access");

    define("WPS_DIR",trailingslashit(plugin_dir_path(__FILE__)));
    define("WPS_BAK",WPS_DIR.'backend');
    define("WPS_FOR",WPS_DIR.'forntend');
    define("WPS_TMP",WPS_DIR.'tmp');
    
    define("WPS_URL",trailingslashit(plugin_dir_url(__FILE__)));
    define("WPS_CSS",WPS_URL.'assets/css');
    define("WPS_JS" ,WPS_URL.'assets/js');
    define("WPS_IMA",WPS_URL.'assets/images');

    

    if (is_admin()){
        include WPS_BAK."/main_menu.php";
        include WPS_BAK."/submenu1.php";
        include WPS_BAK."/submenu2.php";
    }
    else{
        include WPS_FOR."/forntend.php";
    }
// function test_contact_form()
// {      
//   global $wpdb; 
//   $db_table_name = $wpdb->prefix . 'wallet_users';  // table name
//   $charset_collate = $wpdb->get_charset_collate();

//   $sql = "CREATE TABLE $db_table_name (
//                 ID INT NOT NULL AUTO_INCREMENT,
//                 users_id INT NOT NULL REFERENCES wp_users(ID),
//                 user_status VARCHAR(255) DEFAULT 'false',
//                 PRIMARY KEY(ID)
//         ) $charset_collate;";

//    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//    dbDelta( $sql );
//    add_option( 'test_db_version', $test_db_version );
// } 

// register_activation_hook( __FILE__, 'test_contact_form' );
