<?php
/**
$mysqli = new mysqli("mysql.eecs.ku.edu", "treywerr", "AiNg4gue",
"treywerr");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
**/
$user = $_POST["username"];

if ($user == "") {
	echo "<h3>Failed to create new user. Cannot leave username blank.</h3>";
} else {
	echo "<h3>Successfully created new user " . $user . "!</h3>";
}

/**
$query = "SELECT Name, CountryCode FROM City ORDER by ID DESC LIMIT 50,5";
if ($result = $mysqli->query($query)) {
 /* fetch associative array */
 while ($row = $result->fetch_assoc()) {
 printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
 }
 /* free result set */
 $result->free();
}
**/

/* close connection */
$mysqli->close();

?>