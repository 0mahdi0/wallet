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
                include  WPS_TIK."/User_replay.php";
                break;
                case "Admin-replay":
                include  WPS_TIK."/Admin_replay.php";
                break;
                case "The-end":
                include  WPS_TIK."/The_end.php";
                break;
                case "Unknow-message":
                include  WPS_TIK."/Unknow_message.php";
                break;
                case "Send-new":
                include  WPS_TIK."/Send_new.php";
                break;
                case "admin-message":
                include  WPS_TIK."/admin_message.php";
                break;
            }

        ?>
        </h2>
</div>