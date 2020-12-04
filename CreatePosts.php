<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "treywerr", "AiNg4gue", "treywerr");

/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}

$user = $_POST["username"];
$post = $_POST["text_post"];

if ($user == "") {
	echo "<h3>Cannot leave username field blank.</h3>";
} else {
	
	$query = "SELECT user_id FROM Users WHERE user_id='" . $user . "';";
	if ($result = $msqli->query($query)) {
		
		if ($result->fetch_assoc()) {
			echo "<h3>Username successfully validated</h3>";
		} else {
			echo "<h3>User not found</h3>";
		}

		$result->free();
	}
}

/* close connection */
$mysqli->close();

?>