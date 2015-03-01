<?
session_start();
require_once("database.php");
$user = isset($_POST['username']) ? $_POST['username'] : '';
$pass = isset($_POST['password']) ? $_POST['password'] : '';
$array = signIn($user, $pass);
if (count($array) > 0) {
    $_SESSION['userid'] = $array[0];
    $_SESSION['user'] = $array[1];
    header("Location: home.php");
}
else {
    header("Location: index.html");
}
?>