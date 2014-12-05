<?php
include($_SERVER['DOCUMENT_ROOT'] . "/db/include/head.html");
$con = mysqli_connect("localhost", "sql2_secure", "sql2_secure", "sql2");
$username = $_POST["username"];
$password = $_POST["password"];
$debug = $_POST["debug"];

$con->query("SET @user = " . "'" . $con->real_escape_string($username) . "'");
$con->query("SET @pass = " . "'" . $con->real_escape_string($password) . "'");

$result = $con->query("CALL login(@user)");

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

$logged_in = false;
if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_array($result);
  if ($row["password"] === $password) {
    $logged_in = true;
    echo "<h1>Logged in!</h1>";
    echo "<h3>This is emberassing... Please contact us and tell us how you did it</h3>";
  }
}

if (!$logged_in) {
  echo "<h1>Login failed.</h1>";
}
include($_SERVER['DOCUMENT_ROOT'] . "/db/include/tail.html");
?>
