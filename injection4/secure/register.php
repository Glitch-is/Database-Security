<?php
$con = mysqli_connect("localhost", "sql4_secure", "sql4_secure", "sql4");
$username = $_POST["username"];
$mysqli->query("SET @username = " . "'" . $mysqli->real_escape_string($username) . "'");
$result = mysqli_query($con, "CALL registered(@username)");

if (mysqli_num_rows($result) !== 0) {
  die("Someone has already registered " . htmlspecialchars($username));
}

die("Registration has been disabled.");
?>
