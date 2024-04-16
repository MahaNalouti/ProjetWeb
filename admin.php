<?php
session_start();
$_SESSION['admin'] = 'username';
include("connection.php");

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM admin WHERE id_a = '$id'";
    if (mysqli_query($connect, $query)) {
        //echo "<p>admin supp</p>";
    } else {
        echo "error"; // Display error message if deletion fails
    }
} 




?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <script>
        function validateForm() {
            var nom = document.getElementsByName("nom")[0].value;
            var prenom = document.getElementsByName("prenom")[0].value;
            var uname = document.getElementsByName("uname")[0].value;
            var pass = document.getElementsByName("pass")[0].value;
            var alpha = /^[a-zA-Z]+$/;

            if (!alpha.test(nom) || nom.trim() == "" || nom.length > 10)
             {
                alert("Veuillez saisir un nom valide.");
                return false;
            }

            if (!alpha.test(prenom) || prenom.trim() == "" || prenom.length > 30) {
                alert("Veuillez saisir un prénom valide.");
                return false;
            }

            if (uname.trim() == "" || uname.length > 20) {
                alert("Veuillez saisir un nom d'utilisateur valide.");
                return false;
            }

            if (pass.trim() == "" || pass.length > 20) {
                alert("Veuillez saisir un mot de passe valide.");
                return false;
            }

            return true;
        }

       
    </script>

</head>

<body>
    <?php
    include("side_navbar.php");
    ?>
    <main>
    <div class="data">
    <div class="content-data">

    
            
               
                            <div >
                            <?php
                              // include("connection.php");
                             ?>
                             <div class="head"><h1 class="text-center">Tout les administrateurs</h1></div>
                             <div class="menu">
                                
                                <?php
                                // Check if admin is set in session
                                if (isset($_SESSION['admin'])) {
                                    $ad = $_SESSION['admin'];
                                    $query = "SELECT * FROM admin WHERE username != '$ad'";
                                    $res = mysqli_query($connect, $query);
                                    $output = "
                                 <table class='table table-bordered'>
                                  <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th style='width: 10%;'>Action</th>
                                  </tr>
                                  ";
                                    if (mysqli_num_rows($res) < 1) {
                                        $output .= "<tr><td colspan='4' class='text-center'>No New Admin</td></tr>";
                                    }

                                    while ($row = mysqli_fetch_array($res)) {
                                        $id = $row['id_a'];
                                        $nom = $row['nom_a'];
                                        $prenom = $row['prenom_a'];
                                        $output .= "
                                  <tr>
                                    <td>$id</td>
                                    <td>$nom</td>
                                    <td>$prenom</td>
                                    <td>                                
                                      
                                    <a href='admin.php?action=delete&id=$id'><button  class='btn btn-danger'>Remove</button></a> 
                                    <a href='modifier_admin.php?id=$id' class='btn btn-primary'>Modifier</a>
                                 
                                  </tr>";
                                    }
                                    $output .= "</table>";
                                    echo $output;

                                    
                                }

                                ?>
                                </div>
                            </div>
    </div>


                    <div class="content-data">

                        <div >
                              <div class="menu">
                                <?php
                                if (isset($_POST['add'])) {
                                    $n = $_POST['nom'];
                                    $p = $_POST['prenom'];
                                    $uname = $_POST['uname'];
                                    $pass = $_POST['pass'];
                                    $image = $_FILES['img']['name'];
                                    $error = array();
                                    if (empty($n)) {
                                        $error['u'] = "Enter le nom d'admin";
                                    } elseif (empty($p)) {
                                        $error['u'] = "Enter le prenom d'admin";
                                    } elseif (empty($uname)) {
                                        $error['u'] = "Enter Admin Username";
                                    } else if (empty($pass)) {
                                        $error['u'] = "Enter Admin Password";
                                    } else if (empty($image)) {
                                        $error['u'] = "entrez une photo";
                                    }

                                    if (count($error) == 0) {
                                        $q = "INSERT INTO admin (nom_a, prenom_a, username, password, profile) 
                                              VALUES ('$n','$p','$uname','$pass','$image')";
                                        $result = mysqli_query($connect, $q);
                                        if ($result) {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "$image");
                                        } else {
                                        }
                                    }
                                }

                                if (isset($error['u'])) {
                                    $er = $error['u'];
                                    $show = "<h5 class='text-center alert alert-danger'>$er
                             </h5>";
                                } else {
                                    $show = "";
                                }

                                
                                if (isset($_POST['modif'])) {
                                    $id = $_POST['id'];
                                    $n = $_POST['nom'];
                                    $p = $_POST['prenom'];
                                    $uname = $_POST['uname'];
                                    $pass = $_POST['pass'];
                                    $image = $_FILES['img']['name'];
                                    $error = array();
                                    if (empty($id)) {
                                        $error['u'] = "Enter l'id' d'admin"; //$error['u'] = "Enter le nom d'admin";
                                    } elseif (empty($n)) {
                                        $error['u'] = "Enter le nom d'admin";
                                    } elseif (empty($p)) {
                                        $error['u'] = "Enter le prenom d'admin";
                                    } elseif (empty($uname)) {
                                        $error['u'] = "Enter Admin Username";
                                    } else if (empty($pass)) {
                                        $error['u'] = "Enter Admin Password";
                                    } else if (empty($image)) {
                                        $error['u'] = "entrez une photo";
                                    }
                                    if (count($error) == 0) {
                                        $q = "UPDATE admin SET nom_a='$n', prenom_a='$p', username='$uname', password='$pass', profile='$image' WHERE id_a=$id";
                                        $result = mysqli_query($connect, $q);
                                        if ($result) {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "$image");
                                        } else {
                                        }
                                    }

                                    if (isset($error['u'])) {
                                        $er = $error['u'];
                                        $show = "<h5 class='text-center alert alert-danger'>$er
                                         </h5>";
                                    } else {
                                        $show = "";
                                    }
                                  }

                                ?>
                                <h1 class="text-center">Ajouter un administrateur</h1>
                                <form method="post" enctype="multipart/form-data" >
                                    <div>
                                        <?php echo $show; ?>
                                    </div>
                                    <div class="from-group">
                                        <label>Nom</label>
                                        <input type="text" name="nom" class="form-control" autocomplete="off" >
                                    </div>

                                    <div class="from-group">
                                        <label>Prenom</label>
                                        <input type="text" name="prenom" class="form-control" autocomplete="off">
                                    </div>

                                    <div class="from-group">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>

                                    <div class="from-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control">
                                    </div>

                                    <div class="from-group">
                                        <label>Ajouter une photo </label>
                                        <input type="file" name="img" class="form-control" value="choisir une photo">
                                    </div><br>
                                    <input type="submit" name="add" value="Ajouter " class="btn btn-success" onclick="return validateForm()">
                                </form>
                            </div>
                        </div>

                      </div>


                            
                        
           
   
    </div>
 </main>
</body>

</html>
