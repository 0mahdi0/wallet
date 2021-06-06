<?php
class admin_menu extends wallet{

    public function __construct(){
        add_action('admin_menu',[$this,'menu']);
    }

    public function menu(){
        add_menu_page('کیف پول','کیف پول','manage_options','wallet-users',[$this,'wallet_users'],'dashicons-awards');
        add_submenu_page('wallet-users','داشبورد','داشبورد','manage_options','wallet-users',[$this,'wallet_users']);
        add_submenu_page('wallet-users','تایید کاربران','تایید کاربران','manage_options','all-users',[$this,'all_users']);
        add_submenu_page('wallet-users','تیکت کاربران','تیکت','manage_options','tikets',[$this,'users_ticets']);
    }

    public function wallet_users(){
        if (is_admin()){
            wp_enqueue_script('backend-script');
            wp_enqueue_style('backend-style');
            include(WPO_DIR."backend/wallet-users/wallet-users.php");
        }
    }

    public function all_users(){
        if (is_admin()){
            wp_enqueue_script('backend-script');
            wp_enqueue_style('backend-style');
            include(WPO_DIR."backend/user-confirm/all-users.php");
        }
    }

    public function users_ticets(){
        if (is_admin()){
            wp_enqueue_script('backend-script');
            wp_enqueue_style('backend-style');
            include(WPO_DIR."backend/ticets/ticets.php");
        }
    }

}
new admin_menu;