jQuery(document).ready(function ($){

    $('#login_form').on('submit' , function (event){
        event.preventDefault();
        let user_email = $('#emailin').val();
        let user_password = $('#passin').val();
        let notify = $('.commentMessage');

            $.ajax({
                url:'/wordpress/wp-admin/admin-ajax.php',
                type: 'post',
                dataType: 'json',
                data:{
                    action: 'wp_wu_login',
                    user_email: user_email,
                    user_password: user_password,
                },
                success: function(response){
                    if(response.success){
                        notify.removeClass('popup-error').addClass('popup-success');
                        notify.html(response.message);
                        var modal = document.getElementById("myModal");

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
                        setTimeout(function(){
                            window.location.href = '/wordpress/account';
                        },2000)

                    }
                },
                error: function(error){
                    if(error){
                        let message = error.responseJSON.message;
                        notify.html(message);
                        notify.addClass('popup-error');
                        // Get the modal
                        var modal = document.getElementById("myModal");

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
                }

            })
    });
    $('#register_form').on('submit' , function (event){
        event.preventDefault();
        let first_name = $('#fname').val();
        let last_name = $('#lname').val();
        let user_email = $('#email').val();
        let user_password = $('#pass').val();
        let notify = $('.commentMessage');
            $.ajax({
                url:'/wordpress/wp-admin/admin-ajax.php',
                type: 'post',
                dataType: 'json',
                data:{
                    action: 'wp_wu_register',
                    user_first_name: first_name,
                    user_last_name: last_name,
                    user_email: user_email,
                    user_password: user_password,
                },
                success: function(response){
                    if(response.success){
                        notify.removeClass('popup-error').addClass('popup-success');
                        notify.html(response.message);
                        var modal = document.getElementById("myModal");

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
                        setTimeout(function(){
                            window.location.href = '/wordpress/login';
                        },2000)

                    }
                },
                error:  function(error){
                    if(error){
                        let message = error.responseJSON.message;
                        notify.html(message);
                        notify.addClass('popup-error');
                        // Get the modal
                        var modal = document.getElementById("myModal");

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
                }

            })
    });
if (window.location.href.indexOf("account") > -1) {
      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
}
});
function tabsA(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    document.getElementById(tabName).style.display = "contents";
  }
  function tabsB(evt, tabName) {
    var i, textcontent, button;
    textcontent = document.getElementsByClassName("textcontent");
    for (i = 0; i < textcontent.length; i++) {
        textcontent[i].style.display = "none";
    }
    button = document.getElementsByClassName("button");
    document.getElementById(tabName).style.display = "block";
}
function direction(){
    window.location.href = '/wordpress/account';
}