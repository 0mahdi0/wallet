<?php


    wp_enqueue_script('wp_apis_fornt');
    wp_enqueue_style('wp_apis_fornt');
    $current_user_id= get_current_user_id();

    if($current_user_id == 0){
?>
<center>
<?php if (get_option('users_can_register',[]) == 1) {
?>
<div class="sign_up_w" style="padding: 10px;display:inline-block;">
    <h2 class="form-title">ثبت نام</h2><br>
    <form method="POST" class="register-form" id="register_form">
    <div class="form-group">
    <input type="text" name="fname" id="fname" placeholder="نام" >
    </div>
    <div class="form-group">
    <input type="text" name="lname" id="lname" placeholder="نام خانوادگی" >
    </div>
    <div class="form-group">
    <input type="text" name="email" id="email" placeholder="ایمیل" >
    </div>
    <div class="form-group">
    <input type="password" name="pass" id="pass" placeholder="رمز">
    </div>
    <div class="form-group form-button">
    <input type="submit" name="signup" id="signup" class="form-submit" value="ثبت نام">
    </div>
    </form>
</div>
<?php }else{return "فرم ثبت نام باید توسط مدیر اجرا شود";}?>
<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
      <span class="close">&times;</span>
      <p class="commentMessage"></p>
  </div>
</div>
</center>

<?php
}else{
  
  $url = home_url()."/account"; 
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
