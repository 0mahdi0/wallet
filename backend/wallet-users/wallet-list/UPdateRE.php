<table class="widefat fixed alternates" cellspacing="0">
    <tbody>

    <tr>
        <th  class="manage-column column-columnname " scope="col">نام ونام خانوادگی</th>
        <th  class="manage-column column-columnname " scope="col">نام کاربری</th>
        <th  class="manage-column column-columnname " scope="col">ایمیل کاربر</th>
        <th  class="manage-column column-columnname " scope="col">عکس پرداختی</th>
        <th  class="manage-column column-columnname " scope="col">عملیات</th>
    </tr>
    <form action="" method="post">
<?php foreach($update_re as $REdate){
      $user = get_user_by('ID',$REdate->user_id);
    ?>
        <div>
            <tr class="alternate" valign="top">
                <td class="column-columnname" scope="row"><?php echo $user->display_name;?></td>
                <td class="column-columnname"><?php echo $user->user_login;?></td>
                <td class="column-columnname"><?php echo $user->user_email;?></td>
                <td class="column-columnname"><img src="<?php echo $REdate->image_url; ?>" width="100" height="100"><a href="<?php echo $REdate->image_url; ?>">نمایش</a></td>
                <td class="column-columnname">
                    <div class="row-actions">
                    <input type="hidden" name="redate_id" value="<?php echo $REdate->id; ?>">
                    <span class="trash"  name="select_trash" ><input class="submit_trash_redate" type="submit" name="submit_redate" value="حذف"><span class="bitwin_line"> |</span></span>
                    <span class="edit"   name="select_edit"  ><input class="submit_redate" type="submit" name="submit_redate" value="تایید"></span>
                    </div>
                </td>
            </tr>
        </div>
<?php }?>
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