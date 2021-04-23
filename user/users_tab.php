<div class="wrap">
    <a class="button" style="display:block;width: 120px;" href="https://wp-mahdi.com/wordpress/wp-admin/user-new.php">افزودن کاربر جدید</a><br>
        <h2 class="nav-tab-wrapper">
        <?php foreach ($tabs as $name => $title): ?>
            <?php $class = ( $name == $currentTab ) ? ' nav-tab-active' : ''; ?>
            <a class='nav-tab<?php echo $class; ?>' href='?page=all-users&tab=<?php echo $name; ?>'><?php echo $title; ?></a>
        <?php endforeach; ?>
        <?php 

            switch ($currentTab) {
                case "ConfirmedUsers":
                include  WPS_USE."/ConfirmedUsers.php";
                break;
                case "UsersAreWaiting":
                include  WPS_USE."/UsersAreWaiting.php";
                break;
                case "notConfirmedUsers":
                include  WPS_USE."/notConfirmedUsers.php";
                break;
            }

        ?>
        </h2>
</div>