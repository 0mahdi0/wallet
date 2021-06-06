<table>
<tr>
    <th  class="manage-column column-columnname " scope="col">نوع کیف پول</th>
    <th  class="manage-column column-columnname " scope="col">مبلغ</th>
    <th  class="manage-column column-columnname " scope="col">زمان ساخت</th>
    <th  class="manage-column column-columnname " scope="col">مهلت برای معرفی زیر مجموعه</th>
    <th  class="manage-column column-columnname " scope="col">عملیات</th>
</tr>
<?php
            foreach($wallet_u as $wallet){
                if (get_current_user_id() == $wallet->user_id ) {
                    if ($wallet->status == 2) {
                        $date=date_create(date("Y-m-d"));
                        date_sub($date,date_interval_create_from_date_string("15 days"));
                        $date1=date_create(date_format($date,"Y-m-d"));
                        $date2=date_create($wallet->date);
                        $diff=date_diff($date1,$date2);
                    ?>
            <tr class="alternate" valign="top">
                <td class="column-columnname"><?php if($wallet->type == 1){ echo "اصلی";} else{ echo "فرعی" ;} ?></td>
                <td class="column-columnname">$ <?php echo $wallet->amount; ?></td>
                <td class="column-columnname"><?php echo $wallet->date; ?></td>
                <td class="column-columnname"><?php if($wallet->type == 1){if($diff->format("%R%a") >= 0){echo $diff->format("%a")."روز دیگر";}else{echo "مهلت شما برای ثبت زیر مجموعه تمام شده است";}} ?></td>
                <td class="column-columnname">
                <span class="ADD" name="wallet_ADD" ><a href="<?php echo add_query_arg(['A-wallet' => $wallet->id ]); ?>">افزودن مبلغ</a></span>
                </td>
            </tr>
<br><br>
<?php if($diff->format("%R%a") >= 0){if($wallet->type == 1){?>
    <form class="form_edit_U_P" enctype="multipart/form-data" action="" method="post">
        <table>
            <tr> 
            <th><label for="wallet_number">ایمیل زیرمجموعه :</label></th>
            <br><h3>ثبت زیرمجموعه</h3><br>
            <td><input type="email" name="sub_wallet_member" required></td>
            </tr>
            <tr> 
            <th></th>
            <td><input type="submit" class="button" name="submit_add_wallet_mem" value="ثبت کن"></td>
            </tr>
        </table>
    </form>
<?php  }} if($diff->format("%R%a") <= 0 && $wallet->type == 1){ include(WPO_DIR."forntend/account/theme/wallet/new_time_wallet.php");  }}}} ?>
</table>