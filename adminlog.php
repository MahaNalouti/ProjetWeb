<?php

session_start();
include("../raslen/connection.php");

if(isset($_POST['login']))
{
    $errors = 0;
    $username = $_POST['username'] ?? ''; 
    $password = $_POST['password'] ?? '';
    
    if(empty($username))
    {
        $errors++;
        echo "<div class='alert alert-danger' role='alert'>Enter le pseudo</div>";
    }

    if(empty($password))
    {
        $errors++;
        echo "<div class='alert alert-danger' role='alert'>Enter mot de passe</div>";
    }

    if($errors == 0)
    {
        
        $req="SELECT * FROM admin WHERE username='$username' AND password='$password'" ;
        $res=mysqli_query($connect,$req);
        if(mysqli_num_rows($res) == 1){
            // Display JavaScript alert after successful login
            echo "<script>alert('Tu es connecté en tant que administrateur');</script>";
        
            // Set session variable
            $_SESSION['admin'] = $username;
        
            // Redirect to adminprofil.php
            header("Location: adminprofil.php");
            exit(); // Ensure no further output is sent
        } else {
            echo "<div class='alert alert-danger' role='alert'>Login pas valide</div>";
        }
        
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN ADMIN</title>
    <script>
        
        function verif(){
            username=document.getElementById("username").value;
            password=document.getElementById("password").value;

            if(username.length==0)
            {
                alert("entrez le pseudo ");
            }

            if(password.length==0)
            {
                alert("entrez le mot de passe");
            }
            if(username.length>20){
                alert("pseudo trop long");
            }
            if(username.length>20){
                alert("mot de passe est trop long");
            }
            return true;
            

        }
       
    </script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-image:url(admin.png); background-repeat:no-repeat; background-size:cover;">
    <?php include("../raslen/header.php"); ?>
    <div style="margin-top: 50px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <img src="adminlogo.jpg" alt="" class="col-md-2 ">
                    <form action="" method="post" class="my-3">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Username" id="username" required >
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="off">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" onsubmit="verif()" value="login">
                       
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
