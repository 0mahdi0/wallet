<?php 
function user_account(){

    global $wpdb;

    if ( isset($_POST['submit'])) {
        if (isset($_POST['subject']) && isset($_POST['user_message']) ) {

            $subject    = $_POST['subject'];
            $message    = $_POST['user_message'];

            $success = $wpdb->insert($wpdb->prefix.'wu_tikets',
                [
                    'user_id'        => get_current_user_id(),
                    'subject'        => $subject,
                    'text'           => $message,
                    'status'         => 5
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
                <p><strong>ارسال شد</strong></p>
                    <script>
                
                    demo();
                
                    function demo()
                    {
                        window.location.href="/wordpress/2021/05/05/account/";
                    }
                
                    </script>
 
                <?php
            }else{
                ?>
                <p><strong>ارسال نشد</strong></p>
                <?php
            }
        }
    }
    
        if ( isset($_GET['logout'])) {
            wp_logout();
            ?>
            <script>

            demo();

            function demo()
            {
                window.location.href="/wordpress/";
            }

            </script>

        <?php 
        }
        if (isset($_POST['tiket_end'])) {
            $tiket_id = $_GET['show'];
            $success_end = $wpdb->update($wpdb->prefix.'wu_tikets',['status' => 2],['id' => $tiket_id],['%d']);
        }
        if (isset($_POST['submit_rep'])) {
            if (isset($_POST['user_message'])) {

                $message  = $_POST['user_message'];
                $tiket_id = $_GET['item'];
                $success1 = $wpdb->insert($wpdb->prefix.'wu_tikets_replay',
                    [
                        'tiket_id' => $tiket_id,
                        'text'     => $message
                    ],
                    [
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

    include WPS_REG."/myaccount.php";

}

add_shortcode('wu_user_account','user_account');