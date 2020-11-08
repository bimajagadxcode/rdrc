<?php
    /*
    |--------------------------------------------------------------------------
    | List Country ID = https://countrycode.org/
    |--------------------------------------------------------------------------
    | example atau contoh below:
    | $uri_affilate = 'http://www.google.com';
    */
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])) 
        $ipaddress = $_SERVER["HTTP_CF_CONNECTING_IP"];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else
        $ipaddress = 'UNKNOWN';
    $geord = @json_decode(@file_get_contents('http://www.geoplugin.net/json.gp?ip='.$ipaddress));
    return $geord;
}
$countryCode = get_client_ip()->geoplugin_countryCode;

if ( $countryCode == "US" ) {
    $uri_affilate = 'https://securecd-smrt.com/smartlink/?a=116592&sm=3883&s1=CAVA001&s2=GABOLERSTM';
} elseif ( $countryCode == "JP" || $countryCode == "KR" || $countryCode == "LY" || $countryCode == "SA" ) {
    $uri_affilate = 'https://argbq.freelovehere.com/c/3f33acd3b135bb12?s1=55454&s2=1171070&s3=Gabolers&s5=Cava&click_id=Cavams&j6=1';
} elseif ( $countryCode == "ID" ) {
    $uri_affilate = 'http://youtube.com';
} else {
    $uri_affilate = 'https://argbq.dateworlds.net/c/da57dc555e50572d?s1=55454&s2=1092902&s3=Gabolers&s5=Cava&click_id=Cavdt&j6=1';
}
header("Location: $uri_affilate");
?>