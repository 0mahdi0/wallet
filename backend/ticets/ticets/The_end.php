<br><br>
<table class="widefat fixed alternates" cellspacing="0">
    <tbody>
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
    <?php foreach($wu_tikets as $tiket){
        if($tiket->status == 2){ ?>
        <div>
            <tr class="alternate" valign="top">
                <td class="column-columnname" scope="row"><input type="checkbox" name="select_ch[]" class="chk select_chk" value="<?php echo intval($tiket->id);?>"></td>
                <td class="column-columnname" scope="row"><?php echo $tiket->subject; ?></td>
                <td class="column-columnname"><?php echo $tiket->text; ?></td>
                <td class="column-columnname" scope="row"><?php echo $tiket->start_datetime; ?></td>
                <td class="column-columnname">
                    <div class="row-actions">
                    <span class="trash" name="select_trash"><a href="<?php echo add_query_arg(['action' => 'trash' , 'item' => $tiket->id ]); ?>">حذف</a></span>
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