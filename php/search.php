<?php 

// Check for term.
if(isset($_POST['search_term'])) {

    include "db_connect.php";

    // Store term and escape characters.
    $search_term = $_POST['search_term'];
    $search_term = db_escape($conn, $search_term);
    $search_term = htmlspecialchars($search_term);

    // Query DB.
    $sql = "SELECT * FROM entries WHERE name='$search_term' OR description LIKE '%$search_term%' OR code='$search_term'";
    $result = mysqli_query($conn, $sql);
    
    // DB disconnect.
    mysqli_close($conn);
}
?>

