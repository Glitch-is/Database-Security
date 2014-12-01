<?php
include("head.html");
$con = mysqli_connect("localhost", "sql2", "sql2", "sql2");
$username = $_POST["username"];
$password = $_POST["password"];
$debug = $_POST["debug"];
$query = "SELECT * FROM users WHERE username='$username'";
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

$logged_in = false;
if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_array($result);
  if ($row["password"] === $password) {
    $logged_in = true;
    echo "<h1>Logged in!</h1>";
    echo "<div class='large-12 panel code columns'><pre>User level: ", $row["user_level"],  "</pre></div>";
    if ($row["user_level"] >= 1337) {
      echo "<p>W00t W00t, You're in!!!1</p>";
    } else {
      echo "<p>Only user levels 1337 or above can see the flag.</p>";
    }
  }
}

if (!$logged_in) {
  echo "<h1>Login failed.</h1>";
}
include("tail.html");
?>
