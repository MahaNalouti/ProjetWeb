<?php
session_start();
include("hiba/connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<title>Listes Medecins</title>
</head>
<body>
	
<?php
/*
	$nom='';
	if(isset($_SESSION['admin'])){
		$admin=$_SESSION['admin'];
		$query="SELECT * FROM admin where unom='$admin'";
		$query_run=mysqli_query($con,$query);
		$row=mysqli_fetch_array($query_run);
		$unom=$row['unom'];
		$mdp=$row['mdp'];
		$nom=$row['nom'];
	}
	*/

	?>
	<!-- SIDEBAR -->
	
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
	
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Listes Medecins </h1>
			<ul class="breadcrumbs">
				<li><a href="#">Medecins</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Listes Medecins</a></li>
			</ul>
            <div class="info-data">
            <div class="card">
					<div class="head">
						<div>
							<h2>Total Medecins
							</h2>
							<p>
							<?php
								try {
									$query = "SELECT * FROM doctors";
									$stmt = $connect->query($query);
									if ($stmt) {
										$num = $stmt->rowCount();
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
			<?php
                    include("message.php");
                ?>
			</div>
			<div class="data">
					
				<div class="content-data">
					<div class="head">
						<h3>Listes des Medecins</h3>
						<a href="Ajout-medecin.php" class="btn-send">Ajouter Medecin</a>
					</div>
						<div>
							<table>
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
								$query = "SELECT * FROM doctors";
								$stmt = $connect->query($query);
								if ($stmt->rowCount() > 0) {
									$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
									
									foreach ($rows as $row) {
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
                                                    <form action="insert.php" method="POST" class="d-inline">
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
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
</body>
</html>