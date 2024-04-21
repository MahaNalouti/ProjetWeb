<?php
session_start();
include("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<title>Listes patients</title>
</head>
<body>
	
<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i>Hopitale</a>
		<ul class="side-menu">
			<li><a href="#" class="active" ><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li>
				<a href="#" ><i class='bx bx-table icon' ></i>Admins<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Médecins<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Patients<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Rendez vous<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Salles<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Matériels<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Médicaments<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			
		</ul>
		<ul class="side-menu">
		
			<li>
			<a href="">
					<i class="bx bx-table icon"></i>Paramétre</a>
				<a href="">
					<i class="bx bx-table icon"></i>Deconnexion</a>
			</li>
		</ul>
		
	</section>
	

	<section id="content">
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<a href="#" class="nav-link">
				<i class='bx bxs-bell icon' ></i>
				<span class="badge">5</span>
			</a>
			<a href="#" class="nav-link">
				<i class='bx bxs-message-square-dots icon' ></i>
				<span class="badge">8</span>
			</a>
			<span class="divider"></span>
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                </div>
		</nav>


		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Tableau de bord</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Liste Patient</a></li>
			</ul>
			<div class="info-data">
			<div class="container">
            <div class="info-data">
            <div class="card">
					<div class="head">
						<div>
							<h2>Total Patients
							</h2>
							<p>
							<?php
								try {
									$query = "SELECT * FROM patient";
									$stmt = $connect->query($query);
									if ($stmt) {
										$num = mysqli_num_rows($stmt);
										echo $num;
									} else {
										
										echo "Ereur";
									}
								}
								catch(PDOException $e){
									echo "Erreur : " . $e->getMessage();
								}
								?>
							</p>
						</div>
						
					</div>
				</div>
            </div>
			<div>
            <?php include("message.php"); 
    ?>
			</div>
 
	
    <div class="row">
        <div class="col-md-12">
            <div class="card">
			<div class="content-data">
					
		<!-- MAIN -->
        <div class="container-fluid">
        <div class="row">
           
            <div class="col-md-12">
            <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                   
                        <h4 >Liste des Patients <a href="ajoutpatient.php" class="btn btn-primary float-end">Ajouter Patient</a> </h4>
                    </div>
                    <div class="card-body">
                    <style>
        .table td,
        .table th {
            padding: 0.25rem; /* Reduce padding */
            font-size: 12px; /* Further reduce font size */
        }
        .editbtn,
        .btn-sm {
            padding: 0.2rem 0.4rem; /* Reduce padding */
            font-size: 10px; /* Keep font size smaller */
        }
    </style>
                    <table class='table table-bordered'>
                    </div>     
                    </div>   
                    </div>    

    <thead>
        <tr>
             <th >#</th>
            <th >Matricule-cnss</th>
            <th >Nom</th>
            <th >Prenom</th>
            <th >Nom utilisateur</th>
            <th >Mot de passe</th>
            <th >sexe</th>
            <th >type de sang</th>
            <th>poids</th>
            <th >age</th>
            <th >date de naissance</th>
            <th>allergie</th>
            <th >dernier rendez-vous</th>
            <th >telephone</th>
            <th >Modifier</th>
            <th>Supprimer</th>
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
                    <td scope="row"><?php echo $row['matricule']; ?></td>
                    <td><?php echo $row['matricule']; ?></td>
                    <td><?php echo $row['nom_p']; ?></td>
                    <td><?php echo $row['prenom_p']; ?></td>
                    <td><?php echo $row['username_p']; ?></td>
                    <td><?php echo $row['pass_p']; ?></td>
                    <td><?php echo $row['sexe']; ?></td>
                    <td><?php echo $row['grp_sang']; ?></td>
                    <td><?php echo $row['poids']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['naiss']; ?></td>
                    <td><?php echo $row['allergie']; ?></td>
                    <td><?php echo $row['der_rdv_p']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td>
                    <form action="modifypatient.php" method="post">
                    <input type="hidden" name="matricule_modif" value="<?= $row['matricule'] ?>">
                     <button type="submit" class="btn btn-primary btn-sm">Modifier </button>
             </form>

              
            
</td>
                     <td>
                    <form action="insert.php" method="post" class="d-inline">
                   <input type="hidden" name="matricule_sup" value="<?= $row['matricule']?>">
                  <button type="submit" name="btn_supp" class="btn btn-danger  btn-sm" value="<?= $row['matricule']?>">Supprimer</button>
                    </form></td>
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
    </div>
	</section>
	

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
</body>
</html>
