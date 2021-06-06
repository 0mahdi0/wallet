<table class="widefat fixed alternates" cellspacing="0">
    <tbody>
<?php if (!isset($_GET['action']) || !isset($_GET['item']) ) {
    ?>
    <tr>
            <th  class="manage-column column-columnname " scope="col">موضوع</th>
            <th  class="manage-column column-columnname " scope="col">متن تیکت</th>
            <th  class="manage-column column-columnname " scope="col">تاریخ ارسال</th>
            <th  class="manage-column column-columnname " scope="col">عملیات</th>

    </tr>
    <?php }?>
    <?php foreach($wu_tikets as $tiket){
            if (!isset($_GET['action']) && !isset($_GET['item']) ) {
        if($tiket->status == 1){ ?>
        <div>
            <tr class="alternate" valign="top">
                <td class="column-columnname" scope="row"><?php echo $tiket->subject; ?></td>
                <td class="column-columnname"><?php echo $tiket->text; ?></td>
                <td class="column-columnname" scope="row"><?php echo $tiket->start_datetime; ?></td>
                <td class="column-columnname">
                    <div class="row-actions">
                    <span class="Edit" name="select_trash"><a href="<?php echo add_query_arg(['action' => 'show' , 'item' => $tiket->id ]); ?>">نمایش</a></span>
                    </div>
                </td>
            </tr>
        </div>
        <?php }}else{ 
                        if ($_GET['item'] == $tiket->id) {
            ?>
            <br><a style="float:right;" class="button" onclick="direction()" >بازگشت</a><br>
            <div class="main_tiket">
                <p>موضوع : <?php echo $tiket->subject; ?></p>
                <p><p>متن پاسخ :</p><span class="text"><?php echo $tiket->text; ?></span></p>
            </div>
            <?php
            } foreach($wu_tiket_replay as $replay){
            if ($_GET['item'] == $replay->tiket_id && $_GET['item'] == $tiket->id) {
                if ($replay->is_user == 1) {    ?>
                <div class="USer">
                        <p class="column-columnname" scope="row"><p class="subject">کاربر :</p></p>
                        <p class="column-columnname"><p class="subject">متن پاسخ :</p><span class="text"><?php echo $replay->text; ?></span></p>
                </div>
                <?php } if ($replay->is_user == 2) { ?>
                <div class="ADmin">
                        <p class="column-columnname" scope="row"><p class="subject">ادمین :</p></p>
                        <p class="column-columnname"><p class="subject">متن پاسخ :</p><span class="text"><?php echo $replay->text; ?></span></p>
                </div>
                <?php }}}}} if (!isset($_GET['action']) || !isset($_GET['item']) ) { ?>
    <tr>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
            <th class="manage-column column-columnname" scope="col"></th>
    </tr>
    </tbody>
</table>
<?php
        }