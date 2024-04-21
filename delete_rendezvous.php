<?php
session_start();
include("include/connection.php");

// Check if matricule parameter is set and not empty
if(isset($_GET['matricule']) && !empty($_GET['matricule'])) {
    // Sanitize the input to prevent SQL injection
    $matricule = mysqli_real_escape_string($connect, $_GET['matricule']);

    // Construct the delete query
    $delete_query = "DELETE FROM rendez_vous WHERE mat_cnss='$matricule'";

    // Execute the query
    if(mysqli_query($connect, $delete_query)) {
        // Redirect back to the profile page after successful deletion
        header("Location: profile.php");
        exit();
    } else {
        // If deletion fails, display an error message
        echo "Error deleting rendezvous: " . mysqli_error($connect);
    }
} else {
    // If matricule parameter is missing or empty, display an error message
    echo "Invalid matricule parameter.";
}

mysqli_close($connect);
?>
