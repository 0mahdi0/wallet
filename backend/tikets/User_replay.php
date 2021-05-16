<?php

wp_enqueue_script('wp_apis_scripts_users');

    
?>
<br><br>
<table class="widefat fixed alternates" cellspacing="0">
    <tbody>
    <?php
    if (!isset($_GET['action']) && !isset($_GET['item']) ) {
    ?>
    <tr>
            <td  class="manage-column column-cb" scope="col">
                <input type="checkbox" class="chk select_all" name="select_all" onclick='selects(document.getElementsByClassName("chk"))'>
                    <form style="display:inline;" action="" method="post">
                        <select name="select_action">
                            <option value="trash">حذف همه</option>
                        </select>
                        <input type="submit" name="submit" value="تایید" class="button">
            </td>
            <th  class="manage-column column-columnname " scope="col">موضوع</th>
            <th  class="manage-column column-columnname " scope="col">متن تیکت</th>
            <th  class="manage-column column-columnname " scope="col">تاریخ ارسال</th>
            <th  class="manage-column column-columnname " scope="col">عملیات</th>

    </tr>
    <?php }foreach($wu_tikets as $tiket){
            if (!isset($_GET['action']) && !isset($_GET['item']) ) {
                if($tiket->status == 5){
                ?>
        <div>
            <tr class="alternate" valign="top">
                <td class="column-columnname" scope="row"><input type="checkbox" name="select_ch[]" class="chk select_chk" value="<?php echo intval($tiket->id);?>"></td>
                <td class="column-columnname" scope="row"><?php echo $tiket->subject; ?></td>
                <td class="column-columnname"><?php echo $tiket->text; ?></td>
                <td class="column-columnname" scope="row"><?php echo $tiket->start_datetime; ?></td>
                <td class="column-columnname">
                    <div class="row-actions">
                    <span class="trash" name="select_trash"><a href="<?php echo add_query_arg(['action' => 'trash' , 'item' => $tiket->id ]); ?>">حذف</a><span class="bitwin_line">|</span></span>
                    <span class="Edit"  name="select_trash"><a href="<?php echo add_query_arg(['action' => 'replay' , 'item' => $tiket->id ]); ?>">پاسخ</a></span>
                    </div>
                </td>
            </tr>
        </div>
        <?php }}else{
            if ($_GET['item'] == $tiket->id) {
                
            ?>
            <div class="wrap">
                <tr>
                <td class="column-columnname" scope="row"><p class="subject">موضوع : <?php echo $tiket->subject; ?></p></td>
                <td class="column-columnname"><p class="subject">متن تیکت :</p><span class="text"><?php echo $tiket->text; ?></span></td>
                </tr>
                <?php
                foreach($wu_tiket_replay as $replay){
                    if ($_GET['item'] == $replay->tiket_id && $_GET['item'] == $tiket->id) {
                        if ($replay->is_user == 1) {    ?>
                        <tr>
                                <td class="column-columnname" scope="row"><p class="subject">کاربر :</p></td>
                                <td class="column-columnname"><p class="subject">متن پاسخ :</p><span class="text"><?php echo $replay->text; ?></span></td>
                        </tr>
                        <?php } if ($replay->is_user == 2) { ?>
                        <tr>
                                <td class="column-columnname" scope="row"><p class="subject">ادمین :</p></p>
                                <td class="column-columnname"><p class="subject">متن پاسخ :</p><span class="text"><?php echo $replay->text; ?></span></td>
                        </tr>
                        <?php  }}} ?>
                <form class="form_edit" enctype="multipart/form-data" action="" method="post">
                <div class="div_center">
                    <table class="formt-table">
                        <tr class="formt-table" valign="top"> 
                        <td class="formt-table" scope="row"><label class="select_user" for="user_message">متن پیام : </label></td>
                        <td class="formt-table"><textarea name="user_message" id="user_message" cols="33" rows="5" required></textarea></td>
                        </tr>
                        <tr class="formt-table" valign="top"> 
                        <td class="formt-table" scope="row">  </td>
                        <td class="formt-table"><input type="submit" class="button wu_mp" name="submit_rep" value="ارسال"></td>
                        </tr>
                    </table>
                    </div>
                </form>
            </div>
            <?php
        }}}?>
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
<?php
