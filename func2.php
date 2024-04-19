<?php
session_start(); // Start session at the beginning

include("include/connection.php");

$error = ""; // Initialize $error variable as empty string
$uname = ""; // Initialize $uname variable

if (isset($_POST['patsub1'])) { // Assuming 'patsub1' is the name of the submit button for patient login
    $uname = $_POST['fname']; // Assign value to $uname from the form input field
    $password = $_POST['password'];
    
    if (empty($uname)) {
        $error = "Enter username";
    } elseif (empty($password)) {
        $error = "Enter password";
    } else {
        // Use prepared statement to prevent SQL injection
        $query = "SELECT * FROM patient WHERE username_p=? AND pass_p=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ss", $uname, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $_SESSION['Patient'] = $uname;
            header("location: profile.php");
            exit();
        } else {
            $error = "Invalid username or password";
            echo "<script>alert('$error');</script>";
            header("Location: error1.php"); 
            exit();
        }
    }
}
?>


