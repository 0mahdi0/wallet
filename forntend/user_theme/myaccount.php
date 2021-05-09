<?php

    wp_enqueue_script('wp_apis_fornt');
    wp_enqueue_style('wp_apis_fornt');
    $current_user_id= get_current_user_id();

    if($current_user_id != 0){
      if (!isset($_GET['show'])) {
?>
<div id="hide_all">
<div class="tab">
  <button class="tablinks" onclick="tabsA(event, 'wallet')" id="defaultOpen">کیف پول ها</button>
  <button class="tablinks" onclick="tabsA(event, 'edit')">ویرایش</button>
  <button class="tablinks" onclick="tabsA(event, 'tiket')">تیکت</button>
  <button class="tablinks" onclick="tabsA(event, 'logout')">خروج</button>
</div>
<div id="wallet" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>
<div id="edit" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>
<div id="tiket" class="tabcontent">
  <br>
  <h3>تیکت</h3>
  <br><br>
    <a class="button" href="#new_tiket" onclick="tabsB(event, 'new_tiket')" name="">ارسال تیکت جدید</a>
    <a class="button" href="#inbox"     onclick="tabsB(event, 'inbox')"     name="">صندوق</a>
  <br><br>
</div>
<div id="new_tiket" class="textcontent tabcontent">
  <h3>ارسال تیکت جدید</h3><br><br>
<?php
    include WPS_UTI."/NewTiket.php";
?>
</div>
<div id="inbox" class="textcontent tabcontent">
<h3>صندوق</h3><br>
<?php
    include WPS_UTI."/inbox.php";
    
?>
</div>
<div id="logout" class="tabcontent">
  <h3>خروج</h3>
  <br>
  <p>آیا مطمئن هستید؟</p><br><br>
  <a class="button" href="/wordpress/account/?logout" name="logout">خروج از اکانت</a>
  <br><br>
</div>
</div>
<div id="show_all">
<?php
      }else{
    include WPS_UTI."/ShowTiket.php";
}
?>
</div>
<?php
}else{
  
  $url = home_url()."/login"; 
  ?>
     <script>

      demo();

      function demo()
      {
          window.location.href="<?php echo $url; ?>";
      }

     </script>

  <?php 
}