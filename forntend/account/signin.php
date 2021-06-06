<?php

    global $wpdb;

    if ( isset($_POST['submit'])) {
        if (isset($_POST['subject']) && isset($_POST['user_message']) ) {

            $subject    = $_POST['subject'];
            $message    = $_POST['user_message'];

            $success = $wpdb->insert($wpdb->prefix.'wu_tikets',
                [
                    'user_id'        => 0,
                    'subject'        => $subject,
                    'text'           => $message,
                    'status'         => 3
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
                
                    setTimeout(function(){
                            window.location.href;
                        },2000)
                        
                    </script>
 
                <?php
            }else{
                ?>
                <p><strong>ارسال نشد</strong></p>
                <?php
            }
        }
    }
    include(WPO_DIR."forntend/account/theme/login.php");