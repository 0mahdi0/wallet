<div class="wrap">
        <h2 class="nav-tab-wrapper">
        <?php foreach ($tabs as $name => $title): ?>
            <?php $class = ( $name == $currentTab ) ? ' nav-tab-active' : ''; ?>
            <a class='nav-tab<?php echo $class; ?>' href='?page=tikets&tab=<?php echo $name; ?>'><?php echo $title; ?></a>
        <?php endforeach; ?>
        <?php 
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            switch ($currentTab) {
                case "User-replay":
                include_once(WPO_DIR."backend/ticets/ticets/User_replay.php");
                break;
                case "Admin-replay":
                include_once(WPO_DIR."backend/ticets/ticets/Admin_replay.php");
                break;
                case "The-end":
                include_once(WPO_DIR."backend/ticets/ticets/The_end.php");
                break;
                case "Unknow-message":
                include_once(WPO_DIR."backend/ticets/ticets/Unknow_message.php");
                break;
                case "Send-new":
                include_once(WPO_DIR."backend/ticets/ticets/Send_new.php");
                break;
                case "admin-message":
                include_once(WPO_DIR."backend/ticets/ticets/admin_message.php");
                break;
            }

        ?>
        </h2>
</div>