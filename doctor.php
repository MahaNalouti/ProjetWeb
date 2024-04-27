<?php
session_start();
$_SESSION['admin'] = 'username';
include("connection.php");
if(isset($_POST['btn_supp'])){
    $idS=htmlspecialchars($_POST['btn_supp']);
    $query="DELETE FROM doctor WHERE id='$idS'";
    $query_run=mysqli_query($connect,$query);
    if($query_run){

       
        $_SESSION['message']="Medecin supprimé";
        header("Location:doctor.php");
        exit();
    }else{
        $_SESSION['message']="Medecin non supprimé";
        header("Location:doctor.php");
        
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Docteurs</title>

   

</head>

<body>
    <?php
    include("connection.php");
    include("side_navbar.php");
    ?>
    	<main>
			<h1 class="title">Doctor</h1>
			
            <div class="info-data">
            <div class="card">
					<div class="head">
						<div>
							<h2>Total Medecins
							</h2>
							<p>
							<?php
								$query="SELECT * FROM doctor";
								$query_run=mysqli_query($connect,$query);
								if($query_run){
									$num=mysqli_num_rows($query_run);
									echo $num;
								}
								?>
							</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
				</div>
            </div>
			<div>
			<?php
                    include("message.php");
                ?>
			</div>
			<div class="data">
					
				<div class="content-data">
					<div class="head">
						<h3>Listes des Medecins</h3>
						<a href="ajout-medecin.php" class="btn btn-primary float-end">Ajouter Medecin</a>
					</div>
						<div>
							<table class='table table-bordered'>
							<thead>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Nom utilisateur</th>
                                <th>Email</th>
                                <th>Sexe</th>
                                <th>Télephone</th>
                                <th>Salaire</th>
                                <th>Specialité</th>
                                <th>action</th>
                            </thead>
							<tbody>
                                <?php
                                $query="SELECT * FROM doctor";
                                $query_run=mysqli_query($connect,$query);
                                if(mysqli_num_rows($query_run)>0)
                                {
                                    foreach($query_run as $row){
                                       ?>
                                            <tr>
                                                <td><?= $row['id']?></td>
                                                <td><?= $row['nom']?></td>
                                                <td><?= $row['prenom']?></td>
                                                <td><?= $row['unom']?></td>
                                                <td><?= $row['email']?></td>
                                                <td><?= $row['sexe']?></td>
                                                <td><?= $row['tel']?></td>
                                                <td><?= $row['salaire']?></td>
                                                <td><?= $row['specialite']?></td>
                                                <td>
                                                    <form action="modif-medecin.php" method="post">
                                                        <input type="hidden" name="id_modif" value="<?= $row['id']?>">
                                                        <button type="submit" name="btn_modif" class="btn btn-primary  btn-sm">Modifier </button>                                                    </form>
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="unom" value="<?= $row['id']?>">
                                                        <button type="submit" name="btn_supp" class="btn btn-danger  btn-sm" value="<?= $row['id']?>">Supprimer</button>
                                                    </form>                                                </td>
                                            </tr>
                                       <?php
                                    }
                                }else{
                                   ?>
                                <tr>
                                <td colspan="11" style="text-align: center;"><h5>Pas de medecin</h5></td>
                            </tr>
                                     <?php   
                                }
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
