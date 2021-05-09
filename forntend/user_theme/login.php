<?php


    wp_enqueue_script('wp_apis_fornt');
    wp_enqueue_style('wp_apis_fornt');
        $current_user_id= get_current_user_id();
        if($current_user_id == 0){

?>
<center>
<div class="sign_in_w" style="padding: 10px;display:inline-block;">
    <h2 class="form-title">ورود</h2><br>
    <form method="POST" class="register-form" id="login_form">
    <div class="form-group">
    <input type="text" name="email" id="emailin" placeholder="ایمیل" >
    </div>
    <div class="form-group">
    <input type="password" name="pass" id="passin" placeholder="رمز">
    </div>
    <div class="form-group form-button">
    <input type="submit" name="signin" id="signin" class="form-submit" value="ورود">
    </div>
    </form>
</div>
<div>
  <h3>ارسال تیکت ناشناس</h3><br>
<?php
    include WPS_UTI."/UnknowTiket.php";
?>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
      <span class="close">&times;</span>
      <p class="commentMessage"></p>
  </div>
</div>
<center>
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