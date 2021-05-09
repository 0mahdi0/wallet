<?php

function user_register(){
    include WPS_REG."/sign_up.php";
}
function wp_wu_do_register(){

    $user_first_name = sanitize_text_field($_POST['user_first_name']);
    $user_last_name  = sanitize_text_field($_POST['user_last_name']);
    $user_email      = sanitize_text_field($_POST['user_email']);
    $user_password   = sanitize_text_field($_POST['user_password']);
    
    $validate_result = wp_wu_validate_register($user_first_name,$user_last_name,$user_email,$user_password);
    if(!$validate_result['is_valid']){
        wp_send_json([
            'success' => false,
            'message' => $validate_result['message']
        ], 422);
    }
    $emailPart  = explode('@',$user_email);
    $user_login = $emailPart[0];
    $newUser   = wp_insert_user([
        'user_login'  => apply_filters('pre_user_login', $user_login ),
        'user_pass'   => apply_filters('pre_user_pass', $user_password ),
        'user_email'  => apply_filters('pre_user_email', $user_email ),
        'first_name'  => apply_filters('pre_user_first_name', $user_first_name ),
        'last_name'   => apply_filters('pre_user_last_name', $user_last_name ),
    ]);
    if (is_wp_error($newUser)) {
        wp_send_json([
            'success' => false,
            'message' => 'خطایی در ثبت نام شما رخ داده است'
        ], 500);
    }
    else{
        wp_send_json([
            'success' => true,
            'message' => 'ثبت نام با موفقیت انجام شد'
        ], 200);
    }

}
function wp_wu_validate_register($first_name,$last_name,$email,$password){

    $result = [
        'is_valid' => true,
        'message'  => ""
    ];
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) ) {
        $result['is_valid'] = false;
        $result['message']  = "تمامی فیلد ها الزامی می باشد";
        return $result;
    }
    if (!is_email($email)) {
        $result['is_valid'] = false;
        $result['message']  = "ایمیل وارد شده معتبر نمی باشد";
        return $result;
    }
    if (email_exists($email)) {
        $result['is_valid'] = false;
        $result['message']  = "این آدرس ایمیل در دسترس نمی باشد";
        return $result;
    }
    return $result;
}
add_action('wp_ajax_nopriv_wp_wu_register','wp_wu_do_register');

add_shortcode('wu_user_register','user_register');
