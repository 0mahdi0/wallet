<!-- The Modal ADD -->
<div id="<?php echo "popupAddM".$wallet->id;?>" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form class="form_edit" enctype="multipart/form-data" action="" method="post">
            <div class="div_center"><br>
                <p scope="row"><label class="select_user" for="add_amountm"> مقدار جدید:</label></p>
                <input type="hidden" name="id_add_amountm" value="<?php echo $wallet->id; ?>">
                <p><input type="number" class="add_amount" name="add_amountm" min=0 placeholder="<?php echo "$ ".$wallet->amount; ?>" required></p>
                <p><input type="submit" class="button wu_add" name="submit_add_amountm" value="ارسال"></p>
            </div>
        </form>
    </div>
</div>
<div id="<?php echo "popupAddsub".$wallet->id;?>" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form class="form_edit" enctype="multipart/form-data" action="" method="post">
            <div class="div_center"><br>
                <p scope="row"><label class="select_user" for="add_amounts"> مقدار جدید:</label></p>
                <input type="hidden" name="id_add_amounts" value="<?php echo $wallet->id; ?>">
                <p><input type="number" class="add_amount" name="add_amounts" min=0 placeholder="<?php echo "$ ".$wallet->amount; ?>" required></p>
                <p><input type="submit" class="button wu_add" name="submit_add_amounts" value="ارسال"></p>
            </div>
        </form>
    </div>
</div>
<!-- The Modal nconf -->
<div id="<?php echo "popupNconf".$wallet->id;?>" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form class="form_edit" enctype="multipart/form-data" action="" method="post">
            <div class="div_center"><br>
                <p scope="row"><label class="select_user" for="nconf_id">آیا مطمئن اید ؟</label></p>
                <input type="hidden" name="nconf_id" value="<?php echo $wallet->id; ?>">
                <p><input type="submit" class="button wu_add" name="submit_nconf" value="لغو"></p>
            </div>
        </form>
    </div>
</div>
<!-- The Modal conf -->
<div id="<?php echo "popupConf".$wallet->id;?>" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form class="form_edit" enctype="multipart/form-data" action="" method="post">
            <div class="div_center"><br>
                <p scope="row"><label class="select_user" for="conf_id">آیا مطمئن اید ؟</label></p>
                <input type="hidden" name="conf_id" value="<?php echo $wallet->id; ?>">
                <p><input type="submit" class="button wu_add" name="submit_conf" value="تایید"></p>
            </div>
        </form>
    </div>
</div>
<!-- The Modal trash -->
<div id="<?php echo "popupTrash".$wallet->id;?>" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form class="form_edit" enctype="multipart/form-data" action="" method="post">
            <div class="div_center"><br>
                <p scope="row"><label class="select_user" for="Trash_id">آیا مطمئن اید ؟</label></p>
                <input type="hidden" name="Trash_id" value="<?php echo $wallet->id; ?>">
                <p><input type="submit" class="button wu_add" name="submit_Trash" value="حذف"></p>
            </div>
        </form>
    </div>
</div>
<script>
function <?php echo "popupAddM".$wallet->id."()";?>{
  
  // Get the modal
  var modal = document.getElementById("<?php echo "popupAddM".$wallet->id;?>");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  modal.style.display = "block";

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
  modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
}
function <?php echo "popupAddsub".$wallet->id."()";?>{
  
  // Get the modal
  var modal = document.getElementById("<?php echo "popupAddsub".$wallet->id;?>");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  modal.style.display = "block";

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
  modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
}

function <?php echo "popupNconf".$wallet->id."()";?>{
  
  // Get the modal
  var modal = document.getElementById("<?php echo "popupNconf".$wallet->id;?>");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  modal.style.display = "block";

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
  modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
}

function <?php echo "popupConf".$wallet->id."()";?>{
  
  // Get the modal
  var modal = document.getElementById("<?php echo "popupConf".$wallet->id;?>");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  modal.style.display = "block";

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
  modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
}

function <?php echo "popupTrash".$wallet->id."()";?>{
  
  // Get the modal
  var modal = document.getElementById("<?php echo "popupTrash".$wallet->id;?>");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  modal.style.display = "block";

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
  modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
}
</script>