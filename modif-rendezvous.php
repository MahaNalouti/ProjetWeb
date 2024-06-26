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
	<title>Modifier Rendez-vous</title>
	
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
	
	if(isset($_POST['Modif'])){
		$id_r=htmlspecialchars(trim($_POST['id']));
		$date=htmlspecialchars(trim($_POST['date']));
        $tmp=htmlspecialchars(trim($_POST['heure']));
		try{
			if(!empty($date) || !empty($tmp)){
				$query="UPDATE `rendez_vous` set date=:date , heure=:heure where id=:id_r";
				$stmt=$connect->prepare($query);
				$stmt->bindParam(':date',$date);
				$stmt->bindParam(':heure',$tmp);
				$stmt->bindParam(':id_r',$id_r);
				$stmt->execute();

				$_SESSION['message'] = "Rendez-vous modifié";
                header("Location: rendez_vousM.php");
			}else{
				$_SESSION['message']="Veuillez remplir tous les champs";
				header("Location:rendez_vousM.php");
			}
		}catch(PDOException $e){
			$_SESSION['message'] = "Erreur lors de la modification  : " . $e->getMessage();
            header("Location: rendez_vousM.php");
		}
	}
	?>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bx-plus-medical icon' ></i>Hopital Medical</a>
		<ul class="side-menu">
			<li class="side"><a href="medecin.php" ><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="side">
				<a href="patient.php" ><i class='bx bx-table icon' ></i>Patients</a>
			</li>
			<li class="side">
				<a href="rendez-vous.php" class="active"><i class='bx bx-table icon' ></i>Rendez vous</a>
			</li>
		</ul>
		<ul class="side-menu">
			
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
			<h1 class="title">Modifier Rendez-vous</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Rendez-vous</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Modifier Rendez-vos</a></li>
			</ul>
			<div class="data">
			<?php
                    include("message.php");
                ?>
			<div class="content-data">	
				<?php
						if(isset($_POST['id_modif'])){
							$id_m = $_POST['id_modif'];
							try {
								$query = "SELECT * FROM `rendez_vous` WHERE id=:id";
								$stmt = $connect->prepare($query);
								$stmt->bindParam(':id', $id_m);
								$stmt->execute();
						
								$rdv = $stmt->fetch(PDO::FETCH_ASSOC);
						
								
							} catch (PDOException $e) {
								
								echo "Error: " . $e->getMessage();
							}
						}

				?>
				<div class="head">
				<h3>Formulaire</h3>
						<a href="rendez-vous.php" class="btn-green">Retourner</a>
					</div>
				<form action="" method="POST">
				<input type="hidden" name="id" value="<?php echo $rdv['id']?>">
					<div class="form-group">
						<label for="">Nom</label>
						<input type="text" name="nom" value="<?php echo $rdv['nom']?>" readonly > 
					</div>
					<div class="form-group">
						<label for="">Prenom</label>
						<input type="text" name="prenom" value="<?php echo $rdv['prenom']?>" readonly>
					</div>
					<div class="form-group">
						<label for="date">Date</label>
						<input type="date" name="date" value="<?php echo $rdv['date']?>" required >
					</div>
					<div class="form-group">
						<label for="">Temps</label>
						<input type="time" name="heure" value="<?php echo $rdv['heure']?>" required>
					</div>
					<div>

					</div>
					<button type="reset" class="btn-second" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" name="Modif" class="btn-send">Modifier </button>
				</form>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
</body>
</html>