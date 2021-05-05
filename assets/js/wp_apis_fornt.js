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
                            window.location.href = '/wordpress';
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
                            window.location.href = '/wordpress/2021/05/03/6/';
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

});