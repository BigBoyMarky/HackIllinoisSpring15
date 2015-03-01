<?
session_start();
require_once("database.php");
$requestee = isset($_GET['invited']) ? $_GET['invited'] : '';
$requester = isset($_SESSION['user'])? $_SESSION['user'] : '';
addRequest($requester, $requestee);
header("home.php");

?>