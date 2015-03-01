<?
session_start();
require_once("database.php");
//echo $_POST['fname'];
if (isset($_POST['cmd'])) {
    
 addUser($_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['password'], $_POST['emailID'], 
            $_POST['googleID'], $_POST['youtubeID'], $_POST['twitterID']);
}
/*
if ($cmd == "signup") {
   
}
else if ($cmd = "signin") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $array = signIn($user, $pass);
    if (count($array) > 0) {
        $_SESSION['userid'] = $array[0];
        $_SESSION['user'] = $array[1];
        header("Location: home.html");
    }
    else {
        //header("Location: home.html");
    }
}*/
?>

<html>

	<head>
		
		<meta charset="utf-8">

		<title>
			
			Sign Up for SocialUnion

		</title>


		<link rel="stylesheet" href="css/styles.css" type = "text/css" />

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

		<script src = "script.js"></script>

	</head>

	<body>


	<div id = "navbar">

			<div id = "logo_background">
		    
		    	<img id = "logo" src = "images/SocialUnionLogo.png">
		    
		    </div>
		    
		    <div id = "profilepicture">
		    

		    </div>

			<div id = "navbar_wrapper">
			    


			</div>

	</div> <!-- end navbar div -->

	<div class = "contentfade">



		<div id = "whitespace">
		</div>
		



		<div id = "signup" class="bigBox">

            
			<h1><span></span>Sign Up for SocialUnion</h1>
			<br>
            <form method="post" action="signup.php">
			<div id = "signup_left">

			<h2>First Name:</h2>
			<input type = "text" name = "fname">
			<br>

			<h2>Last Name:</h2>
			<input type = "text" name = "lname">
			<br>

			<h2>Username:</h2>
			<input type = "text" name = "username">
			<br>

			<h2>Password:</h2>
			<input type = "password" name = "password">
			<br>

			</div>
			
			<div id = "signup_right">
			<h2>Email Address:</h2>
			<input type = "text" name = "emailID">
			<br/>
                

			<h2>Google+</h2>
			<input type = "text" name = "googleID" placeholder = "Leave empty if N/A">
			<br/>

			<h2>Twitter</h2>
			<input type = "text" name = "twitterID" placeholder = "Leave empty if N/A">
			<br/>
                
            <h2>YouTube</h2>
			<input type = "text" name = "youtubeID" placeholder = "Leave empty if N/A">
			<br/>
                
            <input type='hidden' name='cmd' value='signup'>

			</div>


			<p style="text-align:center;">
				<input type="submit" value="Create!">
			</p>
            </form>

		</div>

</div>
	</body>

</html>