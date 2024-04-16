<?php
session_start();
include("../include/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="tableau.css">
	<title>AdminSite</title>
</head>
<body>
<?php
	if(isset($_SESSION['doctor'])){
		$doc=$_SESSION['doctor'];
		$query="SELECT * FROM doctors where unom='$doc'";
		$query_run=mysqli_query($con,$query);
		$row=mysqli_fetch_array($query_run);
		$unom=$row['unom'];
		$mdp=$row['mdp'];
		$nom=$row['nom'];
		$id=$row['id'];
		$spec=$row['spec'];
	}else{
		$id='';
		$nom='';
		$spec='';
	}
	

	?>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bx-plus-medical icon' ></i>Hopital Medical</a>
		<ul class="side-menu">
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="side">
				<a href="patient.php"><i class='bx bx-table icon' ></i>Patients</a>
			</li>
			<li class="side">
				<a href="#"><i class='bx bx-table icon' ></i>Rendez vous</i></a>
				
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="parametre.php">
				<i class='bx bxs-cog icon' ></i>
				Paramètre
				</a>
			</li>
			<li>
				<a href="logout.php">
				<i class='bx bxs-log-out-circle icon logout'></i>
				Déconnexion
				</a>
			</li>
		</ul>
		
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<div>
				<?php
				echo "Bienvenu Dr ".$nom;
				?>
			</div>
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Page d'accueil</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Tableau de bord</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
							<h2><?php
												$query="SELECT * FROM rdv
												WHERE id_medecin='$id'";
												$query_run=mysqli_query($con,$query);
												if($query_run){
														$num=mysqli_num_rows($query_run);
														echo "<h2>$num</h2>";
												}
							?></h2>
						</div>
					</div>
					<p>Rendez vous</p>
					<span class="label"></span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2><?php
												$query="SELECT * FROM patients
												WHERE mat_cnss IN (SELECT id_patient FROM rdv WHERE id_medecin = '$id');";
												$query_run=mysqli_query($con,$query);
												if($query_run){
														$num=mysqli_num_rows($query_run);
														echo $num;
												}
											
							?></h2>
						</div>

						<div class="menu">
						</div>
					</div>
						<p>Patients</p>
					<span class="label">
					</span>
				</div>
			</div>
			<div class="data">
					
				
				<div class="content-data">
					<div class="head">
						<h3>Rendez d'aujordhui</h3>
					</div>
					<table>
						<thead>
							<tr>
							<th>id</th>
							<th>patient
							</th>
							<th>Heure</th>
							</tr>
							
						</thead>
						<tbody>
							<?php
							$date = date("Y-m-d");
							$query="SELECT * from rdv where spec='$spec' AND date='$date'";
							$query_run=mysqli_query($con,$query);
							if(mysqli_num_rows($query_run)>0){
								foreach($query_run as $row){
									?>
									<tr>
										<td><?php 
										$mat=$row['mat_cnss']; 
										$query="SELECT * from patients where mat_cnss='$mat'";
										$query_run=mysqli_query($con,$query);
										if($query_run){
											$row=mysqli_fetch_array($query_run);
											echo $row['nom'];
										}
										?></td>
									</tr>
									<?php 
								}
							
							}else{
									?>
									<tr>
										<td colspan="3">
										Pas de rendez vous aujourdhui
										</td>
									<?php
								}
							
							?>
							

						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
</body>
</html>