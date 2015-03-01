<?
function sendEmail($recEamil, $recName, $msg) {
    include("php-mailjet-v3-simple.class.php");
    $apiKey =  '51d9d26c472c495fc47ee031b0b164f0';
    $secretKey = '55fe02030569aa5e522acefbc460c633';
    $mj = new Mailjet( $apiKey, $secretKey );
    $params = array(
        "method" => "POST",
        "from" => "jomaao@miamioh.edu",
        "to" => $recEamil,
        "subject" => "Hello ".$recName."!",
        "text" => $msg
    );
    $result = $mj->sendEmail($params);
    if ($mj->_response_code == 200)
       echo "success - email sent";
    else
       echo "error - ".$mj->_response_code;
}
?>