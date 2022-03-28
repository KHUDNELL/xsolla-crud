<?php

if(isset($_POST['create'])) {

    // DB Connection
    require_once "db_connect.php";

    // Standard validation.
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $code = validate($_POST['code']);
    $status = validate($_POST['status']);

    // Encode for URL Param.
    $entry_data = 'name=' . urlencode($name) . '&description=' . urlencode($description) . '&code=' . urlencode($code) . '&status=' . urlencode($status);

    // Validation. 
    if(empty($name)) {
        header("Location: ../index.php?error=Name is required&$entry_data");
    } else if(empty($description)) {
         header("Location: ../index.php?error=Description is required&$entry_data");
    } else if(empty($code)) {
        header("Location: ../index.php?error=Code is required&$entry_data");
    } else if(strlen($code) > 6) {
        header("Location: ../index.php?error=Code limited to 6 characters&$entry_data");  
    } else if(empty($status)) {
        header("Location: ../index.php?error=Status is required&$entry_data");
    } else  {

        // Query construction with character escapes.
       $sql = "INSERT INTO entries ";
       $sql .= "(name, description, code, status) ";
       $sql .= " VALUES (";
       $sql .= "'" . db_escape($conn,$name) . "','" . db_escape($conn, $description) . "','" . db_escape($conn, $code) . "','" .  db_escape($conn, $status) . "')";
       $result = mysqli_query($conn, $sql);
 
       // Outcome report.
       if($result) {
         header("Location: ../index.php?success=successfully created");
       } else {
         header("Location: ../index.php?error=unknown error occurred&$entry_data");
       }
    }

    // DB Disconnect.
    mysqli_close($conn);    
}
?>