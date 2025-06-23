<?php

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
                $url = home_url()."/account"; 

                ?>
                    <div class="notice notice-success is-dismissible"> 
                    <p><strong>ارسال شد</strong></p>
                    </div>
                    <script>

                    demo();

                    function demo()
                    {
                        window.location.href="<?php echo $url; ?>";
                    }

                    </script>
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
                $tiket_id = $_GET['show'];
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
        if (isset($_POST['submit_add_wallet'])) {


                require_once(ABSPATH.'wp-admin/includes/file.php');
                $uploadedfile = $_FILES['file'];
                $movefile = wp_handle_upload($uploadedfile, array('test_form' => false)); 
                $image_url = $movefile['url'];

                $user_id = get_current_user_id();
                $wallet_user = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}wallet_users WHERE user_id = ".$user_id." AND type = 1");
                if ($wallet_user == null) {
                    $type = 1;
                }else{
                    $type = 2;
                }
                if ($user_id != 0 ) {
                    $success = $wpdb->insert($wpdb->prefix.'wallet_users',
                    [
                        'user_id'   => $user_id ,
                        'amount'    => $_POST['wallet_number'],
                        'type'      => $type,
                        'image_url' => $image_url
                    ],
                    [
                        '%d',
                        '%d',
                        '%d',
                        '%s'
                    ]
                    );
                    if ($success != false) {
                        ?>
                        <div class="notice notice-success is-dismissible"> 
                        <p><strong>ارسال شد . بعد از تایید مدیر قابل نمایش است</strong></p>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="notice notice-error is-dismissible"> 
                        <p><strong>ارسال نشد . در وقتی دیگر دوباره تلاش کنید</strong></p>
                        </div>
                        <?php
                    }
                }

        }
        if (isset($_POST['submit_add_wallet_mem'])) {
                $current_user = wp_get_current_user();
                $user = get_user_by( 'email', $_POST['sub_wallet_member'] );
                    if ($user  != false) {
                        if ($current_user->id != $user->id) {
                            $Auser_amount = $wpdb->get_results("SELECT SUM(amount) AS AMOUNTCOUNT FROM {$wpdb->prefix}wallet_users WHERE user_id = ".$user->id);
                            $Muser_amount = $wpdb->get_results("SELECT id AS WALLET_ID, sub_user_id AS ADDED_ID, amount AS AMOUNTCOUNT FROM {$wpdb->prefix}wallet_users WHERE `type` = 1 AND user_id = ".$current_user->id);
                            $muser_amount = $wpdb->get_results("SELECT id AS WALLET_ID, sub_user_id AS ADDED_ID, amount AS AMOUNTCOUNT FROM {$wpdb->prefix}wallet_users WHERE `type` = 2 AND user_id = ".$current_user->id);
                            $ADDED = explode(",",$Muser_amount[0]->ADDED_ID);
                            foreach($ADDED as $shear){
                                $new_shear = intval($shear);
                                if ($user->id == $new_shear) {
                                    $url = home_url()."/account"; 
                                    exit("<p><strong>این کاربر قبلا ثبت شده است</strong></p><script>demo();function demo(){setTimeout(function(){window.location.href=\"$url/#show_wallet\";},2000)}</script>                                    ");
                                }
                            }
                            if ($user->id == intval($ADDED[0])) {
                                    ?>
                                    <div class="notice notice-error is-dismissible"> 
                                    <p><strong>این کاربر قبلا ثبت شده است</strong></p>
                                    </div>
                                    <?php 
                                }else{

                                    if ($Auser_amount[0]->AMOUNTCOUNT != null && $Muser_amount[0]->AMOUNTCOUNT != null) {            
                                        $added_amountM = $Auser_amount[0]->AMOUNTCOUNT/10;
                                        $main_amount   = $Muser_amount[0]->AMOUNTCOUNT;
                                        $sum_amountM   = $main_amount+$added_amountM;
                                        $sub_user_idM  = $user->id.",".$Muser_amount[0]->ADDED_ID;

                                            if ($muser_amount[0]->AMOUNTCOUNT != null) {    
                                                $added_amountm = $Auser_amount[0]->AMOUNTCOUNT/20;
                                                $sub_amount   = $muser_amount[0]->AMOUNTCOUNT;
                                                $sum_amountm = $sub_amount+$added_amountm;
                                                $sub_user_idm = $user->id.",".$muser_amount[0]->ADDED_ID;

                                                    $wpdb->update( $wpdb->prefix.'wallet_users',
                                                    [
                                                        'amount'      => $sum_amountm,
                                                        'sub_user_id' => $sub_user_idm
                                                    ],
                                                    [
                                                        'id' => $muser_amount[0]->WALLET_ID
                                                    ],
                                                    [
                                                        '%d',
                                                        '%s'
                                                    ]
                                                    );

                                            }
                                            $add_amount = $wpdb->update( $wpdb->prefix.'wallet_users',
                                                            [
                                                                'amount'      => $sum_amountM,
                                                                'sub_user_id' => $sub_user_idM
                                                            ],
                                                            [
                                                                'id' => $Muser_amount[0]->WALLET_ID
                                                            ],
                                                            [
                                                                '%d',
                                                                '%s'
                                                            ]
                                                            );

                                            if ( false == $add_amount ) {
                                                ?>
                                                <div class="notice notice-error is-dismissible"> 
                                                <p><strong>ثبت نشد</strong></p>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="notice notice-success is-dismissible"> 
                                                <p><strong>ثبت شد</strong></p>
                                                </div>
                                                <?php }

                                    }else{
                                        ?>
                                        <div class="notice notice-error is-dismissible"> 
                                        <p><strong>این کاربر کیف پول ندارد</strong></p>
                                        </div>
                                        <?php  
                                    }

                                }
                            
                        }else{
                        ?>
                        <div class="notice notice-error is-dismissible"> 
                        <p><strong>لطفا از ایمیل خود استفاده نکنید!؟</strong></p>
                        </div>
                        <?php  
                        }
                    }else{
                        ?>
                        <div class="notice notice-error is-dismissible"> 
                        <p><strong>این کاربر وجود ندارد</strong></p>
                        </div>
                        <?php   
                    }
        }

        if ( isset($_POST['submit_redate_wallet'])) {
            if (isset($_FILES['file'])) {

                require_once(ABSPATH.'wp-admin/includes/file.php');
                $uploadedfile = $_FILES['file'];
                $movefile = wp_handle_upload($uploadedfile, array('test_form' => false)); 
                $image_url = $movefile['url'];

                $user_id = get_current_user_id();

                if ($user_id != 0 ) {
                    $success = $wpdb->insert($wpdb->prefix.'update_wu',
                    [
                        'user_id'   => $user_id ,
                        'image_url' => $image_url,
                        'date'      => date('Y-m-d')
                    ],
                    [
                        '%d',
                        '%s',
                        '%s'
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
    }
    if (isset($_POST['submit_add_amount'])) {

        require_once(ABSPATH.'wp-admin/includes/file.php');
        $uploadedfile = $_FILES['file'];
        $movefile = wp_handle_upload($uploadedfile, array('test_form' => false)); 
        $image_url = $movefile['url'];

        $wallet_id = $_GET['A-wallet'];
        $wallet = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}wallet_users WHERE id = ".$wallet_id);

        $added_amount = $_POST['wallet_number'];
        $last_amount  = $wallet->amount;
        $new_amount   = intval($last_amount)+intval($added_amount);
        $add_amount = $wpdb->update( $wpdb->prefix.'wallet_users',
        [
            'status'    => 1,
            'amount'    => $new_amount,
            'image_url' => $image_url
        ],
        [
            'id' => $wallet_id
        ],
        [
            '%d',
            '%d',
            '%s'
        ]
        );

        if ( false == $add_amount ) {
        ?>
        <div class="notice notice-error is-dismissible"> 
        <p><strong>ثبت نشد</strong></p>
        </div>
        <?php
        } else {
        ?>
        <div class="notice notice-success is-dismissible"> 
        <p><strong>ثبت شد</strong></p>
        </div>
        <?php }
    }


    $wu_tikets = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wu_tikets");
    $wu_tiket_replay = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wu_tikets_replay");
    $wallet_u = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wallet_users");


    include(WPO_DIR."frontend/account/theme/myaccount.php");
