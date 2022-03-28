<?php 

// For showing record starting data.
if(isset($_GET['id'])) {
    include "db_connect.php";   

    // Standard validation.
    $id = validate($_GET['id']);

    // Escape for DB insert.
    $id = db_escape($id);
    
    // Query DB.
    $sql = "SELECT * FROM entries WHERE UUID=$id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);        
    } else {
        header("Location: ../index.php");
    }

    // Disconnect.
    mysqli_close($conn);

// For changing data.
} else if(isset($_POST['update'])) {

   include "db_connect.php";  

   // Standard validation.
    $id = validate($_POST['id']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $code = validate($_POST['code']);
    $status = validate($_POST['status']);

    if(strlen($code) > 6) {
        header("Location: ../index.php?error=Code limited to 6 characters");
    } else {

    // Query construction with character escapes.
    $sql = "UPDATE entries SET";
    $sql .= " name='" . db_escape($conn, $name) . "', description='" . db_escape($conn, $description) . "', code='" . db_escape($conn, $code) . "', status='" . db_escape($conn, $status) . "' WHERE UUID=" . db_escape($conn, $id);

    $result = mysqli_query($conn, $sql);
    
    // Outcome report.
    if($result) {
        header("Location: ../index.php?success=Successfully Updated");
    } else {
        header("Location: ../index.php?error=Could Not Update Record");
    }
    }

    // Disconnect.
    mysqli_close($conn);
}
?>