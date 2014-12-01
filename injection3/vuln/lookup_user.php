<?php
include "config.php";
$con = mysqli_connect("localhost", "sql3", "sql3", "sql3");
// ID is escaped, so this must be safe, right?
$id = mysqli_real_escape_string($con, $_GET["id"]);

if (intval($_GET["debug"])) {
  echo "<pre>";
  echo "id: ", htmlspecialchars($id);
  echo "</pre>";
}

$query = "SELECT * FROM ${table_prefix}users WHERE id=$id";
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
