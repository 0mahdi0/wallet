<br><a style="float:right;" class="button" onclick="direction1()" >بازگشت</a><br>
<tr>
    <th  class="manage-column column-columnname " scope="col">نام ونام خانوادگی</th>
    <th  class="manage-column column-columnname " scope="col">ایمیل</th>
    <th  class="manage-column column-columnname " scope="col">نوع کیف پول</th>
    <th  class="manage-column column-columnname " scope="col">مقدار</th>
    <th  class="manage-column column-columnname " scope="col">عکس</th>
    <th  class="manage-column column-columnname " scope="col">زمان</th>
    <th  class="manage-column column-columnname " scope="col">عملیات</th>
</tr>
<?php
            foreach($wallet_u as $wallet){
                if ($_GET['item'] == $wallet->user_id ) {
                    if ($wallet->status == 2) {
                    ?>
            <tr class="alternate" valign="top">
                <td class="column-columnname" scope="row"><?php echo $user->display_name; ?></td>
                <td class="column-columnname"><?php echo $user->user_email; ?></td> 
                <td class="column-columnname"><?php if($wallet->type == 1){ echo "اصلی";} else{ echo "فرعی" ;} ?></td>
                <td class="column-columnname">$ <?php echo $wallet->amount; ?></td>
                <td class="column-columnname"><img src="<?php echo $wallet->image_url; ?>" width="100" height="100"><a href="<?php echo $wallet->image_url; ?>">نمایش</a></td>
                <td class="column-columnname"><?php echo $wallet->date; ?></td>
                <td class="column-columnname">
                    <div class="row-actions">
                        <span class="trash"  name="select_trash" ><a onclick="<?php echo "popupTrash".$wallet->id."()"; ?>">حذف</a><span class="bitwin_line"> |</span></span>
                        <span class="edit"  name="select_trash" ><a onclick="<?php if ($wallet->type == 1) {echo "popupAddM".$wallet->id."()";} else{echo "popupAddsub".$wallet->id."()";}  ?>">مقدار جدید</a><span class="bitwin_line"> |</span></span>
                        <span class="trash"  name="select_trash" ><a onclick="<?php echo "popupNconf".$wallet->id."()"; ?>">لغو</a></span>
                     </div>
                     <?php include(WPO_DIR."backend/wallet-users/wallet-list/wallet_add.php"); ?>
                </td>
            </tr>
<?php }}}