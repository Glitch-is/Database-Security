<?php
include($_SERVER['DOCUMENT_ROOT'] . "/db/include/head.html");
$con = mysqli_connect("localhost", "sql1_secure", "sql1_secure", "sql1");
$username = $_POST["username"];
$password = $_POST["password"];
$debug = $_POST["debug"];

$con->query("SET @user = " . "'" . $con->real_escape_string($username) . "'");
$con->query("SET @pass = " . "'" . $con->real_escape_string($password) . "'");

$result = $con->query("CALL login(@user, @pass)");

if (intval($debug)) {
  echo "<div class='large-12 panel code columns'>";
  echo "<pre>";
  echo "username: ", htmlspecialchars($username), "\n";
  echo "password: ", htmlspecialchars($password), "\n";
  echo "SQL query: ", htmlspecialchars($query), "\n";
  if (mysqli_errno($con) !== 0) {
    echo "SQL error: ", htmlspecialchars(mysqli_error($con)), "\n";
  }
  echo "</pre>";
  echo "</div>";
}

if (mysqli_num_rows($result) !== 1) {
  echo "<h1>Login failed.</h1>";
} else {
  echo "<h1>Well.. this is emberassing</h1>";
  echo "<h4>Please contact <b>Glitch@Glitch.is</b> explaining how you performed your glorious hack, we'd love to hear about it</h4>";
}
include($_SERVER['DOCUMENT_ROOT'] . "/db/include/tail.html");
?>
