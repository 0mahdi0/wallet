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
    define("WPS_INC",WPS_DIR.'inc');
    define("WPS_TMP",WPS_DIR.'tmp');
    
    define("WPS_URL",trailingslashit(plugin_dir_url(__FILE__)));
    define("WPS_CSS",WPS_URL.'assets/css');
    define("WPS_JS" ,WPS_URL.'assets/js');
    define("WPS_IMA",WPS_URL.'assets/images');

    

    if (is_admin()){
        include WPS_INC."/backend.php";
    }
    else{
        include WPS_INC."/forntend.php";
    }
function test_contact_form()
{      
  global $wpdb; 
  $db_table_name = $wpdb->prefix . 'wallet';  // table name
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $db_table_name (
                id int(11) NOT NULL auto_increment,
                user_id varchar(50) NOT NULL,
                user_accepted bigint(200) NOT NULL,
                mobileno varchar(10) NOT NULL,
                message varchar(1000) NOT NULL,
                UNIQUE KEY id (id)
        ) $charset_collate;";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
   add_option( 'test_db_version', $test_db_version );
} 

register_activation_hook( __FILE__, 'test_contact_form' );
