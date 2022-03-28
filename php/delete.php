<?php

// Get record ID.
if(isset($_GET['id'])) {

    include "db_connect.php";

// Standard validation.
$id = validate($_GET['id']);
    
// Query construction with character escape.
$sql = "DELETE FROM entries WHERE UUID=" . db_escape($conn, $id);
$result = mysqli_query($conn, $sql);

// Outcome check.
if($result) {
  header("Location: ../index.php?success=successfully deleted");
} else {
  header("Location: ../index.php?error=unknown error occurred");
}

mysqli_close($conn); 

} else {
    header("Location: ../index.php");
}
?>