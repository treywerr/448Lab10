<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "treywerr", "AiNg4gue", "treywerr");

/* Check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

echo "<h1>View All Current Users</h1>";

$query = "SELECT user_id FROM Users;";
if ($result = $mysqli->query($query)) {
	
	echo "<table>";
	echo "<tr><th>Username</th></tr>";

	while ($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["user_id"] . "</td></tr>";
	}
	$result->free();

	echo "</table>";

} else {
	echo "<h3>Cannot process query</h3>";
}

echo "<br><br><a href='AdminHome.html'>Home</a>";

/* close connection */
$mysqli->close();

?>
