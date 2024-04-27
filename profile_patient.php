<?php
session_start();
include("connection.php");

$uname = $_SESSION['Patient'];
$query = "SELECT * FROM patient WHERE username_p='$uname'";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Check if user exists
if (mysqli_num_rows($result) > 0) {
    // User exists, fetch and display information
    $row = mysqli_fetch_assoc($result);
    $matricule = $row['matricule'];
    $fname = $row['nom_p'];
    $sname = $row['prenom_p'];
    $sexe = $row['sexe'];
    $sang = $row['grp_sang'];
    $poids = $row['poids'];
    $age = $row['age'];
    $naissance = $row['naiss'];
    $allergie = $row['allergie'];
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<title>PatientSite</title>
</head>
<body>
	
<?php
  include("navbarpatient.php");
  ?>
   
        <main>
			<h1 class="title">Dashboard</h1>
           
			<ul class="breadcrumbs">
				<li><a href="profile.php">Tableau de bord </a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Page profile</a></li>
			</ul>
            <br>
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
                        <div class="col-md-10">
                    <h2 class="text-center my-2">Mes Informations</h2>
                  <br>
                    <div class="row" >
                    
                        
                            <p><strong>Utilisateur:</strong> <?php echo $uname; ?></p>
							<br>
                            <p><strong>Matricule:</strong> <?php echo $matricule; ?></p>
							<br>
                            <p><strong>Nom:</strong> <?php echo $fname; ?></p>
							<br>
                            <p><strong>Prenom:</strong> <?php echo $sname; ?></p>
							<br>
                            <p><strong>Date de naissance:</strong> <?php echo $naissance; ?></p>
							<br>
                            <p><strong>poids:</strong> <?php echo $poids; ?></p>
							<br>
                            <p><strong>sexe:</strong> <?php echo $sexe; ?></p>
							<br>
                            <p><strong>Allergie:</strong> <?php echo $allergie; ?></p>
							<br>
                            <p><strong>Type de Sang:</strong> <?php echo $sang; ?></p>
							<br>
                            <div class="text-center">
							<a href="bouton.php?matricule=<?php echo $matricule; ?>&fname=<?php echo $fname; ?>&sname=<?php echo $sname; ?>&sexe=<?php echo $sexe; ?>&sang=<?php echo $sang; ?>&poids=<?php echo $poids;
							 ?>&naissance=<?php echo $naissance; ?>&allergie=<?php echo $allergie; ?>" class="btn btn-primary">Modifier</a>
                           
                            
                    </div>
                </div>
						</div>
						
				
				</div>
      
    </body>
    </html>

    <?php
} else {
    echo "User not found or session variable not set.";
}
mysqli_close($connect);
?>
