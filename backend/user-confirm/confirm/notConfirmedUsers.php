<h1 class="wp-heading-inline" style="margin:inherit;" >کاربران تایید نشده</h1>
<table class="widefat fixed alternates" cellspacing="0">
<tbody>
    <tr>

            <td  class="manage-column column-cb" scope="col">
                <input type="checkbox" class="chk select_all" name="select_all" onclick='selects(document.getElementsByClassName("chk"))'>
                <form style="display:inline;" action="" method="post">
                        <select name="select_action">
                            <option value="trash">حذف همه</option>
                            <option value="approved">تایید</option>
                        </select>
                        <input type="submit" name="submit" value="تایید" class="button">
            </td>
            <th  class="manage-column column-columnname " scope="col">نام ونام خانوادگی</th>
            <th  class="manage-column column-columnname " scope="col">نام کاربری</th>
            <th  class="manage-column column-columnname " scope="col">ایمیل کاربر</th>
            <th  class="manage-column column-columnname " scope="col">عملیات</th>

    </tr>
    <?php foreach($users as $user){
        if($user->user_status == 2){ ?>
        <div>
            <tr class="alternate" valign="top">
                <td class="column-columnname" scope="row"><input type="checkbox" name="select_ch[]" class="chk select_chk" value="<?php echo intval($user->ID);?>"></td>
                <td class="column-columnname" scope="row"><?php echo $user->display_name; ?></td>
                <td class="column-columnname"><?php echo $user->user_login; ?></td>
                <td class="column-columnname"><?php echo $user->user_email; ?></td>
                <td class="column-columnname">
                    <div class="row-actions">
                    <span class="trash" name="select_trash"><a href="<?php echo add_query_arg(['action' => 'trash' , 'item' => $user->ID ]); ?>">حذف</a><span class="bitwin_line"> |</span></span>
                    <span class="edit"  name="select_edit"><a href="<?php echo add_query_arg(['action' => 'approved' , 'item' => $user->ID ]); ?>">تایید</a></span>
                    </div>
                </td>
            </tr>
        </div>
        <?php }}?>
        </form>
    </tbody>
    <tfoot>
    <tr>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
    </tr>
    </tfoot>
</table>