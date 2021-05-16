<?php
     
     global $wpdb; 

     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
     
     $table_name1 = $wpdb->prefix . "wallet_users";
     $table_name2 = $wpdb->prefix . "update_wu";
     $table_name3 = $wpdb->prefix . "wu_tikets";
     $table_name4 = $wpdb->prefix . "wu_tikets_replay";
     $charset_collate = $wpdb->get_charset_collate();
     
     if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name1}'") != $table_name1 ) {
     
         $sql = "CREATE TABLE $table_name1 (
                 `id` bigint(11) NOT NULL AUTO_INCREMENT,
                 `user_id` bigint(11) NOT NULL,
                 `type` int(2) NOT NULL,
                 `amount` bigint(15) NOT NULL,
                 `status` int(11) NOT NULL DEFAULT 1,
                 `image_url` text NOT NULL,
                 `date` date NOT NULL DEFAULT current_timestamp(),
                 PRIMARY KEY (`id`)
         ) $charset_collate;";
     
         dbDelta($sql);
     }
     if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name2}'") != $table_name2 ) {
     
         $sql = "CREATE TABLE $table_name2 (
                 `id` bigint(20) NOT NULL AUTO_INCREMENT,
                 `user_id` bigint(20) NOT NULL,
                 `image_url` text DEFAULT NULL,
                 `date` date DEFAULT NULL,
                 PRIMARY KEY (`id`)
         ) $charset_collate;";
     
         dbDelta($sql);
     }
     if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name3}'") != $table_name3 ) {
     
         $sql1 = "CREATE TABLE $table_name3 (
                 `id` bigint(11) NOT NULL AUTO_INCREMENT,
                 `user_id` bigint(11) NOT NULL,
                 `subject` varchar(255) NOT NULL,
                 `text` text NOT NULL,
                 `status` bigint(2) NOT NULL,
                 `start_datetime` datetime NOT NULL DEFAULT current_timestamp(),
                 PRIMARY KEY (`id`)
         ) $charset_collate;";
     
         dbDelta($sql1);
     }
     if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name4}'") != $table_name4 ) {
     
         $sql1 = "CREATE TABLE $table_name4 (
                 `id` bigint(11) NOT NULL AUTO_INCREMENT,
                 `tiket_id` bigint(11) NOT NULL,
                 `text` text NOT NULL,
                 `is_user` int(2) DEFAULT NULL,
                 PRIMARY KEY (`id`)
         ) $charset_collate;";
     
         dbDelta($sql1);
     }