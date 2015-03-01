<?
require_once "creds.php";
require_once "mailjet.php";

$con = new mysqli("localhost",$user,$password, "socialUnion");

function addUser($fname, $lname, $username, $password, $emailID, $googleID, $youtubeID, $twitterID) {
    global $con;
    //removeRequest($username);
    $bytes = openssl_random_pseudo_bytes(8, $cstrong);
    $salt  = bin2hex($bytes);
    $encPwd = crypt($password, $salt);
    $q= $con->prepare("insert into users 
        (fname, lname, username, password, salt, emailID, googleID, youtubeID, twitterID)
        values
            (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
    
    $q->bind_param('sssssssss', $fname, $lname, $username, $encPwd, $salt, $emailID, $googleID, $youtubeID, $twitterID);
    $q->execute();
}

function signIn($username, $password) {
    global $con;
    $q = $con->prepare("select id, username, password, salt from users where username = ?");
    
    $q->bind_param('s', $username);
    $q->execute();
    $result=$q->get_result();
    $array = $result->fetch_array();
    $salt  = $array[3];
    $uPass = $array[2];
    $encPwd = crypt($password, $salt);
    $retArr = array();
    
    if ($uPass == $encPwd) {
        $retArr[] = $array[0];
        $retArr[] = $array[1];
    }
    return $retArr;
}

function getUser($username) {
    global $con;
    $q= $con->prepare("select fname, lname, emailID, googleID, youtubeID, twitterID from users where username = ?");
    $q->bind_param('s', $username);
    $q->execute();
    $result=$q->get_result();
    return $result;
}

function addRequest($requester, $requestee) {
    global $con;
    $q= $con->prepare("insert into requests (requester, requestee) values (?,?)");
    $q->bind_param('ss', $requester, $requestee);
    $q->execute();
}

function removeRequest($requestee) {
    global $con;
    $q = $con->prepare("select requests.requester, users.emailID 
        from requests
        inner join users
        on users.username = requests.requester
        where requestee = ?");
    $q->bind_param('s', $requestee);
    $q->execute();
    $result = $q->get_result();
    while ($r=$result->fetch_array()) {
		$msg = "Hello ".$requester." We're happy to announce that ".$requestee." who you invited to Social Union has just     joined!!";
        sendEmail($r[1], $r[0], $msg);
	}
    
    $q= $con->prepare(" delete from requests where requestee = ?");
    $q->bind_param('s', $requestee);
    $q->execute();
}

function addFollowing($follower, $followee) {
    global $con;
    $q= $con->prepare("insert into followings (follower, followee) values (?,?)");
    $q->bind_param('ss', $follower, $followee);
    $q->execute();
}

?>