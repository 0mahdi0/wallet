<?php
        wp_enqueue_script('wp_apis_scripts_users');


    ?>
    <br><br>
    <div class="wrap">
            <form class="form_edit" enctype="multipart/form-data" action="" method="post">
            <div class="div_center">
                <table class="formt-table">
                    <tr class="formt-table" valign="top"> 
                        <td class="formt-table" scope="row"><label class="select_user" for="select-user">نام کاربر :</label></td>
                        <td class="formt-table">
                        <select class="select_users" name="user_login">
                        <?php foreach($users as $display_user){ ?>
                            <option name="select-user" class="option_users"><?php echo $display_user->user_login; ?></option>
                        <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr><td><br><br></td></tr>
                    <tr class="formt-table" valign="top"> 
                    <td class="formt-table" scope="row"><label class="select_user" for="subject">موضوع :</label></td>
                    <td class="formt-table"><input type="text" class="subject" name="subject" required></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr class="formt-table" valign="top"> 
                    <td class="formt-table" scope="row"><label class="select_user" for="user_message">متن پیام : </label></td>
                    <td class="formt-table"><textarea name="user_message" id="user_message" cols="33" rows="5" required></textarea></td>
                    </tr>
                    <tr class="formt-table" valign="top"> 
                    <td class="formt-table" scope="row"></td>
                    <td class="formt-table"><input type="submit" class="button wu_mp" name="submit_new" value="ارسال"></td>
                    </tr>
                </table>
                </div>
            </form>
    </div>