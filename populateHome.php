<?
//session_start();
require_once("database.php");
require_once("tweetGrabber.php");
require_once("youTubeGrabber.php");
require_once("GPlusGrabber.php");

$username = isset($_GET['searchUser']) ? $_GET['searchUser'] : '';
$user = getUser($username);
$tweets = getTweets($user[5]);

foreach ($tweets as $tweet) {
    echo "
        <div class='post twitterpost'>
            <blockquote class='twitter-tweet' lang='en'>
            <a href='https://twitter.com/".$user[5]."/status/".$tweet."'/>
            </blockquote>
            <script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>
            <br><br>
         </div>
        ";
}

echo "<br><br>";

$videos = getVideos($user[4]);
foreach ($videos as $vid) {
    //echo $vid."<br>";
    echo "
        <div class='post twitterpost'>
        <ul style='list-style-type: none;'>
        <li>
        <iframe width='560' height='315' src='".$vid."' frameborder='0' allowfullscreen></iframe>
        </li>
        </ul>
        </div>
    ";
}

$gPosts = getStatuses($user[3]);
foreach ($gPosts as $post) {
    echo "
        <div class='post twitterpost'>
        <ul style='list-style-type: none;'>
            <li>
            <script type='text/javascript' src='https://apis.google.com/js/plusone.js'></script>
            <div class='g-post' data-href='".$post."'/posts/1CkdZeLq9i7'></div></li>
        </ul>
        </div>
    ";
}
?>