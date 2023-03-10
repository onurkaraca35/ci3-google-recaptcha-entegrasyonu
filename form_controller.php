function check_captcha(){
    return true;
    if(strpos(base_url(), "http://site_url) !== false || strpos(base_url(), "http://site_url) !== false)
        return true;

    $recaptcha_secret = 'secret_key';
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $ci =& get_instance();
    $recaptcha_response = $ci->input->post("recaptcha_response");

    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_URL, $recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = curl_exec($c);
    curl_close($c);

    $recaptcha = json_decode($recaptcha);
    if ($recaptcha->score >= 0.9)
        return true;
    else
        return false;

}