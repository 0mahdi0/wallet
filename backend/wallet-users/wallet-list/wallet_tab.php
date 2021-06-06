<div class="wrap">
        <h2 class="nav-tab-wrapper">
        <?php foreach ($tabs as $name => $title): ?>
            <?php $class = ( $name == $currentTab ) ? ' nav-tab-active' : ''; ?>
            <a class='nav-tab<?php echo $class; ?>' href='?page=wallet-users&tab=<?php echo $name; ?>'><?php echo $title; ?></a>
        <?php endforeach; ?>
        <?php 
            switch ($currentTab) {
                case "ConfirmedW":
                include(WPO_DIR."backend/wallet-users/wallet-list/walletY.php");
                break;
                case "NConfirmedW":
                include(WPO_DIR."backend/wallet-users/wallet-list/walletN.php");
                break;
                case "UPdateRE":
                include(WPO_DIR."backend/wallet-users/wallet-list/UPdateRE.php");
                break;
            }
        ?>
        </h2>
</div>