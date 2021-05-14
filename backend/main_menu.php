<?php

function wp_wallet_users(){

       //Database calling
       global $wpdb;
       //Making tabs
       $tabs = array(
           'ConfirmedW'  => 'کیف پول تایید شده',
           'NConfirmedW' => 'کیف پول تایید نشده',
           'UPdateRE'    => 'بروزرسانی مهلت معرفی'
       );
       $currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'ConfirmedW';
       if (isset($_POST['submit_add_amountm'])) {
        $add_amount = $wpdb->update( $wpdb->prefix.'wallet_users',
                        [
                            'amount' => $_POST['add_amountm']
                        ],
                        [
                            'id' => $_POST['id_add_amountm']
                        ],
                        [
                            '%d'
                        ]
                        );
 
        if ( false == $add_amount ) {
            ?>
            <div class="notice notice-error is-dismissible"> 
            <p><strong>جایگزین نشد</strong></p>
            </div>
            <?php
        } else {
            ?>
            <div class="notice notice-success is-dismissible"> 
            <p><strong>جایگزین شد</strong></p>
            </div>
            <?php        }
       }

       if (isset($_POST['submit_add_amounts'])) {
        $add_amount = $wpdb->update( $wpdb->prefix.'wallet_users',
                        [
                            'amount' => $_POST['add_amounts']
                        ],
                        [
                            'id' => $_POST['id_add_amounts']
                        ],
                        [
                            '%d'
                        ]
                        );
 
        if ( false === $add_amount ) {
            ?>
            <div class="notice notice-error is-dismissible"> 
            <p><strong>جایگزین نشد</strong></p>
            </div>
            <?php
        } else {
            ?>
            <div class="notice notice-success is-dismissible"> 
            <p><strong>جایگزین شد</strong></p>
            </div>
            <?php        }
       }
       if (isset($_POST['submit_nconf'])) {
        $add_amount = $wpdb->update( $wpdb->prefix.'wallet_users',
                        [
                            'status' => 1
                        ],
                        [
                            'id' => $_POST['nconf_id']
                        ],
                        [
                            '%d'
                        ]
                        );
 
        if ( false === $add_amount ) {
            ?>
            <div class="notice notice-error is-dismissible"> 
            <p><strong>لغو نشد</strong></p>
            </div>
            <?php
        } else {
            ?>
            <div class="notice notice-success is-dismissible"> 
            <p><strong>لغو شد</strong></p>
            </div>
            <?php        }
       }

       if (isset($_POST['submit_conf'])) {
        $add_conf = $wpdb->update( $wpdb->prefix.'wallet_users',
                        [
                            'status' => 2
                        ],
                        [
                            'id' => $_POST['conf_id']
                        ],
                        [
                            '%d'
                        ]
                        );
 
        if ( false === $add_conf ) {
            ?>
            <div class="notice notice-error is-dismissible"> 
            <p><strong>تایید نشد</strong></p>
            </div>
            <?php
        } else {
            ?>
            <div class="notice notice-success is-dismissible"> 
            <p><strong>تایید شد</strong></p>
            </div>
            <?php        }
       }

       if (isset($_POST['submit_Trash'])) {
        $trash = $wpdb->delete( $wpdb->prefix.'wallet_users',['id' => $_POST['Trash_id']]);
        if ( false === $trash ) {
            ?>
            <div class="notice notice-error is-dismissible"> 
            <p><strong>حذف نشد</strong></p>
            </div>
            <?php
        } else {
            ?>
            <div class="notice notice-success is-dismissible"> 
            <p><strong>حذف شد</strong></p>
            </div>
            <?php        }
       }
       if (isset($_POST['submit_redate']) && isset($_POST['redate_id'])) {
        $redate = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}update_wu WHERE id =".$_POST['redate_id']);
        $wallet_id = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}wallet_users WHERE type = 1 AND user_id =".$redate->user_id);

        $REdate_update = $wpdb->update( $wpdb->prefix.'wallet_users',
                        [
                            'date' => $redate->date
                        ],
                        [
                            'id' => $wallet_id->id
                        ],
                        [
                            '%s'
                        ]
                        );
                        if ( false != $REdate_update ) {
                            $trashs = $wpdb->delete( $wpdb->prefix.'update_wu',['id' => $redate->id]);
                            if ( false === $trashs ) {
                                ?>
                                <div class="notice notice-error is-dismissible"> 
                                <p><strong>تایید نشد</strong></p>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="notice notice-success is-dismissible"> 
                                <p><strong>تایید شد</strong></p>
                                </div>
                                <?php        }
                        }
        }
        if (isset($_POST['submit_trash_redate'])) {
            $trashs = $wpdb->delete( $wpdb->prefix.'update_wu',['id' => $_POST['redate_id']]);
            if ( false === $trashs ) {
                ?>
                <div class="notice notice-error is-dismissible"> 
                <p><strong>تایید نشد</strong></p>
                </div>
                <?php
            } else {
                ?>
                <div class="notice notice-success is-dismissible"> 
                <p><strong>تایید شد</strong></p>
                </div>
                <?php        }
        }
       
       //Select wp_users Table 
       $users     = $wpdb->get_results("SELECT * FROM {$wpdb->users} ");
       $wallet_u  = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wallet_users");
       $update_re = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}update_wu");
       include  WPS_UWA."/wallet_tab.php";
}