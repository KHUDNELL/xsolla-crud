<?php

// DB connect.
require_once "db_connect.php";

// Get params, construct query for filtering results.
if(isset($_GET['show'])) {
    $show = $_GET['show'];
    switch ($show) {            
        case 'active':
            $sql = "SELECT * FROM entries WHERE status='ACTIVE'";
            break;
        case 'inactive':
           $sql = "SELECT * FROM entries WHERE status='INACTIVE'";
            break;
        default:
        $sql = "SELECT * FROM entries";
        }
    } else {
        $sql = "SELECT * FROM entries";
    }

    // Query DB.
    $result = mysqli_query($conn, $sql);

// DB disconnect.
mysqli_close($conn);   
?>







