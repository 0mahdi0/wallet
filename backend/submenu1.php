<?php

function wp_wallet_users_all_users(){

//Database calling
    global $wpdb;
//Making tabs
    $tabs = array(
        'ConfirmedUsers' => 'کاربران تایید شده',
        'UsersAreWaiting' => 'کاربران در حال انتظار',
        'notConfirmedUsers'   => 'کاربران تایید نشده'
    );
    $currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'ConfirmedUsers';
//varable for actions
$action = $_GET['action'];
$items  =  $_GET['item'] ;
$href = $_POST['select_action'];
$select_chs = $_POST['select_ch'];
$select_ch  = intval($select_chs);
$item = intval($items);
//multi action 
if (!empty($_POST['submit'])) {

    //for loop for multi select users
    for ( $i = 0; $i < count( $select_chs ); $i++ ) {

        if($href == 'approved'){
            if($select_ch > 0){
        
               $wpdb->update( $wpdb->users,
               [
                   'user_status' => 1
               ],
               [
                   'ID' => $select_chs[$i]
               ],
               [
                   '%d'
               ]
            );
            }
        }
        if($href == 'no_approved'){
        //multi action not approved user
            if($select_ch > 0){
        
               $wpdb->update( $wpdb->users,
               [
                   'user_status' => 2
               ],
               [
                   'ID' => $select_chs[$i]
               ],
               [
                   '%d'
               ]
            );
            }
        }
        //multi action delete user
        if($href == 'trash'){
            if($select_ch > 0){

                wp_delete_user($select_chs[$i]);
        
            }
        }

}
}


//deleting action
if($action == 'trash'){
    if($item > 0){
//delete user
    wp_delete_user($items);

    }
}  
//not approved action
if($action == 'no_approved'){
    if($item > 0){

       $wpdb->update( $wpdb->users,
       [
           'user_status' => 2
       ],
       [
           'ID' => $items
       ],
       [
           '%d'
       ]
    );
    }
} 
//approved action
if($action == 'approved'){
    if($item > 0){

       $wpdb->update( $wpdb->users,
       [
           'user_status' => 1
       ],
       [
           'ID' => $items
       ],
       [
           '%d'
       ]
    );
    }
}
//Select wp_users Table 
    $users = $wpdb->get_results("SELECT * FROM {$wpdb->users} ORDER BY ID");
//include themeplate
    include_once  WPS_USE."/users_tab.php";
}