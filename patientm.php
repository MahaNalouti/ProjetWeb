<?php
session_start();
include("connectionm.php");
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
		$doc = $_SESSION['doctor'];
	
		try {
			$query = "SELECT * FROM doctor WHERE unom = :doc";
			$stmt = $connect->prepare($query);
			$stmt->bindParam(':doc', $doc);
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
			if ($row) {
				$unom = $row['unom'];
				$mdp = $row['mdp'];
				$nom = $row['nom'];
				$id = $row['id'];
				$spec=$row['specialite'];
			} else {
				$id = '';
				$nom = '';
				$spec='';
			}
		} catch(PDOException $excp) {
			echo "Erreur :" . $excp->getMessage();
		}
	} else {
		$id = '';
		$nom = '';
		$spec='';
	}
	

	?>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bx-plus-medical icon' ></i>Hopital Medical</a>
		<ul class="side-menu">
			<li class="side"><a href="medecin.php" ><i class='bx bxs-dashboard icon' ></i> Tableau de bord</a></li>
			<li class="side">
				<a href="patientm.php" class="active"><i class='bx bx-table icon' ></i>Patients</a>
			</li>
			<li class="side">
				<a href="rendez_vousM.php"><i class='bx bx-table icon' ></i>Rendez vous</a>
			</li>
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="logoutD.php">
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
			<h1 class="title">Les Patients</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Liste Patients</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Patients</a></li>
			</ul>
			<div class="data">
			<div class="content-data">	
				<div class="card">
					<table  >
					<thead> 
									<tr>
										<th>Nom</th>
										<th>Prenom</th>
										<th>naissance</th>
										<th>Groupe Sangain</th>
										<th>Poids</th>
										<th>Age</th>
										<th>Allergie</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
										try{
											$query = "SELECT * FROM patient WHERE matricule IN (SELECT mat_cnss FROM rendez_vous WHERE specialite = :specialite)";
											$stmt = $connect->prepare($query);
											$stmt->bindParam(':specialite', $spec);
											$stmt->execute();
											$tab_valeurs=$stmt->fetchAll(PDO::FETCH_OBJ);
											if(count($tab_valeurs)>0){
												foreach($tab_valeurs as $rows){
													echo '<tr><td>'.$rows->nom_p.'</td>
													<td>'.$rows->prenom_p.'</td>
													<td>'.$rows->naiss.'</td>
													<td>'.$rows->grp_sang.'</td>
													<td>'.$rows->poids.'</td>
													<td>'.$rows->age.'</td>
													<td>'.$rows->allergie.'</td>
													</tr>';
												}
											}else{
												echo "<tr> <td colspan='7'> Pas de patients</td></tr>";
											}
											
											
										

										
										}catch(PDOException $excp){
											echo "Errer:".$excp->getMessage();
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
