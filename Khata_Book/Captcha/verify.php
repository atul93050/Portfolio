<?php 

function verify_captcha() {
    include "captcha_keys.php";

    if (isset($_POST['g-recaptcha-response'])) {
        $response = $_POST['g-recaptcha-response'];
        $secret_key = $SECRET_KEY;
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response&remoteip=$ip";
        $reply = json_decode(file_get_contents($url), true);
        return $reply['success'];
    } else {
        return false; 
    }
}
