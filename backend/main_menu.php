<?php

function wp_users_price(){

    add_menu_page('کیف پول','کیف پول','manage_options','wallet-users','wp_wallet_users','dashicons-awards');
    add_submenu_page('wallet-users','کاربران','کاربران','manage_options','all-users','wp_wallet_users_all_users');
    add_submenu_page('wallet-users','تیکت کاربران','تیکت','manage_options','tikets','wp_wallet_users_tikets');

}

function wp_wallet_users(){

    


}

function style_users_price(){

    wp_register_script('wp_apis_scripts_users_price', WPS_JS.'/wp_apis_scripts_users_price.js' , array ('jquery'));
    wp_register_style('wp_apis_style_sheet', WPS_CSS.'/wp_apis_style_sheet.css');
    wp_enqueue_style('wp_apis_style_sheet');

}

add_action('admin_enqueue_scripts','style_users_price');
add_action('admin_menu','wp_users_price');