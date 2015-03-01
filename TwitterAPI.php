<?
require_once('twitter-api-php/TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "216132134-pSkEU6XzQNtTf73dTmt5L1zfYndpe9fGtwirmskZ",
    'oauth_access_token_secret' => "uUxuf0GMbnufll33xhvjLYJFH8PLpO1R8aNtPwPGP9LvO",
    'consumer_key' => "S5It6jAxjj8Db9bNjpqKNxrpT",
    'consumer_secret' => "RD9ZFUBpOzgeR5edKb8QHzAStfTUWAem3qZ337CzzZrguhFwqq"
);
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$getfield = "?screen_name=barackobama";
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$array = json_decode($response,true);
foreach ($array as $val) {
    //echo "<b>Tweet:</b><br>".$val["text"]."<br>";
    //echo "<b>Date Created:</b><br>".$val["created_at"]."<br><br>";
    echo $array["id"];
}
//echo gettype($response);
?>