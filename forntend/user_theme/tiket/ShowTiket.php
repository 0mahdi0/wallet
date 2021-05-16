<?php
  foreach($wu_tikets as $tiket){

    if ($tiket->user_id == get_current_user_id() && $_GET['show'] == $tiket->id) {
      ?>
          <a class="button" onclick="direction()" >بازگشت</a>
        <h3 class="column-columnname" scope="row"><?php echo $tiket->subject ?></h3>
<?php if ($tiket->status == 4) {
?>
      <div class="admin_m">
          <h4>ادمین</h4>
          <p class="subject">متن :</p><span class="text"><?php echo $tiket->text; ?></span>
      </div>
<?php
}else{
    ?>
    <div class="user_m">
            <h4>شما</h4>
            <p class="subject">متن تیکت :</p><span class="text"><?php echo $tiket->text; ?></span>
    </div>
    <?php
foreach($wu_tiket_replay as $replay){
    if ($_GET['show'] == $replay->tiket_id && $_GET['show'] == $tiket->id) {
        if ($replay->is_user == 1) {    ?>
    <div>    
      <div class="user_m">
              <h4>شما</h4>
              <p class="subject">پاسخ شما :</p><span class="text"><?php  echo $replay->text; ?></span>
      </div>
      <?php } if ($replay->is_user == 2) { ?>
      <div class="admin_m">
              <h4>ادمین</h4>
              <p class="subject">پاسخ ادمین :</p><span class="text"><?php echo $replay->text; ?></span>
      </div>
    </div>
    <br>
      <?php   }}} if ($tiket->status != 2 && $tiket->status != 4) {
?>
    <form class="form_edit" enctype="multipart/form-data" action="" method="post">
        <div>
            <table>
                <tr> 
                    <td><label class="select_user" for="user_message">متن پیام : </label></td>
                    <td><textarea name="user_message" id="user_message" cols="33" rows="5" required></textarea></td>
                </tr>
                <tr> 
                    <td><input type="submit" class="button wu_mp" name="submit_rep" value="ارسال"></td>
                </tr>
            </table>
        </div>
    </form><br>
    <form class="tiket_end" method="post"><input type="submit" value="بستن تیکت" name="tiket_end"></form>
<?php }}}} ?>