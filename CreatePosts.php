<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "treywerr", "AiNg4gue", "treywerr");

/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}

$user = $_POST["username"];
$post = $_POST["text_post"];
$userAuth = false;

if ($user == "") {
	echo "<h3>Cannot leave username field blank.</h3>";
} else {
	
	$query = "SELECT user_id FROM Users WHERE user_id='" . $user . "';";
	if ($result = $mysqli->query($query)) {
		$userAuth = $result->fetch_assoc();
		$result->free();
	} else {
		echo "<h3>Unable to process query</h3>";
	}
}

if ($userAuth == true) {
	
	if ($post == "") {
		echo "<h3>Cannot submit a blank post</h3>";
	} else {
		
		$query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', '" . $user . "');";
		if ($result = $mysqli->query($query)) {
			echo "<h3>Post saved</h3>";
		} else {
			echo "<h3>Unable to process query</h3>";
		}

	}

} else {
	echo "<h3>User not found</h3>";
}

/* close connection */
$mysqli->close();

?>
