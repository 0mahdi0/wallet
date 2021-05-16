<?php
function wp_wallet_users_tikets(){
    
    global $wpdb;
    
    //Making tabs
    $tabs = array(
        'User-replay'    => 'پاسخ مشتری',
        'Admin-replay'   => 'پاسخ پشتیبان',
        'The-end'        => 'بسته شده',
        'admin-message'  => 'پیام ادمین',
        'Unknow-message' => 'پیام ناشناس',
        'Send-new'       => 'ارسال پیام'
    );
    $currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'User-replay';


    if ( isset($_POST['submit_new'])) {
        if (isset($_POST['user_login']) && isset($_POST['subject']) && isset($_POST['user_message']) ) {

            $user_login = $_POST['user_login'];
            $subject    = $_POST['subject'];
            $message    = $_POST['user_message'];

            $user = get_user_by('login' , $user_login );

            $success = $wpdb->insert($wpdb->prefix.'wu_tikets',
                [
                    'user_id'        => $user->ID,
                    'subject'        => $subject,
                    'text'           => $message,
                    'status'         => 4
                ],
                [
                    '%d',
                    '%s',
                    '%s',
                    '%d'
                ]
                );
            if ($success != false) {
                ?>
                <div class="notice notice-success is-dismissible"> 
                <p><strong>ارسال شد</strong></p>
                </div>
                <?php
            }else{
                ?>
                <div class="notice notice-error is-dismissible"> 
                <p><strong>ارسال نشد</strong></p>
                </div>
                <?php
            }
        }
    }
        //mulit action 
        if (!empty($_POST['submit'])) {

            //varable for actions
            $items  =  $_GET['item'] ;
            $href = $_POST['select_action'];
            $select_chs = $_POST['select_ch'];
            $select_ch  = intval($select_chs);
    
            //for loop for multi select users
            for ( $i = 0; $i < count( $select_chs ); $i++ ) {

                //multi action delete data
                if($href == 'trash'){
                    if($select_ch > 0){
                        $success = $wpdb->delete($wpdb->prefix.'wu_tikets',['id' => $items]);
                        if ($success != false) {
                            ?>
                            <div class="notice notice-success is-dismissible"> 
                            <p><strong>حذف شد</strong></p>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="notice notice-error is-dismissible"> 
                            <p><strong>حذف نشد</strong></p>
                            </div>
                            <?php
                        }               
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
                //delete data
                $success = $wpdb->delete($wpdb->prefix.'wu_tikets',['id' => $items]);
                if ($success != false) {
                    ?>
                    <div class="notice notice-success is-dismissible"> 
                    <p><strong>حذف شد</strong></p>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="notice notice-error is-dismissible"> 
                    <p><strong>حذف نشد</strong></p>
                    </div>
                    <?php
                } 
                }
            }
        }
        
        if (isset($_POST['submit_rep'])) {
            if (isset($_POST['user_message'])) {

                $message  = $_POST['user_message'];
                $tiket_id = $_GET['item'];
                $success1 = $wpdb->insert($wpdb->prefix.'wu_tikets_replay',
                    [
                        'tiket_id' => $tiket_id,
                        'is_user'  => 1 ,
                        'text'     => $message
                    ],
                    [
                        '%d',
                        '%d',
                        '%s'
                    ]
                    );

                    $success2 = $wpdb->update($wpdb->prefix.'wu_tikets',['status' => 1],['id' => $tiket_id],['%d']); 

                if ($success1 != false && $success2 != false ) {
                    ?>
                    <div class="notice notice-success is-dismissible"> 
                    <p><strong>ارسال شد</strong></p>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="notice notice-error is-dismissible"> 
                    <p><strong>ارسال نشد</strong></p>
                    </div>
                    <?php
                }
            }
        }

        $wu_tikets = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wu_tikets");
        $wu_tiket_replay = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wu_tikets_replay");
        $users = $wpdb->get_results("SELECT * FROM {$wpdb->users} ");

    //include themeplate
    include_once  WPS_TIK."/tikets_tab.php";
}