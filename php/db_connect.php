<?php

// Get credentials.
require_once('db_credentials.php');

// Connect.
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check.
if(!$conn) {
    echo "connection failed!";
}

// DB input character escape function.
function db_escape($conn, $string) {
    return mysqli_real_escape_string($conn, $string);
}

// Standard validation.
function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>