<?php
    wp_enqueue_script('wp_apis_scripts_users_price');

    if(isset($_POST['submit']) && isset($_POST['number'])) {  
?>
    <div class="notice notice-success is-dismissible"> 
	<p><strong>ذخیره شد</strong></p>
    </div>
<?php 
    }

?>
<div class="wrap">
    <h1 class="wp-heading-inline">افزودن شناسه جدید</h1>
        <form class="form_edit_U_P" enctype="multipart/form-data" action="" method="post">
            <table class="formt-table">
                <tr class="formt-table" valign="top"> 
                    <th class="formt-table" scope="row"><label class="form_edit select_user" for="select-user">نام کاربر :</label></th>
                    <td class="formt-table">
                    <select class="option_users_login_A" name="user_login">
                    <?php foreach($users as $display_user){ ?>
                        <option name="select-user"><?php echo $display_user->user_login; ?></option>
                    <?php } ?>
                    </select>
                    </td>
                </tr>
                <tr class="formt-table" valign="top"> 
                <th class="formt-table" scope="row"><label class="form_edit select_user" for="select-user">تاریخ : </label></th>
                        <td class="formt-table"><input type="date" class="date_U_P" name="date_U_P"></td>
                </tr>
                <tr class="formt-table" valign="top"> 
                <th class="formt-table" scope="row"><label class="form_edit select_user" for="select-user">شماره پرداخت :</label></th>
                <td class="formt-table"><input type="text" class="price_number_A" name="number"></td>
                </tr>
                <tr class="formt-table" valign="top"> 
                <th class="formt-table" scope="row"><label class="form_edit select_user" for="select-user">تصویر را انتخاب کنید :</label></th>
                <td class="formt-table"><input type="file" name="file" class="fileToUpload" accept="image/*"></td>
                </tr>
                <tr class="formt-table" valign="top"> 
                <th class="formt-table" scope="row"></th>
                <td class="formt-table"><input type="submit" style="display:inline;margin:30px 0;width: 263px;" class="button" name="submit" value="ثبت کن"></td>
                </tr>
            </table>
        </form>
</div>