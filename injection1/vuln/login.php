<?php
include($_SERVER['DOCUMENT_ROOT'] . "/db/include/head.html");
$con = mysqli_connect("localhost", "sql1", "sql1", "sql1");
$username = $_POST["username"];
$password = $_POST["password"];
$debug = $_POST["debug"];
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($con, $query);

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
  echo "<h1>Logged in!</h1>";
}
include($_SERVER['DOCUMENT_ROOT'] . "/db/include/tail.html");
?>
