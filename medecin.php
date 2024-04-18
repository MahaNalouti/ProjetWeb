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
	<link rel="stylesheet" href="tableau.css">
	<title>AdminSite</title>
</head>
<body>
<?php
	if(isset($_SESSION['doctor'])){
		$doc = $_SESSION['doctor'];
	
		try {
			$query = "SELECT * FROM doctors WHERE unom = :doc";
			$stmt = $connect->prepare($query);
			$stmt->bindParam(':doc', $doc);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
			if ($row) {
				$unom = $row['unom'];
				$mdp = $row['mdp'];
				$nom = $row['nom'];
				$id = $row['id'];
				$spec = $row['specialite'];
			} else {
				$id = '';
				$nom = '';
				$spec = '';
			}
		} catch(PDOException $excp) {
			$_SESSION['message']='Erreur :' . $excp->getMessage();
		}
	} else {
		$id = '';
		$nom = '';
		$spec = '';
	}
	

	?>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bx-plus-medical icon' ></i>Hopital Medical</a>
		<ul class="side-menu">
			<li><a href="medecin.php" class="active"><i class='bx bxs-dashboard icon' ></i> Tableau de Bord</a></li>
			<li class="side">
				<a href="patient.php"><i class='bx bx-table icon' ></i>Patients</a>
			</li>
			<li class="side">
				<a href="rendez-vous.php"><i class='bx bx-table icon' ></i>Rendez vous</i></a>
				
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
			
			<div class="data">
					
				
				<div class="content-data">
					<div class="head">
						<h3>Rendez-vous d'aujordhui</h3>
					</div>
					<table>
						<thead>
							<tr>
							<th>patient
							</th>
							<th>Heure</th>
							</tr>
							
						</thead>
						<tbody>
							<?php
							$date=date("Y-m-d");
			try{
				$query = "SELECT * FROM `rendez-vous` WHERE specialite = 'ophtalmologie' AND date = $date";
				$stmt = $connect->prepare($query);
				$stmt->execute();
				$tab_valeurs=$stmt->fetchAll(PDO::FETCH_OBJ);
				if(count($tab_valeurs)>0){
					foreach($tab_valeurs as $rows){
						echo '<tr><td>'.$rows->heure.'</td>
						<td>'.$rows->nom.'</td>
						</tr>';
					}
				}else{
					echo "<tr> <td colspan='7'>Pas de patients</td></tr>";
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
