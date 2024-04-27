<?php
include("connection.php");
session_start();
$_SESSION['admin'] = 'username';
if(isset($_POST['btn_supp'])){
    $matriculeS = mysqli_real_escape_string($connect, $_POST['btn_supp']);

    $query2 = "DELETE FROM patient WHERE matricule='$matriculeS'";
    $query_run = mysqli_query($connect, $query2);

    if($query_run){
        $_SESSION['message'] = "Patient supprimé";
    }else{
        $_SESSION['message'] = "Erreur lors de la suppression du patient: " . mysqli_error($connect);
    }
    header("Location: patient.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patients</title>

   

</head>

<body>
    <?php
    
    include("side_navbar.php");
    ?>
    	<main>
			<h1 class="title">Patient</h1>
            <div class="info-data">
            <div class="card">
					<div class="head">
						<div>
							<h2>Total Patient
							</h2>
							<p>
							<?php
								$query = "SELECT * FROM patient ";
                                $res = mysqli_query($connect, $query);
								if($res){
									$num=mysqli_num_rows($res);
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
						<h3>Listes des Patients</h3>
						<a href="ajoutpatient.php" class="btn btn-primary float-end">Ajouter Patient</a>
					</div>
						<div>
							<table class='table table-bordered'>
							<thead>
        <tr>
             
            <th >Matricule-cnss</th>
            <th >Nom</th>
            <th >Prenom</th>
            <th >Nom utilisateur</th>
            <th >Mot de passe</th>
            
            <th >dernier rendez-vous</th>
            
            <th >Action</th>
           
        </tr>
    </thead>
    <tbody >
        <?php
        $query="SELECT * FROM patient";
        $query_run=mysqli_query($connect,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            foreach($query_run as $row){
                ?>
                <tr>
                   
                    <td><?php echo $row['matricule']; ?></td>
                    <td><?php echo $row['nom_p']; ?></td>
                    <td><?php echo $row['prenom_p']; ?></td>
                    <td><?php echo $row['username_p']; ?></td>
                    <td><?php echo $row['pass_p']; ?></td>
                    
                    <td><?php echo $row['der_rdv_p']; ?></td>
                   
                    <td>
                    <form action="modifypatient.php" method="post">
                    <input type="hidden" name="matricule_modif" value="<?= $row['matricule'] ?>">
                    <button type="submit" class="btn btn-primary btn-sm">Modifier </button>
                    </form>
                     

                     <form action="" method="post" class="d-inline">
                            <input type="hidden" name="matricule_sup" value="<?= $row['matricule']?>">
                            <button type="submit" name="btn_supp" class="btn btn-danger  btn-sm" value="<?= $row['matricule']?>">Supprimer</button>
                    </form>

              
            
</td>
                    
                    </tr>
                                       <?php
                                    }
                                }else{
                                   ?>
                                <tr>
                                <td colspan="11" style="text-align: center;"><h4>Pas de Patient</h4>
                            </td>
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
