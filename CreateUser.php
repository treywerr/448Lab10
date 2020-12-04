<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "treywerr", "AiNg4gue",
"treywerr");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}

$user = $_POST["username"];

if ($user == "") {
	echo "<h3>Failed to create new user. Cannot leave username blank.</h3>";
} else {
	echo "<h3>Successfully created new user " . $user . "!</h3>";
}

/* close connection */
$mysqli->close();

?>