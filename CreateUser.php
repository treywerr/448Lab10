<?php

$user = $_POST["username"];

if ($user == "") {
	echo "<h3>Failed to create new user. Cannot leave username blank.</h3>";
} else {
	echo "<h3>Successfully created new user " . $user . "!</h3>";
}

?>