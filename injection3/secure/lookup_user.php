<?php
include "config.php";
$con = mysqli_connect("localhost", "sql3", "sql3", "sql3");
$id = mysqli_real_escape_string($con, $_GET["id"]);

if (intval($_GET["debug"])) {
  echo "<pre>";
  echo "id: ", htmlspecialchars($id);
  echo "</pre>";
}

$mysqli->query("SET @id = " . "'" . $mysqli->real_escape_string($id) . "'");
$query = "CALL lookup(@id);";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) !== 1) {
  die("<p>Could not find user.</p>");
}

$row = mysqli_fetch_array($result);
echo "<pre>";
echo "User info for ", htmlspecialchars($row["username"]), "\n";
echo "Display name: ", htmlspecialchars($row["display_name"]), "\n";
echo "Location: ", htmlspecialchars($row["location"]), "\n";
echo "E-mail: ", htmlspecialchars($row["email"]), "\n";
echo "</pre>";
echo '<a href="lookup_user.phps">View source</a>';
?>
