<?php
/*
Plugin Name: wallet
Plugin URI: https://wp-mahdi.com/wordpress
Description: افزونه کیف پول و تیکت . شرتکد های صفحات account : [wu_account] , register : [wu_register] , login : [wu_login]
Author: hosseini
Version: 1.1.0
Author URI: https://wp-mahdi.com/wordpress
*/

class wallet{

    public function __construct(){
        defined( 'ABSPATH' ) || exit('tsss');
        $this->define();
        $this->main_wallet();
        $this->includes();
    }

    public function define(){
        define("WPO_DIR",trailingslashit(plugin_dir_path(__FILE__)));
        define("WPO_URL",trailingslashit(plugin_dir_url(__FILE__)));
    }

    public function main_wallet(){
        register_activation_hook(__FILE__,[$this,'active']);
        register_deactivation_hook(__FILE__,[$this,'deactive']);
        add_action( 'wp_enqueue_scripts', [$this,'reigester_assets'] );
        add_action( 'admin_enqueue_scripts', [$this,'reigester_assets'] );

    }

    public function active(){
        include("installer.php");
    }

    public function deactive(){}

    public function reigester_assets(){
        if (is_admin()){
        wp_register_style('backend-style', WPO_URL.'assets/css/backend-style.css');
        wp_enqueue_style('backend-style');
        wp_register_script('backend-script', WPO_URL.'assets/js/backend-script.js',array('jquery'));
        wp_enqueue_script('backend-script');
        }
        wp_register_style('forntend-style', WPO_URL.'assets/css/forntend-style.css');
        wp_enqueue_style('forntend-style');
        wp_register_script('forntend-script', WPO_URL.'assets/js/forntend-script.js',array('jquery'));
        wp_enqueue_script('forntend-script');
    }

    public function includes(){
        if (is_admin()){
            include(WPO_DIR."backend/main-backend.class.php");
        }
        include(WPO_DIR."forntend/main-forntend.class.php");
    }

}
new wallet;