<?php

wp_enqueue_script('wp_apis_scripts_users');

?>
<h1 class="wp-heading-inline" style="margin:inherit;" >کاربران تایید شده</h1>
<table class="widefat fixed alternates" cellspacing="0">
    <tbody>
    <tr>

            <td  class="manage-column column-cb" scope="col">
                <input type="checkbox" class="chk select_all" name="select_all" onclick='selects(document.getElementsByClassName("chk"))'>
                    <form style="display:inline;" action="" method="post">
                        <select name="select_action">
                            <option value="trash">حذف همه</option>
                            <option value="no_approved">تایید نشده</option>
                        </select>
                        <input type="submit" name="submit" value="تایید" class="button">
            </td>
            <th  class="manage-column column-columnname " scope="col">نام ونام خانوادگی</th>
            <th  class="manage-column column-columnname " scope="col">نام کاربری</th>
            <th  class="manage-column column-columnname " scope="col">ایمیل کاربر</th>
            <th  class="manage-column column-columnname " scope="col">عملیات</th>

    </tr>
    <?php foreach($users as $user){
        if($user->user_status == 1){ ?>
        <div>
            <tr class="alternate" valign="top">
                <td class="column-columnname" scope="row"><input type="checkbox" name="select_ch[]" class="chk select_chk" value="<?php echo intval($user->ID);?>"></td>
                <td class="column-columnname" scope="row"><?php echo $user->display_name; ?></td>
                <td class="column-columnname"><?php echo $user->user_login; ?></td>
                <td class="column-columnname"><?php echo $user->user_email; ?></td>
                <td class="column-columnname">
                    <div class="row-actions">
                    <span class="trash"><a href="<?php echo add_query_arg(['action' => 'trash' , 'item' => $user->ID ]); ?>">حذف</a><span class="bitwin_line"> |</span></span>
                    <span class="trash"><a href="<?php echo add_query_arg(['action' => 'no_approved' , 'item' => $user->ID ]); ?>">تایید نشده</a></span>
                    </div>
                </td>
            </tr>
        </div>
        <?php }}?>
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