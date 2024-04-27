<?php
session_start(); // Start session at the beginning

// Check if the user is logged in
if(!isset($_SESSION['doctor'])) {
    header("location:login.php"); // Redirect to login page if not logged in
    exit();
}

// If the user confirms logout
if(isset($_POST['logout_confirm'])) {
    session_destroy(); // Destroy the session
    header("location:login.php"); // Redirect to login page after logout
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
    <link rel="stylesheet" type="text/css"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <style >
        body{
            background-image: url(back.jpg);
            color:white;
            padding-top:100px;
            text-align:center;
        }
      .btn:hover{
        color: #0076d4;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>
</head>
<body style="color:white;padding-top:100px;text-align:center;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Confirmation de déconnexion</h5>
                        <form method="post">
                            <p>tu veut vraiment déconnecter ?</p>
                            <button type="submit" class="btn btn-danger" name="logout_confirm">oui ,déconnecter</button>
                            <a href="medecin.php" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
