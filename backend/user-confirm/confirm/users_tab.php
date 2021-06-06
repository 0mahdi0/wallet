<div class="wrap">
    <a class="button" style="display:block;width: 120px;" href=<?php $actual_link ; ?>"/wp-admin/user-new.php">افزودن کاربر جدید</a><br>
        <h2 class="nav-tab-wrapper">
        <?php foreach ($tabs as $name => $title): ?>
            <?php $class = ( $name == $currentTab ) ? ' nav-tab-active' : ''; ?>
            <a class='nav-tab<?php echo $class; ?>' href='?page=all-users&tab=<?php echo $name; ?>'><?php echo $title; ?></a>
        <?php endforeach; ?>
        <?php 
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            switch ($currentTab) {
                case "ConfirmedUsers":
                include_once(WPO_DIR."backend/user-confirm/confirm/ConfirmedUsers.php");
                break;
                case "UsersAreWaiting":
                include_once(WPO_DIR."backend/user-confirm/confirm/UsersAreWaiting.php");
                break;
                case "notConfirmedUsers":
                include_once(WPO_DIR."backend/user-confirm/confirm/notConfirmedUsers.php");
                break;
            }

        ?>
        </h2>
</div>