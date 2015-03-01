<?
session_start();
require_once("database.php");
require_once("tweetGrabber.php");
$username = isset($_GET['searchUser']) ? $_GET['searchUser'] : '';
$user = getUser($username);
$twitterID = $user[5];
$tweets = getTweets($twitterID);

?>