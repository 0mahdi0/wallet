<?php

function wp_users_price(){

    add_menu_page('شماره پرداخت','شماره پرداخت','manage_options','users-price','wp_users_price_and_name','dashicons-dashboard',25);
    add_submenu_page('users-price','افزودن شماره پرداخت','افزودن','manage_options','add-users-price','Add_New_User_price');

}

function Add_New_User_price(){

    global $wpdb;
    $user = get_user_by( 'login', $_POST['user_login'] );
    $users_id = $user->id ;
    if (isset($_POST['submit'])) {

        //upload image to dir
        function handle_logo_upload(){

            require_once(ABSPATH.'wp-admin/includes/file.php');
            $uploadedfile = $_FILES['file'];
            
            $movefile = wp_handle_upload($uploadedfile, array('test_form' => false)); 
            
                    $image_url = $movefile['url'];
                    return $image_url;
            }
            $Image_url = handle_logo_upload($image_url);
            $wpdb->insert($wpdb->prefix.'user_price',
        [
            'user_id'     => $users_id ,
            'price_number'=> $_POST['number'],
            'date'        => $_POST['date_U_P'],
            'image_url'   => $Image_url
        ],
        [
            '%s',
            '%s',
            '%s',
            '%s'
        ]
        );
    }

    $users_price = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}user_price ORDER BY id DESC");
    $users = $wpdb->get_results("SELECT id , user_login FROM {$wpdb->users} ORDER BY id ASC");
    include WPS_TMP."/AddNew.php";
}

function wp_users_price_and_name(){

    global $wpdb;

    $action = $_GET['action'];
    $user = get_user_by( 'login', $_POST['user_login'] );
    $users_id = $user->id ;
    //Add New Number Price
    if ($action == 'add_new') {

        if (isset($_POST['submit'])) {

            function handle_logo_upload(){

                require_once(ABSPATH.'wp-admin/includes/file.php');
                $uploadedfile = $_FILES['file'];
                
                $movefile = wp_handle_upload($uploadedfile, array('test_form' => false)); 
                
                        $image_url = $movefile['url'];
                        return $image_url;
                }
                $Image_url = handle_logo_upload($image_url);
                $wpdb->insert($wpdb->prefix.'user_price',
            [
                'user_id'     => $users_id ,
                'price_number'=> $_POST['number'],
                'date'        => $_POST['date_U_P'],
                'image_url'   => $Image_url
            ],
            [
                '%s',
                '%s',
                '%s',
                '%s'
            ]
            );
        }

        $users_price = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}user_price ORDER BY id DESC");
        $users = $wpdb->get_results("SELECT id , user_login FROM {$wpdb->users} ORDER BY id ASC");
        include WPS_TMP."/AddNew.php";
    }
    //first page in menu trash and edit
    else{
        if($action == 'trash'){

            $item = intval($_GET['item']);
            if($item > 0){
            //delete data in home page
            $wpdb->delete($wpdb->prefix.'user_price',['id'=> $item]);
            }
        }  
    if(isset($_POST['Savedata']) && $action == 'edit'){
        $item = intval($_GET['item']);
        if($item > 0){
        $wpdb->update($wpdb->prefix.'user_price',
        [
            'user_id'     => $users_id ,
            'price_number'=> $_POST['number'],
            'date'        => $_POST['date_U_P'],
        ],
        [
            'id'          => $_GET['item'] 
        ],
        [
            '%s',
            '%s',
            '%s'
        ]
        );
    }
    }
    $users_price = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}user_price ORDER BY id DESC");

    $users = $wpdb->get_results("SELECT id , user_login FROM {$wpdb->users} ORDER BY id ASC");

    include WPS_TMP."/UserPriceNumber.php";
}
}

add_action('admin_menu','wp_users_price');

function style_users_price(){

    wp_register_script('wp_apis_scripts_users_price', WPS_JS.'/wp_apis_scripts_users_price.js' , array ('jquery'));
    wp_register_style('wp_apis_style_sheet', WPS_CSS.'/wp_apis_style_sheet.css');
    wp_enqueue_style('wp_apis_style_sheet');

}

add_action('admin_enqueue_scripts','style_users_price');