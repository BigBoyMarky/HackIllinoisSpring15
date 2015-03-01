<?
require_once('twitter-api-php/TwitterAPIExchange.php');
function getTweets($screen_name) {
    $settings = array(
    'oauth_access_token' => "216132134-pSkEU6XzQNtTf73dTmt5L1zfYndpe9fGtwirmskZ",
    'oauth_access_token_secret' => "uUxuf0GMbnufll33xhvjLYJFH8PLpO1R8aNtPwPGP9LvO",
    'consumer_key' => "S5It6jAxjj8Db9bNjpqKNxrpT",
    'consumer_secret' => "RD9ZFUBpOzgeR5edKb8QHzAStfTUWAem3qZ337CzzZrguhFwqq"
    );
    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
    $getfield = "?screen_name=".$screen_name;
    $requestMethod = 'GET';
    $twitter = new TwitterAPIExchange($settings);
    $response = $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();
    $array = json_decode($response,true);
    $tweets = array();
    foreach($array as $val) {
        $tweets[] = $val['id'];
    }
    return $tweets;
    /*
    foreach ($array as $val) {
        echo "
            <blockquote class='twitter-tweet' lang='en'>
            <a href='https://twitter.com/BarackObama/status/".$val['id']."'/>
            </blockquote>
            <script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>
            <br><br>
        ";
    }
    */
}
?>