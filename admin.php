<?php
session_start();
$_SESSION['admin'] = 'username';
include("connection.php");
/*
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM admin WHERE id_a = '$id'";
    if (mysqli_query($connect, $query)) {
        //echo "<p>admin supp</p>";
    } else {
        echo "error"; // Display error message if deletion fails
    }
} else {
    echo "admin session not found";
}
*/
if(isset($_POST['supp'])){
    $id=htmlspecialchars($_POST['supp']);
    $query="DELETE FROM admin WHERE id_a='$id'";
    $query_run=mysqli_query($connect,$query);
    if($query_run){

       
        echo"<script>alert('Admin supprimé'); </script>";
     
    }else{
        echo"<script>alert('Admin non supprimé');</script>";
        
        
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Admins</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="input.css">

   

</head>

<body>
    <?php
    include("connection.php");
    include("side_navbar.php");
    ?>
    	<main>
			<h1 class="title">Admin</h1>
			
            <div class="info-data">
            <div class="card">
					<div class="head">
						<div>
							<h2>Total Admins</h2>
							<p>
							<?php
                            if (isset($_SESSION['admin'])) {
                                $ad = $_SESSION['admin'];
                                $query = "SELECT * FROM admin WHERE username != '$ad'";
                                $res = mysqli_query($connect, $query);
                                if($res){
									$num=mysqli_num_rows($res);
									echo $num;
								}
                            }


								
								?>
							</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
				</div>
            </div>
			
			<div class="data">
					
				<div class="content-data">
					<div class="head">
						<h3>Listes des Admins</h3>
						<a href="ajouter_admin.php" class="btn btn-primary float-end">Ajouter Admin</a>
					</div>
						<div>
							<table class='table table-bordered'>
							<thead>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>nom d'utilisateur</th>
                                <th>mot de passe</th>
                                <th>action</th>
                            </thead>
							<tbody>
                                <?php
                                  $query = "SELECT * FROM admin WHERE username != '$ad'";                               
                                  $res = mysqli_query($connect, $query);
                                
                                  while ($row = mysqli_fetch_array($res)) {
                                
                                    ?> 
                                  
                              <tr>
                                <td><?php echo $row['id_a']?></td>
                                <td><?php echo $row['nom_a']?></td>
                                <td><?php echo $row['prenom_a']?></td>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['password']?></td>
                                
                                <td>

                                <form action="modifier_admin.php" method="post">
                                                        <input type="hidden" name="modif" value="<?= $row['id_a']?>">
                                                        <button type="submit" name="btn_modif" class="btn btn-primary  btn-sm">Modifier </button>                                                    </form>
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="unom" value="<?= $row['id_a']?>">
                                                        <button type="submit" name="supp" class="btn btn-danger  btn-sm" value="<?= $row['id_a']?>">Supprimer</button>
                                                    </form>  
                            
                                                                               
                                </td>
                             
                              </tr>
                              <?php






                               }
                               /* else{
                                   ?>
                                <tr>
                                <td colspan="11" style="text-align: center;"><h5>Pas de medecin</h5></td>
                               </tr>
                                <?php   
                                }*/
                                ?>
                               
                            </tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
		</main>
</body>

</html>
