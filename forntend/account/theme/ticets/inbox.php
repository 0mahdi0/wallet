<?php
foreach($wu_tikets as $tiket){
  if ($tiket->user_id == get_current_user_id()) {
    switch ( $tiket->status ) {

      case $tiket->status == 1: $wu_status = '<span style="color:rgb(0,100,255);">پاسخ پشتیبان</span>'; break;
      case $tiket->status == 2: $wu_status = '<span style="color:red;">بسته شده</span>'; break;
      case $tiket->status == 4: $wu_status = '<span style="color:green;">پیام ادمین</span>'; break;
      case $tiket->status == 5: $wu_status = '<span style="color:rgb(255,230,0);">پاسخ مشتری</span>'; break;
      
    }
?>
<table class="widefat fixed alternates" cellspacing="0">
    <tr class="alternate" valign="top">
            <th  class="manage-column column-columnname " scope="col">موضوع</th>
            <th  class="manage-column column-columnname " scope="col">پیام</th>
            <th  class="manage-column column-columnname " scope="col">نوع</th>
            <th  class="manage-column column-columnname " scope="col">عملیات</th>
    </tr>
    <tr class="alternate" valign="top">
            <td class="column-columnname" scope="row"><?php echo $tiket->subject ?></td>
            <td class="column-columnname"><?php
              echo substr($tiket->text,0,25);
             ?></td>
            <td class="column-columnname"><?php echo $wu_status ?></td>
            <td class="column-columnname">
                <form  action="" method="get">
                    <a href="<?php echo add_query_arg(['show' => $tiket->id ]); ?>" >نمایش</a>
                </form>
             </td>
    </tr>
</table>
<?php
  }
}