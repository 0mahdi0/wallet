<?php
function user_login(){


    global $wpdb;

    if ( isset($_POST['submit'])) {
        if (isset($_POST['subject']) && isset($_POST['user_message']) ) {

            $subject    = $_POST['subject'];
            $message    = $_POST['user_message'];

            $success = $wpdb->insert($wpdb->prefix.'wu_tikets',
                [
                    'user_id'        => 0,
                    'subject'        => $subject,
                    'text'           => $message,
                    'status'         => 3
                ],
                [
                    '%d',
                    '%s',
                    '%s',
                    '%d'
                ]
                );
            if ($success != false) {
                ?>
                <p><strong>ارسال شد</strong></p>
                    <script>
                
                    setTimeout(function(){
                            window.location.href = '/wordpress/2021/05/03/login/';
                        },2000)
                        
                    </script>
 
                <?php
            }else{
                ?>
                <p><strong>ارسال نشد</strong></p>
                <?php
            }
        }
    }

    include WPS_REG."/login.php";
}
function wp_wu_do_login(){
    $user_email    = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);
    $validate_result = wp_wu_validate_email_password($user_email,$user_password);
    if(!$validate_result['is_valid']){
        wp_send_json([
            'success' => false,
            'message' => $validate_result['message']
        ], 403);
    }
    $user = wp_authenticate_email_password(null,$user_email,$user_password);
    if (is_wp_error($user)) {
        wp_send_json([
            'success' => false,
            'message' => 'ایمیل یا رمز عبور وارد شده صحیح نمی باشد'
        ], 403);
    }
    else{
        if ($user->user_status == 1) {
            $loginResults = wp_signon([
                'user_login'    => $user->user_login,
                'user_password' => $user_password,
                'remember'      => false
            ]);
        if (is_wp_error($loginResults)) {
            wp_send_json([
                'success' => false,
                'message' => 'درحال حاضر امکان ورود به سایت فراهم نیست لطفا بعدا تلاش کنید'
            ], 403);        
        }
        else{
            wp_send_json([
                'success' => true,
                'message' => 'با موفقیت وارد شدید'
            ], 200); 
        }
    }
    else{
        wp_send_json([
            'success' => false,
            'message' => 'شما اجازه ورود به سایت را ندارید'
        ], 403);      
    }
    }
}
function wp_wu_validate_email_password($email,$password){

    $result = [
        'is_valid' => true,
        'message'  => ""
    ];
    if(empty($email) || is_null($email)){
        $result['is_valid'] = false;
        $result['message']  = 'ایمیل نمی تواند خالی باشد';
        return $result;
    }
    if (!is_email($email)) {
        $result['is_valid'] = false;
        $result['message']  = "ایمیل وارد شده معتبر نمی باشد";
        return $result;
    }
    if(empty($password) || is_null($password)){
        $result['is_valid'] = false;
        $result['message']  = 'رمز عبور نمی تواند خالی باشد';
        return $result;        
    }
    return $result;
}

add_action('wp_ajax_nopriv_wp_wu_login','wp_wu_do_login');
add_shortcode('wu_user_login','user_login');