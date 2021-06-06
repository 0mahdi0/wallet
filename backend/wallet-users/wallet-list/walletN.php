<br><br><table class="widefat fixed alternates" cellspacing="0">
    <tbody>
<?php if (!isset($_GET['action']) || !isset($_GET['item']) ) {
    ?>
    <tr>
        <th  class="manage-column column-columnname " scope="col">نام ونام خانوادگی</th>
        <th  class="manage-column column-columnname " scope="col">نام کاربری</th>
        <th  class="manage-column column-columnname " scope="col">ایمیل کاربر</th>
        <th  class="manage-column column-columnname " scope="col">تعداد کیف پول</th>
        <th  class="manage-column column-columnname " scope="col">عملیات</th>
    </tr>
    <?php }  foreach($users as $user){
              $count_wallet = $wpdb->get_results("SELECT COUNT(`user_id`) AS TOTALCOUNT FROM {$wpdb->prefix}wallet_users WHERE `user_id` =".$user->ID." AND `status` = 1");
              if ($count_wallet[0]->TOTALCOUNT != 0) {
            if($user->user_status == 1){
            if (!isset($_GET['action']) && !isset($_GET['item']) ) {
                ?>
        <div>
            <tr class="alternate" valign="top">
                <td class="column-columnname" scope="row"><?php echo $user->display_name; ?></td>
                <td class="column-columnname"><?php echo $user->user_login; ?></td>
                <td class="column-columnname"><?php echo $user->user_email; ?></td>
                <td class="column-columnname"><?php echo $count_wallet[0]->TOTALCOUNT; ?></td>
                <td class="column-columnname">
                    <div class="row-actions">
                    <span class="edit" name="select_edit"><a href="<?php echo add_query_arg(['action' => 'show' , 'item' => $user->ID ]); ?>">کیف پول ها</a></span>
                    </div>
                </td>
            </tr>
        </div>
        <?php
        }else {
            if ($_GET['item'] == $user->ID) {
                include(WPO_DIR."backend/wallet-users/wallet-list/wallet_show_N.php");
            }
        }}}} ?>
        </form>
    <tr>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
    </tr>
    </tbody>
</table>