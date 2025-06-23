<?php
class forntend_user extends wallet{

    public function __construct(){
        add_shortcode('wu_account',[$this,'user_account']);
        add_shortcode('wu_register',[$this,'user_register']);
        add_shortcode('wu_login',[$this,'user_login']);
        add_action('wp_ajax_nopriv_wp_wu_login',[$this,'wp_wu_do_login']);
        add_action('wp_ajax_nopriv_wp_wu_register',[$this,'wu_do_register']);
    }
    public function user_account(){
            wp_enqueue_script('forntend-script');
            wp_enqueue_style('forntend-style');
            include(WPO_DIR."forntend/account/account.php");
    }

    public function user_register(){
            wp_enqueue_script('forntend-script');
            wp_enqueue_style('forntend-style');
            include(WPO_DIR."forntend/account/theme/signup.php");
    }

    public function user_login(){
            wp_enqueue_script('forntend-script');
            wp_enqueue_style('forntend-style');
            include(WPO_DIR."forntend/account/signin.php");
    }

    public function wp_wu_do_login(){
        $user_email    = sanitize_text_field($_POST['user_email']);
        $user_password = sanitize_text_field($_POST['user_password']);
        $validate_result = $this->wp_wu_validate_email_password($user_email,$user_password);
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

    protected function wp_wu_validate_email_password($email,$password){
    
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

    public function wu_do_register(){

        $user_first_name = sanitize_text_field($_POST['user_first_name']);
        $user_last_name  = sanitize_text_field($_POST['user_last_name']);
        $user_email      = sanitize_text_field($_POST['user_email']);
        $user_password   = sanitize_text_field($_POST['user_password']);
        
        $validate_result = $this->wp_wu_validate_register($user_first_name,$user_last_name,$user_email,$user_password);
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

    protected function wp_wu_validate_register($first_name,$last_name,$email,$password){

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

}

if (!defined('WALLET_TESTS')) {
    new forntend_user;
}
