<?php
session_start(); 

include("connection.php");

$error = ""; 
$uname = ""; 

if (isset($_POST['patsub1'])) { 
    $uname = $_POST['fname']; 
    $password = $_POST['password'];
    
    if (empty($uname)) {
        $error = "Enter username";
    } elseif (empty($password)) {
        $error = "Enter password";
    } else {
      
        $query = "SELECT * FROM doctor WHERE unom=? AND mdp=?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ss", $uname, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $_SESSION['doctor'] = $uname;
            header("location: medecin.php");
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