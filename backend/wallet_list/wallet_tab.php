<div class="wrap">
        <h2 class="nav-tab-wrapper">
        <?php foreach ($tabs as $name => $title): ?>
            <?php $class = ( $name == $currentTab ) ? ' nav-tab-active' : ''; ?>
            <a class='nav-tab<?php echo $class; ?>' href='?page=wallet-users&tab=<?php echo $name; ?>'><?php echo $title; ?></a>
        <?php endforeach; ?>
        <?php 
            switch ($currentTab) {
                case "ConfirmedW":
                include  WPS_UWA."/walletY.php";
                break;
                case "NConfirmedW":
                include  WPS_UWA."/walletN.php";
                break;
                case "UPdateRE":
                include  WPS_UWA."/UPdateRE.php";
                break;
            }

        ?>
        </h2>
</div>