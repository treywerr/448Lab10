<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "treywerr", "AiNg4gue", "treywerr");

/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}

$user = $_POST["username"];

if ($user == "") {
	echo "<h3>Failed to create new user. Cannot leave username blank.</h3>";
} else {
	
	$query = "SHOW COLUMNS FROM Users;";
	if ($result = $mysqli->query($query)) {
		
		while ($cols = mysqli_fetch_array($result)) {
			printf("%s\n", $cols[0]);
		}
		$result->free();
	}
	$already_exists = false;
	$query = "SELECT user_id FROM Users WHERE user_id='" . $user . "';";
	if ($result = $mysqli->query($query)) {

		if ($already_exists = $result->fetch_assoc()) {
			echo "<h3>Cannot create user; username already taken</h3>";
		}
		
		$result->free();
	} else {
		echo "<p>Did not find matching username</p>";
	}
	$query = "INSERT INTO Users (user_id) VALUES ('" . $user . "');";
	if ($already_exists == false && $result = $mysqli->query($query)) {
		echo "<h3>Successfully created new user " . $user . "!</h3>";
		$result->free();
	} else {
		echo "<h3>Failed to create new user</h3>";
	}
	
}

/* close connection */
$mysqli->close();

?>
