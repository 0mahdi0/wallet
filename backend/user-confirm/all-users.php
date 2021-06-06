<?php

    //Database calling
    global $wpdb;
    //Making tabs
    $tabs = array(
        'ConfirmedUsers' => 'کاربران تایید شده',
        'UsersAreWaiting' => 'کاربران در حال انتظار',
        'notConfirmedUsers'   => 'کاربران لغو شده'
    );
    $currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'ConfirmedUsers';

    //mulit action 
    if (!empty($_POST['submit'])) {

        //varable for actions
        $items  =  $_GET['item'] ;
        $href = $_POST['select_action'];
        $select_chs = $_POST['select_ch'];
        $select_ch  = intval($select_chs);
        $item = intval($items);

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

    if(isset($_GET['action'])){

        $action = $_GET['action'];

    //deleting action
    if($action == 'trash'){

        //varable for actions
        $items  =  $_GET['item'] ;
        $item = intval($items);

        if($item > 0){
        //delete user
        wp_delete_user($items);

        }
    }
    //not approved action
    if($action == 'no_approved'){

        //varable for actions
        $items  =  $_GET['item'] ;
        $item = intval($items);

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

        //varable for actions
        $items  =  $_GET['item'] ;
        $item = intval($items);        
        
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
    }
    //Select wp_users Table 
        $users = $wpdb->get_results("SELECT * FROM {$wpdb->users} ORDER BY ID");
    //include themeplate
        include_once(WPO_DIR."backend/user-confirm/confirm/users_tab.php");