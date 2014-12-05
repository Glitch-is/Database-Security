<?php
include "config.php";
$con = mysqli_connect("localhost", "sql3", "sql3", "sql3");
$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);
$query = "SELECT * FROM ${table_prefix}users WHERE username='$username' AND password='$password'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_array($result);
  echo "<h1>Logged in!</h1>";
  if ($row["username"] === "admin") {
    echo "<p>You need to be logged in as admin</p>";
  } else {
    echo "<p>W00T! YOU'RE IN!</p>";
  }
} else {
  echo "<h1>Login failed.</h1>";
}
?>
