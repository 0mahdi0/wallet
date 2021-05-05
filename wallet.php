<?php
/*
Plugin Name: wllet
Plugin URI: https://wp-mahdi.com/wordpress
Description: 
Author: hosseini
Version: 1.0.0
Author URI: https://wp-mahdi.com/wordpress
*/

    defined( 'ABSPATH' ) || exit;
    //define directory and url in plugin
    define("WPS_DIR",trailingslashit(plugin_dir_path(__FILE__)));
    define("WPS_BAK",WPS_DIR.'backend');
    define("WPS_FOR",WPS_DIR.'forntend');
    define("WPS_REG",WPS_FOR.'/user_theme');
    define("WPS_USE",WPS_BAK.'/user');
    define("WPS_URL",trailingslashit(plugin_dir_url(__FILE__)));
    define("WPS_CSS",WPS_URL.'assets/css');
    define("WPS_JS" ,WPS_URL.'assets/js');
    define("WPS_IMA",WPS_URL.'assets/images');

    include WPS_FOR."/register.php";
    include WPS_FOR."/sign_in.php";

    
    //if is user admin include these dirctory
    if (is_admin()){
        include WPS_BAK."/main_menu.php";
        include WPS_BAK."/submenu1.php";
        include WPS_BAK."/submenu2.php";
    }
    else{
        include WPS_FOR."/account.php";
    }
    //add menu and submenu page
    function wp_users_price(){

        add_menu_page('کیف پول','کیف پول','manage_options','wallet-users','wp_wallet_users','dashicons-awards');
        add_submenu_page('wallet-users','تایید کاربران','تایید کاربران','manage_options','all-users','wp_wallet_users_all_users');
        add_submenu_page('wallet-users','تیکت کاربران','تیکت','manage_options','tikets','wp_wallet_users_tikets');
    
    }
    add_action('admin_menu','wp_users_price');
    //enqueue style and script in admin page
    function users_wallet(){

        wp_register_script('wp_apis_scripts_users', WPS_JS.'/wp_apis_scripts_users.js' , array ('jquery'));
        wp_register_style('wp_apis_style_sheet', WPS_CSS.'/wp_apis_style_sheet.css');
        wp_enqueue_style('wp_apis_style_sheet');
        wp_enqueue_script('wp_apis_scripts_users');


    }
    //enqueue style and script in all page
    function re_users_wallet(){

        wp_register_script('wp_apis_fornt', WPS_JS.'/wp_apis_fornt.js' , array ('jquery'));
        wp_register_style('wp_apis_fornt', WPS_CSS.'/wp_apis_fornt.css');

    }
    add_action('admin_enqueue_scripts','users_wallet');
    add_action('wp_enqueue_scripts','re_users_wallet');
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
