<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "treywerr", "AiNg4gue", "treywerr");

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT post_id FROM Posts";
if ($result = $mysqli->query($query)) {
	
	while ($row = $result->fetch_assoc()) {
		$temp = $_POST["" . $row["post_id"] . ""];
		if ($temp != "") {
			$query = "DELETE FROM Posts WHERE post_id='" . $row["post_id"] . "';";
			if ($mysqli->query($query)) {
				echo "<p>Post with ID " . $temp . " has been deleted.</p><br>";
			} else {
				echo "<h3>Failed to delete. Cannot process query.</h3>";
			}
		}
	}
	$result->free();

} else {
	echo "<h3>Cannot process query</h3>";
}

/* close connection */
$mysqli->close();

echo "<a href='DeletePost.html'>Back</a>";
echo "<br><a href='AdminHome.html'>Home</a>";

?>
