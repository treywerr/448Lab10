<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "treywerr", "AiNg4gue", "treywerr");

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$user = $_POST["user"];

echo "<h2>Displaying posts made by user " . $user . "</h2>";

$query = "SELECT content, author_id FROM Posts";
if ($result = $mysqli->query($query)) {

	echo "<table>";

	while ($row = $result->fetch_assoc()) {
		if ($row["author_id"] == $user) {
			echo "<tr><td>" . $row["content"] . "</td></tr>";
		}
	}
	$result->free();

	echo "</table>";
} else {
	echo "<h3>Cannot process query</h3>";
}

/* close connection */
$mysqli->close();

echo "<br><a href='ViewUserPosts.html'>Back to user select</a>";
echo "<br><a href='AdminHome.html'>Home</a>";

?>
